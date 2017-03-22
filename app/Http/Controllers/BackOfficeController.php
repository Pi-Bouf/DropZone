<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Transport;
use App\Vehicule;
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

    public function getUserEdit(User $user)
    {
        $data = array(
            "user" => $user,
        );

        return view('back.pages.user.edit', $data);
    }

    public function postUserEdit(User $user, Request $request)
    {
        $rules = array(
            'firstName' => 'required|max:50|string',
            'lastName' => 'required|max:75|string',
            'login' => 'required|max:75',
            'sexe' => 'in:h,f',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'birthday' => 'required|date',
            'phone' => 'max:9999999999|numeric',
        );

        $this->validate($request, $rules);

        $user->email = $request->input('email');
        $user->login = $request->input('login');
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->sexe = $request->input('sexe');
        $user->birthday = $request->input('birthday');
        $user->phone = $request->input('phone');

        $data = array(
            "user" => $user,
            "result" => "OK",
        );

        return view('back.pages.user.edit', $data);
    }

    public function getUserPicDelete(USer $user)
    {
        $user->picLink = NULL;
        $user->save();

        return redirect()->back();
    }

    public function getUserBan(User $user)
    {
        $user->isBanned = true;
        $user->save();

        return redirect()->back();
    }

    public function getUserUnban(User $user)
    {
        $user->isBanned = false;
        $user->save();

        return redirect()->back();
    }

    public function getUserCheck(User $user)
    {
        $user->isChecked = true;
        $user->save();

        return redirect()->back();
    }

    public function getUserUncheck(User $user)
    {
        $user->isChecked = false;
        $user->save();

        return redirect()->back();
    }

    public function getDeleteVehicule(Vehicule $vehicule)
    {
        $vehicule->delete();

        return redirect()->back();
    }

    public function postEditVehicule(Vehicule $vehicule, Request $request) {
        $rules = array(
            'marque' => "required",
            'modele' => "required",
        );

        $this->validate($request, $rules);

        $vehicule->marque = $request->input('marque');
        $vehicule->modele = $request->input('modele');
        $vehicule->save();

        return redirect()->back();
    }

    public function getTransportList()
    {
        $data = array(
            "transports" => Transport::all(),
        );

        return view('back.pages.transport.list', $data);
    }
    
    public function getTransportDetail(Transport $transport)
    {
        $data = array(
            "user" => Auth::user(),
            "transport" => $transport,
        );
        return view('back.pages.transport.detail', $data);
    }
}