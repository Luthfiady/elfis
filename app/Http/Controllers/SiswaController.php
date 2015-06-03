<?php 

namespace App\Http\Controllers;

use Input;
use DB;
use Session;
use Illuminate\Http\Response;

class SiswaController extends Controller {

	public $status = false;

// -------------------------------------------------------- INDEX --------------------------------------------------------

	public function index() {
		if(session('id_group') == 1) {
			return view('view_siswa/dashboard');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- MATERI --------------------------------------------------------
	
	public function materi() {
		if(session('id_group') == 1) {
			return view('view_siswa/materi/index');
		}
		else {
			return redirect('login');
		}
	}

	public function materi_soal() {
		if(session('id_group') == 1) {
			return view('view_siswa/materi/soal');
		}
		else {
			return redirect('login');
		}
	}

	public function materi_nilai() {
		if(session('id_group') == 1) {
			return view('view_siswa/materi/nilai');
		}
		else {
			return redirect('login');
		}
	}

	public function materi_download() {
		if(session('id_group') == 1) {
			return view('view_siswa/materi/download');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- TUGAS --------------------------------------------------------
	
	public function tugas() {
		if(session('id_group') == 1) {
			return view('view_siswa/tugas/index');
		}
		else {
			return redirect('login');
		}
	}

	public function tugas_detail() {
		if(session('id_group') == 1) {
			return view('view_siswa/tugas/detail');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- KUIS --------------------------------------------------------

	public function kuis() {
		if(session('id_group') == 1) {
			return view('view_siswa/kuis/index');
		}
		else {
			return redirect('login');
		}
	}

	public function kuis_soal() {
		if(session('id_group') == 1) {
			return view('view_siswa/kuis/soal');
		}
		else {
			return redirect('login');
		}
	}

	public function kuis_nilai() {
		if(session('id_group') == 1) {
			return view('view_siswa/kuis/nilai');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- UJIAN --------------------------------------------------------

	public function ujian() {
		if(session('id_group') == 1) {
			return view('view_siswa/ujian/index');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- FORUM --------------------------------------------------------
	
	public function forum() {
		if(session('id_group') == 1) {
			return view('view_siswa/forum/index');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- NILAI --------------------------------------------------------
	
	public function nilai() {
		if(session('id_group') == 1) {
			return view('view_siswa/nilai/index');
		}
		else {
			return redirect('login');
		}
	}


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
			return view('view_siswa/setting/change_pass');
		}
		else {
			return redirect('login');
		}
	}



}