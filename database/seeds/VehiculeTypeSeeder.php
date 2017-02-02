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
        
			DB::table('vehicule-type')->insert([
                'typeLib' => 'fji'
				]);
    }
}
