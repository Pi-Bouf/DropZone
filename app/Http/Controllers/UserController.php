<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
    * Retourne la vue profil avec en data l'utilisateur choisi.
    * Si "me" est donné en paramètre, affiche le profil de l'utilisateur
    * @param Integer $user_id
    * @return view UserProfile
    */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Retourne la vue profile avec en data l'utilisateur choisi.
    * Si c'est /me retourne la vue profile de l'utilisateur connecté
    * @param Integer $user_id ou string 'me'
    * @return view UserProfile
    */
    public function getProfile($user_id){
      if($user_id=='me') {
        $user_id = Auth::user()->id;
        $page_title = 'Mon profil';
      }
      $user = User::whereId($user_id)->firstOrFail();

      //Calcul de l'age avec Carbon
      $birthdate = explode("-", $user->birthday);
      $age = Carbon::createFromDate($birthdate[0], $birthdate[1], $birthdate[2])->age;

      if(!isset($page_title)) $page_title = 'Profil de '.$user->firstName .' '.$user->lastName;
      $data = array('user' => $user, 'age' => $age, 'page_title' => $page_title);

      return view('front.pages.user.profile', $data);
    }

    /**
    * Retourne la vue profile update avec en data l'utilisateur connecté
    * @param
    * @return view UserProfile_Update
    */
    public function getProfileUpdate(){

      $user = Auth::user();
      $data = array('user' => $user);

      return view('front.pages.user.profile_update', $data);
    }

    /**
    * Met à jour le profil de l'utilisateur
    * @param Request $request
    * @return view /home ou back()->withInput() si erreur
    */
    public function postProfileUpdate(Request $request){
      $rules = array(
        'firstName' => 'required|max:50|string',
        'lastName' => 'required|max:75|string',
        'gender' => 'in:0,1',
        'email' => 'required|max:100|email',
        'reg_birthday' => 'required|date',
        'phone' => 'required|max:9999999999|numeric',
        'description' => 'required|max:255|string',
      );
      $this->validate($request, $rules);



      $user = Auth::user();
      $user->firstName = $request->input('firstName');
      $user->lastName = $request->input('lastName');
      $user->sexe = ($request->input('gender') == '0') ? 'h' : 'f';

      $user->email = $request->input('email');
      $user->birthday = date('Y-m-d', strtotime(str_replace('/', '-', $request->input('reg_birthday'))));
      $user->phone = $request->input('phone');
      $user->description = $request->input('description');

      if($user->save()) {
          return redirect()->route('user_profile_update')->with('edit', 'ok');
      } else {
          return redirect()->back()->with('error', 'ok');
      }

    }




}
