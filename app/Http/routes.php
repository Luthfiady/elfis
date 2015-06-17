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


Route::get('admin/get_materi', 'AdminController@getMateri');
Route::get('guru/get_materi', 'GuruController@getMateri');


Route::get('admin/get_pelajaran', 'AdminController@getPelajaran');
Route::get('guru/get_pelajaran', 'GuruController@getPelajaran');


Route::get('admin/get_kelas', 'AdminController@getKelas');
Route::get('guru/get_kelas', 'GuruController@getKelas');

Route::get('siswa/get_tugas', 'SiswaController@getTugas');


/////////////////////////////////////////////////  Route Index  /////////////////////////////////////////////////

// Route Admin 
Route::get('admin', 'AdminController@index');

// Route Guru
Route::get('guru', 'GuruController@index');

// Route Siswa
Route::get('siswa', 'SiswaController@index');




/////////////////////////////////////////////////  Route Materi  /////////////////////////////////////////////////

// Route Admin 
Route::get('admin/materi', 'AdminController@materi');
Route::get('admin/materi_add', 'AdminController@materi_add');
Route::get('admin/soal', 'AdminController@soal');
Route::get('admin/materi_list', 'AdminController@materi_get_list');
Route::get('admin/latihanSoal_list', 'AdminController@latihanSoal_get_list');

// Route Guru
Route::get('guru/materi', 'GuruController@materi');
Route::get('guru/detail_materi', 'GuruController@detail_materi');

// Route Siswa
Route::get('siswa/materi', 'SiswaController@materi');
Route::get('siswa/materi_list', 'SiswaController@materi_get_list');
Route::get('siswa/soal', 'SiswaController@soal');
Route::get('siswa/materi_soal', 'SiswaController@materi_soal');
Route::get('siswa/materi_nilai', 'SiswaController@materi_nilai');
Route::get('siswa/materi_detail', 'SiswaController@materi_detail');




/////////////////////////////////////////////////  Route Tugas  /////////////////////////////////////////////////

// Route Admin 
Route::get('admin/tugas', 'AdminController@tugas');
Route::post('admin/tugas_add', 'AdminController@tugas_add');
Route::post('admin/tugas_edit', 'AdminController@tugas_edit');
Route::post('admin/tugas_delete', 'AdminController@tugas_delete');
Route::get('admin/tugas_detail', 'AdminController@tugas_detail');
Route::get('admin/tugas_list', 'AdminController@tugas_get_list');

Route::get('admin/jawaban_tugas', 'AdminController@jawaban_tugas');
Route::get('admin/jawaban_list', 'AdminController@jawaban_get_list');

// Route Guru
Route::get('guru/tugas', 'GuruController@tugas');

// Route Siswa
Route::get('siswa/tugas', 'SiswaController@tugas');
Route::get('siswa/tugas_detail', 'SiswaController@tugas_detail');
Route::get('siswa/tugas_list', 'SiswaController@tugas_get_list');

Route::post('siswa/add_jawaban', 'SiswaController@jawaban_add');



/////////////////////////////////////////////////  Route kuis  /////////////////////////////////////////////////

// Route Admin 
Route::get('admin/kuis', 'AdminController@kuis');
Route::get('admin/kuis_add', 'AdminController@kuis_add');
Route::get('admin/kuis_list', 'AdminController@kuis_get_list');
Route::get('admin/kuis_get_id', 'AdminController@kuisGetId');

Route::get('admin/soal_list', 'AdminController@soal_get_list');
Route::post('admin/soal_add_id', 'AdminController@soal_add_id');
Route::post('admin/soal_add', 'AdminController@soal_add');
Route::post('admin/soal_delete', 'AdminController@soal_delete');

Route::post('admin/soal_get_edit', 'AdminController@soal_get_edit');
Route::post('admin/soal_edit', 'AdminController@soal_edit');

// Route Guru
Route::get('guru/kuis', 'GuruController@kuis');

// Route Siswa
Route::get('siswa/kuis', 'SiswaController@kuis');
Route::get('siswa/kuis_soal', 'SiswaController@kuis_soal');
Route::get('siswa/kuis_nilai', 'SiswaController@kuis_nilai');



///////////////////////////////////////////////// Route ujian  /////////////////////////////////////////////////

// Route Admin 
Route::get('admin/ujian', 'AdminController@ujian');

// Route Guru
Route::get('guru/ujian', 'GuruController@ujian');

// Route Siswa
Route::get('siswa/ujian', 'SiswaController@ujian');




/////////////////////////////////////////////////  Route Forum  /////////////////////////////////////////////////

// Route Admin 
Route::get('admin/forum', 'AdminController@forum');
Route::get('admin/forum_isi', 'AdminController@forum_isi');

Route::get('admin/forum_list', 'AdminController@forum_get_list');
Route::post('admin/forum_add', 'AdminController@forum_add');
Route::post('admin/forum_delete', 'AdminController@forum_delete');
Route::post('admin/forum_get_edit', 'AdminController@forum_get_edit');
Route::post('admin/forum_edit', 'AdminController@forum_edit');

// Route::post('admin/forum_search', 'AdminController@forum');
// Route::post('admin/forum_edit', 'AdminController@forum_edit');

// Route Guru
Route::get('guru/forum', 'GuruController@forum');

// Route Siswa
Route::get('siswa/forum', 'SiswaController@forum');




/////////////////////////////////////////////////  Route Nilai  /////////////////////////////////////////////////

// Route Admin 
Route::get('admin/nilai', 'AdminController@nilai');

// Route Guru
Route::get('guru/nilai', 'GuruController@nilai');

// Route Siswa
Route::get('siswa/nilai', 'SiswaController@nilai');





/////////////////////////////////////////////////  Route User Profile  /////////////////////////////////////////////////

// Route Admin 
Route::get('admin/profile', 'AdminController@profile');

// Route Guru
Route::get('guru/profile', 'GuruController@profile');

// Route Siswa
Route::get('siswa/profile', 'SiswaController@profile');




/////////////////////////////////////////////////  Route Change Password  /////////////////////////////////////////////////

// Route Admin 
Route::get('admin/change_password', 'AdminController@change_password');

// Route Guru
Route::get('guru/change_password', 'GuruController@change_password');

// Route Siswa
Route::get('siswa/change_password', 'SiswaController@change_password');




/////////////////////////////////////////////////  Route Reset password  /////////////////////////////////////////////////

// Route Admin 
Route::get('admin/reset_password', 'AdminController@reset_password');




/////////////////////////////////////////////////  Route User Management  /////////////////////////////////////////////////

// Route Admin 
Route::get('admin/setting_user', 'AdminController@setting_user');




