<?php

use Illuminate\Database\Seeder;

class QuestionTransportsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('question_transports')->delete();
        
        \DB::table('question_transports')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 3,
                'transport_id' => 1,
            'text' => 'Bonjour, passez-vous par le centre de Sisteron pour votre trajet ? :)

Bonne soirée !',
            'created_at' => '2017-03-16 23:13:00',
            'updated_at' => '2017-03-16 23:13:00',
        ),
        1 => 
        array (
            'id' => 2,
            'user_id' => 3,
            'transport_id' => 1,
            'text' => 'Ou alors passez vous pres du Restaurant "La Bonne Moule" ?',
            'created_at' => '2017-03-16 23:14:45',
            'updated_at' => '2017-03-16 23:14:45',
        ),
        2 => 
        array (
            'id' => 3,
            'user_id' => 3,
            'transport_id' => 2,
            'text' => 'Bonjour, ce trajet est-il maintenu ?',
            'created_at' => '2017-03-16 23:18:02',
            'updated_at' => '2017-03-16 23:18:02',
        ),
        3 => 
        array (
            'id' => 4,
            'user_id' => 2,
            'transport_id' => 3,
            'text' => 'Bonjour, est-ce qu\'il s\'agit d\'un aller-retour ou juste d\'un aller ?

Avez-vous beaucoup de place ?

Bonne soirée !',
            'created_at' => '2017-03-16 23:21:02',
            'updated_at' => '2017-03-16 23:21:02',
        ),
        4 => 
        array (
            'id' => 5,
            'user_id' => 1,
            'transport_id' => 4,
            'text' => 'Bonjour, ce trajet est occasionnel, c\'est vrai, mais est-il maintenu ?',
            'created_at' => '2017-03-16 23:29:00',
            'updated_at' => '2017-03-16 23:29:00',
        ),
        5 => 
        array (
            'id' => 6,
            'user_id' => 1,
            'transport_id' => 8,
            'text' => 'Quel est la date exacte de la destination ?',
            'created_at' => '2017-03-16 23:30:30',
            'updated_at' => '2017-03-16 23:30:30',
        ),
        6 => 
        array (
            'id' => 7,
            'user_id' => 1,
            'transport_id' => 9,
            'text' => 'Passez vous par le centre d\'Aix en provence ou vous contournez juste ?',
            'created_at' => '2017-03-16 23:33:14',
            'updated_at' => '2017-03-16 23:33:14',
        ),
        7 => 
        array (
            'id' => 8,
            'user_id' => 1,
            'transport_id' => 9,
            'text' => 'Ou par la rotonde ?',
            'created_at' => '2017-03-16 23:34:32',
            'updated_at' => '2017-03-16 23:34:32',
        ),
        8 => 
        array (
            'id' => 9,
            'user_id' => 1,
            'transport_id' => 10,
            'text' => 'Passez-vous vers Botanic pour le départ ?',
            'created_at' => '2017-03-16 23:35:49',
            'updated_at' => '2017-03-16 23:35:49',
        ),
        9 => 
        array (
            'id' => 10,
            'user_id' => 1,
            'transport_id' => 5,
            'text' => 'Bonjour, je souhaiterais un transport de colis, merci d\'accepter ma demande.',
            'created_at' => '2017-03-16 23:36:43',
            'updated_at' => '2017-03-16 23:36:43',
        ),
        10 => 
        array (
            'id' => 11,
            'user_id' => 1,
            'transport_id' => 6,
            'text' => 'Bonjour ! Votre avion est-il écolo ? Je ne crois pas...',
            'created_at' => '2017-03-16 23:37:55',
            'updated_at' => '2017-03-16 23:37:55',
        ),
        11 => 
        array (
            'id' => 12,
            'user_id' => 1,
            'transport_id' => 7,
            'text' => 'Bonjour, faites-vous du transport d\'être humain ?',
            'created_at' => '2017-03-16 23:38:44',
            'updated_at' => '2017-03-16 23:38:44',
        ),
        12 => 
        array (
            'id' => 13,
            'user_id' => 1,
            'transport_id' => 11,
            'text' => 'Bonjour, un vase est-il trop fragile pour votre trajet ?',
            'created_at' => '2017-03-16 23:43:27',
            'updated_at' => '2017-03-16 23:43:27',
        ),
        13 => 
        array (
            'id' => 14,
            'user_id' => 4,
            'transport_id' => 1,
            'text' => 'Bonjour, est-ce qu\'il reste un peu de place ?',
            'created_at' => '2017-03-16 23:45:07',
            'updated_at' => '2017-03-16 23:45:07',
        ),
        14 => 
        array (
            'id' => 15,
            'user_id' => 4,
            'transport_id' => 2,
            'text' => 'Je ne pense pas, le transporteur ne répond pas à ma demande...',
            'created_at' => '2017-03-16 23:47:06',
            'updated_at' => '2017-03-16 23:47:06',
        ),
    ));
        
        
    }
}
