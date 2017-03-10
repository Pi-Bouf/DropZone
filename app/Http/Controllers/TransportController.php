<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Ville;
use App\Etape;
use App\Transport;
use Auth;
use Carbon\Carbon;
class TransportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $nbVehicule = Auth::user()->vehicules->count();
        return view('front.pages.transport.add', array('nbVehicule' =>$nbVehicule));
    }
    public function addData(\App\Transport $transport, Request $request)
    {

            $transport->vehicule_id = $request->input('vehicule');
            $transport->user_id = Auth::user()->id;
            $transport->detourRetirMax = $request->input('detour');
            $transport->detourDepotMax = $request->input('detour');
            $transport->withHighway = ($request->input('autoroute') == 'oui') ? '1' : '0';
            if($request->input('nature') == 'occasionnel'){
                $transport->natureTransport = false;
                $date = explode("/",$request->input('dateDepart'));
                $transport->beginningDate =  $date[2].'-'.$date[1].'-'.$date[0];
                $transport->beginningHour = $request->input('heureDepart').':00';
            } else {
                $transport->natureTransport = true;
                $transport->frequency = $request->input('freq');
                $dateB = explode("/",$request->input('dateDebut'));
                $transport->regularyBeginningDate = $dateB[2].'-'.$dateB[1].'-'.$dateB[0];
                $dateE = explode("/",$request->input('dateFin'));
                $transport->regularyEndingDate = $dateE[2].'-'.$dateE[1].'-'.$dateE[0];
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
                    if($request->input('villeEtapeHidden'.$i)!=""){
                        if($request->input('villeEtape'.$i)!=""){
                            $villeEtape[$i] = new Ville();
                            $villeEtapeCoord[$i] = $request->input('villeEtapeHidden'.$i);
                            $villeEtapeCoord[$i] = explode (";",$villeEtapeCoord[$i]);
                            $villeEtape[$i]->latitude = $villeEtapeCoord[$i][0];
                            $villeEtape[$i]->longitude = $villeEtapeCoord[$i][1];
                            $villeEtape[$i]->name = $request->input('villeEtape'.$i);
                            $villeEtape[$i]->save();

                            $etape = new Etape();
                            $etape->transport_id = $transport->id;
                            $etape->ville_id = $villeEtape[$i]->id;
                            $etape->ville_position = $i+1;
                            $etape->save();
                        }
                    }
                }
                if($ville->save() && $villeA->save()){
                    $etapeDepart = new Etape();
                    $etapeDepart->transport_id = $transport->id;
                    $etapeDepart->ville_id = $ville->id;
                    $etapeDepart->ville_position = 1;
                    $etapeDepart->save();
                    $etapeArrivee = new Etape();
                    $etapeArrivee->transport_id = $transport->id;
                    $etapeArrivee->ville_id = $villeA->id;
                    $etapeArrivee->ville_position = 7;
                    $etapeArrivee->save();
                    return redirect()->route('addtransport')->with('add', 'ok');
                }
            } else {
                return redirect()->route('addtransport');
            }
    }

    public function listTransport() {
        return view('front.pages.transport.liste');
    }

    public function affTransport(Transport $transport) {

        //$etape = Etape::where('transport_id', "=", $transport->id)->get();
        $etapes = $transport->etapes()->get()->all();
        $depart = $transport->villeDepart()->get()->first();
        $fin = $transport->villeArrivee()->get()->first();
        $birthdate = explode("-", $transport->user->birthday);
        $age = Carbon::createFromDate($birthdate[0], $birthdate[1], $birthdate[2])->age;
        return view('front.pages.transport.affiche', array('transport' => $transport, 'age' => $age, 'depart' => $depart, 'fin' => $fin, 'etapes' => $etapes));
    }
}
