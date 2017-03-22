<?php

use Illuminate\Database\Seeder;

class DemandeExpeditionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('demande_expeditions')->delete();
        
        \DB::table('demande_expeditions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'expedition_id' => 3,
                'prixAsked' => 40,
                'propositionText' => 'Je vais sur Grenoble demain, ça vous tente ? Je part vers 14h !

Au plaisir !',
                'beginDate' => '2017-03-23 00:00:00',
                'endDate' => '2017-03-23 00:00:00',
                'isAccepted' => NULL,
                'created_at' => '2017-03-22 22:18:34',
                'updated_at' => '2017-03-22 22:34:41',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'expedition_id' => 4,
                'prixAsked' => 10,
            'propositionText' => 'Je peux remettre cette enveloppe pour vous l\'ami ! :)

Par contre, ce sera 5€ de plus et pas avant la semaine prochaine.',
            'beginDate' => '2017-03-26 00:00:00',
            'endDate' => '2017-03-31 00:00:00',
            'isAccepted' => NULL,
            'created_at' => '2017-03-22 22:21:22',
            'updated_at' => '2017-03-22 22:39:25',
            'deleted_at' => NULL,
        ),
        2 => 
        array (
            'id' => 3,
            'user_id' => 1,
            'expedition_id' => 1,
            'prixAsked' => 15,
            'propositionText' => 'Bonjour, je veux bien lui emmener pour 15€, ça vous va ?',
            'beginDate' => '2017-03-24 00:00:00',
            'endDate' => '2017-03-26 00:00:00',
            'isAccepted' => NULL,
            'created_at' => '2017-03-22 22:23:34',
            'updated_at' => '2017-03-22 22:48:37',
            'deleted_at' => NULL,
        ),
        3 => 
        array (
            'id' => 4,
            'user_id' => 1,
            'expedition_id' => 4,
            'prixAsked' => 1,
            'propositionText' => 'Bonjour, auriez-vous besoin d\'un postier ?

Je part en vacance dans le coin, si ça peut dépanner... :)',
        'beginDate' => '2017-03-29 00:00:00',
        'endDate' => '2017-03-31 00:00:00',
        'isAccepted' => NULL,
        'created_at' => '2017-03-22 22:25:22',
        'updated_at' => '2017-03-22 22:39:25',
        'deleted_at' => NULL,
    ),
    4 => 
    array (
        'id' => 5,
        'user_id' => 3,
        'expedition_id' => 2,
        'prixAsked' => 10,
        'propositionText' => 'J\'adorerais transport cette épuisette, je pourrais la regarder pendant tout le trajet du coup, trop bien !',
        'beginDate' => '2017-03-23 00:00:00',
        'endDate' => '2017-03-24 00:00:00',
        'isAccepted' => NULL,
        'created_at' => '2017-03-22 22:31:52',
        'updated_at' => '2017-03-22 22:31:52',
        'deleted_at' => NULL,
    ),
    5 => 
    array (
        'id' => 6,
        'user_id' => 3,
        'expedition_id' => 4,
        'prixAsked' => 25,
        'propositionText' => 'Je peux la remettre aujourd\'hui même, merci de répondre rapidement !',
        'beginDate' => '2017-03-22 00:00:00',
        'endDate' => '2017-03-23 00:00:00',
        'isAccepted' => NULL,
        'created_at' => '2017-03-22 22:33:51',
        'updated_at' => '2017-03-22 22:39:25',
        'deleted_at' => NULL,
    ),
));
        
        
    }
}
