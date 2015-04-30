<?php 

namespace App\Http\Controllers;

use Input;
use DB;
use Session;
use Illuminate\Http\Response;

class AdminController extends Controller {

	public $status = false;

	public function index() {
		if(session('id_group') == 3) {
			echo 'admin';
		}
		else {
			return redirect('login');
		}
	}

	public function user_data() {
		if(session('id_group') == 3) {
			return DB::table('user')->get();
		}
		else {
			return redirect('login');
		}
	}

}