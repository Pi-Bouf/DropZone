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
				'userMail'=> 'pierre.bouffier05@gmail.com',
                'userAdmin' => true,
				'userNom'=> 'Bouffier',
				'userPrenom'=> 'Pierre',
                'userPassword'=> bcrypt('111'),
				'userDateNaiss'=> '1995-01-01',
				'userSexe'=> 'h',
				'userPseudo'=> 'pBouffier',
				'userTel'=> '0666666666',
				'userPresentation'=> 'BouffierBouffier BouffierBouffier'
				]);

			DB::table('users')->insert([
				'userMail'=> 'rm.chauveau@gmail.com',
                'userAdmin' => true,
				'userNom'=> 'Chauveau',
				'userPrenom'=> 'Rémi',
				'userPassword'=> bcrypt('111'),
				'userDateNaiss'=> '1995-01-01',
				'userSexe'=> 'h',
				'userPseudo'=> 'rChauveau',
				'userTel'=> '0666666666',
				'userPresentation'=> 'ChauveauChauveau ChauveauChauveau'
				]);

			DB::table('users')->insert([
				'userMail'=> 'thomasvieux04300@gmail.com',
                'userAdmin' => true,
				'userNom'=> 'Vieux',
				'userPrenom'=> 'Thomas',
				'userPassword'=> bcrypt('111'),
				'userDateNaiss'=> '1995-01-01',
				'userSexe'=> 'h',
				'userPseudo'=> 'tVieux',
				'userTel'=> '0666666666',
				'userPresentation'=> 'VieuxVieux VieuxVieux'
				]);

			DB::table('users')->insert([
				'userMail'=> 'jessy.canto.sio@gmail.com',
                'userAdmin' => true,
				'userNom'=> 'Canto',
				'userPrenom'=> 'Jessy',
				'userPassword'=> bcrypt('111'),
				'userDateNaiss'=> '1995-01-01',
				'userSexe'=> 'h',
				'userPseudo'=> 'jcanto',
				'userTel'=> '0666666666',
				'userPresentation'=> 'CantoCanto CantoCanto'
				]);

		}
}
