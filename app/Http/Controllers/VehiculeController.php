<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class VehiculeController extends Controller
{
    public function listVehicule() {
        $vehicules = Auth::user()->vehicules;

        return view('front.pages.vehicule.list', array('vehicules' => $vehicules));
    }
}
