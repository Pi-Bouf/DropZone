<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ville;
use Auth;
use App\QuestionExpedition;
use App\DemandeExpedition;
use App\NotationExpedition;
use App\Expedition;
use Carbon\Carbon;
use App\Notifications\NotifDemandeExpedition;
use App\Notifications\StatusDemandeExpedition;

class ExpeditionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('front.pages.expedition.add');
    }

    public function listPackage()
    {
      return view('front.pages.expedition.liste');
    }

    public function delPackage($expedition_id)
    {
      $expedition = Expedition::whereId($expedition_id);
      $expedition->delete();
      return redirect()->route('user_package')->with('add', 'ok');
    }

    public function confirmPackage(DemandeExpedition $demande){
      //refuse toutes les autres demandes d'expedition
      foreach(DemandeExpedition::where('expedition_id', $demande->expedition_id)->get() as $demande_refuse){
        $demande_refuse->isAccepted = false;
        $demande_refuse->save();
      }
      //valide la demande
      $demande->isAccepted = true;
      $demande->save();
      $demande->expedition->isAccepted = true;
      $demande->expedition->save();
      $demande->user->notify(new StatusDemandeExpedition($demande->expedition->user, $demande->expedition, true));
      return redirect()->back();
    }

    public function cancelPackage(DemandeExpedition $demande){
      $demande->isAccepted = false;
      $demande->save();
      $demande->user->notify(new StatusDemandeExpedition($demande->expedition->user, $demande->expedition, false));
      return redirect()->back();
    }

    public function addData(\App\Expedition $expedition, Request $request)
    {
        $rules = array(
            'villeDepartHidden' => 'required|max:150',
            'villeArriveeHidden' => 'required|max:150',
            'villeDepart' => 'required|max:150',
            'villeArrivee' => 'required|max:150',
            'prix' => 'required|numeric',
            'description' => 'required|max:400',
            'longueur' => 'required|numeric',
            'largeur' => 'required|numeric',
            'hauteur' => 'required|numeric',
            'poids' => 'required|numeric',
            'volume' => 'required|numeric'
        );
        $this->validate($request, $rules);
        $expedition->user_id = Auth::user()->id;
        $expedition->costMax = $request->input('prix');
        $expedition->costFixed = $request->input('prix');
        $expedition->isAccepted = false;
        $expedition->description = $request->input('description');
        $expedition->volumeItem = $request->input('');
        $expedition->lengthItem = $request->input('longueur');
        $expedition->widthItem = $request->input('largeur');
        $expedition->heightItem = $request->input('hauteur');
        $expedition->weightItem = $request->input('poids');
        $expedition->volumeItem = $request->input('volume');


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

        if ($villeA->save() && $ville->save()){

            $expedition->ending_ville_id = $villeA->id;
            $expedition->beginning_ville_id = $ville->id;
            if($expedition->save()){
                 return redirect()->route('addcolis')->with('add', 'ok');
            } else {
                 return redirect()->route('addcolis')->with('noadd', 'ok');
            }
        } else {
                 return redirect()->route('addcolis')->with('noadd', 'ok');
        }
    }


        public function affExpedition(Expedition $expedition) {

        //$etape = Etape::where('transport_id', "=", $transport->id)->get();
        $totalNote = $expedition->user->noteTransport->sum('note');
        $totalNote += $expedition->user->noteExpedition->sum('note');
        $nbNote = $expedition->user->noteTransport->count();
        $nbNote += $expedition->user->noteExpedition->count();
        if($nbNote > 0) {
            $note =  round($totalNote / $nbNote, 2);
        } else {
            $note = '';
        }

        $birthdate = explode("-", $expedition->user->birthday);
        $age = Carbon::createFromDate($birthdate[0], $birthdate[1], $birthdate[2])->age;
        return view('front.pages.expedition.affiche', array('note' => $note, 'nbnote' => $nbNote, 'expedition' => $expedition, 'age' => $age));
    }

    public function addQuestion(Request $request){
        $rules = array(
            'message' => 'required|max:255|string'
        );
        $this->validate($request, $rules);
        $question = new QuestionExpedition();
        $question->expedition_id= $request->input('idE');
        $question->question= $request->input('message');
        $question->user_id = Auth::user()->id;

        $question->save();

        return redirect()->back();

    }

    public function addReservation(Request $request){
        $rules = array(
            'message' => 'required|max:500',
            'prix' => 'required',
            'dateD' => 'required|max:15',
            'dateF' => 'required|max:15'
        );
        $this->validate($request, $rules);
        $demande = new DemandeExpedition();
        $demande->expedition_id= $request->input('idE');
        $demande->propositionText= $request->input('message');
        $demande->user_id = Auth::user()->id;
        $demande->prixAsked = $request->input('prix');
        $beginD = explode ("/", $request->input('dateD'));
        $demande->beginDate = $beginD[2].'-'.$beginD[1].'-'.$beginD[0];
        $endD = explode ("/", $request->input('dateF'));
        $demande->endDate = $endD[2].'-'.$endD[1].'-'.$endD[0];

        $demande->save();

        $expedition = Expedition::find($request->input('idE'));
        $expedition->user->notify(new NotifDemandeExpedition($expedition->user, $expedition, $demande));

        return redirect()->back();

    }

    public function addNoteReservationE(\App\DemandeExpedition $demande, Request $request){            
        $rules = array(
                'message' => 'required|max:300',
                'rating-input-1' => "in:1,2,3,4,5",
            );
        $this->validate($request, $rules);

        $nt = new NotationExpedition();
        $nt->expedition_id = $demande->expedition->id;
        $nt->text = $request->input('message');
        $nt->note = $request->input('rating-input-1');
        $nt->UserOrTransporter = 0;
        $nt->user_id = $demande->user->id;
        

        if($nt->save()){
            $demande->isAccepted = 2;
            if($demande->save()){
                return redirect()->back()->with('note', 'ok');
            } else {
                return redirect()->back()->with('errornote', 'ok');
            }
        } else {
            return redirect()->back()->with('errornote', 'ok');
        }
    }

    public function addNoteReservationT(\App\DemandeExpedition $demande, Request $request){            
        $rules = array(
                'message' => 'required|max:300',
                'rating-input-1' => "in:1,2,3,4,5",
            );
        $this->validate($request, $rules);

        $nt = new NotationExpedition();
        $nt->expedition_id = $demande->expedition->id;
        $nt->text = $request->input('message');
        $nt->note = $request->input('rating-input-1');
        $nt->UserOrTransporter = 1;
        $nt->user_id = $demande->expedition->user->id;
        

        if($nt->save()){
            $demande->isAccepted = 2;
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
