<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        "userCount" => User::all()->count(),
        );
        return view('back.pages.dash.home', $data);
    }
    
    public function getUserList()
    {
        $data = array(
            "userList" => User::orderBy('lastName')->orderBy('firstName')->paginate(30),
            "user" => Auth::user(),
            "userChecked" => User::checked()->get()->count(),
            "userNotChecked" => User::notChecked()->get()->count(),
            "userCount" => User::all()->count(),
            "userBanned" => User::banned()->get()->count(),
            "pagination" => "OK",
            );
        return view('back.pages.user.list', $data);
    }

    public function postSearchUserList(Request $request)
    {
        $user = User::where('lastName', "like", '%'.$request->input('toSearch').'%')
            ->orWhere('firstName', "like", '%'.$request->input('toSearch').'%')
            ->orWhere('email', "like", '%'.$request->input('toSearch').'%');
        
        $data = array(
            "userList" => $user->get(),
            "user" => Auth::user(),
            "userChecked" => User::checked()->get()->count(),
            "userNotChecked" => User::notChecked()->get()->count(),
            "userCount" => User::all()->count(),
            "userBanned" => User::banned()->get()->count(),
            "pagination" => "PASOK",
        );
        return view('back.pages.user.list', $data);
    }
}