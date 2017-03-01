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

    public function addData(\App\Expedition $expedition, Request $request)
    {

    }
}
