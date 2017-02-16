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

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Retourne la vue profile avec en data l'utilisateur choisi.
    * @param Integer $user_id
    * @return view UserProfile
    */
    public function getProfile($user_id){
      if($user_id=='me') {
        $user_id = Auth::user()->id;
        $page_title = 'Mon profil';
      }

      $user = User::whereId($user_id)->firstOrFail();
      if(!isset($page_title)) $page_title = 'Profil de '.$user->firstName .' '.$user->lastName;
      $data = array('user' => $user, 'page_title' => $page_title);

      return view('front.pages.user.profile', $data);
    }

    /**
    * Retourne la vue profile update avec en data l'utilisateur choisi.
    * @param Integer $user_id
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
