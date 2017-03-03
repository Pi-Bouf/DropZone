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

/*
| Recherche de transport / colis
*/
Route::get('/search', 'SearchController@index')->name('search');


/*
| Transport
*/
Route::get('/addtransport', 'TransportController@index')->name('addtransport');
Route::post('/postaddtransport', 'TransportController@addData')->name('postaddtransport');

/*
| Deposer colis
*/
Route::get('/addcolis', 'ExpeditionController@index')->name('addcolis');
Route::post('/postaddcolis', 'ExpeditionController@addData')->name('postaddcolis');

/*
| Vehicule
*/
Route::get('user/myvehicules', 'VehiculeController@listVehicule')->name('user_vehicule');
Route::post('user/myvehicules/edit/{vehicule}', 'VehiculeController@postEditVehicule')->name('user_vehicule_edit_post');
Route::get('user/myvehicules/edit/{vehicule}', 'VehiculeController@getEditVehicule')->name('user_vehicule_edit');
Route::get('user/myvehicules/add', 'VehiculeController@getAddVehicule')->name('user_vehicule_add');
Route::post('user/myvehicules/add', 'VehiculeController@postAddVehicule')->name('user_vehicule_add_post');
Route::get('user/myvehicules/delete/{vehicule}', 'VehiculeController@deleteVehicule')->name('user_vehicule_delete');
Route::get('user/myvehicules/setDefault/{vehicule}', 'VehiculeController@setDefault')->name('user_vehicule_default');

/*
| User
*/
Route::get('user/{user_id}', 'UserController@getProfile')->name('user_profile');
Route::get('user/me/update', 'UserController@getProfileUpdate')->name('user_profile_update');
Route::post('user/me/update', 'UserController@postProfileUpdate')->name('user_profile_update_post');

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

/*
| Back - Dashboard
*/
$this->get('/admin', 'BackOfficeController@getDashBoard')->name('admin_home');
$this->get('/admin/user/list', 'BackOfficeController@getUserList')->name('admin_user_list');
$this->post('/admin/user/list', 'BackOfficeController@postSearchUserList')->name('admin_user_list_search_post');
$this->get('/admin/user/detail/{user}', 'BackOfficeController@getUserDetail')->name('admin_user_detail');
$this->get('/admin/transport/detail/{transport}', 'BackOfficeController@getTransportDetail')->name('admin_transport_detail');