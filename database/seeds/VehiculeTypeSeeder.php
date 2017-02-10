<?php

use Illuminate\Database\Seeder;

class VehiculeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

			DB::table('vehicule_types')->insert([
                'name' => 'Voiture'
				]);

			DB::table('vehicule_types')->insert([
                'name' => 'Bateau'
				]);
                
			DB::table('vehicule_types')->insert([
                'name' => 'Avion'
				]);
                
			DB::table('vehicule_types')->insert([
                'name' => 'Camion'
				]);
                
			DB::table('vehicule_types')->insert([
                'name' => 'Vélo'
				]);
                
			DB::table('vehicule_types')->insert([
                'name' => 'Moto'
				]);
    }
}
