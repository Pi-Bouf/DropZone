<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      //print_r ($data);

        return Validator::make($data, [
            'reg_lastname' => 'required|max:255',
            'reg_firstname' => 'required|max:255',
            'reg_email' => 'required|email|max:255|unique:users,email',
            'reg_password' => 'required|min:6|confirmed',
            'reg_birthday' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'lastName' => $data['reg_lastname'],
            'firstName' => $data['reg_firstname'],
            'login' => $data['reg_firstname'][0].'. '.$data['reg_lastname'],
            'email' => $data['reg_email'],
            'password' => bcrypt($data['reg_password']),
            'birthday' => $data['reg_birthday'],
        ]);
    }
}
