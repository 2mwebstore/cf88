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
     * There is only ever a single Bot row (admin edits its token in place),
     * so its id is stable even when the token changes. Subscribers are
     * tagged with that stable bot_id so the broadcast jobs can find them.
     */
    public function handle(Request $request, string $secret)
    {
        abort_unless(hash_equals((string) config('services.telegram.webhook_secret'), $secret), 403);

        $bot = Bot::first();
        abort_unless($bot, 404);

        // User blocked / unblocked the bot
        if ($request->has('my_chat_member')) {
            $chat   = $request->input('my_chat_member.chat');
            $status = $request->input('my_chat_member.new_chat_member.status');
            if (($chat['type'] ?? '') === 'private') {
                BotSubscriber::where('chat_id', $chat['id'])
                    ->update([
                        'bot_id' => $bot->id,
                        'active' => $status !== 'kicked',
                    ]);
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
                ['chat_id' => $chat['id']],
                [
                    'bot_id'     => $bot->id,
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