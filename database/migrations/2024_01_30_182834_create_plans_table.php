<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->enum('status',['main','beanch']);
            $table->bigInteger('player_id')->unsigned();
            $table->foreign('player_id')->on('players')->references('id')->onDelete('cascade');
            $table->bigInteger('matche_id')->unsigned();
            $table->foreign('matche_id')->on('matches')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('plans');
    }
};
