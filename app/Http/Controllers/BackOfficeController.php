<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class BackOfficeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function getDashBoard()
    {
        $data = array(
            "user" => Auth::user(),
            "userCount" => User::all()->count()
        );
        return view('back.pages.dash.home', $data);
    }
}
