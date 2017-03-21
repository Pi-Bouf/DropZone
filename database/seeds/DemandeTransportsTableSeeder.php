<?php

use Illuminate\Database\Seeder;

class DemandeTransportsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('demande_transports')->delete();
        
        \DB::table('demande_transports')->insert(array (
            0 => 
            array (
                'id' => 1,
                'transport_id' => 1,
                'user_id' => 3,
                'isAccepted' => 0,
                'text' => 'Bonjour Pierre, j\'aurais une valise à faire parvenir à ma femme sur Sisteron.

Merci !',
                'cost' => 5,
                'created_at' => '2017-03-16 23:12:28',
                'updated_at' => '2017-03-16 23:12:28',
            ),
            1 => 
            array (
                'id' => 2,
                'transport_id' => 2,
                'user_id' => 3,
                'isAccepted' => 0,
            'text' => 'Bonjour, pouvez-vous me ramener ma valise ? Elle part de Sisteron pour aller jusqu\'à Gap :)',
            'cost' => 15,
            'created_at' => '2017-03-16 23:17:47',
            'updated_at' => '2017-03-16 23:17:47',
        ),
        2 => 
        array (
            'id' => 3,
            'transport_id' => 3,
            'user_id' => 2,
            'isAccepted' => 0,
            'text' => 'Bonjour, mon trajet doit faire Gap - Corp, c\'est possible ? Il s\'agit d\'un piano à queue !',
            'cost' => 150,
            'created_at' => '2017-03-16 23:20:01',
            'updated_at' => '2017-03-16 23:20:01',
        ),
        3 => 
        array (
            'id' => 4,
            'transport_id' => 4,
            'user_id' => 1,
            'isAccepted' => 0,
            'text' => 'Je cherche à envoyer un anniversaire pour ma mère à Aubagne, c\'est possible ?',
            'cost' => 5,
            'created_at' => '2017-03-16 23:28:25',
            'updated_at' => '2017-03-16 23:28:25',
        ),
        4 => 
        array (
            'id' => 5,
            'transport_id' => 8,
            'user_id' => 1,
            'isAccepted' => 0,
            'text' => 'Bonjour Thomas, est-il possible de transport mon canapé ?',
            'cost' => 45,
            'created_at' => '2017-03-16 23:30:16',
            'updated_at' => '2017-03-16 23:30:16',
        ),
        5 => 
        array (
            'id' => 6,
            'transport_id' => 9,
            'user_id' => 1,
            'isAccepted' => NULL,
            'text' => 'Besoin de dépot au centre d\'Aix en provence !',
            'cost' => 2000,
            'created_at' => '2017-03-16 23:33:37',
            'updated_at' => '2017-03-16 23:33:37',
        ),
        6 => 
        array (
            'id' => 7,
            'transport_id' => 10,
            'user_id' => 1,
            'isAccepted' => NULL,
        'text' => 'Il me faudrait une petite place pour emener mon colis sur Bron en partant de Gap vers Botanic, merci :)',
        'cost' => 25,
        'created_at' => '2017-03-16 23:35:34',
        'updated_at' => '2017-03-16 23:35:34',
    ),
    7 => 
    array (
        'id' => 8,
        'transport_id' => 5,
        'user_id' => 1,
        'isAccepted' => NULL,
        'text' => 'Salut Rémi, pourrais-tu me transport un colis s\'il te plait ? Il s\'agit d\'un vase !',
        'cost' => 10,
        'created_at' => '2017-03-16 23:36:25',
        'updated_at' => '2017-03-16 23:36:25',
    ),
    8 => 
    array (
        'id' => 9,
        'transport_id' => 6,
        'user_id' => 1,
        'isAccepted' => NULL,
        'text' => 'Un transport de chien dans votre soute !',
        'cost' => 300,
        'created_at' => '2017-03-16 23:37:39',
        'updated_at' => '2017-03-16 23:37:39',
    ),
    9 => 
    array (
        'id' => 10,
        'transport_id' => 7,
        'user_id' => 1,
        'isAccepted' => NULL,
        'text' => 'Bonjour, voudriez-vous me transporter ?',
        'cost' => 50,
        'created_at' => '2017-03-16 23:38:24',
        'updated_at' => '2017-03-16 23:38:24',
    ),
    10 => 
    array (
        'id' => 11,
        'transport_id' => 11,
        'user_id' => 1,
        'isAccepted' => NULL,
        'text' => 'Bonjour, je souhaiterais Envoyer un colis de Sisteron jusqu\'à Aix, c\'est possible ? Merci, bonne soirée !',
        'cost' => 25,
        'created_at' => '2017-03-16 23:43:05',
        'updated_at' => '2017-03-16 23:43:05',
    ),
    11 => 
    array (
        'id' => 12,
        'transport_id' => 12,
        'user_id' => 1,
        'isAccepted' => NULL,
        'text' => 'Je désire plus que tout un transport d\'une paire de chaussette !',
        'cost' => 5,
        'created_at' => '2017-03-16 23:43:59',
        'updated_at' => '2017-03-16 23:43:59',
    ),
    12 => 
    array (
        'id' => 13,
        'transport_id' => 1,
        'user_id' => 4,
        'isAccepted' => NULL,
        'text' => 'Il s\'agit d\'un ballon de chaudière !',
        'cost' => 25,
        'created_at' => '2017-03-16 23:45:24',
        'updated_at' => '2017-03-16 23:45:24',
    ),
    13 => 
    array (
        'id' => 14,
        'transport_id' => 2,
        'user_id' => 4,
        'isAccepted' => NULL,
        'text' => 'Je veux faire transporter un dentier !',
        'cost' => 45,
        'created_at' => '2017-03-16 23:47:20',
        'updated_at' => '2017-03-16 23:47:20',
    ),
));
        
        
    }
}
