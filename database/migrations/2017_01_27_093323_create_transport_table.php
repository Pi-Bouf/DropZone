<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('transport', function (Blueprint $table) {
          $table->increments('transID');
          $table->integer('vehiID')->unsigned();
          $table->tinyInteger('transDetourRetirMax');
          $table->tinyInteger('transDetourDepotMax');
          $table->boolean('transAutoroute');
          $table->boolean('transNatureTrajet')->nullable();
          $table->datetime('transDateDepart');
          $table->string('transFrequence');
          $table->datetime('transRegulierDateDebut');
          $table->datetime('transRegulierDateFin');
          $table->time('transHeureDepart');
          $table->text('transInformations');
          $table->integer('transporteur_userID');
          $table->timestamps();
          $table->foreign('vehiID')->references('vehiID')->on('vehicule');
          $table->foreign('transporteur_userID')->references('userID')->on('utilisateur');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transport');
    }
}
