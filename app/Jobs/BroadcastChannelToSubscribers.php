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

class BroadcastChannelToSubscribers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $timeout = 3600;
    public int $tries   = 1;

    /**
     * @param string $video  Telegram file_id (preferred) or a direct .mp4 URL (<= 20 MB)
     * @param string $photo  Thumbnail / fallback photo URL
     */
    public function __construct(
        public string $caption,
        public string $video,
        public string $photo,
    ) {}

    public function handle(): void
    {
        $token = optional(Bot::first())->token;
        if (!$token) {
            Log::error('Broadcast skipped: no bot token');
            return;
        }

        $videoUrl = "https://api.telegram.org/bot{$token}/sendVideo";
        $photoUrl = "https://api.telegram.org/bot{$token}/sendPhoto";

        BotSubscriber::where('active', true)->chunkById(500, function ($subscribers) use ($videoUrl, $photoUrl) {
            foreach ($subscribers as $s) {
                $res = $this->sendVideo($videoUrl, $s->chat_id);

                // Video failed for a reason other than blocked/flood -> send photo instead
                if ($res->failed() && !in_array($res->status(), [403, 429])) {
                    $res = Http::post($photoUrl, [
                        'chat_id'    => $s->chat_id,
                        'photo'      => $this->photo,
                        'caption'    => $this->caption,
                        'parse_mode' => 'Markdown',
                    ]);
                }

                if ($res->status() === 403) {
                    // User blocked the bot
                    $s->update(['active' => false]);
                } elseif ($res->status() === 429) {
                    // Flood control: wait as Telegram asks, then retry once
                    sleep((int) $res->json('parameters.retry_after', 5));
                    $this->sendVideo($videoUrl, $s->chat_id);
                } elseif ($res->failed()) {
                    Log::warning('Broadcast send failed', ['chat_id' => $s->chat_id, 'body' => $res->body()]);
                }

                usleep(50_000); // ~20 messages/sec, under Telegram's 30/sec limit
            }
        });
    }

    private function sendVideo(string $url, int $chatId)
    {
        return Http::post($url, [
            'chat_id'            => $chatId,
            'video'              => $this->video,
            'thumbnail'          => $this->photo,
            'caption'            => $this->caption,
            'parse_mode'         => 'Markdown',
            'supports_streaming' => true,
        ]);
    }
}