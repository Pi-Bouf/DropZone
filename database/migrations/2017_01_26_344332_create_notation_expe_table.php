<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotationExpeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notation_expeditions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('expedition_id')->unsigned();
            $table->text('text');
      		$table->integer('note');
      	    $table->boolean('UserOrTransporter');
            $table->foreign('user_id')->references('id')->on('users');
			$table->foreign('expedition_id')->references('id')->on('expeditions');
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
        Schema::dropIfExists('notation_expeditions');
    }
}
