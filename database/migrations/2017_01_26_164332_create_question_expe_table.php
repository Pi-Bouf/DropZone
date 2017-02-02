<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionExpeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionExpe', function (Blueprint $table) {
            $table->string('expeID');
            $table->integer('userID');
            $table->text('QuesExpeText');
			$table->datetime('QuesExpeDate');
            $table->foreign('expeID')->references('expeID')->on('expedition');
			$table->foreign('userID')->references('userID')->on('users');
            $table->softDeletes();
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
        Schema::dropIfExists('questionExpe');
    }
}