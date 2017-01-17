<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('userID');
            $table->string('userMail')->unique();
            $table->string('userFacebookID')->nullable();
            $table->string('userNom');
            $table->string('userPrenom');
            $table->string('userPassword');
            $table->date('userDateNaiss');
            $table->char('userSexe', 1);
            $table->string('userPseudo');
            $table->string('userTel');
            $table->mediumText('userPresentation');
            $table->string('userLienPhoto')->nullable();
            $table->boolean('userAideMarchandise')->default(0);
            $table->boolean('userOptionTransporteur')->default(0);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
