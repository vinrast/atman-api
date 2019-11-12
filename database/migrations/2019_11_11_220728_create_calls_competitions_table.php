<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallsCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls_competitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('call_id')->unsigned();
            $table->bigInteger('competition_id')->unsigned();
            $table->foreign('call_id')->references('id')->on('calls');
            $table->foreign('competition_id')->references('id')->on('competitions');
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
        Schema::dropIfExists('calls_competitions');
    }
}
