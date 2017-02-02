<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('question_trans', function (Blueprint $table) {
          $table->increments('idQuestion');
          $table->integer('userID');
          $table->integer('transID');
          $table->text('text');
          $table->datetime('date');
          $table->timestamps();
          $table->foreign('transID')->references('transport')->on('transID');
          $table->foreign('userID')->references('users')->on('userID');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('question_trans');

    }
}
