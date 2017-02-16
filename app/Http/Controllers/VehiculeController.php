<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class VehiculeController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function listVehicule() {
        return view('front.pages.vehicule.liste');
    }
    
    public function getEditVehicule(\App\Vehicule $vehicule) {
        if(Auth::user()->id != $vehicule->user->id) {
            return redirect()->route('user_vehicule');
        }
        return view('front.pages.vehicule.edit', array('vehicule' => $vehicule));
    }
    
    public function postEditVehicule(\App\Vehicule $vehicule, Request $request) {
        
        $rules = array(
        'marque' => 'required|max:255',
        'modele' => 'required|max:255',
        'longMax' => 'required|numeric',
        'hautMax' => 'required|numeric',
        'largMax' => 'required|numeric',
        'poidMax' => 'required|numeric',
        'volume' => 'required|numeric',
        );
        
        $this->validate($request, $rules);
        
        $vehicule->marque = $request->input('marque');
        $vehicule->modele = $request->input('modele');
        $vehicule->longMax = $request->input('longMax');
        $vehicule->hautMax = $request->input('hautMax');
        $vehicule->largMax = $request->input('largMax');
        $vehicule->poidMax = $request->input('poidMax');
        $vehicule->volume = $request->input('volume');
        
        if($vehicule->save()) {
            return redirect()->back()->with('success', 'ok');
        } else {
            return redirect()->back()->with('error', 'ok');
        }
    }
    
    public function setDefault(\App\Vehicule $vehicule) {
        Auth::user()->vehicules()->update(array('isDefault' => 0));
        $vehicule->isDefault = true;
        $vehicule->save();
        
        return redirect()->back();
    }
}