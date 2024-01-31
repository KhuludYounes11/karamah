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
        Schema::create('wears', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('name');
            $table->string('image');
            $table->bigInteger('seasone_id')->unsigned();
            $table->foreign('seasone_id')->on('seasones')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('wears');
    }
};
