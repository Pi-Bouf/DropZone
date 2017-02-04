<?php

use Illuminate\Database\Seeder;

class TransportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

			DB::table('transports')->insert([
                'vehicule_id' => '1',
                'detourRetirMax' => '10',
                'detourDepotMax' => '5',
                'withHighway' => true,
                'natureTransport' => '1',
                'beginningDate' => '2017-02-10',
                'frequency' => '1/s',
                'regularyBeginningDate' => '2017-02-10',
                'regularyEndingDate' => '2017-02-20',
                'beginningHour' => '13:00:00',
                'information' => 'Petit trajet',
                'user_id' => '1'
				]);

			DB::table('transports')->insert([
                'vehicule_id' => '2',
                'detourRetirMax' => '10',
                'detourDepotMax' => '5',
                'withHighway' => false,
                'natureTransport' => '1',
                'beginningDate' => '2017-02-10',
                'frequency' => '1/s',
                'regularyBeginningDate' => '2017-02-10',
                'regularyEndingDate' => '2017-02-20',
                'beginningHour' => '13:00:00',
                'information' => 'Un autre trajet',
                'user_id' => '1'
				]);
    }
}
