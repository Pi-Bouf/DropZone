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
      Schema::create('etape', function (Blueprint $table) {
          $table->tinyInteger('villePosition')->unsigned()->autoIncrement();
          $table->integer('transID');
          $table->integer('villeID');
          $table->time('heureApproximative');
          $table->timestamps();
          $table->foreign('villeID')->references('villeID')->on('ville');
          $table->foreign('transID')->references('transID')->on('transport');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('etape');

    }
}
