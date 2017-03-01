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
        "option" => "PAGINATE",
        );
        return view('back.pages.user.list', $data);
    }
    
    public function postSearchUserList(Request $request)
    {
        $user = User::where(function($query) use ($request) {
            $query->where('lastName', "like", '%'.$request->input('toSearch').'%')
            ->orWhere('firstName', "like", '%'.$request->input('toSearch').'%')
            ->orWhere('email', "like", '%'.$request->input('toSearch').'%');
        });
        
        if($request->input('banned')) {
            $user->where('isBanned', true);
        }
        if($request->input('checked')) {
            $user->where('isChecked', true);
        }
        if($request->input('notChecked')) {
            $user->where('isChecked', false);
        }
        if($request->input('dateSince') != "start") {
            $dateSince = explode('/', $request->input('dateSince'));
            switch($dateSince[0]) {
                case 'j': {
                    $inter = "DAY";
                    break;
                }
                case 's': {
                    $inter = "WEEK";
                    break;
                }
                case 'm': {
                    $inter = "MONTH";
                    break;
                }
                case 'a': {
                    $inter = "YEAR";
                    break;
                }
                default: {
                    $inter = "YEAR";
                    break;
                }
            }
            if(is_numeric($dateSince[1])) {
                $user->whereRaw('created_at > DATE_SUB(now(), INTERVAL '.$dateSince[1].' '.$inter.')');
            }
        }

        $data = array(
        "userList" => $user->get(),
        "userSearchCount" => $user->count(),
        "user" => Auth::user(),
        "userChecked" => User::checked()->get()->count(),
        "userNotChecked" => User::notChecked()->get()->count(),
        "userCount" => User::all()->count(),
        "userBanned" => User::banned()->get()->count(),
        "option" => "NBRSEARCHED",
        );
        return view('back.pages.user.list', $data);
    }

    public function getUserDetail(User $user)
    {
        $data = array(
            "user" => Auth::user(),
            "actualUser" => $user,
        );
        return view('back.pages.user.detail', $data);
    }
}