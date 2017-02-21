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
            'name' => "Gap"
        ]);

        DB::table('villes')->insert([
            'latitude' => 44.560132,
            'longitude' => 6.080900,
            'name' => "Grenoble"
        ]);
    }
}
