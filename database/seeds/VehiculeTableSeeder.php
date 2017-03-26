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
                'id' => '1',
                'user_id' => '1',
                'vehicule_type_id' => '1',
                'marque' => 'Renault',
                'modele' => 'Megan',
                'longMax' => '120.00',
                'hautMax' => '50.00',
                'largMax' => '60.00',
                'poidMax' => '40.00',
                'volume' => '3.00',
                'isDefault' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => '2',
                'user_id' => '1',
                'vehicule_type_id' => '1',
                'marque' => 'Renault',
                'modele' => 'Clio',
                'longMax' => '130.00',
                'hautMax' => '60.00',
                'largMax' => '60.00',
                'poidMax' => '40.00',
                'volume' => '2.00',
                'isDefault' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => '3',
                'user_id' => '1',
                'vehicule_type_id' => '4',
                'marque' => 'Citroën',
                'modele' => 'Citroën 23',
                'longMax' => '100.00',
                'hautMax' => '40.00',
                'largMax' => '40.00',
                'poidMax' => '35.00',
                'volume' => '2.00',
                'isDefault' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => '4',
                'user_id' => '2',
                'vehicule_type_id' => '3',
                'marque' => 'airbus',
                'modele' => 'a320',
                'longMax' => '350.00',
                'hautMax' => '100.00',
                'largMax' => '100.00',
                'poidMax' => '100.00',
                'volume' => '20.00',
                'isDefault' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => '5',
                'user_id' => '3',
                'vehicule_type_id' => '4',
                'marque' => 'Renault',
                'modele' => 'Traffic',
                'longMax' => '60.00',
                'hautMax' => '45.00',
                'largMax' => '60.00',
                'poidMax' => '450.00',
                'volume' => '4.00',
                'isDefault' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => '6',
                'user_id' => '4',
                'vehicule_type_id' => '1',
                'marque' => 'BMW',
                'modele' => 'Série 3',
                'longMax' => '75.00',
                'hautMax' => '60.00',
                'largMax' => '80.00',
                'poidMax' => '50.00',
                'volume' => '2.00',
                'isDefault' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => '7',
                'user_id' => '5',
                'vehicule_type_id' => '1',
                'marque' => 'Audi',
                'modele' => 'TT',
                'longMax' => '100.00',
                'hautMax' => '60.00',
                'largMax' => '78.00',
                'poidMax' => '33.00',
                'volume' => '2.00',
                'isDefault' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => '8',
                'user_id' => '6',
                'vehicule_type_id' => '6',
                'marque' => 'Harley Davidson',
                'modele' => 'Imperial',
                'longMax' => '20.00',
                'hautMax' => '20.00',
                'largMax' => '20.00',
                'poidMax' => '50.00',
                'volume' => '1.00',
                'isDefault' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
    }
}