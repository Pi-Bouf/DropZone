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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('vehicule_types_id')->unsigned();
            $table->float('longMax')->nullable();
            $table->float('hautMax')->nullable();
            $table->float('volume')->nullable();
            $table->string('marque');
            $table->string('modele');
            $table->boolean('isDefault')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('vehicule_types_id')->references('id')->on('vehicule_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vehicules');
    }
}
