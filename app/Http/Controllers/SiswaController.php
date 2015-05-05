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


}