<?php 

use Illuminate\Database\Seeder;
class Question_expeTablesSeeder extends Seeder{

	public function run(){
		DB::table('question_expeditions')->insert([
			'expedition_id' => 1,
			'user_id' => 3,
			'question' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			]);

			DB::table('question_expeditions')->insert([
			'expedition_id' => 1,
			'user_id' => 2,
			'question' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			]);
			
			DB::table('question_expeditions')->insert([
			'expedition_id' => 2,
			'user_id' => 1,
			'question' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			]);
			
	
	}
}
?>