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

	public function getTugas() {

		if(session('id_group') == 1) {

			$get_tugas = DB::select('select DISTINCT * from tugas ORDER BY id_tugas ASC');

			$tugas = "";
			foreach ($get_tugas as $key => $value) {
				$value = get_object_vars($value);
				$tugas[] = array(
                    'id_tugas' => $value['id_tugas'],
                    'nama_tugas' => $value['nama_tugas']
                );
			}

			return ['data' => $tugas];

		} else {
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

	public function tugas_get_list() {
		if(session('id_group') == 1) {
			
			$search_by = trim(Input::get('search_by'));
			$search_input = trim(Input::get('search_input'));			

			if ($search_by != null) {
				$sql_ext = "and ".$search_by." LIKE '%".$search_input."%'";
			} else {
				$sql_ext = "";
			}

			$data_tugas = DB::select('select a.*, b.id_materi, b.nama_materi, c.id_pelajaran, c.nama_pelajaran from tugas a JOIN materi b JOIN pelajaran c where a.id_materi = b.id_materi and b.id_pelajaran = c.id_pelajaran '.$sql_ext);


			$result = '';

			$result	.= '<table class="table table-hover table-bordered table-striped">';
			$result	.= '<thead class="index">';
			$result	.= '<tr>';
			$result	.= '<th>No</th>';
			$result	.= '<th>Nama Tugas</th>';
			$result	.= '<th>Materi</th>';
			$result	.= '<th>Pelajaran</th>';
			$result	.= '<th>Tanggal Mulai</th>';
			$result	.= '<th>Tanggal Selesai</th>';
			$result	.= '<th><span class="glyphicon glyphicon-folder-open"></span></th>';
			$result	.= '</tr>';
			$result	.= '</thead>';
			$result	.= '<tbody class="index">';

			if ($data_tugas != true) {

				$result .= '<tr>';
				$result .= '<td colspan="7">No Data In Database</td>';
				$result .= '</tr>';
				$result .= '</tbody>';
				$result .= '</table>';

			} else {

				$i = 1;
				foreach ($data_tugas as $row => $list) {

					$list = get_object_vars($list);

					$result .= '<tr>';
					$result .= '<td class="kolom-tengah">'.$i.'</td>';
					$result .= '<td>'.$list['nama_tugas'].'</td>';
					$result .= '<td>'.$list['nama_materi'].'</td>';
					$result .= '<td>'.$list['nama_pelajaran'].'</td>';
					$result .= '<td>'.$list['tugas_mulai'].'</td>';
					$result .= '<td>'.$list['tugas_selesai'].'</td>';
			        $result .= '<td class="kolom-tengah">
								<a class="btn btn-xs btn-warning" href="/elfis/siswa/tugas_detail?id_tugas=' . $list['id_tugas'] . '" title="Detail">
								<span class="glyphicon glyphicon-new-window"></span>
								</a>
								</td>';
					$result .= '</tr>';
					$i++;
				}

				$result .= '</tbody>';
				$result .= '</table>';

			}

			$response = array (
	            'result' => $result
	        );

	        echo json_encode($response);

		}
		else {
			return redirect('login');
		}
	}

	public function tugas_detail() {
		if(session('id_group') == 1) {
			

			$data_tugas = DB::table('tugas')
			->join('materi', 'tugas.id_materi', '=', 'materi.id_materi')
			->join('pelajaran', 'materi.id_pelajaran', '=', 'pelajaran.id_pelajaran')
			->where('tugas.id_tugas', '=', Input::get('id_tugas'))
			->get(['tugas.*', 'materi.nama_materi', 'pelajaran.nama_pelajaran']);

			$result = [];

			foreach ($data_tugas as $key => $value) {
				foreach ($value as $k => $v) {
					$result[$k] = $v;
				}
			}
			// 'select  from tugas a JOIN materi b JOIN pelajaran c where a.id_materi = b.id_materi and b.id_pelajaran = c.id_pelajaran and a.id_tugas = "' . Input::get('id_tugas') . '"');

			return view('view_siswa/tugas/detail', ['data_tugas' => $result]);

			
		}	
		else {
			return redirect('login');
		}
	}

	public function jawaban_add() {

		if(session('id_group') == 1) {

			$id_tugas = Input::get('add_nama_tugas');
			$nis = Input::get('add_nis');

			$file_name = "";


			if(Input::hasFile('add_file_jawaban')) {
				$file_name = $nis . '_' . $id_tugas . '.' . Input::file('add_file_jawaban')->getClientOriginalExtension();
				$path = public_path('uploads/file_jawaban_tugas');
				Input::file('add_file_jawaban')->move($path, $file_name);
			}

			$add_data_jawaban = DB::insert('insert into jawaban_tugas values ("", '.$id_tugas.', "'.$nis.'", "'.$file_name.'", "'.date('Y-m-d').'", "'.session('username').'")');

			return 'Data telah tersimpan';
		
		} else {	
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


	public function kuis_get_list() {
		if(session('id_group') == 1) {

			$search_by = trim(Input::get('search_by'));
			$search_input = trim(Input::get('search_input'));

			if ($search_by != null) {
				$sql_ext = "and ".$search_by." like '%".$search_input."%'";
			} else {
				$sql_ext = "";
			}

			$data_kuis = DB::select('select a.*,b.nama_materi,c.nama from group_kuis a join materi b join guru c where a.id_materi=b.id_materi and b.nik=c.nik '.$sql_ext);

			$result = '';

			$result .= '<table class="table table-hover table-bordered table-striped">';
			$result .= '<thead class="index">';
			$result .= '<tr>';
			$result .= '<th>No</th>';
			$result .= '<th>Nama Kuis</th>';
			$result .= '<th>Nama Materi</th>';
			$result .= '<th>Nama Guru</th>';
			$result .= '<th>Tanggal Mulai</th>';
			$result .= '<th>Tanggal Selesai</th>';
			$result .= '<th>Durasi Kuis</th>';
			$result .= '<th><span class="glyphicon glyphicon-folder-open"></span></th>';
			$result .= '</tr>';
			$result .= '</thead>';
			$result .= '<tbody class="index">';

			if ($data_kuis != true) {

				$result .= '<tr>';
				$result .= '<td colspan="8">No Data In Database</td>';
				$result .= '</tr>';
				$result .= '</tbody>';
				$result .= '</table>';

			} else {

				$i = 1;
				foreach ($data_kuis as $row => $list) {
					$list = get_object_vars($list);

					// $mulai = date("Y-m-d"); 
					// $selesai = date("y-M-d");

					$result .= '<tr>';
					$result .= '<td class="kolom-tengah">'.$i.'</td>';
					$result .= '<td class="kolom-kiri">'.$list['nama_group_kuis'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['nama_materi'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['nama'].'</td>';
					$result .= '<td class="kolom-kanan">'.$list['kuis_mulai'].'</td>';
					$result .= '<td class="kolom-kanan">'.$list['kuis_selesai'].'</td>';
					$result .= '<td class="kolom-kanan">'.$list['durasi'].'</td>';
			        $result .= '<td class="kolom-tengah"><a class="btn btn-xs btn-warning" href="/elfis/admin/soal">
									<span class="glyphicon glyphicon-new-window"></span></a>
								</td>';
					$result .= '</tr>';
					$i++;
				}

				$result .= '</tbody';
				$result .= '</table>';

			}

			$response = array (
	            'result' => $result
	        );

	        echo json_encode($response);

		} else {
			return redirect('login');
		}
	}


// -------------------------------------------------------- ULANGAN --------------------------------------------------------

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