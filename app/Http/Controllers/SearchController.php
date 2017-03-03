<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Transport;

class SearchController extends Controller
{

    public function index()
    {
        return view('front.pages.search.search');
    }

    public function postSearchTransport(Request $request)
    {
        
        $rules = array(
            "departTransport" => "required",
            "arriveeTransport" => "required",
            "dateTransport" => "required",
        );

        $this->validate($request, $rules);


            $coordDepart = explode(';', $request->input('departTransHidden'));
            $latDep = $coordDepart[0];
            $lngDep = $coordDepart[1];

            $coordArrivee = explode(';', $request->input('arriveeTransHidden'));
            $latArr = $coordArrivee[0];
            $lngArr = $coordArrivee[1];
            
            /*

            $lat = $_GET['lat'];
            $lon = $_GET['lon'];
            $rayonKM = $_GET['rayon'];

            // Calcul range offset
            $offset = ($rayonKM * 0.01) / 1.1132;
            // Calcul NE & SW with offset for x KM
            $lat_ne = $lat + $offset;
            $lon_ne = $lon + $offset;
            $lat_sw = $lat - $offset;
            $lon_sw = $lon - $offset; */

            $transport = DB::table('transports')
            ->addSelect('transports.id')
            ->addSelect('name')
            ->addSelect(DB::raw('(villes.latitude + ((transports.detourRetirMax * 0.01) / 1.1132)) as latMax'))
            ->addSelect(DB::raw('(villes.latitude - ((transports.detourRetirMax * 0.01) / 1.1132)) as latMin'))
            ->addSelect(DB::raw('(villes.longitude + ((transports.detourRetirMax * 0.01) / 1.1132)) as lngMax'))
            ->addSelect(DB::raw('(villes.longitude - ((transports.detourRetirMax * 0.01) / 1.1132)) as lngMin'))
            ->join('etapes', 'transports.id', 'etapes.transport_id')
            ->join('villes', 'etapes.ville_id', 'villes.id')
            ->havingRaw('latMax > '.$latDep.' AND latMin < '.$latDep.' AND lngMax > '.$lngDep.' AND lngMin < '.$lngDep)
            ->get();

            dd($transport->pluck('id'));

    }

    public function postSearchExpedition()
    {

    }
}
