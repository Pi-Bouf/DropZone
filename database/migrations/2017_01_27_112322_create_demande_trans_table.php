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
      Schema::create('demande_trans', function (Blueprint $table) {
          $table->increments('idDemande');
          $table->integer('transport_transID');
          $table->integer('utilisateur_userID');
          $table->boolean('demandeAccep');
          $table->text('texteDemande');
          //$table->boolean('demandeAccepte');
          $table->float('prix');
          $table->timestamps();
          $table->foreign('transport_transID')->references('transport')->on('transID');
          $table->foreign('utilisateur_userID')->references('utilisateur')->on('userID');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('demande_trans');

    }
}
