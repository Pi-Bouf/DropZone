<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandeTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('demande_transports', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('transport_id')->unsigned();
          $table->integer('user_id')->unsigned();
          $table->boolean('isAccepted')->nullable();
          $table->text('text');
          $table->float('cost');
          $table->timestamps();
          $table->foreign('transport_id')->references('id')->on('transports');
          $table->foreign('user_id')->references('id')->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('demande_transports');

    }
}
