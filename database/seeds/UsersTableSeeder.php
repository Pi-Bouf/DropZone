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
				'created_at' => date("Y-m-d"),
        		'picLink' => 'pb.jpg',
				'description'=> 'Coucou, moi c\'est Pierre et j\'adore la voiture !'
				]);

			DB::table('users')->insert([
				'email'=> 'rm.chauveau@gmail.com',
                'isAdmin' => true,
				'lastName'=> 'Chauveau',
				'firstName'=> 'Rémi',
				'password'=> bcrypt('111'),
				'birthday'=> '1995-01-01',
				'isChecked' => true,
				'sexe'=> 'h',
				'login'=> 'rChauveau',
				'phone'=> '0666666666',
				'created_at' => date("Y-m-d"),
				'description'=> "Moi je m'appelle Rémi, j'ai tout plein de cheveux ! :D",
				]);

			DB::table('users')->insert([
				'email'=> 'thomasvieux04300@gmail.com',
                'isAdmin' => true,
				'isBanned' => true,
				'lastName'=> 'Vieux',
				'firstName'=> 'Thomas',
				'password'=> bcrypt('111'),
				'birthday'=> '1995-01-01',
				'sexe'=> 'h',
				'login'=> 'tVieux',
				'phone'=> '0666666666',
        		'picLink' => 'tv.jpg',
				'created_at' => date("Y-m-d"),
				'description'=> "Campagnard dans l'âme, j'aime souvent rentrer dans mon pays ! :D",
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
				'created_at' => date("Y-m-d"),
				'phone'=> '0666666666',
				'description'=> "Salut, c'est Jessy ! Maintenant que je me suis trouvé une copine sur WoW, je vais souvent la voir à Montélimar :)",
				]);

			DB::table('users')->insert([
				'email'=> 'arthur@gmail.com',
                'isAdmin' => true,
				'lastName'=> 'Loufoque',
				'firstName'=> 'Arthur',
				'password'=> bcrypt('111'),
				'birthday'=> '1995-01-01',
				'sexe'=> 'h',
				'login'=> 'Arthur L.',
				'created_at' => date("Y-m-d"),
				'phone'=> '0666666666',
				'description'=> "Je suis Arthur, et je suis loufoque :D",
				]);

			DB::table('users')->insert([
				'email'=> 'kiki@gmail.com',
                'isAdmin' => true,
				'lastName'=> 'Rodriguez',
				'firstName'=> 'Christian',
				'password'=> bcrypt('111'),
				'birthday'=> '1995-01-01',
				'sexe'=> 'h',
				'login'=> 'Christian R.',
				'created_at' => date("Y-m-d"),
				'phone'=> '0666666666',
				'description'=> "Coucou, 55 ans, je suis Christian !",
				]);


			for($i = 0; $i < 12; $i++) {
				DB::table('users')->insert([
					'email'=> 'mickey-@gmail.com'.substr(md5(rand(0, 100000)), 0, 4),
					'lastName'=> 'Mickey'.substr(md5(rand(0, 100000)), 0, 4),
					'firstName'=> 'Mouse'.substr(md5(rand(0, 100000)), 0, 4),
					'password'=> bcrypt('111'),
					'birthday'=> '1995-01-01',
					'sexe'=> 'h',
					'login'=> 'Mickey M.'.substr(md5(rand(0, 100000)), 0, 4),
					'phone'=> '0666666666',
					'created_at' => '2017-01-01',
					'description'=> "Coucou c'est moi :D",
				]);
			}

			for($i = 0; $i < 26; $i++) {
				DB::table('users')->insert([
					'email'=> 'mickey-@gmail.com'.substr(md5(rand(0, 100000)), 0, 4),
					'lastName'=> 'Mickey'.substr(md5(rand(0, 100000)), 0, 4),
					'firstName'=> 'Mouse'.substr(md5(rand(0, 100000)), 0, 4),
					'password'=> bcrypt('111'),
					'birthday'=> '1995-01-01',
					'sexe'=> 'h',
					'login'=> 'Mickey M.'.substr(md5(rand(0, 100000)), 0, 4),
					'phone'=> '0666666666',
					'created_at' => '2017-02-01',
					'description'=> "Coucou c'est moi :D",
				]);
			}

		}
}
