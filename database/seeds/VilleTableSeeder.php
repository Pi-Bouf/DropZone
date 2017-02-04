<?php

use Illuminate\Database\Seeder;

class VilleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('villes')->insert([
            'latitude' => 44.560132,
            'longitude' => 6.080900,
            'name' => "Gap",
            'codePostal' => "05000",
            'departement' => "Hautes-Alpes",
            'region' => "PACA"
        ]);

        DB::table('villes')->insert([
            'latitude' => 44.560132,
            'longitude' => 6.080900,
            'name' => "Grenoble",
            'codePostal' => "38000",
            'departement' => "Isère",
            'region' => "PACA"
        ]);
    }
}
