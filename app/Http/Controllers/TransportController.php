<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index()
    {
        return view('front.pages.transport.add');
    }
}
