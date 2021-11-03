<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_id')->constrained()->onDelete('cascade');
            $table->integer('time');
            $table->integer('landing');
            $table->boolean('target');
            $table->boolean('pylon1');
            $table->boolean('pylon2');
            $table->integer('time_point');
            $table->integer('landing_point');
            $table->integer('target_point');
            $table->integer('pylon1_point');
            $table->integer('pylon2_point');
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
        Schema::dropIfExists('flights');
    }
}
