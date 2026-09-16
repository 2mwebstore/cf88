<?php

namespace App\Jobs;

use App\Models\Bot;
use App\Models\BotSubscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BroadcastFightToSubscribers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $timeout = 3600;
    public int $tries   = 1;

    /**
     * @param string $photo  Thumbnail / fight photo URL (Telegram file_id or direct URL)
     * @param int    $botId  Which bot's subscribers to broadcast to
     */
    public function __construct(
        public string $caption,
        public string $photo,
        public int $botId,
    ) {}

    public function handle(): void
    {
        $token = optional(Bot::find($this->botId))->token;
        if (!$token) {
            Log::error('Broadcast skipped: bot not found', ['bot_id' => $this->botId]);
            return;
        }

        $photoUrl = "https://api.telegram.org/bot{$token}/sendPhoto";

        BotSubscriber::where('bot_id', $this->botId)->where('active', true)->chunkById(500, function ($subscribers) use ($photoUrl) {
            foreach ($subscribers as $s) {
                $res = $this->sendPhoto($photoUrl, $s->chat_id);

                if ($res->status() === 403) {
                    // User blocked the bot
                    $s->update(['active' => false]);
                } elseif ($res->status() === 429) {
                    // Flood control: wait as Telegram asks, then retry once
                    sleep((int) $res->json('parameters.retry_after', 5));
                    $this->sendPhoto($photoUrl, $s->chat_id);
                } elseif ($res->failed()) {
                    Log::warning('Broadcast send failed', ['chat_id' => $s->chat_id, 'body' => $res->body()]);
                }

                usleep(50_000); // ~20 messages/sec, under Telegram's 30/sec limit
            }
        });
    }

    private function sendPhoto(string $url, int $chatId)
    {
        return Http::post($url, [
            'chat_id'    => $chatId,
            'photo'      => $this->photo,
            'caption'    => $this->caption,
            'parse_mode' => 'Markdown',
        ]);
    }
}