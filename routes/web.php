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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'CarteController@index')->name('search');


/*
| User
*/
Route::get('user/{user_id}', 'UserController@getProfile')->name('user_profile');
Route::get('user/{user_id}/update', 'UserController@getProfileUpdate')->name('user_profile_update');
