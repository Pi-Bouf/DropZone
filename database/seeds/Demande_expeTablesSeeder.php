<?php

use Illuminate\Database\Seeder;
class Demande_expeTablesSeeder extends Seeder{

	public function run(){
		DB::table('demande_expe')->insert([
			'expeID' => 0,
			'userID' => 0,
			'prixExp' => 45,
			'demandeExpeTexte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'dateDemande' => '2017-12-05 15:16:30',
			'dateDepart' => '2017-12-06 15:16:30',
			'demandeAccepte' => 0
			]);
		DB::table('demande_expe')->insert([
			'expeID' => 1,
			'userID' => 0,
			'prixExp' => 36,
			'demandeExpeTexte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'dateDemande' => '2017-05-12 05:36:25',
			'dateDepart' => '2017-05-15 05:36:25',
			'demandeAccepte' => 0
			]);
		DB::table('demande_expe')->insert([
			'expeID' => 2,
			'userID' => 1,
			'prixExp' => 45,
			'demandeExpeTexte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'dateDemande' => '2017-12-05 15:16:30',
			'dateDepart' => '2017-12-06 15:16:30',
			'demandeAccepte' => 1
			]);

	}
}
?>
