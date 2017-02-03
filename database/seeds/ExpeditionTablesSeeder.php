<?php

use Illuminate\Database\Seeder;
class ExpeditionTablesSeeder extends Seeder{

	public function run(){
		DB::table('notation_expe')->insert([
			'expeID' => 0,
			'idExpediteur' => 0,
			'prixMax' => 26,
			'expeAccepte' => 0,
			'expePrixDefinitif' => 23,
			'expeDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'expeVolumeColis' => 5,
			'expeLongueurColis' => 10,
			'expeLargeurColis' => 15,
			'expeHauteurColis' => 6,
			'expePoidColis' => 15.5,
			'villeIDDestination' => 0,
			'villeIDRamassage' => 0
			]);

			DB::table('notation_expe')->insert([
			'expeID' => 1,
			'idExpediteur' => 0,
			'prixMax' => 16,
			'expeAccepte' => 1,
			'expePrixDefinitif' => 60,
			'expeDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'expeVolumeColis' => 5,
			'expeLongueurColis' => 10,
			'expeLargeurColis' => 15,
			'expeHauteurColis' => 6,
			'expePoidColis' => 15.5,
			'villeIDDestination' => 1,
			'villeIDRamassage' => 0
			]);

			DB::table('notation_expe')->insert([
			'expeID' => 2,
			'idExpediteur' => 1,
			'prixMax' => 26,
			'expeAccepte' => 0,
			'expePrixDefinitif' => 55,
			'expeDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'expeVolumeColis' => 5,
			'expeLongueurColis' => 10,
			'expeLargeurColis' => 15,
			'expeHauteurColis' => 6,
			'expePoidColis' => 15.5,
			'villeIDDestination' => 0,
			'villeIDRamassage' => 1
			]);

	}
}
?>
