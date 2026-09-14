<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bot_subscribers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chat_id')->unique();
            $table->string('username')->nullable();
            $table->string('first_name')->nullable();
            $table->boolean('active')->default(true); // false when the user blocks the bot
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bot_subscribers');
    }
};