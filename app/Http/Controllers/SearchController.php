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

            $date = date("Y-d-m H:i:s", strtotime($request->input('dateTransport')));
            
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

            $getTrans = DB::table('transports as first')
            ->select(DB::raw('first.id'))
            ->join('etapes as second', 'first.id', 'second.transport_id')
            ->join('villes', 'second.ville_id', 'villes.id')
            ->whereIn('first.id', function($query) use ($latArr, $lngArr) {
                $query->select(DB::raw('transports.id'))->from('transports')
                ->join('etapes', 'transports.id', 'etapes.transport_id')
                ->join('villes', 'etapes.ville_id', 'villes.id')
                ->whereRaw(' transports.id = first.id AND etapes.ville_position > second.ville_position
                AND (villes.latitude + ((transports.detourRetirMax * 0.01) / 1.1132)) > '.$latArr.' 
                AND (villes.latitude - ((transports.detourRetirMax * 0.01) / 1.1132)) < '.$latArr.' 
                AND (villes.longitude + ((transports.detourRetirMax * 0.01) / 1.1132)) > '.$lngArr.' 
                AND (villes.longitude - ((transports.detourRetirMax * 0.01) / 1.1132)) < '.$lngArr.'');
            })
            ->whereRaw('(villes.latitude + ((first.detourRetirMax * 0.01) / 1.1132)) > '.$latDep.' 
            AND (villes.latitude - ((first.detourRetirMax * 0.01) / 1.1132)) < '.$latDep.' 
            AND (villes.longitude + ((first.detourRetirMax * 0.01) / 1.1132)) > '.$lngDep.' 
            AND (villes.longitude - ((first.detourRetirMax * 0.01) / 1.1132)) < '.$lngDep.'
            AND (beginningDate = "'.$date.'" OR "'.$date.'" BETWEEN regularyBeginningDate AND regularyEndingDate)')
            ->orderBy('natureTransport', 'DESC')->orderBy('beginningHour', 'ASC')
            ->get();

            $transport = Transport::findMany($getTrans->pluck('id')->toArray());

            $data = array(
                "transports" => $transport,
                "adresseDep" => $request->input('departTransport'),
                "adresseArr" => $request->input('arriveeTransport'),
                "latDep" => $latDep,
                "lngDep" => $lngDep,
                "latArr" => $latArr,
                "lngArr" => $lngArr,
            );

            $request->session()->flash('transports', $data);
            return redirect()->route('search_transport');
    }

    public function getSearchTransport()
    {
        /*************************************/
        // Test
        /*
        $transport = Transport::findMany([1, 2, 3, 4]);

            $data = array(
                "transports" => $transport,
                "adresseDep" => "Gap, France",
                "adresseArr" => "Grenoble, France",
                "latDep" => "44.559638",
                "lngDep" => "6.07975799999997",
                "latArr" => "45.188529",
                "lngArr" => "5.724523999999974",
            );

            return view('front.pages.search.transports', $data);
            */
        /*************************************/

        
        if(session('transports') != null)
        {
            return view('front.pages.search.transports', session('transports'));
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function postSearchExpedition()
    {

    }
}
