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

			DB::table('vehicules')->insert([
                'user_id' => '1',
                'vehicule_type_id' => '1',
                'marque' => 'Renault',
                'isDefault' => true,
                'modele' => 'Megan'
				]);

			DB::table('vehicules')->insert([
                'user_id' => '1',
                'vehicule_type_id' => '1',
                'marque' => 'Renault',
                'modele' => 'Clio'
				]);

			DB::table('vehicules')->insert([
                'user_id' => '1',
                'vehicule_type_id' => '4',
                'marque' => 'Citroën',
                'modele' => 'Citroën 23'
				]);

			DB::table('vehicules')->insert([
                'user_id' => '2',
                'vehicule_type_id' => '3',
                'marque' => 'airbus',
                'modele' => 'a320'
				]);
    }
}
