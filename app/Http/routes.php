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


Route::get('admin/get_guru', 'AdminController@getGuru');
Route::get('guru/get_guru', 'GuruController@getGuru');


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
Route::get('admin/materi', 'Admin_MateriController@materi');
Route::get('admin/materi_add', 'Admin_MateriController@materi_add');
Route::get('admin/soal', 'Admin_MateriController@soal');
Route::get('admin/materi_list', 'Admin_MateriController@materi_get_list');
Route::get('admin/latihanSoal_list', 'Admin_MateriController@latihanSoal_get_list');
Route::post('admin/materi_edit', 'Admin_MateriController@materi_edit');
Route::post('admin/materi_delete', 'Admin_MateriController@materi_delete');
Route::get('admin/materi_detail', 'Admin_MateriController@materi_detail');

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



/////////////////////////////////////////////////  Route Kuis  /////////////////////////////////////////////////

// Route Admin 

	// ----------------------------- Index -----------------------------
	Route::get('admin/kuis', 'Admin_KuisController@kuis');
	Route::get('admin/kuis_list', 'Admin_KuisController@kuis_get_list');
	Route::post('admin/kuis_delete', 'Admin_KuisController@kuis_delete');

	// ----------------------------- Kuis Add -----------------------------
	Route::get('admin/kuis_add', 'Admin_KuisController@kuis_add');
	Route::get('admin/kuis_get_id', 'Admin_KuisController@kuis_get_id');
	Route::get('admin/soal_list', 'Admin_KuisController@soal_list');
	Route::post('admin/AddIdKuis', 'Admin_KuisController@AddIdKuis');
	Route::post('admin/AddSoal', 'Admin_KuisController@AddSoal');
	Route::post('admin/DeleteSoal', 'Admin_KuisController@DeleteSoal');
	Route::post('admin/soal_get_edit', 'Admin_KuisController@soal_get_edit');
	Route::post('admin/soal_edit', 'Admin_KuisController@soal_edit');
	Route::post('admin/AddDetailKuis', 'Admin_KuisController@AddDetailKuis');
	Route::post('admin/KuisBatal', 'Admin_KuisController@KuisBatal');

	// ----------------------------- Kuis Edit -----------------------------

	Route::get('admin/kuis/{nama_group_kuis}/{id}', 'Admin_KuisController@kuis_edit');
	Route::get('admin/get_detail_kuis', 'Admin_KuisController@get_detail_kuis');
	Route::get('admin/soal_list_edit', 'Admin_KuisController@soal_list_edit');
	Route::post('admin/UpdateKuis', 'Admin_KuisController@UpdateKuis');


// Route Guru

	// ----------------------------- Index -----------------------------
	Route::get('guru/kuis', 'Guru_KuisController@kuis');
	Route::get('guru/kuis_list', 'Guru_KuisController@kuis_get_list');
	Route::post('guru/kuis_delete', 'Guru_KuisController@kuis_delete');

	// ----------------------------- Kuis Add -----------------------------
	Route::get('guru/kuis_add', 'Guru_KuisController@kuis_add');
	Route::get('guru/kuis_get_id', 'Guru_KuisController@kuis_get_id');
	Route::get('guru/soal_list', 'Guru_KuisController@soal_list');
	Route::post('guru/AddIdKuis', 'Guru_KuisController@AddIdKuis');
	Route::post('guru/AddSoal', 'Guru_KuisController@AddSoal');
	Route::post('guru/DeleteSoal', 'Guru_KuisController@DeleteSoal');
	Route::post('guru/soal_get_edit', 'Guru_KuisController@soal_get_edit');
	Route::post('guru/soal_edit', 'Guru_KuisController@soal_edit');
	Route::post('guru/AddDetailKuis', 'Guru_KuisController@AddDetailKuis');
	Route::post('guru/KuisBatal', 'Guru_KuisController@KuisBatal');

	// ----------------------------- Kuis Edit -----------------------------

	Route::get('guru/kuis/{nama_group_kuis}/{id}', 'Guru_KuisController@kuis_edit');
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

	// ----------------------------- Index -----------------------------
	Route::get('admin/ulangan', 'Admin_UlanganController@ulangan');
	Route::get('admin/ulangan_list', 'Admin_UlanganController@ulangan_get_list');
	Route::post('admin/ulangan_delete', 'Admin_UlanganController@ulangan_delete');

	// ----------------------------- Ulangan Add -----------------------------
	Route::get('admin/ulangan_add', 'Admin_UlanganController@ulangan_add');
	Route::get('admin/ulangan_get_id', 'Admin_UlanganController@ulangan_get_id');
	Route::get('admin/ulangan_soal_list', 'Admin_UlanganController@ulangan_soal_list');
	Route::post('admin/AddIdUlangan', 'Admin_UlanganController@AddIdUlangan');
	Route::post('admin/ulangan_AddSoal', 'Admin_UlanganController@ulangan_AddSoal');
	Route::post('admin/ulangan_DeleteSoal', 'Admin_UlanganController@ulangan_DeleteSoal');
	Route::post('admin/ulangan_soal_get_edit', 'Admin_UlanganController@ulangan_soal_get_edit');
	Route::post('admin/ulangan_soal_edit', 'Admin_UlanganController@ulangan_soal_edit');
	Route::post('admin/AddDetailUlangan', 'Admin_UlanganController@AddDetailUlangan');
	Route::post('admin/UlanganBatal', 'Admin_UlanganController@UlanganBatal');

	// ----------------------------- Ulangan Edit -----------------------------

	Route::get('admin/ulangan/{nama_group_ulangan}/{id}', 'Admin_UlanganController@ulangan_edit');
	Route::get('admin/get_detail_ulangan', 'Admin_UlanganController@get_detail_ulangan');
	Route::get('admin/ulangan_soal_list_edit', 'Admin_UlanganController@ulangan_soal_list_edit');
	Route::post('admin/UpdateUlangan', 'Admin_UlanganController@UpdateUlangan');


