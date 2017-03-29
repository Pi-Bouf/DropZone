<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Ville;
use App\Etape;
use App\Transport;
use App\User;
use App\QuestionTransport;
use App\DemandeTransport;
use Auth;
use App\NotationTransport;
use Carbon\Carbon;
use App\Notifications\NotifDemandeTransport;
use App\Notifications\StatusDemandeTransport;


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
        $rules=array();
        if($request->input('nature') == 'occasionnel'){
            $rules = array(
                'villeDepart' => 'required|max:150',
                'villeArrivee' => 'required|max:150',
                'villeDepartHidden' => 'required|max:150',
                'villeArriveeHidden' => 'required|max:150',
                'descri' => 'required|max:600',
                'dateDepart' => 'required|max:12',
                'heureDepart' => 'required|max:2',
            );
        } else{
            $rules = array(
                'villeDepart' => 'required|max:150',
                'villeArrivee' => 'required|max:150',
                'villeDepartHidden' => 'required|max:150',
                'villeArriveeHidden' => 'required|max:150',
                'descri' => 'required|max:600',
                'dateDebut' => 'required|max:12',
                'dateFin' => 'required|max:12',
            );
        }
        $this->validate($request, $rules);
        $transport->vehicule_id = $request->input('vehicule');
        $transport->user_id = Auth::user()->id;
        $transport->detourRetirMax = $request->input('detour');
        $transport->detourDepotMax = $request->input('detour');
        $transport->withHighway = ($request->input('autoroute') == 'oui') ? '1' : '0';
        if($request->input('nature') == 'occasionnel'){
            $transport->natureTransport = false;
            $date = explode("/",$request->input('dateDepart'));
            $transport->beginningDate =  $date[2].'-'.$date[1].'-'.$date[0];
            $transport->beginningHour = $request->input('heureDepart').':00:00';
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
            else{
                return redirect()->route('addtransport')->with('error','ok');
            }
        } else {
            return redirect()->route('addtransport')->with('error','ok');
        }
    }

    public function listTransport() {
        return view('front.pages.transport.liste');
    }

    public function affTransport(Transport $transport) {

        $totalNote = $transport->user->noteTransport->sum('note');
        $totalNote += $transport->user->noteExpedition->sum('note');
        $nbNote = $transport->user->noteTransport->count();
        $nbNote += $transport->user->noteExpedition->count();
        if($nbNote > 0) {
            $note =  round($totalNote / $nbNote, 2);
        } else {
            $note = '';
        }
        $etapes = $transport->etapes()->get()->all();
        $depart = $transport->villeDepart()->get()->first();
        $fin = $transport->villeArrivee()->get()->first();
        $birthdate = explode("-", $transport->user->birthday);
        $age = Carbon::createFromDate($birthdate[0], $birthdate[1], $birthdate[2])->age;
        return view('front.pages.transport.affiche', array('note' => $note, 'nbnote' => $nbNote, 'transport' => $transport, 'age' => $age, 'depart' => $depart, 'fin' => $fin, 'etapes' => $etapes));
    }

    public function deltransport($transport_id){
      $transport = Transport::whereId($transport_id);
      $transport->delete();
      return redirect()->route('user_transport')->with('add', 'ok');


    }

    public function addQuestion(Request $request){
        $rules = array(
            'message' => 'required|max:255|string'
        );
        $this->validate($request, $rules);
        $question = new QuestionTransport();
        $question->transport_id= $request->input('idT');
        $question->text= $request->input('message');
        $question->user_id = Auth::user()->id;

        $question->save();

        return redirect()->back();
    }
    
    public function postaddreponse(\App\QuestionTransport $question, Request $request){
        $rules = array(
            'reponse' => 'required|max:255|string'
        );
        $this->validate($request, $rules);
        $rep = new QuestionTransport();
        $rep->transport_id= $request->input('idT');
        $rep->text= $request->input('reponse');
        $rep->question_transport_id = $question->id;
        $rep->user_id = Auth::user()->id;

        $rep->save();
        return redirect()->back();
    }

    public function addReservation(Request $request){
        $rules = array(
            'message' => 'required|max:500',
            'prix' => 'required',
        );

        $this->validate($request, $rules);
        $demande = new DemandeTransport();
        $demande->transport_id= $request->input('idT');
        $demande->text= $request->input('message');
        $demande->user_id = Auth::user()->id;
        $demande->cost = $request->input('prix');
        $demande->isAccepted = 0;

        $demande->save();

        $transport = Transport::find($request->input('idT'));
        $transport->user->notify(new NotifDemandeTransport($transport->user, $transport, $demande));

        return redirect()->back();
    }

    public function confirmTransport(DemandeTransport $demande){
      $demande->isAccepted = 2;
      $demande->save();

      $demande->user->notify(new StatusDemandeTransport($demande->transport->user, $demande->transport, true));

      return redirect()->back();
    }

    public function cancelTransport(DemandeTransport $demande){
      $demande->isAccepted = 1;
      $demande->save();

    $demande->user->notify(new StatusDemandeTransport($demande->transport->user, $demande->transport, false));

      return redirect()->back();
    }

    public function addNoteReservation(\App\DemandeTransport $demande, Request $request){            
        $rules = array(
                'message' => 'required|max:300',
                'rating-input-1' => "in:1,2,3,4,5",
            );
        $this->validate($request, $rules);

        $nt = new NotationTransport();

        $nt->demande_transport_id = $demande->id;
        $nt->text = $request->input('message');
        $nt->note = $request->input('rating-input-1');
        $nt->UserOrTransporter = 1;
        $nt->user_id = $demande->user->id;
        

        if($nt->save()){
            $demande->isAccepted = 3;
            if($demande->save()){
                return redirect()->back()->with('note', 'ok');
            } else {
                return redirect()->back()->with('errornote', 'ok');
            }
        } else {
            return redirect()->back()->with('errornote', 'ok');
        }
    }

    public function addNoteReservationUser(\App\DemandeTransport $demande, Request $request){            
        $rules = array(
                'message' => 'required|max:300',
                'rating-input-1' => "in:1,2,3,4,5",
            );
        $this->validate($request, $rules);

        $nt = new NotationTransport();

        $nt->demande_transport_id = $demande->id;
        $nt->text = $request->input('message');
        $nt->note = $request->input('rating-input-1');
        $nt->UserOrTransporter = 0;
        $nt->user_id = $demande->transport->user->id;
        

        if($nt->save()){
            $demande->isAccepted = 3;
            if($demande->save()){
                return redirect()->back()->with('note', 'ok');
            } else {
                return redirect()->back()->with('errornote', 'ok');
            }
        } else {
            return redirect()->back()->with('errornote', 'ok');
        }
    }

}
