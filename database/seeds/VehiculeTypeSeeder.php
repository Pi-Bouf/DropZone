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

			DB::table('vehicule_type')->insert([
                'typeLib' => 'Voiture'
				]);

			DB::table('vehicule_type')->insert([
                'typeLib' => 'Bateau'
				]);
                
			DB::table('vehicule_type')->insert([
                'typeLib' => 'Avion'
				]);
                
			DB::table('vehicule_type')->insert([
                'typeLib' => 'Bateau'
				]);
                
			DB::table('vehicule_type')->insert([
                'typeLib' => 'Camion'
				]);
                
			DB::table('vehicule_type')->insert([
                'typeLib' => 'Vélo'
				]);
                
			DB::table('vehicule_type')->insert([
                'typeLib' => 'Moto'
				]);
    }
}
