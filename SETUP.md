# Telegram broadcast to all bot users — setup

## Files in this package
| File | Action |
|---|---|
| `database/migrations/2026_09_14_000000_create_bot_subscribers_table.php` | NEW |
| `app/Models/BotSubscriber.php` | NEW |
| `app/Http/Controllers/TelegramWebhookController.php` | NEW |
| `app/Jobs/BroadcastChannelToSubscribers.php` | NEW |
| `app/Http/Controllers/ChannelController.php` | REPLACE (only `store()` + 2 imports changed) |

Plus 3 small manual edits (steps 2–4 below).

## Step 1 — copy the files
Copy the four NEW files into the same paths in your Laravel project, and replace `ChannelController.php`.

## Step 2 — routes/api.php
Add:
```php
use App\Http\Controllers\TelegramWebhookController;

Route::post('/telegram/webhook/{secret}', [TelegramWebhookController::class, 'handle']);
```
(Must be in `api.php`, not `web.php`, so CSRF doesn't block Telegram.)

## Step 3 — config/services.php
Add inside the returned array:
```php
'telegram' => [
    'webhook_secret' => env('TELEGRAM_WEBHOOK_SECRET'),
],
```

## Step 4 — .env
```
TELEGRAM_WEBHOOK_SECRET=some-long-random-string
QUEUE_CONNECTION=database
```
Generate a secret with: `php -r 'echo bin2hex(random_bytes(24));'`

## Step 5 — migrate
```
php artisan queue:table      # only if you don't already have the jobs table
php artisan migrate
php artisan config:clear
```

## Step 6 — register the webhook with Telegram (run once)
Replace `<TOKEN>` with the bot token from your `bots` table and `<SECRET>` with the value from .env:
```
curl "https://api.telegram.org/bot<TOKEN>/setWebhook?url=https://cf88.news/api/telegram/webhook/<SECRET>&allowed_updates=%5B%22message%22%2C%22my_chat_member%22%5D"

curl "https://api.telegram.org/bot8912254938:AAGi5pmrSVvtIRxa7DrkLwLzjTj92AR7bPY/setWebhook?url=https://cf88-production.up.railway.app/api/telegram/webhook/f5e46196faa68a06a5ff0b2748c04abe9d7d7f9835a8997c%&allowed_updates=%5B%22message%22%2C%22my_chat_member%22%5D"

curl "https://api.telegram.org/bot8912254938:AAGi5pmrSVvtIRxa7DrkLwLzjTj92AR7bPY/getWebhookInfo"


```
Verify: `curl "https://api.telegram.org/bot<TOKEN>/getWebhookInfo"` — `url` should be set and `last_error_message` empty.

## Step 7 — run the queue worker
The broadcast runs in a background job so the admin page doesn't hang.

**VPS (supervisor)** — `/etc/supervisor/conf.d/cf88-queue.conf`:
```
[program:cf88-queue]
command=php /path/to/cf88.news/artisan queue:work --tries=1 --timeout=3600 --sleep=3
autostart=true
autorestart=true
user=www-data
stdout_logfile=/var/log/cf88-queue.log
```
Then `supervisorctl reread && supervisorctl update`.

**cPanel shared hosting (no supervisor)** — add a cron job every minute:
```
* * * * * cd /home/USER/cf88.news && php artisan queue:work --stop-when-empty --tries=1 --timeout=3600 >> /dev/null 2>&1
```

## Step 8 — test
1. Open your bot in Telegram, press **Start**. You should get the welcome message and a row in `bot_subscribers`.
2. Create a channel in the admin. Expected:
   - Video posted to the group topic (as before, now as video instead of photo).
   - A few seconds later the same video arrives in your private chat with the bot.
3. `tail storage/logs/laravel.log` if anything is missing.

## Notes
- Telegram gives a bot no list of its users, so only people who press **Start after** the webhook is live will be in `bot_subscribers`. Existing users must press Start once.
- Video by URL must be a direct `.mp4` link ≤ 20 MB. The group post reuses Telegram's `file_id` for the broadcast, so subscribers get the video even if it's large — as long as the first send succeeded. If the first send fails, everyone falls back to the photo.
- Users who block the bot are marked `active = 0` automatically and skipped next time.
- Rate: ~20 messages/sec. 5,000 subscribers ≈ 4–5 minutes.


curl "https://api.telegram.org/bot8912254938:AAGi5pmrSVvtIRxa7DrkLwLzjTj92AR7bPY/deleteWebhook?drop_pending_updates=true"

curl "https://api.telegram.org/bot8912254938:AAGi5pmrSVvtIRxa7DrkLwLzjTj92AR7bPY/setWebhook?url=https://cf88-production.up.railway.app/api/telegram/webhook/f9b849e40e44ab2d4a6ca11085c652b0759dc434d5815ead&allowed_updates=%5B%22message%22%2C%22my_chat_member%22%5D"

curl "https://api.telegram.org/bot8912254938:AAGi5pmrSVvtIRxa7DrkLwLzjTj92AR7bPY/getWebhookInfo"


curl "https://api.telegram.org/bot8912254938:AAGi5pmrSVvtIRxa7DrkLwLzjTj92AR7bPY/getChat?chat_id=-1002038506995"
curl "https://api.telegram.org/bot8912254938:AAGi5pmrSVvtIRxa7DrkLwLzjTj92AR7bPY/getChat?chat_id=6423893418"

curl "https://api.telegram.org/bot8912254938:AAGi5pmrSVvtIRxa7DrkLwLzjTj92AR7bPY/getMe"




111
curl "https://api.telegram.org/bot8922786890:AAFlS4Z8OJip-P48CpzS97-TI4dkjdtkNwQ/deleteWebhook?drop_pending_updates=true"

curl "https://api.telegram.org/bot8922786890:AAFlS4Z8OJip-P48CpzS97-TI4dkjdtkNwQ/setWebhook?url=https://cf88-production.up.railway.app/api/telegram/webhook/f9b849e40e44ab2d4a6ca11085c652b0759dc434d5815ead&allowed_updates=%5B%22message%22%2C%22my_chat_member%22%5D"

curl "https://api.telegram.org/bot8922786890:AAFlS4Z8OJip-P48CpzS97-TI4dkjdtkNwQ/getWebhookInfo"


curl "https://api.telegram.org/bot8922786890:AAFlS4Z8OJip-P48CpzS97-TI4dkjdtkNwQ/getChat?chat_id=-1002038506995"
curl "https://api.telegram.org/bot8922786890:AAFlS4Z8OJip-P48CpzS97-TI4dkjdtkNwQ/getChat?chat_id=6423893418"

curl "https://api.telegram.org/bot8922786890:AAFlS4Z8OJip-P48CpzS97-TI4dkjdtkNwQ/getMe"