<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('url');
            $table->string('thumb')->nullable();
            $table->string('message')->nullable();
            $table->unsignedInteger('votes_red')->default(0);
            $table->unsignedInteger('votes_blue')->default(0);
            $table->unsignedInteger('votes_total')->default(0);
            $table->decimal('red_percent_vote', 5, 2)->default(50);  // new
            $table->decimal('blue_percent_vote', 5, 2)->default(50); // new
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
