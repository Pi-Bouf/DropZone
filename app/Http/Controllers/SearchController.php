<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Transport;
use App\Expedition;
use Auth;
use Illuminate\Support\Facades\Input;

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

        if((strpos($request->input('departTransportCoord'), ";") != FALSE) && (strpos($request->input('arriveeTransportCoord'), ";") != FALSE)) {
            $coordDepart = explode(';', $request->input('departTransportCoord'));
            $latDep = $coordDepart[0];
            $lngDep = $coordDepart[1];
            
            $coordArrivee = explode(';', $request->input('arriveeTransportCoord'));
            $latArr = $coordArrivee[0];
            $lngArr = $coordArrivee[1];
        } else {
            return redirect()->back()->withInput();
        }
        
        $date = date('Y-m-d H:i:s', strtotime(implode('-', array_reverse(explode('/', $request->input('dateTransport'))))));
        
        $getTrans = DB::table('transports as first')
        ->select(DB::raw('first.id'))
        ->join('etapes as second', 'first.id', 'second.transport_id')
        ->join('villes', 'second.ville_id', 'villes.id')
        ->join('vehicules', 'first.vehicule_id', 'vehicules.id' )
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
        AND (beginningDate = "'.$date.'" OR "'.$date.'" BETWEEN regularyBeginningDate AND regularyEndingDate)');

        $getTrans->where('withHighway', $request->input('withHighway', true));

        $getTrans->whereRaw('(first.longMax >= '.$request->input('longMax', 0).' OR first.longMax IS NULL)');
        $getTrans->whereRaw('(vehicules.longMax >= '.$request->input('longMax', 0).' OR vehicules.longMax IS NULL)');
        
        $getTrans->whereRaw('(first.largMax >= '.$request->input('largMax', 0).' OR first.largMax IS NULL)');
        $getTrans->whereRaw('(vehicules.largMax >= '.$request->input('largMax', 0).' OR vehicules.largMax IS NULL)');
        
        $getTrans->whereRaw('(first.hautMax >= '.$request->input('hautMax', 0).' OR first.hautMax IS NULL)');
        $getTrans->whereRaw('(vehicules.hautMax >= '.$request->input('hautMax', 0).' OR vehicules.hautMax IS NULL)');
        
        $getTrans->whereRaw('(first.poidMax >= '.$request->input('poidMax', 0).' OR first.poidMax IS NULL)');
        $getTrans->whereRaw('(vehicules.poidMax >= '.$request->input('poidMax', 0).' OR vehicules.poidMax IS NULL)');

        $getTrans->whereRaw('(first.volume >= '.$request->input('volume', 0).' OR first.volume IS NULL)');
        $getTrans->whereRaw('(vehicules.volume >= '.$request->input('volume', 0).' OR vehicules.volume IS NULL)');

        if($request->input('beginningHour')) {
            $time = $request->input('beginningHour');
            if($time != "--:--") {
                $getTrans->where('first.beginningHour', '>=', $request->input('beginningHour', '00:00').':00');
            }
        }

        if($request->input('natureTransport')) {
            $natureTransport = $request->input('natureTransport');
            if($natureTransport != "all") {
                $getTrans->where('natureTransport', $request->input('natureTransport'));
            }
        }

        if(Auth::user()) {
            $getExpe->whereRaw('user_id != 1');
        }

        $getTrans->get();
        
        $transport = Transport::findMany($getTrans->pluck('id')->toArray())->sortBy('natureTransport');

        $data = array(
            "transports" => $transport,
        );
        
        $request->session()->flash('transports', array_merge($data, $request->only(['withHighway', 'longMax', 'largMax', 'hautMax', 'poidMax', 'volume', 'beginningHour', 'natureTransport', 'departTransport', 'arriveeTransport', 'dateTransport', 'departTransportCoord', 'arriveeTransportCoord'])));
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
        
        if(isset(session('transports')['transports'])) {
            $data = session('transports');
        } else {
            $data = array();
        }
        
        return view('front.pages.search.transports', $data);
    }
    
    public function postSearchExpedition(Request $request)
    {
        $rules = array(
        "departExpedition" => "required",
        "arriveeExpedition" => "required",
        );
        
        $this->validate($request, $rules);
        
        if((strpos($request->input('departExpeditionCoord'), ";") != FALSE) && (strpos($request->input('arriveeExpeditionCoord'), ";") != FALSE)) {
            $coordDepart = explode(';', $request->input('departExpeditionCoord'));
            $latDep = $coordDepart[0];
            $lngDep = $coordDepart[1];
            
            $coordArrivee = explode(';', $request->input('arriveeExpeditionCoord'));
            $latArr = $coordArrivee[0];
            $lngArr = $coordArrivee[1];
        } else {
            return redirect()->back()->withInput();
        }
        
        $getExpe = DB::table('expeditions')
        ->select(DB::raw('expeditions.id'))
        ->join('villes as beginning', 'beginning.id', 'beginning_ville_id')
        ->join('villes as ending', 'ending.id', 'ending_ville_id')
        ->whereRaw('isAccepted = false
        AND (beginning.latitude + (('.$request->input('rangeKM', 1).' * 0.01) / 1.1132)) > '.$latDep.'
        AND (beginning.latitude - (('.$request->input('rangeKM', 1).' * 0.01) / 1.1132)) < '.$latDep.'
        AND (beginning.longitude + (('.$request->input('rangeKM', 1).' * 0.01) / 1.1132)) > '.$lngDep.'
        AND (beginning.longitude - (('.$request->input('rangeKM', 1).' * 0.01) / 1.1132)) < '.$lngDep.'
        AND (ending.latitude + (('.$request->input('rangeKM', 1).' * 0.01) / 1.1132)) > '.$latArr.'
        AND (ending.latitude - (('.$request->input('rangeKM', 1).' * 0.01) / 1.1132)) < '.$latArr.'
        AND (ending.longitude + (('.$request->input('rangeKM', 1).' * 0.01) / 1.1132)) > '.$lngArr.'
        AND (ending.longitude - (('.$request->input('rangeKM', 1).' * 0.01) / 1.1132)) < '.$lngArr);


        $getExpe->whereRaw('(expeditions.lengthItem <= '.$request->input('longMax', 300).' OR expeditions.lengthItem IS NULL)');   
        $getExpe->whereRaw('(expeditions.widthItem <= '.$request->input('widthItem', 300).' OR expeditions.widthItem IS NULL)');
        $getExpe->whereRaw('(expeditions.heightItem <= '.$request->input('heightItem', 300).' OR expeditions.heightItem IS NULL)');
        $getExpe->whereRaw('(expeditions.weightItem <= '.$request->input('weightItem', 10000).' OR expeditions.weightItem IS NULL)');
        $getExpe->whereRaw('(expeditions.volumeItem <= '.$request->input('volumeItem', 300).' OR expeditions.volumeItem IS NULL)');
        $getExpe->whereRaw('expeditions.costMax >= '.$request->input('prixMin', 0));
        $getExpe->whereRaw('expeditions.costMax <= '.$request->input('prixMax', 300));

        if(Auth::user()) {
            $getExpe->whereRaw('user_id != 1');
        }

        $getExpe->get();

        
        $expedition = Expedition::findMany($getExpe->pluck('id')->toArray());
        
        $data = array(
        "expeditions" => $expedition,
        );
        
        $request->session()->flash('expeditions', array_merge($data, $request->only(['departExpedition', 'arriveeExpedition', 'rangeKM', 'departExpeditionCoord', 'arriveeExpeditionCoord', 'longMax', 'largMax', 'hautMax', 'poidMax', 'volume'])));
        return redirect()->route('search_expedition');
    }
    
    public function getSearchExpedition()
    {
        /*
        $expeditions = Expedition::findMany([1, 2, 3, 4]);
        
        $data = array(
        "expeditions" => $expeditions,
        "adresseDep" => "Gap, France",
        "adresseArr" => "Grenoble, France",
        "latDep" => "44.559638",
        "lngDep" => "6.07975799999997",
        "latArr" => "45.188529",
        "lngArr" => "5.724523999999974",
        );
        
        return view('front.pages.search.expeditions', $data);
        */

        if(isset(session('expeditions')['expeditions'])) {
            $data = session('expeditions');
        } else {
            $data = array();
        }
        
        return view('front.pages.search.expeditions', $data);
    }
}