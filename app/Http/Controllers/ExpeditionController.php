<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ville;
use Auth;

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
}
