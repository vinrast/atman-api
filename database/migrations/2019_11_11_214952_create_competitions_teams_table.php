<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionsTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions_teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('competition_id')->unsigned();
            $table->bigInteger('team_id')->unsigned();
            $table->foreign('competition_id')->references('id')->on('competitions');
            $table->foreign('team_id')->references('id')->on('teams');
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
        Schema::dropIfExists('competitions_teams');
    }
}
