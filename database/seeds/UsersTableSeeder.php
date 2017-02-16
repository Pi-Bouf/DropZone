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
        'picLink' => 'pb.jpg',
				'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
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
				'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
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
        'picLink' => 'tv.jpg',
				'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
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
				'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
				]);

		}
}
