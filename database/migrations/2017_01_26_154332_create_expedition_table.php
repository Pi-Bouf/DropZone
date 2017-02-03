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
        Schema::create('expedition', function (Blueprint $table) {
            $table->increments('expeID');
            $table->integer('idExpediteur');
            $table->smallInteger('prixMax');
      			$table->boolean('expeAccepte');
      			$table->smallInteger('expePrixDefinitif');
      			$table->text('expeDescription');
      			$table->tinyInteger('expeVolumeColis');
      			$table->smallInteger('expeLongueurColis');
      			$table->smallInteger('expeLargeurColis');
      			$table->smallInteger('expeHauteurColis');
      			$table->float('expePoidColis');
      			$table->integer('villeIDDestination');
      			$table->integer('villeIDRamassage');
            $table->foreign('villeIDDestination')->references('villeID')->on('ville');
            $table->foreign('villeIDRamassage')->references('villeID')->on('ville');
			      $table->foreign('idExpediteur')->references('usersID')->on('users');
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
        Schema::dropIfExists('expedition');
    }
}
