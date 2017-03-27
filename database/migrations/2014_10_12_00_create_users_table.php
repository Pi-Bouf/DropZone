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
            $table->increments('id');
            $table->boolean('isAdmin')->default(0);
            $table->boolean('isChecked')->default(0);
            $table->boolean('isBanned')->default(0);
            $table->string('email')->unique();
            $table->string('facebook_id')->nullable();
            $table->string('lastName');
            $table->string('firstName');
            $table->string('password')->nullable();
            $table->date('birthday')->default("2000-00-00");
            $table->char('sexe', 1)->default('h');
            $table->string('login');
            $table->string('phone')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('picLink')->nullable();
            $table->boolean('helperOption')->default(0);
            $table->boolean('transportOption')->default(0);
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
