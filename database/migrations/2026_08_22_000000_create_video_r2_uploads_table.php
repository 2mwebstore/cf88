<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('video_r2_uploads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('message', 500)->nullable();
            $table->string('url');   // R2 public URL of the uploaded video file
            $table->string('thumb'); // R2 public URL of the uploaded thumbnail image
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('video_r2_uploads');
    }
};