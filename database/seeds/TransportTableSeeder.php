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

			DB::table('transport')->insert([
                'vehiID' => '1',
                'transDetourRetirMax' => '10',
                'transDetourDepotMax' => '5',
                'transAutoroute' => true,
                'transDateDepart' => '2017-02-10 13:00:00',
                'transFrequence' => 'hebdomadaire',
                'transRegulierDateDebut' => '2017-02-10 13:00:00',
                'transRegulierDateFin' => '2017-02-20 13:00:00',
                'transHeureDepart' => '13:00:00',
                'transInformations' => 'Petit trajet',
                'transporteur_userID' => '1'
				]);

			DB::table('transport')->insert([
                'vehiID' => '2',
                'transDetourRetirMax' => '10',
                'transDetourDepotMax' => '5',
                'transAutoroute' => false,
                'transDateDepart' => '2017-02-10 13:00:00',
                'transFrequence' => 'hebdomadaire',
                'transRegulierDateDebut' => '2017-02-10 13:00:00',
                'transRegulierDateFin' => '2017-02-20 13:00:00',
                'transHeureDepart' => '13:00:00',
                'transInformations' => 'Un autre trajet',
                'transporteur_userID' => '1'
				]);
    }
}
