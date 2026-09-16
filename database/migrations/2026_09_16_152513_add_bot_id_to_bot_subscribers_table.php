<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bot_subscribers', function (Blueprint $table) {
            $table->foreignId('bot_id')->nullable()->after('id')->constrained('bots')->nullOnDelete();
        });

        // Backfill existing rows to your current (only) bot so nothing already
        // subscribed silently drops out of broadcasts after this migration runs.
        $firstBotId = DB::table('bots')->orderBy('id')->value('id');
        if ($firstBotId) {
            DB::table('bot_subscribers')->whereNull('bot_id')->update(['bot_id' => $firstBotId]);
        }
    }

    public function down(): void
    {
        Schema::table('bot_subscribers', function (Blueprint $table) {
            $table->dropForeign(['bot_id']);
            $table->dropColumn('bot_id');
        });
    }
};