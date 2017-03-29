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
        ));
        
        
    }
}
