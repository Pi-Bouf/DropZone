<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{



    //affiche le profil de l'utilisateur
    public function getProfile($user_id){
      //$user = User::findOrFail($user_id);
      $user = User::where('users.userID', '=', $user_id)->first();

      $data = array('user' => $user, 'page_title' => 'Profil de '.$user->name);



      return view('front.pages.user.profile', $data);
    }


    //affiche le form de modification du profil de l'utilisateur
    /*public function getProfileUpdate(){
      return view('front.pages.user.profile_update');
    }*/


}
