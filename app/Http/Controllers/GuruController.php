<?php 

namespace App\Http\Controllers;

use Input;
use DB;
use Session;
use Illuminate\Http\Response;

class GuruController extends Controller {

	public $status = false;

// -------------------------------------------------------- INDEX --------------------------------------------------------

	public function index() {
		if(session('id_group') == 2) {
			return view('view_guru/dashboard');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- MATERI --------------------------------------------------------
	
	public function materi() {
		if(session('id_group') == 2) {
			return view('view_guru/materi/index');
		}
		else {
			return redirect('login');
		}
	}

	public function materi_detail() {
		if(session('id_group') == 2) {
			return view('view_guru/materi/detail');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- TUGAS --------------------------------------------------------

	public function tugas() {
		if(session('id_group') == 2) {
			return view('view_guru/tugas/index');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- KUIS --------------------------------------------------------

	public function kuis() {
		if(session('id_group') == 2) {
			return view('view_guru/kuis/index');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- UJIAN --------------------------------------------------------

	public function ujian() {
		if(session('id_group') == 2) {
			return view('view_guru/ujian/index');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- FORUM --------------------------------------------------------

	public function forum() {
		if(session('id_group') == 2) {
			return view('view_guru/forum/index');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- NILAI --------------------------------------------------------

	public function nilai() {
		if(session('id_group') == 2) {
			return view('view_guru/nilai/index');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- PROFILE --------------------------------------------------------

	public function profile() {
		if(session('id_group') == 2) {
			return view('view_guru/setting/profile');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- CHANGE PASSWORD --------------------------------------------------------

	public function change_password() {
		if(session('id_group') == 2) {
			return view('view_guru/setting/change_pass');
		}
		else {
			return redirect('login');
		}
	}



}