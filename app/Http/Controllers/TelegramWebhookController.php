<?php

namespace App\Http\Controllers;

use App\Models\Bot;
use App\Models\BotSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramWebhookController extends Controller
{
    /**
     * Receives updates from Telegram. Records every private chat that sends
     * /start so the bot can broadcast to them later, and marks subscribers
     * inactive when they block the bot.
     *
     * Multi-bot: each bot has its own token, and each bot's setWebhook URL
     * embeds that token (e.g. /telegram/webhook/{token}), so the token in
     * the URL is what identifies which bot an incoming update belongs to.
     */
    public function handle(Request $request, string $token)
    {
        $bot = Bot::where('token', $token)->first();
        if (!$bot) {
            Log::warning('Telegram webhook hit with unknown bot token', ['token' => $token]);
        }
        abort_unless($bot, 404);

        // User blocked / unblocked the bot
        if ($request->has('my_chat_member')) {
            $chat   = $request->input('my_chat_member.chat');
            $status = $request->input('my_chat_member.new_chat_member.status');
            if (($chat['type'] ?? '') === 'private') {
                BotSubscriber::where('bot_id', $bot->id)
                    ->where('chat_id', $chat['id'])
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
            // Log group/supergroup/channel messages so the correct chat_id and
            // message_thread_id (topic) can be read straight from the app logs,
            // with no need to ever toggle the webhook off.
            Log::info('Telegram group message received', [
                'bot_id'             => $bot->id,
                'chat_id'            => $chat['id'] ?? null,
                'chat_type'          => $chat['type'] ?? null,
                'chat_title'         => $chat['title'] ?? null,
                'message_thread_id'  => $message['message_thread_id'] ?? null,
                'is_topic_message'   => $message['is_topic_message'] ?? false,
                'text'               => $message['text'] ?? null,
            ]);
            return response('ok'); // ignore groups / channels for subscriber tracking
        }

        $text = $message['text'] ?? '';
        if (str_starts_with($text, '/start')) {
            BotSubscriber::updateOrCreate(
                [
                    'bot_id'  => $bot->id,
                    'chat_id' => $chat['id'],
                ],
                [
                    'username'   => $chat['username'] ?? null,
                    'first_name' => $chat['first_name'] ?? null,
                    'active'     => true,
                ]
            );

            Http::post("https://api.telegram.org/bot{$bot->token}/sendMessage", [
                'chat_id' => $chat['id'],
                'text'    => "ស្វាគមន៍! អ្នកនឹងទទួលបានវីដេអូថ្មីៗនៅទីនេះ។\nWelcome! You will receive new videos here.",
            ]);
        }

        return response('ok');
    }
}