<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{

    //Retourne l'utilisateur qui correspond à l'id donné en paramètre
    private function getUserById($user_id){
      return User::where('users.userID', '=', $user_id)->firstOrFail();
    }

    //Affiche le profil de l'utilisateur
    public function getProfile($user_id){
      $user = self::getUserById($user_id);
      $data = array('user' => $user, 'page_title' => 'Profil de '.$user->name);

      return view('front.pages.user.profile', $data);
    }

    //Affiche le form de modification du profil de l'utilisateur
    public function getProfileUpdate($user_id){
      $user = self::getUserById($user_id);
      $data = array('user' => $user, 'page_title' => 'Profil de '.$user->name);

      return view('front.pages.user.profile_update', $data);
    }

    //Met à jour le profil de l'utilisateur
    public function postProfileUpdate(Request $request, ){
      $rules = array(
        'leChamp' => 'required|max:255',
        //les rules à ajouter
      );

      $this->validate($request, $rules);

      $user = Auth::user();
      //$user->nom = $request->input('name');
      //$user->prenom = $request->input('name');

      if($user->save()){
        return redirect()->route('/home');
      }else{
        return redirect()->back()->withInput();
      }
    }




}
