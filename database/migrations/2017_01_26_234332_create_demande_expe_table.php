<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandeExpeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_expeditions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('expedition_id')->unsigned();
            $table->float('prixAsked');
      		$table->text('propositionText');
      		$table->datetime('beginDate');
      		$table->datetime('endDate');
      		$table->boolean('isAccepted')->nullable();
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
        Schema::dropIfExists('demande_expeditions');
    }
}
