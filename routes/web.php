<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/', 'HomeController@home')->name('home');


Route::get('/search', 'CarteController@index')->name('search');
Route::get('/addtransport', 'TransportController@index')->name('addtransport');


/*
| Vehicule
*/
Route::get('user/myvehicules', 'VehiculeController@listVehicule')->name('user_vehicule');
Route::post('user/myvehicules/edit/{vehicule}', 'VehiculeController@postEditVehicule')->name('user_vehicule_edit_post');
Route::get('user/myvehicules/edit/{vehicule}', 'VehiculeController@getEditVehicule')->name('user_vehicule_edit');
Route::get('user/myvehicules/setDefault/{vehicule}', 'VehiculeController@setDefault')->name('user_vehicule_default');

/*
| User
*/
Route::get('user/{user_id}', 'UserController@getProfile')->name('user_profile');
Route::get('user/me/update', 'UserController@getProfileUpdate')->name('user_profile_update');

/*
| Login/Logout/Forgot
*/
// Authentication Routes...
$this->get('/', 'Auth\LoginController@showLoginForm')->name('login'); // --> connexion dans le pop-up
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');
