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

	public function materi_get_list(){
		if(session('id_group') == 1){
			$search_by = trim(Input::get('search_by'));
			$search_input = trim(Input::get('search_input'));

			if($search_by != null) {
				$sql_ext = "and ".$search_by." like '%".$search_input."%'";
			}else {
				$sql_ext = "";
			}

			$data_materi = DB::select('select a.*, b.nama_pelajaran, c.nama from materi a JOIN pelajaran b JOIN guru c where a.id_pelajaran = b.id_pelajaran and a.nik = c.nik '.$sql_ext);

			$result = '';

			$result .= '<table class="table table-hover table-bordered table-striped">';
			$result .= '<thead class="index">';
			$result .= '<tr>';
			$result .= '<th>No.</th>';
			$result .= '<th>Nama Materi</th>';
			$result .= '<th>Pelajaran</th>';			
			$result .= '<th>Nama Guru</th>';
			$result .= '<th>Waktu Unggah</th>';
			$result .= '<th><span class="glyphicon glyphicon-wrench"></span></th>';
			$result .= '<th><span class="glyphicon glyphicon-folder-open"></span></th>';
			$result .= '</tr>';
			$result .= '</thead>';
			$result .= '<tbody class="index">';

			if ($data_materi != true) {

				$result .= '<tr>';
				$result .= '<td colspan="9">No Data In Database</td>';
				$result .= '</tr>';
				$result .= '</tbody>';
				$result .= '</table>';

			} else {

				$i = 1;
				foreach ($data_materi as $row => $list) {
					$list = get_object_vars($list);
					$result .= '<tr>';
					$result .= '<td class="kolom-tengah">'.$i.'</td>';
					$result .= '<td>'.$list['nama_materi'].'</td>';
					$result .= '<td>'.$list['nama_pelajaran'].'</td>';					
					$result .= '<td>'.$list['nama'].'</td>';
					$result .= '<td>'.$list['create_date'].'</td>';
			        $result .= '<td class="kolom-tengah"><a class="btn btn-xs btn-warning" href="/elfis/siswa/materi_detail" title="buka">
									<span class="glyphicon glyphicon-new-window"></span></a>
								</td>';
					$result .= '</tr>';
					$i++;
				}

				$result .= '</tbody';
				$result .= '</table>';
			}

			//return Response()->json(array('result' => $result));
			$response = array (
	            'result' => $result
	        );

	        echo json_encode($response);

		} else {
			return redirect('login');
		}
	}

	// 

	public function soal() {
		if(session('id_group') == 1) {
			return view('view_siswa/materi/indexSoal');
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

	public function materi_detail() {
		if(session('id_group') == 1) {
			return view('view_siswa/materi/detail');
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