// Route Guru

	// ----------------------------- Index -----------------------------
	Route::get('guru/ulangan', 'Guru_UlanganController@ulangan');
	Route::get('guru/ulangan_list', 'Guru_UlanganController@ulangan_get_list');
	Route::post('guru/ulangan_delete', 'Guru_UlanganController@ulangan_delete');

	// ----------------------------- Ulangan Add -----------------------------
	Route::get('guru/ulangan_add', 'Guru_UlanganController@ulangan_add');
	Route::get('guru/ulangan_get_id', 'Guru_UlanganController@ulangan_get_id');
	Route::get('guru/ulangan_soal_list', 'Guru_UlanganController@ulangan_soal_list');
	Route::post('guru/AddIdUlangan', 'Guru_UlanganController@AddIdUlangan');
	Route::post('guru/ulangan_AddSoal', 'Guru_UlanganController@ulangan_AddSoal');
	Route::post('guru/ulangan_DeleteSoal', 'Guru_UlanganController@ulangan_DeleteSoal');
	Route::post('guru/ulangan_soal_get_edit', 'Guru_UlanganController@ulangan_soal_get_edit');
	Route::post('guru/ulangan_soal_edit', 'Guru_UlanganController@ulangan_soal_edit');
	Route::post('guru/AddDetailUlangan', 'Guru_UlanganController@AddDetailUlangan');
	Route::post('guru/UlanganBatal', 'Guru_UlanganController@UlanganBatal');

	// ----------------------------- Ulangan Edit -----------------------------

	Route::get('guru/ulangan/{nama_group_ulangan}/{id}', 'Guru_UlanganController@ulangan_edit');
	Route::get('guru/get_detail_ulangan', 'Guru_UlanganController@get_detail_ulangan');
	Route::get('guru/ulangan_soal_list_edit', 'Guru_UlanganController@ulangan_soal_list_edit');
	Route::post('guru/UpdateUlangan', 'Guru_UlanganController@UpdateUlangan');

// Route Siswa
Route::get('siswa/ulangan', 'Siswa_UlanganController@ujian');




/////////////////////////////////////////////////  Route Forum  /////////////////////////////////////////////////

// Route Admin 
Route::get('admin/forum', 'Admin_ForumController@forum');

	// ----------------------------- index -----------------------------
Route::get('admin/forum_list', 'Admin_ForumController@forum_get_list');
Route::post('admin/forum_add', 'Admin_ForumController@forum_add');
Route::post('admin/forum_delete', 'Admin_ForumController@forum_delete');
Route::post('admin/forum_get_edit', 'Admin_ForumController@forum_get_edit');
Route::post('admin/forum_edit', 'Admin_ForumController@forum_edit');

	// ----------------------------- Isi -----------------------------
Route::get('admin/forum/{nama_forum}/{id_forum}', 'Admin_ForumController@forum_isi');
Route::get('admin/forum_isi_set_data', 'Admin_ForumController@forum_isi_set_data');
Route::post('admin/forum_add_star', 'Admin_ForumController@forum_add_star');
Route::post('admin/komentar_add_star', 'Admin_ForumController@komentar_add_star');
Route::post('admin/komentar_add', 'Admin_ForumController@komentar_add');
Route::post('admin/komentar_delete', 'Admin_ForumController@komentar_delete');
Route::post('admin/komentar_get_edit', 'Admin_ForumController@komentar_get_edit');
Route::post('admin/komentar_edit', 'Admin_ForumController@komentar_edit');
Route::get('admin/refresh_komentar', 'Admin_ForumController@refresh_komentar');
Route::get('admin/refresh_forum', 'Admin_ForumController@refresh_forum');

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
