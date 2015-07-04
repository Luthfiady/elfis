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
			$data_siswa = DB::table('siswa')->where('nis', session('id_user'))->select('nama', 'tempat_lahir', 'tanggal_lahir', 'agama', 'email', 'telp', 'foto')->first();
			return view('view_siswa/setting/profile', ['nis' => session('id_user'), 'data_siswa' => $data_siswa]);
		}
		else {
			return redirect('login');
		}
	}

		public function profile_edit() {
		if(session('id_group') == 1) {

			$nis = Input::get('add_nis');
			$nama = Input::get('add_nama');
			$tempat_lahir = Input::get('add_tempat_lahir');
			$tanggal_lahir = Input::get('add_tgl_lahir');
			$agama = Input::get('add_agama');
			$email = Input::get('add_email');
			$telp = Input::get('add_telp');

			$file_name = Input::get('old_foto');


			if(Input::hasFile('add_foto')) {
				$file_name = $nis . '_' . $nama . '.' . Input::file('add_foto')->getClientOriginalExtension();
				$path = public_path('uploads/file_profile_siswa');
				Input::file('add_foto')->move($path, $file_name);
			}

			$tanggal_lahir = date("Y-m-d", strtotime($tanggal_lahir));

			DB::table('siswa')
			->where('nis', '=', $nis)
			->update([
				'nama' => $nama, 
				'tempat_lahir' => $tempat_lahir, 
				'tanggal_lahir' => $tanggal_lahir, 
				'agama' => $agama, 
				'email' => $email, 
				'telp' => $telp,
				'foto' => $file_name,
				'siswa_modified' => date('Y-m-d'),
				'siswa_modified_by' => session('username'),
				
			]);

			return 'Profile telah tersimpan';
			
		} else {	
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