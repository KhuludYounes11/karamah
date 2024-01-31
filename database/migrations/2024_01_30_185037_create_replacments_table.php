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
        Schema::create('replacments', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->bigInteger('outplayer_id')->unsigned();
            $table->foreign('outplayer_id')->on('players')->references('id')->onDelete('cascade');
            $table->bigInteger('inplayer_id')->unsigned();
            $table->foreign('inplayer_id')->on('players')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('replacments');
    }
};
