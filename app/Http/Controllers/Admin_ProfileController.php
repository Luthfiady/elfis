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

class Admin_ProfileController extends Controller {

	public $status = false;


// -------------------------------------------------------- PROFILE --------------------------------------------------------

	public function profile() {
		if(session('id_group') == 3) {
			$data_admin = DB::table('admin')->where('nik', session('id_user'))->select('nama', 'tempat_lahir', 'tanggal_lahir', 'agama', 'email', 'telp', 'foto')->first();
			return view('view_admin/setting/profile', ['nik' => session('id_user'), 'data_admin' => $data_admin]);
		}
		else {
			return redirect('login');
		}
	}

		public function profile_edit() {
		if(session('id_group') == 3) {

			$nik = Input::get('add_nik');
			$nama = Input::get('add_nama');
			$tempat_lahir = Input::get('add_tempat_lahir');
			$tanggal_lahir = Input::get('add_tgl_lahir');
			$agama = Input::get('add_agama');
			$email = Input::get('add_email');
			$telp = Input::get('add_telp');

			$file_name = Input::get('old_foto');


			if(Input::hasFile('add_foto')) {
				$file_name = $nik . '_' . $nama . '.' . Input::file('add_foto')->getClientOriginalExtension();
				$path = public_path('uploads/file_profile');
				Input::file('add_foto')->move($path, $file_name);
			}

			$tanggal_lahir = date("Y-m-d", strtotime($tanggal_lahir));

			DB::table('admin')
			->where('nik', '=', $nik)
			->update([
				'nama' => $nama, 
				'tempat_lahir' => $tempat_lahir, 
				'tanggal_lahir' => $tanggal_lahir, 
				'agama' => $agama, 
				'email' => $email, 
				'telp' => $telp,
				'foto' => $file_name,
				'admin_modified' => date('Y-m-d'),
				'admin_modified_by' => session('username'),
				
			]);

			return 'Profile telah tersimpan';
			
		} else {	
			return redirect('login');
		}
	}




// -------------------------------------------------------- CHANGE PASSWORD --------------------------------------------------------

	public function change_password() {
		if(session('id_group') == 3) {
			return view('view_admin/setting/change_pass')->with('nama_user', session('username'));
		}
		else {
			return redirect('login');
		}
	}


	public function set_change_password() {
		if(session('id_group') == 3) {
			
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


// -------------------------------------------------------- RESET PASSWORD --------------------------------------------------------

	public function reset_password() {
		if(session('id_group') == 3) {
			return view('view_admin/setting/reset_pass');
		}
		else {
			return redirect('login');
		}
	}


	public function get_reset_password() {
		if(session('id_group') == 3) {
			
			$id_user = Input::get('id_user');

			$cek_id = DB::select('select * from users where id_user="'.$id_user.'"');

			if ($cek_id != null) {
				DB::update('update users set password="password", user_modified="'.date('Y-m-d H:i:s').'", user_modified_by="'.session('username').'" where id_user="'.$id_user.'"');

				$this->json['sukses'] = 'Password berhasil direset';
				echo json_encode($this->json);
			} else {
				$this->json['gagal'] = 'ID User tidak tersedia';
				echo json_encode($this->json);
			}
			
		}
		else {
			return redirect('login');
		}
	}


}

// --------------------------------------------------------  --------------------------------------------------------