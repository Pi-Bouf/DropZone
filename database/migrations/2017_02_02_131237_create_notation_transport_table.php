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
      Schema::create('notation_transports', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('demande_transport_id')->unsigned();
          $table->text('text');
          $table->float('note');
          $table->boolean('UserOrTransporter');
          $table->timestamps();
          $table->foreign('demande_transport_id')->references('id')->on('demande_transports');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('notation_transports');
    }
}
