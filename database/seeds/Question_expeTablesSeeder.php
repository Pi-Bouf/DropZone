<?php 

use Illuminate\Database\Seeder;
class Question_expeTablesSeeder extends Seeder{

	public function run(){
		DB::table('question_expe')->insert([
			'expeID' => 0,
			'userID' => 0,
			'QuesExpeText' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'QuesExpeDate' => '2017-12-05 15:16:30',
			
			]);
			DB::table('question_expe')->insert([
			'expeID' => 1,
			'userID' => 0,
			'QuesExpeText' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'QuesExpeDate' => '2017-12-05 15:16:30',
			
			]);
			DB::table('question_expe')->insert([
			'expeID' => 2,
			'userID' => 1,
			'QuesExpeText' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
			'QuesExpeDate' => '2017-12-05 15:16:30',
			
			]);
			
	
	}
}
?>