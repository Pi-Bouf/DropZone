<?php

use Illuminate\Database\Seeder;

class VehiculeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('vehicules')->delete();
        
        \DB::table('vehicules')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'vehicule_type_id' => 1,
                'marque' => 'Renault',
                'modele' => 'Megan',
                'longMax' => 120,
                'hautMax' => 50,
                'largMax' => 60,
                'poidMax' => 40,
                'volume' => 0.35999999999999999,
                'isDefault' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'vehicule_type_id' => 1,
                'marque' => 'Renault',
                'modele' => 'Clio',
                'longMax' => 130,
                'hautMax' => 60,
                'largMax' => 60,
                'poidMax' => 40,
                'volume' => 0.46999999999999997,
                'isDefault' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'vehicule_type_id' => 4,
                'marque' => 'Citroën',
                'modele' => 'Citroën 23',
                'longMax' => 100,
                'hautMax' => 40,
                'largMax' => 40,
                'poidMax' => 35,
                'volume' => 0.16,
                'isDefault' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 2,
                'vehicule_type_id' => 3,
                'marque' => 'airbus',
                'modele' => 'a320',
                'longMax' => 350,
                'hautMax' => 100,
                'largMax' => 100,
                'poidMax' => 100,
                'volume' => 3.5,
                'isDefault' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 3,
                'vehicule_type_id' => 4,
                'marque' => 'Renault',
                'modele' => 'Traffic',
                'longMax' => 60,
                'hautMax' => 45,
                'largMax' => 60,
                'poidMax' => 450,
                'volume' => 0.16,
                'isDefault' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 4,
                'vehicule_type_id' => 1,
                'marque' => 'BMW',
                'modele' => 'Série 3',
                'longMax' => 75,
                'hautMax' => 60,
                'largMax' => 80,
                'poidMax' => 50,
                'volume' => 0.35999999999999999,
                'isDefault' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 5,
                'vehicule_type_id' => 1,
                'marque' => 'Audi',
                'modele' => 'TT',
                'longMax' => 100,
                'hautMax' => 60,
                'largMax' => 78,
                'poidMax' => 33,
                'volume' => 0.46999999999999997,
                'isDefault' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 6,
                'vehicule_type_id' => 6,
                'marque' => 'Harley Davidson',
                'modele' => 'Imperial',
                'longMax' => 20,
                'hautMax' => 20,
                'largMax' => 20,
                'poidMax' => 50,
                'volume' => 0.01,
                'isDefault' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
    }
}