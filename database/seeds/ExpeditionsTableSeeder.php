<?php

use Illuminate\Database\Seeder;

class ExpeditionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('expeditions')->delete();
        
        \DB::table('expeditions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'costMax' => 150,
                'isAccepted' => 0,
                'costFixed' => 150,
                'description' => 'Une petite voiture pour ma grande tante !',
                'volumeItem' => 10,
                'lengthItem' => 10,
                'widthItem' => 10,
                'heightItem' => 10,
                'weightItem' => 120,
                'ending_ville_id' => 64,
                'beginning_ville_id' => 65,
                'deleted_at' => NULL,
                'created_at' => '2017-03-21 21:14:45',
                'updated_at' => '2017-03-22 22:48:37',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'costMax' => 25,
                'isAccepted' => 0,
                'costFixed' => 25,
                'description' => 'Il s\'agit d\'une épuisette faite à la main pour me petit cousin.',
                'volumeItem' => 0,
                'lengthItem' => 150,
                'widthItem' => 30,
                'heightItem' => 5,
                'weightItem' => 25,
                'ending_ville_id' => 66,
                'beginning_ville_id' => 67,
                'deleted_at' => NULL,
                'created_at' => '2017-03-21 21:16:10',
                'updated_at' => '2017-03-21 21:16:10',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 4,
                'costMax' => 120,
                'isAccepted' => 0,
                'costFixed' => 120,
                'description' => 'Pneus Michellin pour mon père. Il est propre, mais large',
                'volumeItem' => 0,
                'lengthItem' => 70,
                'widthItem' => 70,
                'heightItem' => 50,
                'weightItem' => 800,
                'ending_ville_id' => 68,
                'beginning_ville_id' => 69,
                'deleted_at' => NULL,
                'created_at' => '2017-03-21 21:17:43',
                'updated_at' => '2017-03-21 21:17:43',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 4,
                'costMax' => 5,
                'isAccepted' => 0,
                'costFixed' => 5,
                'description' => 'Enveloppe à remettre en main propre !',
                'volumeItem' => 0,
                'lengthItem' => 10,
                'widthItem' => 25,
                'heightItem' => 0,
                'weightItem' => 25,
                'ending_ville_id' => 70,
                'beginning_ville_id' => 71,
                'deleted_at' => NULL,
                'created_at' => '2017-03-21 21:21:22',
                'updated_at' => '2017-03-21 21:21:22',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 3,
                'costMax' => 15,
                'isAccepted' => 0,
                'costFixed' => 15,
                'description' => 'Manette de PS3 que je dois rendre à un collègue !',
                'volumeItem' => 10,
                'lengthItem' => 10,
                'widthItem' => 10,
                'heightItem' => 10,
                'weightItem' => 300,
                'ending_ville_id' => 72,
                'beginning_ville_id' => 73,
                'deleted_at' => NULL,
                'created_at' => '2017-03-22 22:29:59',
                'updated_at' => '2017-03-22 22:29:59',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 3,
                'costMax' => 20,
                'isAccepted' => 0,
                'costFixed' => 20,
                'description' => 'Convention de stage à remettre en urgence, j\'en ai vraiment besoin !',
                'volumeItem' => 1,
                'lengthItem' => 35,
                'widthItem' => 20,
                'heightItem' => 1,
                'weightItem' => 20,
                'ending_ville_id' => 74,
                'beginning_ville_id' => 75,
                'deleted_at' => NULL,
                'created_at' => '2017-03-22 22:30:46',
                'updated_at' => '2017-03-22 22:30:46',
            ),
        ));
        
        
    }
}
