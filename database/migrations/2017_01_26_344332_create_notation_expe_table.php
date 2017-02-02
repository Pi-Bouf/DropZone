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
        Schema::create('notation_expe', function (Blueprint $table) {
            $table->string('expeID');
            $table->integer('userID');
            $table->text('text');
      			$table->float('note');
      			$table->boolean('transpOuUtil');
            $table->foreign('userID')->references('userID')->on('demande_expe');
			      $table->foreign('expeID')->references('expeID')->on('demande_expe');
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
        Schema::dropIfExists('notation_expe');
    }
}
