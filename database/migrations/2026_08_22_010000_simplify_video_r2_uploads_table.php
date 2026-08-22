<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('video_r2_uploads', function (Blueprint $table) {
            $table->dropColumn(['title', 'message', 'thumb']);
        });
    }

    public function down()
    {
        Schema::table('video_r2_uploads', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->string('message', 500)->nullable();
            $table->string('thumb')->nullable();
        });
    }
};