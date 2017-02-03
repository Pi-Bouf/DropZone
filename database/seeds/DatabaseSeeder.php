<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VehiculeTypeSeeder::class);
        $this->call(VehiculeTableSeeder::class);
        $this->call(TransportTableSeeder::class);
        $this->call(ExpeditionTablesSeeder::class);
        $this->call(Notation_expeTablesSeeder::class);
        $this->call(Question_expeTablesSeeder::class);
        

    }
}
