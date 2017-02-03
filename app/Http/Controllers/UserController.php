<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //affiche le profil de l'utilisateur
    public function getProfile($user_id){

      // ...
      return view('front.pages.userProfile');
    }

    //affiche le form de modification du profil de l'utilisateur
    public function getProfileUpdate(){
      return view('front.pages.user.profile_update');
    }


}
