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
      Schema::create('transports', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('vehicule_id')->unsigned();
          $table->integer('user_id')->unsigned();
          $table->tinyInteger('detourRetirMax');
          $table->tinyInteger('detourDepotMax');
          $table->boolean('withHighway');
          $table->boolean('natureTransport')->default(0); // 0: ponctuel, 1: régulier
          $table->datetime('beginningDate');
          $table->string('frequency')->nullable(); // [1/s (1 par semain)], [5/m (5 fois par mois)]
          $table->datetime('regularyBeginningDate');
          $table->datetime('regularyEndingDate');
          $table->time('beginningHour');
          $table->text('information');
          $table->timestamps();
          $table->foreign('vehicule_id')->references('id')->on('vehicules');
          $table->foreign('user_id')->references('id')->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transports');
    }
}
