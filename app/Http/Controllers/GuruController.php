<?php 

namespace App\Http\Controllers;

use Input;
use DB;
use Session;
use Illuminate\Http\Response;

class GuruController extends Controller {

	public $status = false;

	public function index() {
		if(session('id_group') == 2) {
			return view('view_guru/dashboard');
		}
		else {
			return redirect('login');
		}
	}

	

}