<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('question_transports', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->integer('transport_id')->unsigned();
          $table->integer('question_transport_id')->nullable();
          $table->text('text');
          $table->timestamps();
          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('transport_id')->references('id')->on('transports');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('question_transports');

    }
}
