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

// Route::get('/', 'WelcomeController@index');
// Route::get('admin/user/data', 'AdminController@user_data');


// Route Login
Route::get('/', 'LoginController@index');
Route::get('login', 'LoginController@index');

Route::post('do_login', 'LoginController@do_login');
Route::get('do_logout', 'LoginController@do_logout');


// Route Admin 
Route::get('admin', 'AdminController@index');
Route::get('admin/materi', 'AdminController@materi');
Route::get('admin/tugas', 'AdminController@tugas');
Route::get('admin/kuis', 'AdminController@kuis');
Route::get('admin/ujian', 'AdminController@ujian');
Route::get('admin/forum', 'AdminController@forum');
Route::get('admin/forum_isi', 'AdminController@forum_isi');
Route::get('admin/nilai', 'AdminController@nilai');
Route::get('admin/setting_user', 'AdminController@setting_user');
Route::get('admin/setting_grup', 'AdminController@setting_grup');
Route::get('admin/profile', 'AdminController@profile');
Route::get('admin/change_password', 'AdminController@change_password');
Route::get('admin/reset_password', 'AdminController@reset_password');


// Route Guru
Route::get('guru', 'GuruController@index');
Route::get('guru/materi', 'GuruController@materi');
Route::get('guru/tugas', 'GuruController@tugas');
Route::get('guru/kuis', 'GuruController@kuis');
Route::get('guru/ujian', 'GuruController@ujian');
Route::get('guru/forum', 'GuruController@forum');
Route::get('guru/nilai', 'GuruController@nilai');
Route::get('guru/profile', 'GuruController@profile');
Route::get('guru/change_password', 'GuruController@change_password');


// Route Siswa
Route::get('siswa', 'SiswaController@index');
Route::get('siswa/materi', 'SiswaController@materi');
Route::get('siswa/tugas', 'SiswaController@tugas');
Route::get('siswa/tugas_detail', 'SiswaController@tugas_detail');
Route::get('siswa/kuis', 'SiswaController@kuis');
Route::get('siswa/kuis_soal', 'SiswaController@kuis_soal');
Route::get('siswa/kuis_nilai', 'SiswaController@kuis_nilai');
Route::get('siswa/ujian', 'SiswaController@ujian');
Route::get('siswa/forum', 'SiswaController@forum');
Route::get('siswa/nilai', 'SiswaController@nilai');
Route::get('siswa/profile', 'SiswaController@profile');
Route::get('siswa/change_password', 'SiswaController@change_password');
