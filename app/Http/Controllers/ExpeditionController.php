<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ville;
use Auth;
use App\QuestionExpedition;
use App\DemandeExpedition;
use App\Expedition;
use Carbon\Carbon;
use App\Notifications\NotifDemandeExpedition;

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
      $demande->isAccepted = true;
      $demande->save();
      return redirect()->back();
    }

    public function cancelPackage(DemandeExpedition $demande){
      $demande->isAccepted = false;
      $demande->save();
      return redirect()->back();
    }

    public function addData(\App\Expedition $expedition, Request $request)
    {
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
        $expedition->volumeItem = null;


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
        $birthdate = explode("-", $expedition->user->birthday);
        $age = Carbon::createFromDate($birthdate[0], $birthdate[1], $birthdate[2])->age;
        return view('front.pages.expedition.affiche', array('expedition' => $expedition, 'age' => $age));
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
        $demande->isAccepted = false;
        $beginD = explode ("/", $request->input('dateD'));
        $demande->beginDate = $beginD[2].'-'.$beginD[1].'-'.$beginD[0];
        $endD = explode ("/", $request->input('dateF'));
        $demande->endDate = $endD[2].'-'.$endD[1].'-'.$endD[0];

        $demande->save();

        $expedition = Expedition::find($request->input('idE'));
        $expedition->user->notify(new NotifDemandeExpedition($expedition->user, $expedition, $demande));

        return redirect()->back();

    }
}
