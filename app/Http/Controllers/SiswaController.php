<?php 

namespace App\Http\Controllers;

use Input;
use DB;
use Session;
use Illuminate\Http\Response;

class SiswaController extends Controller {

	public $status = false;

	public function index() {
		if(session('id_group') == 1) {
			return view('view_siswa/dashboard');
		}
		else {
			return redirect('login');
		}
	}


	public function materi() {
		if(session('id_group') == 1) {
			return view('view_siswa/materi/index');
		}
		else {
			return redirect('login');
		}
	}


	public function tugas() {
		if(session('id_group') == 1) {
			return view('view_siswa/tugas/index');
		}
		else {
			return redirect('login');
		}
	}


	public function kuis() {
		if(session('id_group') == 1) {
			return view('view_siswa/kuis/index');
		}
		else {
			return redirect('login');
		}
	}


	public function ujian() {
		if(session('id_group') == 1) {
			return view('view_siswa/ujian/index');
		}
		else {
			return redirect('login');
		}
	}


	public function forum() {
		if(session('id_group') == 1) {
			return view('view_siswa/forum/index');
		}
		else {
			return redirect('login');
		}
	}


	public function nilai() {
		if(session('id_group') == 1) {
			return view('view_siswa/nilai/index');
		}
		else {
			return redirect('login');
		}
	}


	public function profile() {
		if(session('id_group') == 1) {
			return view('view_siswa/setting/profile');
		}
		else {
			return redirect('login');
		}
	}


	public function change_password() {
		if(session('id_group') == 1) {
			return view('view_siswa/setting/change_pass');
		}
		else {
			return redirect('login');
		}
	}



}