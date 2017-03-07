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
        ]);

        DB::table('villes')->insert([
            'latitude' => 45.1666700,
            'longitude' => 5.7166700,
            'name' => "Grenoble",
        ]);

        DB::table('villes')->insert([
            'latitude' => 45.7484600,
            'longitude' => 4.8467100,
            'name' => "Lyon",
        ]);

        DB::table('villes')->insert([
            'latitude' => 48.866667,
            'longitude' => 2.333333,
            'name' => "Paris",
        ]);

        DB::table('villes')->insert([
            'latitude' => 44.556944,
            'longitude' => 4.749496000000022,
            'name' => "Montélimar",
        ]);
    }
}
