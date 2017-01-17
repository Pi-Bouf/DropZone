<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicule', function (Blueprint $table) {
            $table->increments('vehiID');
            $table->integer('userID')->unsigned();
            $table->integer('typeID')->unsigned();
            $table->float('vehiLongMax')->nullable();
            $table->float('vehiHautMax')->nullable();
            $table->float('vehiVolume')->nullable();
            $table->string('vehiMarque');
            $table->string('vehiModele');
            $table->boolean('vehiParDefaut')->default(0);
            $table->timestamps();
            $table->foreign('userID')->references('userID')->on('users');
            $table->foreign('typeID')->references('typeID')->on('vehicule_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Vehicule');
    }
}
