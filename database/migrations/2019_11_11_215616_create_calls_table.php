<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('deadline');
            $table->string('position');
            $table->string('address');
            $table->string('description');
            $table->bigInteger('status_id')->unsigned();
            $table->bigInteger('team_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('team_id')->references('id')->on('teams');
            $table->date('proposed_end');
            $table->date('final_date')->nullable();
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
        Schema::dropIfExists('calls');
    }
}
