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

            DB::table('vehicules')->insert([
                'user_id' => '3',
                'vehicule_type_id' => '4',
                'marque' => 'Renault',
                'modele' => 'Traffic'
				]);

            DB::table('vehicules')->insert([
                'user_id' => '4',
                'vehicule_type_id' => '1',
                'marque' => 'BMW',
                'modele' => 'Série 3'
			]);

            DB::table('vehicules')->insert([
                'user_id' => '5',
                'vehicule_type_id' => '1',
                'marque' => 'Audi',
                'modele' => 'TT'
			]);

            DB::table('vehicules')->insert([
                'user_id' => '6',
                'vehicule_type_id' => '6',
                'marque' => 'Harley Davidson',
                'modele' => 'Imperial'
			]);

    }
}
