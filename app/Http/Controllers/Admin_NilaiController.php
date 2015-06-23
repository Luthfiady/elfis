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

class Admin_NilaiController extends Controller {

	public $status = false;


// -------------------------------------------------------- NILAI --------------------------------------------------------

	public function nilai() {
		if(session('id_group') == 3) {
			return view('view_guru/nilai/index');
		}
		else {
			return redirect('login');
		}
	}


}