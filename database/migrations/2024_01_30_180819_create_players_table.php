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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('name');
            $table->string('play');
            $table->string('from');
            $table->string('first_club');
            $table->string('career');
            $table->string('image');
            $table->integer('high');
            $table->integer('number');
            $table->date('born');
            $table->bigInteger('sport_id')->unsigned();
            $table->foreign('sport_id')->on('sports')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('players');
    }
};
