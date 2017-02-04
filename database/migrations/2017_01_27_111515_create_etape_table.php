<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtapeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('etapes', function (Blueprint $table) {
          $table->integer('transport_id')->unsigned();
          $table->integer('ville_id')->unsigned();
          $table->tinyInteger('ville_position');
          $table->time('hourAppro');
          $table->timestamps();
          $table->foreign('ville_id')->references('id')->on('villes');
          $table->foreign('transport_id')->references('id')->on('transports');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('etapes');

    }
}
