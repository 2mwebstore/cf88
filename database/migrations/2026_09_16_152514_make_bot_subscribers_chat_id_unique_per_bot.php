<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * The same chat_id can now legitimately appear more than once — once
     * per bot a person has started (a private chat_id is the user's own
     * Telegram id, which is identical across every bot they talk to).
     * Replace the single-column unique key with a composite one so each
     * (bot_id, chat_id) pair is unique instead.
     */
    public function up(): void
    {
        Schema::table('bot_subscribers', function (Blueprint $table) {
            $table->dropUnique('bot_subscribers_chat_id_unique');
            $table->unique(['bot_id', 'chat_id']);
        });
    }

    public function down(): void
    {
        Schema::table('bot_subscribers', function (Blueprint $table) {
            $table->dropUnique(['bot_id', 'chat_id']);
            $table->unique('chat_id');
        });
    }
};
