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
            'place_id' => "ChIJ1ROi2Hg_yxIRYKeX_aUZCAQ",
        ]);

        DB::table('villes')->insert([
            'latitude' => 44.560132,
            'longitude' => 6.080900,
            'name' => "Grenoble",
            'place_id' => "ChIJb76J1ov0ikcRmFOZbs0QjGE",
        ]);
    }
}
