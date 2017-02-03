<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotationTransportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('notation_transport', function (Blueprint $table) {
          $table->increments('idNoteTransport');
          $table->text('text');
          $table->float('note');
          $table->integer('idDemande');
          $table->boolean('transpOuUti');
          $table->timestamps();
          $table->foreign('idDemande')->references('idDemande')->on('demande_trans');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('notation_transport');
    }
}
