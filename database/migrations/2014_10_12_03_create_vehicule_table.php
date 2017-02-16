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
            $table->integer('vehicule_type_id')->unsigned();
            $table->string('marque');
            $table->string('modele');
            $table->float('longMax')->nullable();
            $table->float('hautMax')->nullable();
            $table->float('largMax')->nullable();
            $table->float('poidMax')->nullable();
            $table->float('volume')->nullable();
            $table->boolean('isDefault')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('vehicule_type_id')->references('id')->on('vehicule_types');
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