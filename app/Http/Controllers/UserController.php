<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Carbon\Carbon;
use App\DemandeExpedition;
use App\DemandeTransport;

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

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

    public function getMyRequest(){
      return view('front.pages.user.myrequest');
    }

    public function delTranspRequest($demande_id){
      $demande = DemandeTransport::whereId($demande_id);
      $demande->delete();
      return redirect()->route('my_request')->with('add', 'ok');
    }

    public function delExpeRequest($demande_id){
      $demande = DemandeExpedition::whereId($demande_id);
      $demande->delete();
      return redirect()->route('my_request')->with('add', 'ok');
    }

    public function getProfile($user_id){
      if($user_id=='me') {
        $user_id = Auth::user()->id;
        $page_title = 'Mon profil';
      }
      $user = User::whereId($user_id)->firstOrFail();


      //Calcul de l'age avec Carbon
      $birthdate = explode("-", $user->birthday);
      $age = Carbon::createFromDate($birthdate[0], $birthdate[1], $birthdate[2])->age;

        $totalNote = $user->noteTransport->sum('note');
        $totalNote += $user->noteExpedition->sum('note');
        $nbNote = $user->noteTransport->count();
        $nbNote += $user->noteExpedition->count();
        if($nbNote > 0) {
            $note =  round($totalNote / $nbNote, 2);
        } else {
            $note = '';
        }

      if(!isset($page_title)) $page_title = 'Profil de '.$user->firstName .' '.$user->lastName;
      $data = array('note' => $note, 'nbnote' => $nbNote,'user' => $user, 'age' => $age, 'page_title' => $page_title);

      return view('front.pages.user.profile', $data);
    }

    /**
    * Retourne la vue profile update avec en data l'utilisateur connecté
    * @param
    * @return view UserProfile_Update
    */
    public function getProfileUpdate(){

      $user = Auth::user();
      //format date europe
      $birthdate = explode("-", $user->birthday);
      $user->birthday = $birthdate[2].'/'.$birthdate[1].'/'.$birthdate[0];

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
        'sexe' => 'in:h,f',
        'profil_email' => 'required|max:100|email',
        'phone' => 'required|max:9999999999|numeric',
        'description' => 'string',
      );
      $this->validate($request, $rules);
      
      if(!empty($request->input('reg_birthday'))) {
        $birthdate = explode("/", $request->input('reg_birthday'));
        $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];
      }

      $user = Auth::user();
      $user->firstName = $request->input('firstName');
      $user->lastName = $request->input('lastName');
      $user->sexe = $request->input('sexe');

      $user->email = $request->input('profil_email');
      if(!empty($request->input('reg_birthday'))) {
        $user->birthday = $birthdate;
      }
      $user->phone = $request->input('phone');
      $user->description = $request->input('description');

      if($request->hasFile('avatar')) {
          if($request->file('avatar')->isValid()) {
              $path = $request->avatar->store('/public/images');
              $user->picLink = "/storage/".substr($path, 7);

              $image = $request->avatar;
              $filename  = time() . '.' . $image->getClientOriginalExtension();

              $path = public_path($user->picLink);

              $manager = new ImageManager();
              $image = $manager->make($request->avatar->getRealPath())->fit(500)->save($path);
          }
      }

      if($user->save()) {
          return redirect()->route('user_profile_update')->with('edit', 'ok');
      } else {
          return redirect()->back()->with('error', 'ok');
      }

    }




}
