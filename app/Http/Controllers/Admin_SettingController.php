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

class Admin_SettingController extends Controller {

	public $status = false;

// ------------------------------------------------------- USER ---------------------------------------------------------


	public function user() {
		if(session('id_group') == 3) {
				
			return view('view_admin/user/index');

		} else {
			return redirect('login');
		}
	}


	public function user_get_list() {
		
		if(session('id_group') == 3) {

			$search_by = trim(Input::get('search_by'));
			$search_input = trim(Input::get('search_input'));

			if(Input::get('paging') == null) {
				$nopage = 1;
	        }
	        else{
	            $nopage = Input::get('paging');
	        }


			if ($search_by != null) {
				$sql_ext = "and ".$search_by." like '%".$search_input."%'";
			} else {
				$sql_ext = "";
			}

			$data_rows = DB::select('select a.*,b.nama_group from users a join groups b where a.id_group=b.id_group '.$sql_ext);
			$total_rows = count($data_rows);

			if($total_rows < 1) {
	            $total_rows = 1;
	        }
	        $per_page = '10';
	        $total_page = ceil($total_rows / $per_page);

	        if($nopage > $total_page) {
	            $nopage = $total_page;
	        }

	        $offset = ($nopage - 1) * $per_page;

			$data_user = DB::select('select a.*,b.nama_group from users a join groups b where a.id_group=b.id_group '.$sql_ext.' ORDER BY id_user ASC LIMIT '.$per_page.' OFFSET '.$offset);

			$limit_start = $offset + 1;

	        $prev = $nopage - 1;
	        $next = $nopage + 1;

	        $paging = '';

	        if ($nopage > 1) $paging .= '<li><a href="#" aria-label="Previous" id="'.$prev.'"> <span aria-hidden="true">&laquo;</span> </a></li>';

	        // memunculkan nomor halaman dan linknya

	        for($page = 1; $page <= $total_page; $page++){
	            if ((($page >= $nopage - 3) && ($page <= $nopage + 3)) || ($page == 1) || ($page == $total_page)){
	                if ($page == $nopage) $paging .= '<li class="active"><a href="#">'.$page.'</a></li>';
	                else $paging .= '<li><a href="#" id="'.$page.'">'.$page.'</a></li>';
	            }
	        }

	        if ($nopage < $total_page) $paging .= '<li><a href="#" aria-label="Next" id="'.$next.'"> <span aria-hidden="true">&raquo;</span> </a></li>';

			$result = '';

			$result .= '<table class="table table-hover table-bordered table-striped">';
			$result .= '<thead class="index">';
			$result .= '<tr>';
			$result .= '<th>No</th>';
			$result .= '<th>ID User</th>';
			$result .= '<th>Nama User</th>';
			$result .= '<th>Nama Grup</th>';
			$result .= '<th>Disabled</th>';
			$result .= '<th><span class="glyphicon glyphicon-wrench"></span></th>';
			$result .= '</tr>';
			$result .= '</thead>';
			$result .= '<tbody class="index">';

			if ($data_user != true) {

				$result .= '<tr>';
				$result .= '<td colspan="6">No Data In Database</td>';
				$result .= '</tr>';
				$result .= '</tbody>';
				$result .= '</table>';

			} else {

				$i = $limit_start;
				foreach ($data_user as $row => $list) {
					$list = get_object_vars($list);
					$result .= '<tr>';
					$result .= '<td width="60px;" class="kolom-tengah">'.$i.'</td>';
					$result .= '<td class="kolom-kiri">'.$list['id_user'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['username'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['nama_group'].'</td>';
					$result .= '<td width="100px;" class="kolom-tengah">'.$list['is_disabled'].'</td>';
					$result .= '<td width="100px;" class="kolom-tengah">
									<a class="btn btn-success btn-xs" onClick="getEdit('.$list['id_user'].')" data-toggle="modal" data-target="#edit_user"> <span class="glyphicon glyphicon-edit"></span> </a> 
			                		<a id="btn_delete'.$list['id_user'].'" class="btn btn-danger btn-xs" onClick="deleteUser('.$list['id_user'].')" data-delete="Apakah anda yakin ingin menghapus user '.$list['username'].'?"><span class="glyphicon glyphicon-trash"></span></a>
			                	</td>';
					$result .= '</tr>';
					$i++;
				}

				$result .= '</tbody';
				$result .= '</table>';

			}

			$response = array (
	            'result' => $result,
	            'paging' => $paging
	        );

	        echo json_encode($response);

		} else {
			return redirect('login');
		}
	}


	public function user_add() {

		if(session('id_group') == 3) {

			$id_user = Input::get('id_user');
			$username = Input::get('username');
			$password = Input::get('password');
			$nama_group = Input::get('nama_group');
			$disabled = Input::get('disabled');

			$data_add = DB::insert('insert into users values ("'.$id_user.'", "'.$username.'", "'.$password.'", "'.$nama_group.'", "'.$disabled.'", "'.date('Y-m-d H:i:s').'", "'.session('username').'", "'.date('Y-m-d H:i:s').'", "'.session('username').'")');

			$this->json['sukses'] = 'User berhasil dibuat';
			echo json_encode($this->json);

		} else {
			return redirect('login');
		}

	}


	public function user_delete() {

		if(session('id_group') == 3) {

			$id_user = trim(Input::get('id_user'));
				
			$data_delete = DB::delete('delete from users where id_user = "'.$id_user.'"');

			$this->json['sukses'] = 'User berhasil dihapus';
			echo json_encode($this->json);

		} else {
			return redirect('login');
		}
	
	}


	public function user_get_edit() {

		if(session('id_group') == 3) {

			$id_user = trim(Input::get('id_user'));
				
			$data_edit = DB::select('select * from users where id_user="'.$id_user.'"');

			foreach ($data_edit as $list => $row) {
				$row = get_object_vars($row);
				$data_row = [

					'id_user'		=>	$row['id_user'],
					'username'		=>	$row['username'],
					'password'		=>	$row['password'],
					'id_group'		=>	$row['id_group'],
					'is_disabled'	=>	$row['is_disabled']

					];
			}

			$response = array (
	            'data' => $data_row
	        );

			echo json_encode($response);

		} else {
			return redirect('login');
		}

	}


	function user_edit() {

		if(session('id_group') == 3) {

			$id_user 	= Input::get('id_user');
			$username 	= Input::get('username');
			$password 	= Input::get('password');
			$nama_group = Input::get('nama_group');
			$disabled 	= Input::get('disabled');

			$data_update =  DB::update('update users set username = "'.$username.'", password = "'.$password.'", id_group = "'.$nama_group.'", is_disabled = "'.$disabled.'", user_modified = "'.date('Y-m-d H:i:s').'", user_modified_by = "'.session('username').'" where id_user="'.$id_user.'"');

			$this->json['sukses'] = 'User berhasil diubah';
			echo json_encode($this->json);

		} else {
			return redirect('login');
		}

	}


// ------------------------------------------------------- PELAJARAN ---------------------------------------------------------

	public function pelajaran() {
		if(session('id_group') == 3) {
				
			return view('view_admin/pelajaran/index');

		} else {
			return redirect('login');
		}
	}


	public function pelajaran_get_list() {
		
		if(session('id_group') == 3) {

			$search_by = trim(Input::get('search_by'));
			$search_input = trim(Input::get('search_input'));

			if(Input::get('paging') == null) {
				$nopage = 1;
	        }
	        else{
	            $nopage = Input::get('paging');
	        }


			if ($search_by != null) {
				$sql_ext = "and ".$search_by." like '%".$search_input."%'";
			} else {
				$sql_ext = "";
			}

			$data_rows = DB::select('select a.*,b.nama_jurusan from pelajaran a join jurusan b where a.id_jurusan=b.id_jurusan '.$sql_ext);
			$total_rows = count($data_rows);

			if($total_rows < 1) {
	            $total_rows = 1;
	        }
	        $per_page = '10';
	        $total_page = ceil($total_rows / $per_page);

	        if($nopage > $total_page) {
	            $nopage = $total_page;
	        }

	        $offset = ($nopage - 1) * $per_page;

			$data_pelajaran = DB::select('select a.*,b.nama_jurusan from pelajaran a join jurusan b where a.id_jurusan=b.id_jurusan '.$sql_ext.' ORDER BY id_pelajaran ASC LIMIT '.$per_page.' OFFSET '.$offset);

			$limit_start = $offset + 1;

	        $prev = $nopage - 1;
	        $next = $nopage + 1;

	        $paging = '';

	        if ($nopage > 1) $paging .= '<li><a href="#" aria-label="Previous" id="'.$prev.'"> <span aria-hidden="true">&laquo;</span> </a></li>';

	        // memunculkan nomor halaman dan linknya

	        for($page = 1; $page <= $total_page; $page++){
	            if ((($page >= $nopage - 3) && ($page <= $nopage + 3)) || ($page == 1) || ($page == $total_page)){
	                if ($page == $nopage) $paging .= '<li class="active"><a href="#">'.$page.'</a></li>';
	                else $paging .= '<li><a href="#" id="'.$page.'">'.$page.'</a></li>';
	            }
	        }

	        if ($nopage < $total_page) $paging .= '<li><a href="#" aria-label="Next" id="'.$next.'"> <span aria-hidden="true">&raquo;</span> </a></li>';

			$result = '';

			$result .= '<table class="table table-hover table-bordered table-striped">';
			$result .= '<thead class="index">';
			$result .= '<tr>';
			$result .= '<th>No</th>';
			$result .= '<th>Nama Pelajaran</th>';
			$result .= '<th>Nama Jurusan</th>';
			$result .= '<th><span class="glyphicon glyphicon-wrench"></span></th>';
			$result .= '</tr>';
			$result .= '</thead>';
			$result .= '<tbody class="index">';

			if ($data_pelajaran != true) {

				$result .= '<tr>';
				$result .= '<td colspan="4">No Data In Database</td>';
				$result .= '</tr>';
				$result .= '</tbody>';
				$result .= '</table>';

			} else {

				$i = $limit_start;
				foreach ($data_pelajaran as $row => $list) {
					$list = get_object_vars($list);
					$result .= '<tr>';
					$result .= '<td width="60px;" class="kolom-tengah">'.$i.'</td>';
					$result .= '<td class="kolom-kiri">'.$list['nama_pelajaran'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['nama_jurusan'].'</td>';
					$result .= '<td width="100px;" class="kolom-tengah">
									<a class="btn btn-success btn-xs" onClick="getEdit('.$list['id_pelajaran'].')" data-toggle="modal" data-target="#edit_pelajaran"> <span class="glyphicon glyphicon-edit"></span> </a> 
			                		<a id="btn_delete'.$list['id_pelajaran'].'" class="btn btn-danger btn-xs" onClick="deletePelajaran('.$list['id_pelajaran'].')" data-delete="Apakah anda yakin ingin menghapus pelajaran '.$list['nama_pelajaran'].'?"><span class="glyphicon glyphicon-trash"></span></a>
			                	</td>';
					$result .= '</tr>';
					$i++;
				}

				$result .= '</tbody';
				$result .= '</table>';

			}

			$response = array (
	            'result' => $result,
	            'paging' => $paging
	        );

	        echo json_encode($response);

		} else {
			return redirect('login');
		}
	}


	public function pelajaran_add() {

		if(session('id_group') == 3) {

			$nama_jurusan 	= Input::get('nama_jurusan');
			$nama_pelajaran = Input::get('nama_pelajaran');
			
			$data_add = DB::insert('insert into pelajaran values ("", "'.$nama_jurusan.'", "'.$nama_pelajaran.'")');

			$this->json['sukses'] = 'Pelajaran berhasil dibuat';
			echo json_encode($this->json);

		} else {
			return redirect('login');
		}

	}


	public function pelajaran_delete() {

		if(session('id_group') == 3) {

			$id_pelajaran = trim(Input::get('id_pelajaran'));
				
			$data_delete = DB::delete('delete from pelajaran where id_pelajaran = "'.$id_pelajaran.'"');

			$this->json['sukses'] = 'Pelajaran berhasil dihapus';
			echo json_encode($this->json);

		} else {
			return redirect('login');
		}
	
	}


	public function pelajaran_get_edit() {

		if(session('id_group') == 3) {

			$id_pelajaran = trim(Input::get('id_pelajaran'));
				
			$data_edit = DB::select('select * from pelajaran where id_pelajaran="'.$id_pelajaran.'"');

			foreach ($data_edit as $list => $row) {
				$row = get_object_vars($row);
				$data_row = [

					'id_pelajaran'		=>	$row['id_pelajaran'],
					'id_jurusan'		=>	$row['id_jurusan'],
					'nama_pelajaran'	=>	$row['nama_pelajaran']

					];
			}

			$response = array (
	            'data' => $data_row
	        );

			echo json_encode($response);

		} else {
			return redirect('login');
		}

	}


	function pelajaran_edit() {

		if(session('id_group') == 3) {

			$id_pelajaran 		= Input::get('id_pelajaran');
			$nama_pelajaran 	= Input::get('nama_pelajaran');
			$nama_jurusan		= Input::get('nama_jurusan');

			$data_update =  DB::update('update pelajaran set id_jurusan="'.$nama_jurusan.'", nama_pelajaran="'.$nama_pelajaran.'" where id_pelajaran="'.$id_pelajaran.'"');

			$this->json['sukses'] = 'Pelajaran berhasil diubah';
			echo json_encode($this->json);

		} else {
			return redirect('login');
		}

	}


}