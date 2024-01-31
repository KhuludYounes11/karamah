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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->datetime('when');
            $table->enum('status',['not_started','finished']);
            $table->string('plan');
            $table->string('channel');
            $table->string('round');
            $table->string('play_ground');
            $table->bigInteger('seasone_id')->unsigned();
            $table->foreign('seasone_id')->on('seasones')->references('id')->onDelete('cascade');
            $table->bigInteger('club1_id')->unsigned();
            $table->foreign('club1_id')->on('clubs')->references('id')->onDelete('cascade');
            $table->bigInteger('club2_id')->unsigned();
            $table->foreign('club2_id')->on('clubs')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('matches');
    }
};
