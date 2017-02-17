<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class TransportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('front.pages.transport.add');
    }

    public function getProfileUpdate(Request $request)
    {
        $userID = Auth::user;

        
    }
}
