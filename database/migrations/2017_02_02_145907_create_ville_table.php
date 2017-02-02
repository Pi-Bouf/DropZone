<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVilleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ville', function (Blueprint $table) {
          $table->increments('villeID');
          $table->string('villeLib');
          $table->string('villeCP');
          $table->string('villeDepartement');
          $table->string('villeRegion');
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
      Schema::drop('ville');
    }
}
