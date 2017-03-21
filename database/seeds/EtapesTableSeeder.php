<?php

use Illuminate\Database\Seeder;

class EtapesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('etapes')->delete();
        
        \DB::table('etapes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'transport_id' => 1,
                'ville_id' => 1,
                'ville_position' => 2,
                'created_at' => '2017-03-16 22:28:47',
                'updated_at' => '2017-03-16 22:28:47',
            ),
            1 => 
            array (
                'id' => 2,
                'transport_id' => 1,
                'ville_id' => 2,
                'ville_position' => 3,
                'created_at' => '2017-03-16 22:28:47',
                'updated_at' => '2017-03-16 22:28:47',
            ),
            2 => 
            array (
                'id' => 3,
                'transport_id' => 1,
                'ville_id' => 3,
                'ville_position' => 4,
                'created_at' => '2017-03-16 22:28:47',
                'updated_at' => '2017-03-16 22:28:47',
            ),
            3 => 
            array (
                'id' => 4,
                'transport_id' => 1,
                'ville_id' => 4,
                'ville_position' => 5,
                'created_at' => '2017-03-16 22:28:47',
                'updated_at' => '2017-03-16 22:28:47',
            ),
            4 => 
            array (
                'id' => 5,
                'transport_id' => 1,
                'ville_id' => 5,
                'ville_position' => 1,
                'created_at' => '2017-03-16 22:28:47',
                'updated_at' => '2017-03-16 22:28:47',
            ),
            5 => 
            array (
                'id' => 6,
                'transport_id' => 1,
                'ville_id' => 6,
                'ville_position' => 7,
                'created_at' => '2017-03-16 22:28:47',
                'updated_at' => '2017-03-16 22:28:47',
            ),
            6 => 
            array (
                'id' => 7,
                'transport_id' => 2,
                'ville_id' => 7,
                'ville_position' => 2,
                'created_at' => '2017-03-16 22:30:09',
                'updated_at' => '2017-03-16 22:30:09',
            ),
            7 => 
            array (
                'id' => 8,
                'transport_id' => 2,
                'ville_id' => 8,
                'ville_position' => 3,
                'created_at' => '2017-03-16 22:30:09',
                'updated_at' => '2017-03-16 22:30:09',
            ),
            8 => 
            array (
                'id' => 9,
                'transport_id' => 2,
                'ville_id' => 9,
                'ville_position' => 4,
                'created_at' => '2017-03-16 22:30:09',
                'updated_at' => '2017-03-16 22:30:09',
            ),
            9 => 
            array (
                'id' => 10,
                'transport_id' => 2,
                'ville_id' => 10,
                'ville_position' => 5,
                'created_at' => '2017-03-16 22:30:09',
                'updated_at' => '2017-03-16 22:30:09',
            ),
            10 => 
            array (
                'id' => 11,
                'transport_id' => 2,
                'ville_id' => 11,
                'ville_position' => 1,
                'created_at' => '2017-03-16 22:30:10',
                'updated_at' => '2017-03-16 22:30:10',
            ),
            11 => 
            array (
                'id' => 12,
                'transport_id' => 2,
                'ville_id' => 12,
                'ville_position' => 7,
                'created_at' => '2017-03-16 22:30:10',
                'updated_at' => '2017-03-16 22:30:10',
            ),
            12 => 
            array (
                'id' => 13,
                'transport_id' => 3,
                'ville_id' => 13,
                'ville_position' => 2,
                'created_at' => '2017-03-16 22:31:57',
                'updated_at' => '2017-03-16 22:31:57',
            ),
            13 => 
            array (
                'id' => 14,
                'transport_id' => 3,
                'ville_id' => 14,
                'ville_position' => 3,
                'created_at' => '2017-03-16 22:31:57',
                'updated_at' => '2017-03-16 22:31:57',
            ),
            14 => 
            array (
                'id' => 15,
                'transport_id' => 3,
                'ville_id' => 15,
                'ville_position' => 1,
                'created_at' => '2017-03-16 22:31:57',
                'updated_at' => '2017-03-16 22:31:57',
            ),
            15 => 
            array (
                'id' => 16,
                'transport_id' => 3,
                'ville_id' => 16,
                'ville_position' => 7,
                'created_at' => '2017-03-16 22:31:57',
                'updated_at' => '2017-03-16 22:31:57',
            ),
            16 => 
            array (
                'id' => 17,
                'transport_id' => 4,
                'ville_id' => 17,
                'ville_position' => 2,
                'created_at' => '2017-03-16 22:33:07',
                'updated_at' => '2017-03-16 22:33:07',
            ),
            17 => 
            array (
                'id' => 18,
                'transport_id' => 4,
                'ville_id' => 18,
                'ville_position' => 3,
                'created_at' => '2017-03-16 22:33:08',
                'updated_at' => '2017-03-16 22:33:08',
            ),
            18 => 
            array (
                'id' => 19,
                'transport_id' => 4,
                'ville_id' => 19,
                'ville_position' => 1,
                'created_at' => '2017-03-16 22:33:08',
                'updated_at' => '2017-03-16 22:33:08',
            ),
            19 => 
            array (
                'id' => 20,
                'transport_id' => 4,
                'ville_id' => 20,
                'ville_position' => 7,
                'created_at' => '2017-03-16 22:33:08',
                'updated_at' => '2017-03-16 22:33:08',
            ),
            20 => 
            array (
                'id' => 21,
                'transport_id' => 5,
                'ville_id' => 21,
                'ville_position' => 2,
                'created_at' => '2017-03-16 22:42:32',
                'updated_at' => '2017-03-16 22:42:32',
            ),
            21 => 
            array (
                'id' => 22,
                'transport_id' => 5,
                'ville_id' => 22,
                'ville_position' => 3,
                'created_at' => '2017-03-16 22:42:32',
                'updated_at' => '2017-03-16 22:42:32',
            ),
            22 => 
            array (
                'id' => 23,
                'transport_id' => 5,
                'ville_id' => 23,
                'ville_position' => 1,
                'created_at' => '2017-03-16 22:42:33',
                'updated_at' => '2017-03-16 22:42:33',
            ),
            23 => 
            array (
                'id' => 24,
                'transport_id' => 5,
                'ville_id' => 24,
                'ville_position' => 7,
                'created_at' => '2017-03-16 22:42:33',
                'updated_at' => '2017-03-16 22:42:33',
            ),
            24 => 
            array (
                'id' => 25,
                'transport_id' => 6,
                'ville_id' => 25,
                'ville_position' => 2,
                'created_at' => '2017-03-16 22:46:09',
                'updated_at' => '2017-03-16 22:46:09',
            ),
            25 => 
            array (
                'id' => 26,
                'transport_id' => 6,
                'ville_id' => 26,
                'ville_position' => 3,
                'created_at' => '2017-03-16 22:46:09',
                'updated_at' => '2017-03-16 22:46:09',
            ),
            26 => 
            array (
                'id' => 27,
                'transport_id' => 6,
                'ville_id' => 27,
                'ville_position' => 4,
                'created_at' => '2017-03-16 22:46:09',
                'updated_at' => '2017-03-16 22:46:09',
            ),
            27 => 
            array (
                'id' => 28,
                'transport_id' => 6,
                'ville_id' => 28,
                'ville_position' => 1,
                'created_at' => '2017-03-16 22:46:09',
                'updated_at' => '2017-03-16 22:46:09',
            ),
            28 => 
            array (
                'id' => 29,
                'transport_id' => 6,
                'ville_id' => 29,
                'ville_position' => 7,
                'created_at' => '2017-03-16 22:46:09',
                'updated_at' => '2017-03-16 22:46:09',
            ),
            29 => 
            array (
                'id' => 30,
                'transport_id' => 7,
                'ville_id' => 30,
                'ville_position' => 2,
                'created_at' => '2017-03-16 22:54:26',
                'updated_at' => '2017-03-16 22:54:26',
            ),
            30 => 
            array (
                'id' => 31,
                'transport_id' => 7,
                'ville_id' => 31,
                'ville_position' => 3,
                'created_at' => '2017-03-16 22:54:26',
                'updated_at' => '2017-03-16 22:54:26',
            ),
            31 => 
            array (
                'id' => 32,
                'transport_id' => 7,
                'ville_id' => 32,
                'ville_position' => 1,
                'created_at' => '2017-03-16 22:54:27',
                'updated_at' => '2017-03-16 22:54:27',
            ),
            32 => 
            array (
                'id' => 33,
                'transport_id' => 7,
                'ville_id' => 33,
                'ville_position' => 7,
                'created_at' => '2017-03-16 22:54:27',
                'updated_at' => '2017-03-16 22:54:27',
            ),
            33 => 
            array (
                'id' => 34,
                'transport_id' => 8,
                'ville_id' => 34,
                'ville_position' => 2,
                'created_at' => '2017-03-16 23:00:01',
                'updated_at' => '2017-03-16 23:00:01',
            ),
            34 => 
            array (
                'id' => 35,
                'transport_id' => 8,
                'ville_id' => 35,
                'ville_position' => 3,
                'created_at' => '2017-03-16 23:00:01',
                'updated_at' => '2017-03-16 23:00:01',
            ),
            35 => 
            array (
                'id' => 36,
                'transport_id' => 8,
                'ville_id' => 36,
                'ville_position' => 4,
                'created_at' => '2017-03-16 23:00:01',
                'updated_at' => '2017-03-16 23:00:01',
            ),
            36 => 
            array (
                'id' => 37,
                'transport_id' => 8,
                'ville_id' => 37,
                'ville_position' => 5,
                'created_at' => '2017-03-16 23:00:02',
                'updated_at' => '2017-03-16 23:00:02',
            ),
            37 => 
            array (
                'id' => 38,
                'transport_id' => 8,
                'ville_id' => 38,
                'ville_position' => 1,
                'created_at' => '2017-03-16 23:00:02',
                'updated_at' => '2017-03-16 23:00:02',
            ),
            38 => 
            array (
                'id' => 39,
                'transport_id' => 8,
                'ville_id' => 39,
                'ville_position' => 7,
                'created_at' => '2017-03-16 23:00:02',
                'updated_at' => '2017-03-16 23:00:02',
            ),
            39 => 
            array (
                'id' => 40,
                'transport_id' => 9,
                'ville_id' => 40,
                'ville_position' => 2,
                'created_at' => '2017-03-16 23:01:59',
                'updated_at' => '2017-03-16 23:01:59',
            ),
            40 => 
            array (
                'id' => 41,
                'transport_id' => 9,
                'ville_id' => 41,
                'ville_position' => 3,
                'created_at' => '2017-03-16 23:01:59',
                'updated_at' => '2017-03-16 23:01:59',
            ),
            41 => 
            array (
                'id' => 42,
                'transport_id' => 9,
                'ville_id' => 42,
                'ville_position' => 4,
                'created_at' => '2017-03-16 23:01:59',
                'updated_at' => '2017-03-16 23:01:59',
            ),
            42 => 
            array (
                'id' => 43,
                'transport_id' => 9,
                'ville_id' => 43,
                'ville_position' => 5,
                'created_at' => '2017-03-16 23:01:59',
                'updated_at' => '2017-03-16 23:01:59',
            ),
            43 => 
            array (
                'id' => 44,
                'transport_id' => 9,
                'ville_id' => 44,
                'ville_position' => 6,
                'created_at' => '2017-03-16 23:01:59',
                'updated_at' => '2017-03-16 23:01:59',
            ),
            44 => 
            array (
                'id' => 45,
                'transport_id' => 9,
                'ville_id' => 45,
                'ville_position' => 1,
                'created_at' => '2017-03-16 23:01:59',
                'updated_at' => '2017-03-16 23:01:59',
            ),
            45 => 
            array (
                'id' => 46,
                'transport_id' => 9,
                'ville_id' => 46,
                'ville_position' => 7,
                'created_at' => '2017-03-16 23:02:00',
                'updated_at' => '2017-03-16 23:02:00',
            ),
            46 => 
            array (
                'id' => 47,
                'transport_id' => 10,
                'ville_id' => 47,
                'ville_position' => 2,
                'created_at' => '2017-03-16 23:04:54',
                'updated_at' => '2017-03-16 23:04:54',
            ),
            47 => 
            array (
                'id' => 48,
                'transport_id' => 10,
                'ville_id' => 48,
                'ville_position' => 3,
                'created_at' => '2017-03-16 23:04:54',
                'updated_at' => '2017-03-16 23:04:54',
            ),
            48 => 
            array (
                'id' => 49,
                'transport_id' => 10,
                'ville_id' => 49,
                'ville_position' => 4,
                'created_at' => '2017-03-16 23:04:54',
                'updated_at' => '2017-03-16 23:04:54',
            ),
            49 => 
            array (
                'id' => 50,
                'transport_id' => 10,
                'ville_id' => 50,
                'ville_position' => 5,
                'created_at' => '2017-03-16 23:04:54',
                'updated_at' => '2017-03-16 23:04:54',
            ),
            50 => 
            array (
                'id' => 51,
                'transport_id' => 10,
                'ville_id' => 51,
                'ville_position' => 1,
                'created_at' => '2017-03-16 23:04:54',
                'updated_at' => '2017-03-16 23:04:54',
            ),
            51 => 
            array (
                'id' => 52,
                'transport_id' => 10,
                'ville_id' => 52,
                'ville_position' => 7,
                'created_at' => '2017-03-16 23:04:54',
                'updated_at' => '2017-03-16 23:04:54',
            ),
            52 => 
            array (
                'id' => 53,
                'transport_id' => 11,
                'ville_id' => 53,
                'ville_position' => 2,
                'created_at' => '2017-03-16 23:41:05',
                'updated_at' => '2017-03-16 23:41:05',
            ),
            53 => 
            array (
                'id' => 54,
                'transport_id' => 11,
                'ville_id' => 54,
                'ville_position' => 3,
                'created_at' => '2017-03-16 23:41:05',
                'updated_at' => '2017-03-16 23:41:05',
            ),
            54 => 
            array (
                'id' => 55,
                'transport_id' => 11,
                'ville_id' => 55,
                'ville_position' => 1,
                'created_at' => '2017-03-16 23:41:05',
                'updated_at' => '2017-03-16 23:41:05',
            ),
            55 => 
            array (
                'id' => 56,
                'transport_id' => 11,
                'ville_id' => 56,
                'ville_position' => 7,
                'created_at' => '2017-03-16 23:41:05',
                'updated_at' => '2017-03-16 23:41:05',
            ),
            56 => 
            array (
                'id' => 57,
                'transport_id' => 12,
                'ville_id' => 57,
                'ville_position' => 2,
                'created_at' => '2017-03-16 23:42:15',
                'updated_at' => '2017-03-16 23:42:15',
            ),
            57 => 
            array (
                'id' => 58,
                'transport_id' => 12,
                'ville_id' => 58,
                'ville_position' => 3,
                'created_at' => '2017-03-16 23:42:15',
                'updated_at' => '2017-03-16 23:42:15',
            ),
            58 => 
            array (
                'id' => 59,
                'transport_id' => 12,
                'ville_id' => 59,
                'ville_position' => 4,
                'created_at' => '2017-03-16 23:42:15',
                'updated_at' => '2017-03-16 23:42:15',
            ),
            59 => 
            array (
                'id' => 60,
                'transport_id' => 12,
                'ville_id' => 60,
                'ville_position' => 5,
                'created_at' => '2017-03-16 23:42:15',
                'updated_at' => '2017-03-16 23:42:15',
            ),
            60 => 
            array (
                'id' => 61,
                'transport_id' => 12,
                'ville_id' => 61,
                'ville_position' => 6,
                'created_at' => '2017-03-16 23:42:15',
                'updated_at' => '2017-03-16 23:42:15',
            ),
            61 => 
            array (
                'id' => 62,
                'transport_id' => 12,
                'ville_id' => 62,
                'ville_position' => 1,
                'created_at' => '2017-03-16 23:42:15',
                'updated_at' => '2017-03-16 23:42:15',
            ),
            62 => 
            array (
                'id' => 63,
                'transport_id' => 12,
                'ville_id' => 63,
                'ville_position' => 7,
                'created_at' => '2017-03-16 23:42:15',
                'updated_at' => '2017-03-16 23:42:15',
            ),
        ));
        
        
    }
}
