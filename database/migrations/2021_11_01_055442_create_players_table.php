<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('has_xcp');
            $table->string('glider_name');
            $table->boolean('has_kingpost');
            $table->integer('max_time_point');
            $table->integer('max_landing_point');
            $table->integer('max_target_point');
            $table->integer('max_pylon1_point');
            $table->integer('max_pylon2_point');
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
}
