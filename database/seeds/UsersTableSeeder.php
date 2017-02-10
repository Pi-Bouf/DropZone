<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
		public function run(){
			DB::table('users')->insert([
				'email'=> 'pierre.bouffier05@gmail.com',
                'isAdmin' => true,
				'lastName'=> 'Bouffier',
				'firstName'=> 'Pierre',
                'password'=> bcrypt('111'),
				'birthday'=> '1995-01-01',
				'sexe'=> 'h',
				'login'=> 'pBouffier',
				'phone'=> '0666666666',
				'description'=> 'BouffierBouffier BouffierBouffier'
				]);

			DB::table('users')->insert([
				'email'=> 'rm.chauveau@gmail.com',
                'isAdmin' => true,
				'lastName'=> 'Chauveau',
				'firstName'=> 'Rémi',
				'password'=> bcrypt('111'),
				'birthday'=> '1995-01-01',
				'sexe'=> 'h',
				'login'=> 'rChauveau',
				'phone'=> '0666666666',
				'description'=> 'ChauveauChauveau ChauveauChauveau'
				]);

			DB::table('users')->insert([
				'email'=> 'thomasvieux04300@gmail.com',
                'isAdmin' => true,
				'lastName'=> 'Vieux',
				'firstName'=> 'Thomas',
				'password'=> bcrypt('111'),
				'birthday'=> '1995-01-01',
				'sexe'=> 'h',
				'login'=> 'tVieux',
				'phone'=> '0666666666',
				'description'=> 'VieuxVieux VieuxVieux'
				]);

			DB::table('users')->insert([
				'email'=> 'jessy.canto.sio@gmail.com',
                'isAdmin' => true,
				'lastName'=> 'Canto',
				'firstName'=> 'Jessy',
				'password'=> bcrypt('111'),
				'birthday'=> '1995-01-01',
				'sexe'=> 'h',
				'login'=> 'jcanto',
				'phone'=> '0666666666',
				'description'=> 'CantoCanto CantoCanto'
				]);

		}
}
