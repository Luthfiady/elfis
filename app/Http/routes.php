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

Route::get('admin/get_tugas', 'Admin_TugasController@getTugas');
Route::get('guru/get_tugas', 'Guru_TugasController@getTugas');
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
Route::get('admin/tugas', 'Admin_TugasController@tugas');
Route::post('admin/tugas_add', 'Admin_TugasController@tugas_add');
Route::post('admin/tugas_edit', 'Admin_TugasController@tugas_edit');
Route::post('admin/tugas_delete', 'Admin_TugasController@tugas_delete');
Route::get('admin/tugas_detail', 'Admin_TugasController@tugas_detail');
Route::get('admin/tugas_list', 'Admin_TugasController@tugas_get_list');

Route::get('admin/jawaban_tugas', 'Admin_TugasController@jawaban_tugas');
Route::get('admin/jawaban_list', 'Admin_TugasController@jawaban_get_list');
Route::post('admin/jawaban_delete', 'Admin_TugasController@jawaban_delete');

Route::post('admin/nilai_tugas', 'Admin_TugasController@nilai_tugas');

// Route Guru
Route::get('guru/tugas', 'Guru_TugasController@tugas');
Route::post('guru/tugas_add', 'Guru_TugasController@tugas_add');
Route::post('guru/tugas_edit', 'Guru_TugasController@tugas_edit');
Route::post('guru/tugas_delete', 'Guru_TugasController@tugas_delete');
Route::get('guru/tugas_detail', 'Guru_TugasController@tugas_detail');
Route::get('guru/tugas_list', 'Guru_TugasController@tugas_get_list');

Route::get('guru/jawaban_tugas', 'Guru_TugasController@jawaban_tugas');
Route::get('guru/jawaban_list', 'Guru_TugasController@jawaban_get_list');
Route::post('guru/jawaban_delete', 'Guru_TugasController@jawaban_delete');

Route::post('guru/nilai_tugas', 'Guru_TugasController@nilai_tugas');

// Route Siswa
Route::get('siswa/tugas', 'SiswaController@tugas');
Route::get('siswa/tugas_detail', 'SiswaController@tugas_detail');
Route::get('siswa/tugas_list', 'SiswaController@tugas_get_list');

Route::post('siswa/add_jawaban', 'SiswaController@jawaban_add');



/////////////////////////////////////////////////  Route Kuis  /////////////////////////////////////////////////

// Route Admin 
Route::get('admin/kuis', 'Admin_KuisController@kuis');
Route::get('admin/kuis_add', 'Admin_KuisController@kuis_add');
Route::get('admin/kuis_list', 'Admin_KuisController@kuis_get_list');
Route::post('admin/kuis_delete', 'Admin_KuisController@kuis_delete');
Route::get('admin/kuis_edit/{id}/{id_group_kuis}', 'Admin_KuisController@kuis_edit');

Route::get('admin/get_param', 'Admin_KuisController@get_param');
Route::get('admin/soal_list', 'Admin_KuisController@soal_list');
Route::post('admin/AddIdKuis', 'Admin_KuisController@AddIdKuis');
Route::post('admin/AddSoal', 'Admin_KuisController@AddSoal');
Route::post('admin/DeleteSoal', 'Admin_KuisController@DeleteSoal');

Route::post('admin/soal_get_edit', 'Admin_KuisController@soal_get_edit');
Route::post('admin/soal_edit', 'Admin_KuisController@soal_edit');

Route::post('admin/AddDetailKuis', 'Admin_KuisController@AddDetailKuis');
Route::post('admin/KuisBatal', 'Admin_KuisController@KuisBatal');

Route::get('admin/get_detail_kuis', 'Admin_KuisController@get_detail_kuis');
Route::get('admin/soal_list_edit', 'Admin_KuisController@soal_list_edit');
Route::post('admin/UpdateKuis', 'Admin_KuisController@UpdateKuis');


// Route Guru
Route::get('guru/kuis', 'Guru_KuisController@kuis');
Route::get('guru/kuis_add', 'Guru_KuisController@kuis_add');
Route::get('guru/kuis_list', 'Guru_KuisController@kuis_get_list');
Route::post('guru/kuis_delete', 'Guru_KuisController@kuis_delete');
Route::get('guru/kuis_edit/{id}/{id_group_kuis}', 'Guru_KuisController@kuis_edit');

Route::get('guru/get_param', 'Guru_KuisController@get_param');
Route::get('guru/soal_list', 'Guru_KuisController@soal_list');
Route::post('guru/AddIdKuis', 'Guru_KuisController@AddIdKuis');
Route::post('guru/AddSoal', 'Guru_KuisController@AddSoal');
Route::post('guru/DeleteSoal', 'Guru_KuisController@DeleteSoal');

Route::post('guru/soal_get_edit', 'Guru_KuisController@soal_get_edit');
Route::post('guru/soal_edit', 'Guru_KuisController@soal_edit');

Route::post('guru/AddDetailKuis', 'Guru_KuisController@AddDetailKuis');
Route::post('guru/KuisBatal', 'Guru_KuisController@KuisBatal');

Route::get('guru/get_detail_kuis', 'Guru_KuisController@get_detail_kuis');
Route::get('guru/soal_list_edit', 'Guru_KuisController@soal_list_edit');
Route::post('guru/UpdateKuis', 'Guru_KuisController@UpdateKuis');


