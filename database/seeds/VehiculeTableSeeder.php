<?php

use Illuminate\Database\Seeder;

class VehiculeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

			DB::table('vehicule')->insert([
                'userID' => '1',
                'typeID' => '1',
                'vehiMarque' => 'Renault',
                'vehiModele' => 'Megan'
				]);

			DB::table('vehicule')->insert([
                'userID' => '1',
                'typeID' => '1',
                'vehiMarque' => 'Renault',
                'vehiModele' => 'Clio'
				]);

			DB::table('vehicule')->insert([
                'userID' => '1',
                'typeID' => '4',
                'vehiMarque' => 'Citroën',
                'vehiModele' => 'Citroën 23'
				]);

			DB::table('vehicule')->insert([
                'userID' => '2',
                'typeID' => '3',
                'vehiMarque' => 'airbus',
                'vehiModele' => 'a320'
				]);
    }
}
