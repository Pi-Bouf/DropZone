<?php

use Illuminate\Database\Seeder;
class ExpeditionTablesSeeder extends Seeder{

	public function run(){
		DB::table('expeditions')->insert([
			'user_id' => 1,
			'costMax' => 26,
			'isAccepted' => 0,
			'costFixed' => 23,
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'volumeItem' => 5,
			'lengthItem' => 10,
			'widthItem' => 15,
			'heightItem' => 6,
			'weightItem' => 15.5,
			'ending_ville_id' => 1,
			'beginning_ville_id' => 2
			]);

			DB::table('expeditions')->insert([
			'user_id' => 2,
			'costMax' => 16,
			'isAccepted' => 1,
			'costFixed' => 60,
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'volumeItem' => 5,
			'lengthItem' => 10,
			'widthItem' => 15,
			'heightItem' => 6,
			'weightItem' => 15.5,
			'ending_ville_id' => 1,
			'beginning_ville_id' => 2
			]);

			DB::table('expeditions')->insert([
			'user_id' => 3,
			'costMax' => 26,
			'isAccepted' => 0,
			'costFixed' => 55,
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'volumeItem' => 5,
			'lengthItem' => 10,
			'widthItem' => 15,
			'heightItem' => 6,
			'weightItem' => 15.5,
			'ending_ville_id' => 1,
			'beginning_ville_id' => 2
			]);

	}
}
?>
