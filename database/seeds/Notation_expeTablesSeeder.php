<?php 

use Illuminate\Database\Seeder;
class Notation_expeTablesSeeder extends Seeder{

	public function run(){
		DB::table('notation_expe')->insert([
			'expeID' => 0,
			'userID' => 0,
			'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'note' => 15,
			'transpOuUtil' => 0
			]);
		DB::table('notation_expe')->insert([
			'expeID' => 1,
			'userID' => 0,
			'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'note' => 15,
			'transpOuUtil' => 1
			]);
		DB::table('notation_expe')->insert([
			'expeID' => 2,
			'userID' => 1,
			'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'note' => 15,
			'transpOuUtil' => 0
			]);

	}
}
?>