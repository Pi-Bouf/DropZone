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

    public function setDefault() {

    }
}