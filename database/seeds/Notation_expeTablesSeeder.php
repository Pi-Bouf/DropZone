<?php

use Illuminate\Database\Seeder;
class Notation_expeTablesSeeder extends Seeder{

	public function run(){
		DB::table('notation_expeditions')->insert([
			'expeditions_id' => 1,
			'user_id' => 3,
			'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'note' => 4,
			'UserOrTransporter' => 0
			]);
		DB::table('notation_expeditions')->insert([
			'expeditions_id' => 2,
			'user_id' => 2,
			'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'note' => 3,
			'UserOrTransporter' => 1
			]);
		DB::table('notation_expeditions')->insert([
			'expeditions_id' => 3,
			'user_id' => 1,
			'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'note' => 5,
			'UserOrTransporter' => 0
			]);

	}
}
?>
