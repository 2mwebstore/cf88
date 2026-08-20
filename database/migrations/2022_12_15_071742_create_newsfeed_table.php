<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsfeedtable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsfeed', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('title')->nullable();
            $table->string('detail')->nullable();
            $table->string('detail1')->nullable();
            $table->string('detail2')->nullable();
            $table->string('detail3')->nullable();
            $table->string('detail4')->nullable();
            $table->string('detail5')->nullable();
            $table->string('detail6')->nullable();
            $table->string('detail7')->nullable();
            $table->string('detail8')->nullable();
            $table->string('detail9')->nullable();
            $table->string('detail10')->nullable();
            $table->string('detail11')->nullable();
            $table->string('detail12')->nullable();
            $table->string('detail13')->nullable();
            $table->string('photo')->nullable();
            $table->string('photo1')->nullable();
            $table->string('photo2')->nullable();
            $table->string('photo3')->nullable();
            $table->string('photo4')->nullable();
            $table->string('photo5')->nullable();
            $table->string('photo6')->nullable();
            $table->string('photo7')->nullable();
            $table->string('photo8')->nullable();
            $table->string('photo9')->nullable();
            $table->string('photo10')->nullable();
            $table->string('photo11')->nullable();
            $table->string('photo12')->nullable();
            $table->string('photo13')->nullable();
            $table->string('view')->default(0);
            $table->string('create_by');
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
        Schema::dropIfExists('newsfeed');
    }
}
