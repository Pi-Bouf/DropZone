<?php

use Illuminate\Database\Seeder;
class Demande_expeTablesSeeder extends Seeder{

	public function run(){
		DB::table('demande_expeditions')->insert([
			'expedition_id' => 1,
			'user_id' => 2,
			'prixAsked' => 45,
			'propositionText' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'beginDate' => '2017-12-05 15:16:30',
			'endDate' => '2017-12-06 15:16:30',
			'isAccepted' => 0
			]);
		DB::table('demande_expeditions')->insert([
			'expedition_id' => 1,
			'user_id' => 3,
			'prixAsked' => 36,
			'propositionText' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'beginDate' => '2017-05-12 05:36:25',
			'endDate' => '2017-05-15 05:36:25',
			'isAccepted' => 0
			]);
		DB::table('demande_expeditions')->insert([
			'expedition_id' => 2,
			'user_id' => 2,
			'prixAsked' => 45,
			'propositionText' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'beginDate' => '2017-12-05 15:16:30',
			'endDate' => '2017-12-06 15:16:30',
			'isAccepted' => 1
			]);

	}
}
?>
