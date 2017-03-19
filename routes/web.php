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
Route::get('/search/transport', 'SearchController@getSearchTransport')->name('search_transport');
Route::post('/search/transport', 'SearchController@postSearchTransport')->name('search_transport_post');
Route::get('/search/expedition', 'SearchController@getSearchExpedition')->name('search_expedition');
Route::post('/search/expedition', 'SearchController@postSearchExpedition')->name('search_expedition_post');

/*
| Transport
*/
Route::get('/addtransport', 'TransportController@index')->name('addtransport');
Route::post('/postaddtransport', 'TransportController@addData')->name('postaddtransport');
Route::get('user/mytransport', 'TransportController@listTransport')->name('user_transport');
Route::get('/user/deltransport/{transport}', 'TransportController@deltransport')->name('deltransport');
Route::get('/transport/{transport}', 'TransportController@affTransport')->name('afftransport');
Route::post('/postaddquestion','TransportController@addQuestion')->name('postaddquestion');
Route::post('/postaddreservation','TransportController@addReservation')->name('postaddreservation');
Route::get('/user/confirmdemandeTransport/{demande}', 'TransportController@confirmTransport')->name('confirmtransport');
Route::get('/user/canceldemandeTransport/{demande}', 'TransportController@cancelTransport')->name('canceltransport');


/*
| Colis
*/
Route::get('/addcolis', 'ExpeditionController@index')->name('addcolis');
Route::post('/postaddcolis', 'ExpeditionController@addData')->name('postaddcolis');
Route::get('user/mypackage', 'ExpeditionController@listPackage')->name('user_package');
Route::get('/user/delpackage/{package}', 'ExpeditionController@delPackage')->name('deltpackage');
Route::get('/user/confirmdemande/{demande}', 'ExpeditionController@confirmPackage')->name('confirmpackage');
Route::get('/user/canceldemande/{demande}', 'ExpeditionController@cancelPackage')->name('cancelpackage');
Route::get('/expedition/{expedition}', 'ExpeditionController@affExpedition')->name('affexpedition');
Route::post('/postaddquestionexpedition','ExpeditionController@addQuestion')->name('postaddquestionexpedition');
Route::post('/postaddreservationexpedition','ExpeditionController@addReservation')->name('postaddreservationexpedition');


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
Route::get('user/myrequest', 'UserController@getMyRequest')->name('my_request');
Route::get('user/{user_id}', 'UserController@getProfile')->name('user_profile');
Route::get('user/me/update', 'UserController@getProfileUpdate')->name('user_profile_update');
Route::post('user/me/update', 'UserController@postProfileUpdate')->name('user_profile_update_post');


/*
| Login/Logout/Forgot
*/
// Authentication Routes...
$this->get('/', 'Auth\LoginController@showLoginForm')->name('login'); // --> connexion dans le pop-up
$this->post('login', 'Auth\LoginController@login');
$this->get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('auth/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\LoginController@handleProviderCallback');

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
$this->get('/admin/user/edit/{user}', 'BackOfficeController@getUserEdit')->name('admin_user_edit');
$this->post('/admin/user/edit/{user}', 'BackOfficeController@postUserEdit')->name('admin_user_edit_post');
$this->get('/admin/user/pic/delete/{user}', 'BackOfficeController@getUserPicDelete')->name('admin_user_pic_delete');
$this->get('/admin/user/ban/{user}', 'BackOfficeController@getUserBan')->name('admin_user_ban');
$this->get('/admin/user/unban/{user}', 'BackOfficeController@getUserUnban')->name('admin_user_unban');
$this->get('/admin/user/check/{user}', 'BackOfficeController@getUserCheck')->name('admin_user_check');
$this->get('/admin/user/uncheck/{user}', 'BackOfficeController@getUserUncheck')->name('admin_user_uncheck');
$this->get('/admin/user/vehicule/delete/{vehicule}', 'BackOfficeController@getDeleteVehicule')->name('admin_user_vehicule_delete');
$this->post('/admin/user/vehicule/edit/{vehicule}', 'BackOfficeController@postEditVehicule')->name('admin_user_vehicule_edit');
$this->get('/admin/transport/detail/{transport}', 'BackOfficeController@getTransportDetail')->name('admin_transport_detail');
