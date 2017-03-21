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

        $this->call(UsersTableSeeder::class);
        $this->call(VehiculeTypeSeeder::class);
        $this->call(VehiculeTableSeeder::class);

        $this->call('TransportsTableSeeder');
        $this->call('VillesTableSeeder');
        $this->call('EtapesTableSeeder');
        $this->call('QuestionTransportsTableSeeder');
        $this->call('DemandeTransportsTableSeeder');
        $this->call('ExpeditionsTableSeeder');
    }

        /*
        $this->call(VehiculeTypeSeeder::class);
        $this->call(VehiculeTableSeeder::class);
        $this->call(VilleTableSeeder::class);
        $this->call(TransportTableSeeder::class);
        $this->call(ExpeditionTablesSeeder::class);
        $this->call(Notation_expeTablesSeeder::class);
        $this->call(Question_expeTablesSeeder::class);
        $this->call(Demande_expeTablesSeeder::class);
        $this->call(EtapesTablesSeeder::class);
        */
}
