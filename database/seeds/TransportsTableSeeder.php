<?php

use Illuminate\Database\Seeder;

class TransportsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transports')->delete();
        
        \DB::table('transports')->insert(array (
            0 => 
            array (
                'id' => 1,
                'vehicule_id' => 2,
                'user_id' => 1,
                'detourRetirMax' => 10,
                'detourDepotMax' => 10,
                'withHighway' => 1,
                'natureTransport' => 1,
                'beginningDate' => NULL,
                'frequency' => 'Une fois par semaine',
                'regularyBeginningDate' => '2017-03-01 00:00:00',
                'regularyEndingDate' => '2017-04-30 00:00:00',
                'beginningHour' => NULL,
            'information' => 'Pendant deux mois je dois aller à Marseille pour mon travail, donc si vous avez besoin, n\'hésitez surtout pas :)',
            'longMax' => 125,
            'hautMax' => 50,
            'largMax' => 100,
            'poidMax' => 0,
            'volume' => NULL,
            'created_at' => '2017-03-16 22:28:47',
            'updated_at' => '2017-03-16 22:28:47',
            'deleted_at' => NULL,
        ),
        1 => 
        array (
            'id' => 2,
            'vehicule_id' => 1,
            'user_id' => 1,
            'detourRetirMax' => 10,
            'detourDepotMax' => 10,
            'withHighway' => 1,
            'natureTransport' => 1,
            'beginningDate' => NULL,
            'frequency' => 'Une fois par semaine',
            'regularyBeginningDate' => '2017-03-01 00:00:00',
            'regularyEndingDate' => '2017-04-30 00:00:00',
            'beginningHour' => NULL,
            'information' => 'Pendant deux mois je m\'en vais travailler sur Marseille, mais j\'habite sur Gap, donc n\'hésitez pas !',
            'longMax' => 120,
            'hautMax' => 50,
            'largMax' => 100,
            'poidMax' => 0,
            'volume' => NULL,
            'created_at' => '2017-03-16 22:30:09',
            'updated_at' => '2017-03-16 22:30:09',
            'deleted_at' => NULL,
        ),
        2 => 
        array (
            'id' => 3,
            'vehicule_id' => 2,
            'user_id' => 1,
            'detourRetirMax' => 10,
            'detourDepotMax' => 10,
            'withHighway' => 1,
            'natureTransport' => 0,
            'beginningDate' => '2017-04-05 00:00:00',
            'frequency' => NULL,
            'regularyBeginningDate' => NULL,
            'regularyEndingDate' => NULL,
            'beginningHour' => '12:00:00',
            'information' => 'Je dois aider un ami à déménager, j\'ai un peu de place pour un petit colis.',
            'longMax' => 0,
            'hautMax' => 0,
            'largMax' => 0,
            'poidMax' => 0,
            'volume' => NULL,
            'created_at' => '2017-03-16 22:31:57',
            'updated_at' => '2017-03-16 22:31:57',
            'deleted_at' => NULL,
        ),
        3 => 
        array (
            'id' => 4,
            'vehicule_id' => 3,
            'user_id' => 1,
            'detourRetirMax' => 10,
            'detourDepotMax' => 10,
            'withHighway' => 1,
            'natureTransport' => 0,
            'beginningDate' => '2017-04-12 00:00:00',
            'frequency' => NULL,
            'regularyBeginningDate' => NULL,
            'regularyEndingDate' => NULL,
            'beginningHour' => '18:00:00',
            'information' => 'Je vais voir ma grand mère sur Aubagne.',
            'longMax' => 0,
            'hautMax' => 0,
            'largMax' => 0,
            'poidMax' => 0,
            'volume' => NULL,
            'created_at' => '2017-03-16 22:33:07',
            'updated_at' => '2017-03-16 22:33:07',
            'deleted_at' => NULL,
        ),
        4 => 
        array (
            'id' => 5,
            'vehicule_id' => 4,
            'user_id' => 2,
            'detourRetirMax' => 5,
            'detourDepotMax' => 5,
            'withHighway' => 1,
            'natureTransport' => 0,
            'beginningDate' => '2017-04-12 00:00:00',
            'frequency' => NULL,
            'regularyBeginningDate' => NULL,
            'regularyEndingDate' => NULL,
            'beginningHour' => '14:00:00',
            'information' => 'Je m\'en vais à Manosque chercher un piano, place dans le fourgon !',
            'longMax' => 0,
            'hautMax' => 0,
            'largMax' => 0,
            'poidMax' => 0,
            'volume' => NULL,
            'created_at' => '2017-03-16 22:42:32',
            'updated_at' => '2017-03-16 22:42:32',
            'deleted_at' => NULL,
        ),
        5 => 
        array (
            'id' => 6,
            'vehicule_id' => 4,
            'user_id' => 2,
            'detourRetirMax' => 15,
            'detourDepotMax' => 15,
            'withHighway' => 0,
            'natureTransport' => 1,
            'beginningDate' => NULL,
            'frequency' => 'Plusieurs fois par jour',
            'regularyBeginningDate' => '2017-03-01 00:00:00',
            'regularyEndingDate' => '2017-04-30 00:00:00',
            'beginningHour' => NULL,
            'information' => 'Avec mon airbus, je vais travailler à La mure ! Y\'a pas mal de place ici...',
            'longMax' => 0,
            'hautMax' => 0,
            'largMax' => 0,
            'poidMax' => 0,
            'volume' => NULL,
            'created_at' => '2017-03-16 22:46:09',
            'updated_at' => '2017-03-16 22:46:09',
            'deleted_at' => NULL,
        ),
        6 => 
        array (
            'id' => 7,
            'vehicule_id' => 4,
            'user_id' => 2,
            'detourRetirMax' => 10,
            'detourDepotMax' => 10,
            'withHighway' => 1,
            'natureTransport' => 1,
            'beginningDate' => NULL,
            'frequency' => 'Plusieurs fois par mois',
            'regularyBeginningDate' => '2017-03-01 00:00:00',
            'regularyEndingDate' => '2017-04-30 00:00:00',
            'beginningHour' => NULL,
            'information' => '',
            'longMax' => 0,
            'hautMax' => 0,
            'largMax' => 0,
            'poidMax' => 0,
            'volume' => NULL,
            'created_at' => '2017-03-16 22:54:26',
            'updated_at' => '2017-03-16 22:54:26',
            'deleted_at' => NULL,
        ),
        7 => 
        array (
            'id' => 8,
            'vehicule_id' => 5,
            'user_id' => 3,
            'detourRetirMax' => 20,
            'detourDepotMax' => 20,
            'withHighway' => 1,
            'natureTransport' => 1,
            'beginningDate' => NULL,
            'frequency' => 'Plusieurs fois par mois',
            'regularyBeginningDate' => '2017-03-01 00:00:00',
            'regularyEndingDate' => '2017-04-30 00:00:00',
            'beginningHour' => NULL,
            'information' => 'Bonjour, je déplace mon fourgon jusqu\'à Toulon, je prends l\'autoroute par Sisteron, Manosque, Aix et Marseille.',
            'longMax' => 200,
            'hautMax' => 190,
            'largMax' => 150,
            'poidMax' => 45,
            'volume' => NULL,
            'created_at' => '2017-03-16 23:00:01',
            'updated_at' => '2017-03-16 23:00:01',
            'deleted_at' => NULL,
        ),
        8 => 
        array (
            'id' => 9,
            'vehicule_id' => 5,
            'user_id' => 3,
            'detourRetirMax' => 25,
            'detourDepotMax' => 25,
            'withHighway' => 1,
            'natureTransport' => 0,
            'beginningDate' => '2017-04-12 00:00:00',
            'frequency' => NULL,
            'regularyBeginningDate' => NULL,
            'regularyEndingDate' => NULL,
            'beginningHour' => '14:00:00',
        'information' => 'Je me dirige sur Marseille pour voir ma famille et ma tante, au plaisir :)',
        'longMax' => 0,
        'hautMax' => 0,
        'largMax' => 0,
        'poidMax' => 0,
        'volume' => NULL,
        'created_at' => '2017-03-16 23:01:59',
        'updated_at' => '2017-03-16 23:01:59',
        'deleted_at' => NULL,
    ),
    9 => 
    array (
        'id' => 10,
        'vehicule_id' => 5,
        'user_id' => 3,
        'detourRetirMax' => 1,
        'detourDepotMax' => 1,
        'withHighway' => 1,
        'natureTransport' => 1,
        'beginningDate' => NULL,
        'frequency' => 'Plusieurs fois par jour',
        'regularyBeginningDate' => '2017-03-01 00:00:00',
        'regularyEndingDate' => '2017-04-30 00:00:00',
        'beginningHour' => NULL,
        'information' => 'Trajet régulier sur Lyon en partant de Gap, place disponible !',
        'longMax' => 250,
        'hautMax' => 190,
        'largMax' => 120,
        'poidMax' => 100,
        'volume' => NULL,
        'created_at' => '2017-03-16 23:04:54',
        'updated_at' => '2017-03-16 23:04:54',
        'deleted_at' => NULL,
    ),
    10 => 
    array (
        'id' => 11,
        'vehicule_id' => 6,
        'user_id' => 4,
        'detourRetirMax' => 25,
        'detourDepotMax' => 25,
        'withHighway' => 1,
        'natureTransport' => 1,
        'beginningDate' => NULL,
        'frequency' => 'Plusieurs fois par jour',
        'regularyBeginningDate' => '2017-03-01 00:00:00',
        'regularyEndingDate' => '2017-04-30 00:00:00',
        'beginningHour' => NULL,
        'information' => 'Salut, j\'ai de la place dans ma grosse BM ! :D',
        'longMax' => 0,
        'hautMax' => 0,
        'largMax' => 0,
        'poidMax' => 0,
        'volume' => NULL,
        'created_at' => '2017-03-16 23:41:05',
        'updated_at' => '2017-03-16 23:41:05',
        'deleted_at' => NULL,
    ),
    11 => 
    array (
        'id' => 12,
        'vehicule_id' => 6,
        'user_id' => 4,
        'detourRetirMax' => 15,
        'detourDepotMax' => 15,
        'withHighway' => 1,
        'natureTransport' => 0,
        'beginningDate' => '2017-04-05 00:00:00',
        'frequency' => NULL,
        'regularyBeginningDate' => NULL,
        'regularyEndingDate' => NULL,
        'beginningHour' => '10:00:00',
        'information' => 'Bonjour, je vais à Gap bientôt ! Un intéréssé ?',
        'longMax' => 0,
        'hautMax' => 0,
        'largMax' => 0,
        'poidMax' => 0,
        'volume' => NULL,
        'created_at' => '2017-03-16 23:42:15',
        'updated_at' => '2017-03-16 23:42:15',
        'deleted_at' => NULL,
    ),
));
        
        
    }
}
