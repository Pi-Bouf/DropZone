<?php

use Illuminate\Database\Seeder;

class NotationTransportsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('notation_transports')->delete();
        
        \DB::table('notation_transports')->insert(array (
            0 => 
            array (
                'id' => 1,
                'demande_transport_id' => 11,
                'text' => 'Il a transporté mon colis comme je lui avais demandé. A l\'heure, très gentil, je vous le recommande vivement !',
                'note' => 5,
                'UserOrTransporter' => 0,
                'user_id' => 4,
                'created_at' => '2017-03-29 11:09:47',
                'updated_at' => '2017-03-29 11:09:47',
            ),
            1 => 
            array (
                'id' => 2,
                'demande_transport_id' => 11,
            'text' => 'Un peu en retard (10 minutes) au point de rendez-vous, sinon correct !',
                'note' => 4,
                'UserOrTransporter' => 1,
                'user_id' => 1,
                'created_at' => '2017-03-29 11:10:53',
                'updated_at' => '2017-03-29 11:10:53',
            ),
            2 => 
            array (
                'id' => 3,
                'demande_transport_id' => 5,
                'text' => 'Cool',
                'note' => 5,
                'UserOrTransporter' => 0,
                'user_id' => 3,
                'created_at' => '2017-03-29 13:14:21',
                'updated_at' => '2017-03-29 13:14:21',
            ),
            3 => 
            array (
                'id' => 4,
                'demande_transport_id' => 5,
                'text' => 'Cool',
                'note' => 1,
                'UserOrTransporter' => 1,
                'user_id' => 3,
                'created_at' => '2017-03-29 13:14:38',
                'updated_at' => '2017-03-29 13:14:38',
            ),
            4 => 
            array (
                'id' => 5,
                'demande_transport_id' => 5,
                'text' => 'Cool',
                'note' => 4,
                'UserOrTransporter' => 0,
                'user_id' => 3,
                'created_at' => '2017-03-29 13:14:21',
                'updated_at' => '2017-03-29 13:14:21',
            ),
            5 => 
            array (
                'id' => 6,
                'demande_transport_id' => 5,
                'text' => 'Cool',
                'note' => 2,
                'UserOrTransporter' => 1,
                'user_id' => 3,
                'created_at' => '2017-03-29 13:14:38',
                'updated_at' => '2017-03-29 13:14:38',
            ),
            6 => 
            array (
                'id' => 7,
                'demande_transport_id' => 5,
                'text' => 'Cool',
                'note' => 2,
                'UserOrTransporter' => 0,
                'user_id' => 3,
                'created_at' => '2017-03-29 13:14:21',
                'updated_at' => '2017-03-29 13:14:21',
            ),
            7 => 
            array (
                'id' => 8,
                'demande_transport_id' => 5,
                'text' => 'Cool',
                'note' => 4,
                'UserOrTransporter' => 1,
                'user_id' => 3,
                'created_at' => '2017-03-29 13:14:38',
                'updated_at' => '2017-03-29 13:14:38',
            ),
            8 => 
            array (
                'id' => 9,
                'demande_transport_id' => 5,
                'text' => 'Cool',
                'note' => 5,
                'UserOrTransporter' => 0,
                'user_id' => 3,
                'created_at' => '2017-03-29 13:14:21',
                'updated_at' => '2017-03-29 13:14:21',
            ),
            9 => 
            array (
                'id' => 10,
                'demande_transport_id' => 5,
                'text' => 'Cool',
                'note' => 4,
                'UserOrTransporter' => 1,
                'user_id' => 3,
                'created_at' => '2017-03-29 13:14:38',
                'updated_at' => '2017-03-29 13:14:38',
            ),
            10 => 
            array (
                'id' => 11,
                'demande_transport_id' => 5,
                'text' => 'Cool',
                'note' => 3,
                'UserOrTransporter' => 0,
                'user_id' => 3,
                'created_at' => '2017-03-29 13:14:21',
                'updated_at' => '2017-03-29 13:14:21',
            ),
            11 => 
            array (
                'id' => 12,
                'demande_transport_id' => 5,
                'text' => 'Cool',
                'note' => 3,
                'UserOrTransporter' => 1,
                'user_id' => 3,
                'created_at' => '2017-03-29 13:14:38',
                'updated_at' => '2017-03-29 13:14:38',
            ),
            12 => 
            array (
                'id' => 13,
                'demande_transport_id' => 5,
                'text' => 'Cool',
                'note' => 3,
                'UserOrTransporter' => 0,
                'user_id' => 3,
                'created_at' => '2017-03-29 13:14:21',
                'updated_at' => '2017-03-29 13:14:21',
            ),
            13 => 
            array (
                'id' => 14,
                'demande_transport_id' => 5,
                'text' => 'Cool',
                'note' => 2,
                'UserOrTransporter' => 1,
                'user_id' => 3,
                'created_at' => '2017-03-29 13:14:38',
                'updated_at' => '2017-03-29 13:14:38',
            ),
            14 => 
            array (
                'id' => 15,
                'demande_transport_id' => 5,
                'text' => 'Cool',
                'note' => 2,
                'UserOrTransporter' => 0,
                'user_id' => 3,
                'created_at' => '2017-03-29 13:14:21',
                'updated_at' => '2017-03-29 13:14:21',
            ),
            15 => 
            array (
                'id' => 16,
                'demande_transport_id' => 5,
                'text' => 'Cool',
                'note' => 4,
                'UserOrTransporter' => 1,
                'user_id' => 3,
                'created_at' => '2017-03-29 13:14:38',
                'updated_at' => '2017-03-29 13:14:38',
            ),
            16 => 
            array (
                'id' => 17,
                'demande_transport_id' => 5,
                'text' => 'Cool',
                'note' => 5,
                'UserOrTransporter' => 0,
                'user_id' => 3,
                'created_at' => '2017-03-29 13:14:21',
                'updated_at' => '2017-03-29 13:14:21',
            ),
            17 => 
            array (
                'id' => 18,
                'demande_transport_id' => 5,
                'text' => 'Cool',
                'note' => 4,
                'UserOrTransporter' => 1,
                'user_id' => 3,
                'created_at' => '2017-03-29 13:14:38',
                'updated_at' => '2017-03-29 13:14:38',
            ),
        ));
        
        
    }
}
