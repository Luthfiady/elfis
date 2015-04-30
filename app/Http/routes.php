<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('login', 'LoginController@index');

Route::post('do_login', 'LoginController@do_login');

Route::get('do_logout', 'LoginController@do_logout');

Route::get('admin', 'AdminController@index');

Route::get('admin/user/data', 'AdminController@user_data');


Route::get('guru', 'GuruController@index');


Route::get('siswa', 'SiswaController@index');
