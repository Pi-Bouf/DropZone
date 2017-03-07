<?php

use Illuminate\Database\Seeder;

class EtapeTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('etapes')->insert([
            'transport_id' => 1,
            'ville_id' => 1,
            'ville_position' => 1
        ]);

        DB::table('etapes')->insert([
            'transport_id' => 1,
            'ville_id' => 2,
            'ville_position' => 7
        ]);

        DB::table('etapes')->insert([
            'transport_id' => 2,
            'ville_id' => 3,
            'ville_position' => 1
        ]);

        DB::table('etapes')->insert([
            'transport_id' => 2,
            'ville_id' => 4,
            'ville_position' => 7
        ]);

        DB::table('etapes')->insert([
            'transport_id' => 2,
            'ville_id' => 5,
            'ville_position' => 2
        ]);
    }
}
