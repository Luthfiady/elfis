<?php

namespace App\Http\Controllers;

use Input;
use DB;
use Redirect;
use URL;
use Session;
use Illuminate\Http\Response;
// use Response;
use Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Siswa_ProfileController extends Controller {

	public $status = false;


// -------------------------------------------------------- PROFILE --------------------------------------------------------

	public function profile() {
		if(session('id_group') == 1) {
			return view('view_siswa/setting/profile');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- CHANGE PASSWORD --------------------------------------------------------

	public function change_password() {
		if(session('id_group') == 1) {
			return view('view_siswa/setting/change_pass')->with('nama_user', session('username'));
		}
		else {
			return redirect('login');
		}
	}


	public function set_change_password() {
		if(session('id_group') == 1) {
			
			$old_pass	= Input::get('old_pass');
			$new_pass	= Input::get('new_pass');
			$rep_pass	= Input::get('rep_pass');

			$cek_pass = DB::select('select * from users where id_user="'.session('id_user').'" and password="'.$old_pass.'"');

			if ($cek_pass != null) {
				DB::update('update users set password="'.$rep_pass.'", user_modified="'.date('Y-m-d H:i:s').'", user_modified_by="'.session('username').'" where id_user="'.session('id_user').'"');

				$this->json['sukses'] = 'Password berhasil diubah';
				echo json_encode($this->json);
			} else {
				$this->json['gagal'] = 'Password tidak sesuai';
				echo json_encode($this->json);
			}
			

		}
		else {
			return redirect('login');
		}
	}


}