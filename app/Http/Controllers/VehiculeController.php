<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicule;
use App\VehiculeType;
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
        if(Auth::user()->id == $vehicule->user->id) {
            $rules = array(
            'marque' => 'required|max:255',
            'modele' => 'required|max:255',
            'longMax' => 'required|numeric',
            'hautMax' => 'required|numeric',
            'largMax' => 'required|numeric',
            'poidMax' => 'required|numeric',
            'volume' => 'required|numeric',
            'vehicule_type' => 'required|in:1,2,3,4,5,6'
            );
            
            $this->validate($request, $rules);
            
            $vehicule->marque = $request->input('marque');
            $vehicule->modele = $request->input('modele');
            $vehicule->longMax = $request->input('longMax');
            $vehicule->hautMax = $request->input('hautMax');
            $vehicule->largMax = $request->input('largMax');
            $vehicule->poidMax = $request->input('poidMax');
            $vehicule->volume = $request->input('volume');
            $vehicule->vehicule_type_id = $request->input('vehicule_type');
            
            if($vehicule->save()) {
                return redirect()->route('user_vehicule')->with('edit', 'ok');
            } else {
                return redirect()->back()->with('error', 'ok');
            }
        }
        return redirect()->route('user_vehicule');
    }
    
    public function deleteVehicule(\App\Vehicule $vehicule) {
        if(Auth::user()->id == $vehicule->user->id) {
            $vehicule->delete();
            return redirect()->route('user_vehicule')->with('delete', 'ok');
        }
        return redirect()->route('user_vehicule');
    }
    
    public function setDefault(\App\Vehicule $vehicule) {
        if(Auth::user()->id == $vehicule->user->id) {
            Auth::user()->vehicules()->update(array('isDefault' => 0));
            $vehicule->isDefault = true;
            $vehicule->save();
            
            return redirect()->back();
        }
        return redirect()->route('user_vehicule');
    }

    public function getAddVehicule() {
        $vehi_types = VehiculeType::all();
        return view('front.pages.vehicule.add', array('vehi_type' => $vehi_types));
    }

    public function postAddVehicule(Request $request) {
        $rules = array(
            'marque' => 'required|max:255',
            'modele' => 'required|max:255',
            'longMax' => 'numeric',
            'hautMax' => 'numeric',
            'largMax' => 'numeric',
            'poidMax' => 'numeric',
            'volume' => 'numeric',
            'vehicule_type' => 'required|in:1,2,3,4,5,6'
        );

        $this->validate($request, $rules);

        $vehicule = new Vehicule();

        $vehicule->marque = $request->input('marque');
        $vehicule->modele = $request->input('modele');
        $vehicule->longMax = $request->input('longMax');
        $vehicule->hautMax = $request->input('hautMax');
        $vehicule->largMax = $request->input('largMax');
        $vehicule->poidMax = $request->input('poidMax');
        $vehicule->volume = $request->input('volume');
        $vehicule->vehicule_type_id = $request->input('vehicule_type');
        $vehicule->user_id = Auth::user()->id;
         
        if($vehicule->save()) {
            return redirect()->route('user_vehicule')->with('add', 'ok');
        } else {
            return redirect()->back()->with('error', 'ok');
        }
    }
}