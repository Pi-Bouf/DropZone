<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ville;
use Auth;

class TransportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('front.pages.transport.add');
    }

    public function addData(\App\Transport $transport, Request $request)
    {

            
            $transport->vehicule_id = $request->input('vehicule');
            $transport->user_id = Auth::user()->id;
            $transport->detourRetirMax = $request->input('detour');
            $transport->detourDepotMax = $request->input('detour');
            $transport->withHighway = ($request->input('autoroute') == 'oui') ? '1' : '0';


            if($request->input('nature') == 'occasionnel'){
                $transport->natureTransport = '0';
                $transport->beginningDate =  $request->input('dateDepart');
                $transport->beginningHour = '12:12:10';
            } else {
                $transport->natureTransport = '1';
                $transport->frequency = $request->input('freq');
                $transport->regularyBeginningDate = $request->input('dateDebut');
                $transport->regularyEndingDate = $request->input('dateFin');

            }


            $transport->information = $request->input('descri');
            $transport->longMax = $request->input('lod');
            $transport->hautMax = $request->input('hd');
            $transport->largMax = $request->input('lad');
            $transport->poidMax = $request->input('pd');
            $transport->volume = $request->input('volume');
            
            
            if($transport->save()) {
                $ville = new Ville();
                $villeDep = $request->input('villeDepartHidden');
                $villeDep = explode (";", $villeDep);
                $ville->latitude = $villeDep[0];
                $ville->longitude = $villeDep[1];
                $ville->name = $request->input('villeDepart');

                $villeA = new Ville();
                $villeArr = $request->input('villeArriveeHidden');
                $villeArr = explode (";", $villeArr);
                $villeA->latitude = $villeArr[0];
                $villeA->longitude = $villeArr[1];
                $villeA->name = $request->input('villeArrivee');

                for($i = 1 ; $i <= 5 ; $i++){
                    //if(!empty($request->input('villeEtape'.$i))){
                        $villeEtape[$i] = new Ville();
                        $villeEtapeCoord[$i] = $request->input('villeEtapeHidden'.$i);
                        $villeEtapeCoord[$i] = explode (";",$villeEtapeCoord[$i]);
                        $villeEtape[$i]->latitude = $villeEtapeCoord[$i][0];
                        $villeEtape[$i]->longitude = $villeEtapeCoord[$i][1];
                        $villeEtape[$i]->name = $request->input('villeEtape'.$i);
                        $villeEtape[$i]->save();
                    //}
                }
                if($ville->save() && $villeA->save()){
                    return $ville->id.' et '.$villeA->id;
                }

            } else {
                return 'fait chier';
            }
    }
}
