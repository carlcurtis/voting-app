<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voting.votes', function (Blueprint $table) {
          $table->increments('id');
          $table->boolean('voting');
          $table->integer('constituency')->references('id')->on('constituencies');
          $table->integer('party')->references('id')->on('parties');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voting.votes');
    }
}
