<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpeditionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expeditions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->smallInteger('costMax');
      		$table->boolean('isAccepted');
      		$table->smallInteger('costFixed');
      		$table->text('description');
      		$table->tinyInteger('volumeItem')->nullable();
      		$table->smallInteger('lengthItem');
      		$table->smallInteger('widthItem');
      		$table->smallInteger('heightItem');
      		$table->float('weightItem');
      		$table->integer('ending_ville_id')->unsigned();
      		$table->integer('beginning_ville_id')->unsigned();
            $table->foreign('ending_ville_id')->references('id')->on('villes');
            $table->foreign('beginning_ville_id')->references('id')->on('villes');
			$table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('expeditions');
    }
}
