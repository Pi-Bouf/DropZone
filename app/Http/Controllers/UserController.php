<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;


class UserController extends Controller
{
    /**
    * Retourne la vue profil avec en data l'utilisateur choisi.
    * Si "me" est donné en paramètre, affiche le profil de l'utilisateur
    * @param Integer $user_id
    * @return view UserProfile
    */
    public function getProfile($user_id){
      if($user_id=='me') $user_id = Auth::user()->id;

      $user = User::whereId($user_id)->firstOrFail();
      $data = array('user' => $user, 'page_title' => 'Profil de '.$user->lastName);

      return view('front.pages.user.profile', $data);
    }

    /**
    * Retourne la vue profil update avec en data l'utilisateur choisi.
    * @param Integer $user_id
    * @return view UserProfile_Update
    */
    public function getProfileUpdate($user_id){
      $user = User::whereId($user_id)->firstOrFail();
      $data = array('user' => $user, 'page_title' => 'Mise à jour du de mon profil');

      return view('front.pages.user.profile_update', $data);
    }

    /**
    * Met à jour le profil de l'utilisateur
    * @param Request $request
    * @return view /home ou back()->withInput() si erreur
    */
    public function postProfileUpdate(Request $request){
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