// Route Siswa
Route::get('siswa/kuis', 'Siswa_KuisController@kuis');
Route::get('siswa/kuis_soal', 'Siswa_KuisController@kuis_soal');
Route::get('siswa/kuis_nilai', 'Siswa_KuisController@kuis_nilai');

Route::get('siswa/kuis_list', 'Siswa_KuisController@kuis_get_list');



///////////////////////////////////////////////// Route Ulangan  /////////////////////////////////////////////////

// Route Admin 
Route::get('admin/ulangan', 'Admin_UlanganController@ulangan');
Route::get('admin/ulangan_add', 'Admin_UlanganController@ulangan_add');
Route::get('admin/ulangan_list', 'Admin_UlanganController@ulangan_get_list');
Route::post('admin/ulangan_delete', 'Admin_UlanganController@ulangan_delete');
Route::get('admin/ulangan_get_edit/{id}/{id_group_ulangan}', 'Admin_UlanganController@ulangan_get_edit');

Route::get('admin/ulangan_get_param', 'Admin_UlanganController@ulangan_get_param');
Route::get('admin/ulangan_soal_list', 'Admin_UlanganController@ulangan_soal_list');
Route::post('admin/AddIdUlangan', 'Admin_UlanganController@AddIdUlangan');
Route::post('admin/ulangan_AddSoal', 'Admin_UlanganController@ulangan_AddSoal');
Route::post('admin/ulangan_DeleteSoal', 'Admin_UlanganController@ulangan_DeleteSoal');

Route::post('admin/ulangan_soal_get_edit', 'Admin_UlanganController@ulangan_soal_get_edit');
Route::post('admin/ulangan_soal_edit', 'Admin_UlanganController@ulangan_soal_edit');

Route::post('admin/AddDetailUlangan', 'Admin_UlanganController@AddDetailUlangan');
Route::post('admin/UlanganBatal', 'Admin_UlanganController@UlanganBatal');

Route::get('admin/get_detail_ulangan', 'Admin_UlanganController@get_detail_ulangan');
Route::get('admin/ulangan_soal_list_edit', 'Admin_UlanganController@ulangan_soal_list_edit');
Route::post('admin/UpdateUlangan', 'Admin_UlanganController@UpdateUlangan');


// Route Guru
Route::get('guru/ulangan', 'Guru_UlanganController@ulangan');
Route::get('guru/ulangan_add', 'Guru_UlanganController@ulangan_add');
Route::get('guru/ulangan_list', 'Guru_UlanganController@ulangan_get_list');
Route::post('guru/ulangan_delete', 'Guru_UlanganController@ulangan_delete');
Route::get('guru/ulangan_get_edit/{id}/{id_group_ulangan}', 'Guru_UlanganController@ulangan_get_edit');

Route::get('guru/ulangan_get_param', 'Guru_UlanganController@ulangan_get_param');
Route::get('guru/ulangan_soal_list', 'Guru_UlanganController@ulangan_soal_list');
Route::post('guru/AddIdUlangan', 'Guru_UlanganController@AddIdUlangan');
Route::post('guru/ulangan_AddSoal', 'Guru_UlanganController@ulangan_AddSoal');
Route::post('guru/ulangan_DeleteSoal', 'Guru_UlanganController@ulangan_DeleteSoal');

Route::post('guru/ulangan_soal_get_edit', 'Guru_UlanganController@ulangan_soal_get_edit');
Route::post('guru/ulangan_soal_edit', 'Guru_UlanganController@ulangan_soal_edit');

Route::post('guru/AddDetailUlangan', 'Guru_UlanganController@AddDetailUlangan');
Route::post('guru/UlanganBatal', 'Guru_UlanganController@UlanganBatal');

Route::get('guru/get_detail_ulangan', 'Guru_UlanganController@get_detail_ulangan');
Route::get('guru/ulangan_soal_list_edit', 'Guru_UlanganController@ulangan_soal_list_edit');
Route::post('guru/UpdateUlangan', 'Guru_UlanganController@UpdateUlangan');


// Route Siswa
Route::get('siswa/ulangan', 'Siswa_UlanganController@ujian');




/////////////////////////////////////////////////  Route Forum  /////////////////////////////////////////////////

// Route Admin 
Route::get('admin/forum', 'Admin_ForumController@forum');
Route::get('admin/forum_isi', 'Admin_ForumController@forum_isi');

Route::get('admin/forum_list', 'Admin_ForumController@forum_get_list');
Route::post('admin/forum_add', 'Admin_ForumController@forum_add');
Route::post('admin/forum_delete', 'Admin_ForumController@forum_delete');
Route::post('admin/forum_get_edit', 'Admin_ForumController@forum_get_edit');
Route::post('admin/forum_edit', 'Admin_ForumController@forum_edit');


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
Route::get('admin/setting_user', 'Admin_SettingController@user');

Route::get('admin/user_list', 'Admin_SettingController@user_get_list');
Route::post('admin/user_add', 'Admin_SettingController@user_add');
Route::post('admin/user_delete', 'Admin_SettingController@user_delete');
Route::post('admin/user_get_edit', 'Admin_SettingController@user_get_edit');
Route::post('admin/user_edit', 'Admin_SettingController@user_edit');
