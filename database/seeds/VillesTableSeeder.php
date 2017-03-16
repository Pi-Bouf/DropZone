<?php

use Illuminate\Database\Seeder;

class VillesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('villes')->delete();
        
        \DB::table('villes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'latitude' => 44.454980999999997,
                'longitude' => 6.03411600000004,
                'name' => 'Gap Tallard - Aérodrome, Tallard, France',
                'created_at' => '2017-03-16 22:28:47',
                'updated_at' => '2017-03-16 22:28:47',
            ),
            1 => 
            array (
                'id' => 2,
                'latitude' => 44.194713,
                'longitude' => 5.9431910000000698,
                'name' => 'Sisteron, France',
                'created_at' => '2017-03-16 22:28:47',
                'updated_at' => '2017-03-16 22:28:47',
            ),
            2 => 
            array (
                'id' => 3,
                'latitude' => 43.835743999999998,
                'longitude' => 5.7909160000000384,
                'name' => 'Manosque, France',
                'created_at' => '2017-03-16 22:28:47',
                'updated_at' => '2017-03-16 22:28:47',
            ),
            3 => 
            array (
                'id' => 4,
                'latitude' => 43.529741999999999,
                'longitude' => 5.4474270000000615,
                'name' => 'Aix-en-Provence, France',
                'created_at' => '2017-03-16 22:28:47',
                'updated_at' => '2017-03-16 22:28:47',
            ),
            4 => 
            array (
                'id' => 5,
                'latitude' => 44.559638,
                'longitude' => 6.0797579999999698,
                'name' => 'Gap, France',
                'created_at' => '2017-03-16 22:28:47',
                'updated_at' => '2017-03-16 22:28:47',
            ),
            5 => 
            array (
                'id' => 6,
                'latitude' => 43.296481999999997,
                'longitude' => 5.3697799999999916,
                'name' => 'Marseille, France',
                'created_at' => '2017-03-16 22:28:47',
                'updated_at' => '2017-03-16 22:28:47',
            ),
            6 => 
            array (
                'id' => 7,
                'latitude' => 43.529741999999999,
                'longitude' => 5.4474270000000615,
                'name' => 'Aix-en-Provence, France',
                'created_at' => '2017-03-16 22:30:09',
                'updated_at' => '2017-03-16 22:30:09',
            ),
            7 => 
            array (
                'id' => 8,
                'latitude' => 43.835743999999998,
                'longitude' => 5.7909160000000384,
                'name' => 'Manosque, France',
                'created_at' => '2017-03-16 22:30:09',
                'updated_at' => '2017-03-16 22:30:09',
            ),
            8 => 
            array (
                'id' => 9,
                'latitude' => 44.194713,
                'longitude' => 5.9431910000000698,
                'name' => 'Sisteron, France',
                'created_at' => '2017-03-16 22:30:09',
                'updated_at' => '2017-03-16 22:30:09',
            ),
            9 => 
            array (
                'id' => 10,
                'latitude' => 44.454980999999997,
                'longitude' => 6.03411600000004,
                'name' => 'Gap Tallard - Aérodrome, Tallard, France',
                'created_at' => '2017-03-16 22:30:09',
                'updated_at' => '2017-03-16 22:30:09',
            ),
            10 => 
            array (
                'id' => 11,
                'latitude' => 43.296481999999997,
                'longitude' => 5.3697799999999916,
                'name' => 'Marseille, France',
                'created_at' => '2017-03-16 22:30:09',
                'updated_at' => '2017-03-16 22:30:09',
            ),
            11 => 
            array (
                'id' => 12,
                'latitude' => 44.559638,
                'longitude' => 6.0797579999999698,
                'name' => 'Gap, France',
                'created_at' => '2017-03-16 22:30:10',
                'updated_at' => '2017-03-16 22:30:10',
            ),
            12 => 
            array (
                'id' => 13,
                'latitude' => 44.817853900000003,
                'longitude' => 5.9410510000000158,
                'name' => 'Corps, France',
                'created_at' => '2017-03-16 22:31:57',
                'updated_at' => '2017-03-16 22:31:57',
            ),
            13 => 
            array (
                'id' => 14,
                'latitude' => 44.906520999999998,
                'longitude' => 5.784528000000023,
                'name' => 'La Mure, France',
                'created_at' => '2017-03-16 22:31:57',
                'updated_at' => '2017-03-16 22:31:57',
            ),
            14 => 
            array (
                'id' => 15,
                'latitude' => 44.559638,
                'longitude' => 6.0797579999999698,
                'name' => 'Gap, France',
                'created_at' => '2017-03-16 22:31:57',
                'updated_at' => '2017-03-16 22:31:57',
            ),
            15 => 
            array (
                'id' => 16,
                'latitude' => 45.188529000000003,
                'longitude' => 5.724523999999974,
                'name' => 'Grenoble, France',
                'created_at' => '2017-03-16 22:31:57',
                'updated_at' => '2017-03-16 22:31:57',
            ),
            16 => 
            array (
                'id' => 17,
                'latitude' => 44.194713,
                'longitude' => 5.9431910000000698,
                'name' => 'Sisteron, France',
                'created_at' => '2017-03-16 22:33:07',
                'updated_at' => '2017-03-16 22:33:07',
            ),
            17 => 
            array (
                'id' => 18,
                'latitude' => 43.835743999999998,
                'longitude' => 5.7909160000000384,
                'name' => 'Manosque, France',
                'created_at' => '2017-03-16 22:33:08',
                'updated_at' => '2017-03-16 22:33:08',
            ),
            18 => 
            array (
                'id' => 19,
                'latitude' => 44.559638,
                'longitude' => 6.0797579999999698,
                'name' => 'Gap, France',
                'created_at' => '2017-03-16 22:33:08',
                'updated_at' => '2017-03-16 22:33:08',
            ),
            19 => 
            array (
                'id' => 20,
                'latitude' => 43.292678100000003,
                'longitude' => 5.5676425000000336,
                'name' => 'Aubagne, France',
                'created_at' => '2017-03-16 22:33:08',
                'updated_at' => '2017-03-16 22:33:08',
            ),
            20 => 
            array (
                'id' => 21,
                'latitude' => 44.454980999999997,
                'longitude' => 6.03411600000004,
                'name' => 'Gap Tallard - Aérodrome, Tallard, France',
                'created_at' => '2017-03-16 22:42:32',
                'updated_at' => '2017-03-16 22:42:32',
            ),
            21 => 
            array (
                'id' => 22,
                'latitude' => 44.194713,
                'longitude' => 5.9431910000000698,
                'name' => 'Sisteron, France',
                'created_at' => '2017-03-16 22:42:32',
                'updated_at' => '2017-03-16 22:42:32',
            ),
            22 => 
            array (
                'id' => 23,
                'latitude' => 44.559638,
                'longitude' => 6.0797579999999698,
                'name' => 'Gap, France',
                'created_at' => '2017-03-16 22:42:32',
                'updated_at' => '2017-03-16 22:42:32',
            ),
            23 => 
            array (
                'id' => 24,
                'latitude' => 43.835743999999998,
                'longitude' => 5.7909160000000384,
                'name' => 'Manosque, France',
                'created_at' => '2017-03-16 22:42:32',
                'updated_at' => '2017-03-16 22:42:32',
            ),
            24 => 
            array (
                'id' => 25,
                'latitude' => 45.733315999999988,
                'longitude' => 4.9119269999999915,
                'name' => 'Bron, France',
                'created_at' => '2017-03-16 22:46:09',
                'updated_at' => '2017-03-16 22:46:09',
            ),
            25 => 
            array (
                'id' => 26,
                'latitude' => 45.188529000000003,
                'longitude' => 5.724523999999974,
                'name' => 'Grenoble, France',
                'created_at' => '2017-03-16 22:46:09',
                'updated_at' => '2017-03-16 22:46:09',
            ),
            26 => 
            array (
                'id' => 27,
                'latitude' => 45.024602999999999,
                'longitude' => 5.7726519999999937,
                'name' => 'Laffrey, France',
                'created_at' => '2017-03-16 22:46:09',
                'updated_at' => '2017-03-16 22:46:09',
            ),
            27 => 
            array (
                'id' => 28,
                'latitude' => 45.764043000000001,
                'longitude' => 4.8356589999999642,
                'name' => 'Lyon, France',
                'created_at' => '2017-03-16 22:46:09',
                'updated_at' => '2017-03-16 22:46:09',
            ),
            28 => 
            array (
                'id' => 29,
                'latitude' => 44.906520999999998,
                'longitude' => 5.784528000000023,
                'name' => 'La Mure, France',
                'created_at' => '2017-03-16 22:46:09',
                'updated_at' => '2017-03-16 22:46:09',
            ),
            29 => 
            array (
                'id' => 30,
                'latitude' => 44.906520999999998,
                'longitude' => 5.784528000000023,
                'name' => 'La Mure, France',
                'created_at' => '2017-03-16 22:54:26',
                'updated_at' => '2017-03-16 22:54:26',
            ),
            30 => 
            array (
                'id' => 31,
                'latitude' => 45.188529000000003,
                'longitude' => 5.724523999999974,
                'name' => 'Grenoble, France',
                'created_at' => '2017-03-16 22:54:26',
                'updated_at' => '2017-03-16 22:54:26',
            ),
            31 => 
            array (
                'id' => 32,
                'latitude' => 44.817853900000003,
                'longitude' => 5.9410510000000158,
                'name' => 'Corps, France',
                'created_at' => '2017-03-16 22:54:27',
                'updated_at' => '2017-03-16 22:54:27',
            ),
            32 => 
            array (
                'id' => 33,
                'latitude' => 45.764043000000001,
                'longitude' => 4.8356589999999642,
                'name' => 'Lyon, France',
                'created_at' => '2017-03-16 22:54:27',
                'updated_at' => '2017-03-16 22:54:27',
            ),
            33 => 
            array (
                'id' => 34,
                'latitude' => 44.194713,
                'longitude' => 5.9431910000000698,
                'name' => 'Sisteron, France',
                'created_at' => '2017-03-16 23:00:01',
                'updated_at' => '2017-03-16 23:00:01',
            ),
            34 => 
            array (
                'id' => 35,
                'latitude' => 43.835743999999998,
                'longitude' => 5.7909160000000384,
                'name' => 'Manosque, France',
                'created_at' => '2017-03-16 23:00:01',
                'updated_at' => '2017-03-16 23:00:01',
            ),
            35 => 
            array (
                'id' => 36,
                'latitude' => 43.529741999999999,
                'longitude' => 5.4474270000000615,
                'name' => 'Aix-en-Provence, France',
                'created_at' => '2017-03-16 23:00:01',
                'updated_at' => '2017-03-16 23:00:01',
            ),
            36 => 
            array (
                'id' => 37,
                'latitude' => 43.296481999999997,
                'longitude' => 5.3697799999999916,
                'name' => 'Marseille, France',
                'created_at' => '2017-03-16 23:00:02',
                'updated_at' => '2017-03-16 23:00:02',
            ),
            37 => 
            array (
                'id' => 38,
                'latitude' => 44.559638,
                'longitude' => 6.0797579999999698,
                'name' => 'Gap, France',
                'created_at' => '2017-03-16 23:00:02',
                'updated_at' => '2017-03-16 23:00:02',
            ),
            38 => 
            array (
                'id' => 39,
                'latitude' => 43.124228000000002,
                'longitude' => 5.9279999999999973,
                'name' => 'Toulon, France',
                'created_at' => '2017-03-16 23:00:02',
                'updated_at' => '2017-03-16 23:00:02',
            ),
            39 => 
            array (
                'id' => 40,
                'latitude' => 44.461864999999989,
                'longitude' => 6.0553270000000339,
                'name' => 'Tallard, France',
                'created_at' => '2017-03-16 23:01:59',
                'updated_at' => '2017-03-16 23:01:59',
            ),
            40 => 
            array (
                'id' => 41,
                'latitude' => 44.194713,
                'longitude' => 5.9431910000000698,
                'name' => 'Sisteron, France',
                'created_at' => '2017-03-16 23:01:59',
                'updated_at' => '2017-03-16 23:01:59',
            ),
            41 => 
            array (
                'id' => 42,
                'latitude' => 43.835743999999998,
                'longitude' => 5.7909160000000384,
                'name' => 'Manosque, France',
                'created_at' => '2017-03-16 23:01:59',
                'updated_at' => '2017-03-16 23:01:59',
            ),
            42 => 
            array (
                'id' => 43,
                'latitude' => 43.529741999999999,
                'longitude' => 5.4474270000000615,
                'name' => 'Aix-en-Provence, France',
                'created_at' => '2017-03-16 23:01:59',
                'updated_at' => '2017-03-16 23:01:59',
            ),
            43 => 
            array (
                'id' => 44,
                'latitude' => 43.292678100000003,
                'longitude' => 5.5676425000000336,
                'name' => 'Aubagne, France',
                'created_at' => '2017-03-16 23:01:59',
                'updated_at' => '2017-03-16 23:01:59',
            ),
            44 => 
            array (
                'id' => 45,
                'latitude' => 44.559638,
                'longitude' => 6.0797579999999698,
                'name' => 'Gap, France',
                'created_at' => '2017-03-16 23:01:59',
                'updated_at' => '2017-03-16 23:01:59',
            ),
            45 => 
            array (
                'id' => 46,
                'latitude' => 43.296481999999997,
                'longitude' => 5.3697799999999916,
                'name' => 'Marseille, France',
                'created_at' => '2017-03-16 23:01:59',
                'updated_at' => '2017-03-16 23:01:59',
            ),
            46 => 
            array (
                'id' => 47,
                'latitude' => 44.817853900000003,
                'longitude' => 5.9410510000000158,
                'name' => 'Corps, France',
                'created_at' => '2017-03-16 23:04:54',
                'updated_at' => '2017-03-16 23:04:54',
            ),
            47 => 
            array (
                'id' => 48,
                'latitude' => 44.906520999999998,
                'longitude' => 5.784528000000023,
                'name' => 'La Mure, France',
                'created_at' => '2017-03-16 23:04:54',
                'updated_at' => '2017-03-16 23:04:54',
            ),
            48 => 
            array (
                'id' => 49,
                'latitude' => 45.188529000000003,
                'longitude' => 5.724523999999974,
                'name' => 'Grenoble, France',
                'created_at' => '2017-03-16 23:04:54',
                'updated_at' => '2017-03-16 23:04:54',
            ),
            49 => 
            array (
                'id' => 50,
                'latitude' => 45.733315999999988,
                'longitude' => 4.9119269999999915,
                'name' => 'Bron, France',
                'created_at' => '2017-03-16 23:04:54',
                'updated_at' => '2017-03-16 23:04:54',
            ),
            50 => 
            array (
                'id' => 51,
                'latitude' => 44.559638,
                'longitude' => 6.0797579999999698,
                'name' => 'Gap, France',
                'created_at' => '2017-03-16 23:04:54',
                'updated_at' => '2017-03-16 23:04:54',
            ),
            51 => 
            array (
                'id' => 52,
                'latitude' => 45.764043000000001,
                'longitude' => 4.8356589999999642,
                'name' => 'Lyon, France',
                'created_at' => '2017-03-16 23:04:54',
                'updated_at' => '2017-03-16 23:04:54',
            ),
            52 => 
            array (
                'id' => 53,
                'latitude' => 44.194713,
                'longitude' => 5.9431910000000698,
                'name' => 'Sisteron, France',
                'created_at' => '2017-03-16 23:41:05',
                'updated_at' => '2017-03-16 23:41:05',
            ),
            53 => 
            array (
                'id' => 54,
                'latitude' => 43.835743999999998,
                'longitude' => 5.7909160000000384,
                'name' => 'Manosque, France',
                'created_at' => '2017-03-16 23:41:05',
                'updated_at' => '2017-03-16 23:41:05',
            ),
            54 => 
            array (
                'id' => 55,
                'latitude' => 44.454980999999997,
                'longitude' => 6.03411600000004,
                'name' => 'Gap Tallard - Aérodrome, Tallard, France',
                'created_at' => '2017-03-16 23:41:05',
                'updated_at' => '2017-03-16 23:41:05',
            ),
            55 => 
            array (
                'id' => 56,
                'latitude' => 43.529741999999999,
                'longitude' => 5.4474270000000615,
                'name' => 'Aix-en-Provence, France',
                'created_at' => '2017-03-16 23:41:05',
                'updated_at' => '2017-03-16 23:41:05',
            ),
            56 => 
            array (
                'id' => 57,
                'latitude' => 45.733315999999988,
                'longitude' => 4.9119269999999915,
                'name' => 'Bron, France',
                'created_at' => '2017-03-16 23:42:15',
                'updated_at' => '2017-03-16 23:42:15',
            ),
            57 => 
            array (
                'id' => 58,
                'latitude' => 45.188529000000003,
                'longitude' => 5.724523999999974,
                'name' => 'Grenoble, France',
                'created_at' => '2017-03-16 23:42:15',
                'updated_at' => '2017-03-16 23:42:15',
            ),
            58 => 
            array (
                'id' => 59,
                'latitude' => 45.077317999999998,
                'longitude' => 5.7724120000000312,
                'name' => 'Vizille, France',
                'created_at' => '2017-03-16 23:42:15',
                'updated_at' => '2017-03-16 23:42:15',
            ),
            59 => 
            array (
                'id' => 60,
                'latitude' => 44.906520999999998,
                'longitude' => 5.784528000000023,
                'name' => 'La Mure, France',
                'created_at' => '2017-03-16 23:42:15',
                'updated_at' => '2017-03-16 23:42:15',
            ),
            60 => 
            array (
                'id' => 61,
                'latitude' => 44.817853900000003,
                'longitude' => 5.9410510000000158,
                'name' => 'Corps, France',
                'created_at' => '2017-03-16 23:42:15',
                'updated_at' => '2017-03-16 23:42:15',
            ),
            61 => 
            array (
                'id' => 62,
                'latitude' => 45.764043000000001,
                'longitude' => 4.8356589999999642,
                'name' => 'Lyon, France',
                'created_at' => '2017-03-16 23:42:15',
                'updated_at' => '2017-03-16 23:42:15',
            ),
            62 => 
            array (
                'id' => 63,
                'latitude' => 44.559638,
                'longitude' => 6.0797579999999698,
                'name' => 'Gap, France',
                'created_at' => '2017-03-16 23:42:15',
                'updated_at' => '2017-03-16 23:42:15',
            ),
        ));
        
        
    }
}
