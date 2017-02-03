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
        Schema::create('demande_expe', function (Blueprint $table) {
            $table->integer('expeID');
            $table->integer('userID');
            $table->float('prixExp');
      			$table->text('demandeExpeTexte');
      			$table->datetime('dateDemande');
      			$table->datetime('dateDepart');
      			$table->boolean('demandeAccepte');
            $table->foreign('userID')->references('userID')->on('users');
			      $table->foreign('expeID')->references('expeID')->on('Expedition');
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
        Schema::dropIfExists('demande_expe');
    }
}
