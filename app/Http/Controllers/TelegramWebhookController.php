<?php

namespace App\Http\Controllers;

use App\Models\Bot;
use App\Models\BotSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramWebhookController extends Controller
{
    /**
     * Receives updates from Telegram. Records every private chat that sends
     * /start so the bot can broadcast to them later, and marks subscribers
     * inactive when they block the bot.
     */
    public function handle(Request $request, string $secret)
    {
        abort_unless(hash_equals((string) config('services.telegram.webhook_secret'), $secret), 403);

        // User blocked / unblocked the bot
        if ($request->has('my_chat_member')) {
            $chat   = $request->input('my_chat_member.chat');
            $status = $request->input('my_chat_member.new_chat_member.status');
            if (($chat['type'] ?? '') === 'private') {
                BotSubscriber::where('chat_id', $chat['id'])
                    ->update(['active' => $status !== 'kicked']);
            }
            return response('ok');
        }

        $message = $request->input('message');
        if (!$message) {
            return response('ok');
        }

        $chat = $message['chat'] ?? [];
        if (($chat['type'] ?? '') !== 'private') {
            return response('ok'); // ignore groups / channels
        }

        $text = $message['text'] ?? '';
        if (str_starts_with($text, '/start')) {
            BotSubscriber::updateOrCreate(
                ['chat_id' => $chat['id']],
                [
                    'username'   => $chat['username'] ?? null,
                    'first_name' => $chat['first_name'] ?? null,
                    'active'     => true,
                ]
            );

            $token = optional(Bot::first())->token;
            if ($token) {
                // Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
                Http::post("https://api.telegram.org/bot8912254938:AAGi5pmrSVvtIRxa7DrkLwLzjTj92AR7bPY/sendMessage", [
                    'chat_id' => $chat['id'],
                    'text'    => "ស្វាគមន៍! អ្នកនឹងទទួលបានវីដេអូថ្មីៗនៅទីនេះ។\nWelcome! You will receive new videos here.",
                ]);
            }
        }

        return response('ok');
    }
}