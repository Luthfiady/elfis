<?php

namespace App\Http\Controllers;

use Input;
use DB;
use Session;
use Illuminate\Http\Response;

class AdminController extends Controller {

	public $status = false;

// -------------------------------------------------------- INDEX --------------------------------------------------------

	public function index() {
		if(session('id_group') == 3) {
			return view('view_admin/dashboard');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- MATERI --------------------------------------------------------

	public function materi() {
		if(session('id_group') == 3) {
			return view('view_admin/materi/index');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- TUGAS --------------------------------------------------------

	public function tugas() {
		if(session('id_group') == 3) {
			return view('view_admin/tugas/index');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- KUIS --------------------------------------------------------

	public function kuis() {
		if(session('id_group') == 3) {
			return view('view_admin/kuis/index');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- UJIAN --------------------------------------------------------

	public function ujian() {
		if(session('id_group') == 3) {
			return view('view_admin/ujian/index');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- FORUM --------------------------------------------------------

	public function forum() {
		if(session('id_group') == 3) {
				
			// $search_by = trim(Input::get('search_by'));
			// $search_input = trim(Input::get('search_input'));

			// if ($search_by != null) {
			// 	$sql_ext = "where ".$search_by." like '%".$search_input."%'";
			// } else {
			// 	$sql_ext = "";
			// }

			// $data_forum = DB::select('select * from forum '.$sql_ext);

			return view('view_admin/forum/index');

		} else {
			return redirect('login');
		}
	}


	public function forum_get_list() {
		
		if(session('id_group') == 3) {

			$search_by = Input::get('search_by');
			$search_input = Input::get('search_input');

			if ($search_by != null) {
				$sql_ext = "where ".$search_by." like '%".$search_input."%'";
			} else {
				$sql_ext = "";
			}

			$data_forum = DB::select('select * from forum '.$sql_ext)->toArray();


			$result = '';

			$result .= '<table class="table table-hover table-bordered table-striped">';
			$result .= '<thead class="index">';
			$result .= '<tr>';
			$result .= '<th>No</th>';
			$result .= '<th>Nama Forum</th>';
			$result .= '<th>Hak Akses</th>';
			$result .= '<th>Subyek</th>';
			$result .= '<th>Keterangan</th>';
			$result .= '<th>Rating</th>';
			$result .= '<th>Dispoting Oleh</th>';
			$result .= '<th><span class="glyphicon glyphicon-wrench"></span></th>';
			$result .= '</tr>';
			$result .= '</thead>';
			$result .= '<tbody class="index">';
			$result .= '<tr>';

			if ($data_forum == null) {

				$result .= '<td colspan="8">No Data In Database</td>';
				$result .= '</tr>';
				$result .= '</tbody>';
				$result .= '</table>';

			} else {

				$i = 1;
				foreach ($data_forum as $row => $list) {
					$result .= '<td class="kolom-tengah">'.$i.'</td>';
					$result .= '<td><a class="link-to" href="{{ URL::to("admin/forum_isi") }}">'.$list['nama_forum'].'</a></td>';
					$result .= '<td>'.$list['role_access'].'</td>';
					$result .= '<td>'.$list['subyek'].'</td>';
					$result .= '<td>'.$list['keterangan'].'</td>';
					$result .= '<td class="kolom-tengah">'.$list['rate'].' <span class="glyphicon glyphicon-star"></span> </td>';
					$result .= '<td class="kolom-tengah">'.$list['forum_create_by'].'</td>';
					$result .= '<td class="kolom-tengah">
									<a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target="#edit_forum"> <span class="glyphicon glyphicon-edit"></span> </a> 
			                		<a class="btn btn-danger btn-xs" href="#"><span class="glyphicon glyphicon-trash"></span></a>
			                	</td>';
					$result .= '</tr>';
					$i++;
				}

				$result .= '</tbody';
				$result .= '</table>';

			}

			return Response::json(array(
				'result'=>$result
			));

			// $response = array (
	  //           'result' => $result
	  //       );

	  //       echo json_encode($response);

		} else {
			return redirect('login');
		}
	}


	public function forum_add() {
		if(session('id_group') == 3) {

			$nama_forum = Input::get('add_nama_forum');
			$role_access = Input::get('add_role_access');
			$subyek = Input::get('add_subyek');
			$keterangan = Input::get('add_keterangan');
			$isi = Input::get('add_isi');

			$data_forum_add = DB::insert('insert into forum values (
										id_forum = "3", 
										nama_forum = "'.$nama_forum.'", 
										role_access = "'.$role_access.'", 
										subyek = "'.$subyek.'", 
										keterangan = "'.$keterangan.'", 
										isi = "'.$isi.'", 
										rate = "0", 
										forum_create = "'.date('Y-m-d H:i:s').'",
										forum_create_by = "admin")');

			return view('view_admin/forum/index')->with($data_forum_add);

		} else {
			return redirect('login');
		}
	}


	public function forum_edit() {

	}


	public function forum_isi() {
		if(session('id_group') == 3) {
			return view('view_admin/forum/forum');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- NILAI --------------------------------------------------------

	public function nilai() {
		if(session('id_group') == 3) {
			return view('view_admin/nilai/index');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- SETTING USER --------------------------------------------------------

	public function setting_user() {
		if(session('id_group') == 3) {
			return view('view_admin/user/index');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- SETTING GRUP --------------------------------------------------------

	public function setting_grup() {
		if(session('id_group') == 3) {
			return view('view_admin/grup/index');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- PROFILE --------------------------------------------------------

	public function profile() {
		if(session('id_group') == 3) {
			return view('view_admin/setting/profile');
		}
		else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- CHANGE PASSWORD --------------------------------------------------------

	public function change_password() {
		if(session('id_group') == 3) {
			return view('view_admin/setting/change_pass');
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

	public function test_commit() {
		echo 'test komit nih';
	}

	// public function user_data() {
	// 	if(session('id_group') == 3) {
	// 		return DB::table('user')->get();
	// 	}
	// 	else {
	// 		return redirect('login');
	// 	}
	// }


}

