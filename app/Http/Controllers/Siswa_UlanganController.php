<?php 

namespace App\Http\Controllers;

use Input;
use DB;
use Session;
use Illuminate\Http\Response;

class Siswa_UlanganController extends Controller {

	public $status = false;


// -------------------------------------------------------- ULANGAN --------------------------------------------------------

	public function ujian() {
		if(session('id_group') == 1) {
			return view('view_siswa/ujian/index');
		}
		else {
			return redirect('login');
		}
	}

}