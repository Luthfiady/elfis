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


	public function getMateri() {

		if(session('id_group') == 3) {

			$get_materi = DB::select('select DISTINCT * from materi ORDER BY id_materi ASC');

			$materi = "";
			foreach ($get_materi as $key => $value) {
				$value = get_object_vars($value);
				$materi[] = array(
                    'id_materi' => $value['id_materi'],
                    'nama_materi' => $value['nama_materi']
                );
					// $materi .= $value['id_materi'];
					// $materi .= $value['nama_materi'];
			}

			return ['data' => $materi];

		} else {
			return redirect('login');
		}

	}


	public function getKelas() {

		if(session('id_group') == 3) {

			$get_kelas = DB::select('select DISTINCT * from kelas ORDER BY id_kelas ASC');

			$kelas = "";
			foreach ($get_kelas as $key => $value) {
				$value = get_object_vars($value);
				$kelas[] = array(
                    'id_kelas' => $value['id_kelas'],
                    'nama_kelas' => $value['nama_kelas']
                );
			}

			return ['data' => $kelas];

		} else {
			return redirect('login');
		}

	}


	public function getPelajaran() {

		if(session('id_group') == 3) {

			$get_pelajaran = DB::select('select DISTINCT * from pelajaran ORDER BY id_pelajaran ASC');

			$pelajaran = "";
			foreach ($get_pelajaran as $key => $value) {
				$value = get_object_vars($value);
				$pelajaran[] = array(
                    'id_pelajaran' => $value['id_pelajaran'],
                    'nama_pelajaran' => $value['nama_pelajaran']
                );
			}

			return ['data' => $pelajaran];

		} else {
			return redirect('login');
		}

	}

	public function getTugas() {

	if(session('id_group') == 3) {

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
		if(session('id_group') == 3) {
			return view('view_admin/materi/index');
		}
		else {
			return redirect('login');
		}
	}

	public function materi_get_list(){
		if(session('id_group') == 3){
			$search_by = trim(Input::get('search_by'));
			$search_input = trim(Input::get('search_input'));

			if($search_by != null) {
				$sql_ext = "and ".$search_by." like '%".$search_input."%'";
			}else {
				$sql_ext = "";
			}

			$data_materi = DB::select('select a.*, b.nama_pelajaran, c.nama_kelas, d.nama from materi a JOIN pelajaran b JOIN kelas c JOIN guru d where a.id_pelajaran = b.id_pelajaran and a.id_kelas = c.id_kelas and a.nik = d.nik '.$sql_ext);

			$result = '';

			$result .= '<table class="table table-hover table-bordered table-striped">';
			$result .= '<thead class="index">';
			$result .= '<tr>';
			$result .= '<th>No.</th>';
			$result .= '<th>Nama Materi</th>';
			$result .= '<th>Pelajaran</th>';
			$result .= '<th>Kelas</th>';
			$result .= '<th>Waktu Unggah</th>';
			$result .= '<th>Nama Guru</th>';
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
					$result .= '<td>'.$list['nama_kelas'].'</td>';
					$result .= '<td>'.$list['create_date'].'</td>';
					$result .= '<td>'.$list['nama'].'</td>';
					$result .= '<td class="kolom-tengah">
									<a class="btn btn-success btn-xs" data-toggle="modal" data-target="#editMateri"> <span class="glyphicon glyphicon-edit"></span> </a> 
			                		<a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteMateri"><span class="glyphicon glyphicon-trash"></span></a>
			                	</td>';
			        $result .= '<td class="kolom-tengah"><a class="btn btn-xs btn-warning" href="/elfis/admin/materi_detail">
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

	public function materi_add() {

		if(session('id_group') == 3) {

			$id_pelajaran = Input::get('addPelajaran');
			$id_kelas = Input::get('addKelas');
			$nama = Input::get('addNama');
			$nama_materi = Input::get('addNamaMateri');
			$isi = Input::get('addIsiMateri');
			$file = Input::get('addFileUpload');

			$add_data_materi = DB::insert('insert into materi values ("", '.$id_pelajaran.', '.$id_kelas.', "'.$nama.'", "'.$isi.'", "'.$file.'", "'.date('Y-m-d').'", "'.session('username').'")'); 

			$this->json['pesan'] = 'Data telah tersimpan';
			echo json_encode($this->json);
		
		} else {	
			return redirect('login');
		}

	}

	// 

	public function soal(){
		if(session('id_group') == 3) {
			return view('view_admin/materi/indexSoal');
		}
		else {
			return redirect('login');
		}
	}

	public function latihanSoal_get_list(){
		if(session('id_group') == 3){
			$search_by = trim(Input::get('search_by'));
			$search_input = trim(Input::get('search_input'));

			if($search_by != null) {
				$sql_ext = "and ".$search_by." like '%".$search_input."%'";
			}else {
				$sql_ext = "";
			}

			$data_soal = DB::select('select a.*, b.nama_materi, c.nama_pelajaran, d.nama_kelas from soal_latihan a JOIN materi b JOIN pelajaran c JOIN kelas d where a.id_materi = b.id_materi and a.id_pelajaran = c.id_pelajaran and a.id_kelas = d.id_kelas '.$sql_ext);

			$result = '';

			$result .= '<table class="table table-hover table-bordered table-striped">';
			$result .= '<thead class="index">';
			$result .= '<tr>';
			$result .= '<th>No.</th>';
			$result .= '<th>Nama Soal</th>';
			$result .= '<th>Materi</th>';
			$result .= '<th>Pelajaran</th>';
			$result .= '<th>Kelas</th>';
			$result .= '<th>Waktu Unggah</th>';
			$result .= '<th><span class="glyphicon glyphicon-wrench"></span></th>';
			$result .= '<th><span class="glyphicon glyphicon-folder-open"></span></th>';
			$result .= '</tr>';
			$result .= '</thead>';
			$result .= '<tbody class="index">';

			if ($data_soal != true) {

				$result .= '<tr>';
				$result .= '<td colspan="9">No Data In Database</td>';
				$result .= '</tr>';
				$result .= '</tbody>';
				$result .= '</table>';

			} else {

				$i = 1;
				foreach ($data_soal as $row => $list) {
					$list = get_object_vars($list);
					$result .= '<tr>';
					$result .= '<td class="kolom-tengah">'.$i.'</td>';
					$result .= '<td>'.$list['nama_soal'].'</td>';
					$result .= '<td>'.$list['nama_materi'].'</td>';
					$result .= '<td>'.$list['nama_pelajaran'].'</td>';
					$result .= '<td>'.$list['nama_kelas'].'</td>';
					$result .= '<td>'.$list['create_date'].'</td>';
					$result .= '<td class="kolom-tengah">
									<a class="btn btn-success btn-xs" data-toggle="modal" data-target="#editSoal" title="edit"> <span class="glyphicon glyphicon-edit"></span> </a> 
			                		<a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteSoal" title="hapus"><span class="glyphicon glyphicon-trash"></span></a>
			                	</td>';
			        $result .= '<td class="kolom-tengah"><a class="btn btn-xs btn-warning" href="/elfis/admin/materi_detail">
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

	public function materi_detail() {
		if(session('id_group') == 3) {
			return view('view_admin/materi/detail');
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

	public function tugas_get_list() {
		if(session('id_group') == 3) {
			
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
			$result	.= '<th><span class="glyphicon glyphicon-wrench"></span></th>';
			$result	.= '<th><span class="glyphicon glyphicon-folder-open"></span></th>';
			$result	.= '</tr>';
			$result	.= '</thead>';
			$result	.= '<tbody class="index">';

			if ($data_tugas != true) {

				$result .= '<tr>';
				$result .= '<td colspan="8">No Data In Database</td>';
				$result .= '</tr>';
				$result .= '</tbody>';
				$result .= '</table>';

			} else {

				$i = 1;
				foreach ($data_tugas as $row => $list) {

					

					$list = get_object_vars($list);

					$data_test = "'" . $list['id_tugas'] . "','" . $list['nama_tugas'] .  "','" . $list['id_materi'] . "','" . $list['isi'] . "','" . $list['tugas_mulai'] . "','" . $list['tugas_selesai'] . "','" . $list['durasi'] . "','" . $list['file'] .  "'";

					$result .= '<tr>';
					$result .= '<td class="kolom-tengah">'.$i.'</td>';
					$result .= '<td>'.$list['nama_tugas'].'</td>';
					$result .= '<td>'.$list['nama_materi'].'</td>';
					$result .= '<td>'.$list['nama_pelajaran'].'</td>';
					$result .= '<td>'.$list['tugas_mulai'].'</td>';
					$result .= '<td>'.$list['tugas_selesai'].'</td>';
					$result .= '<td class="kolom-tengah">
									<a class="btn btn-xs btn-success" data-toggle="modal" data-target="#edit_tugas" 
									onclick="open_tugas_edit(' . $data_test . ')"
									title="Ubah">
									<span class="glyphicon glyphicon-edit"></span></a>
			                		<a id="btn_delete'.$list['id_tugas'].'" title="Hapus" class="btn btn-danger btn-xs" onClick="deleteData('.$list['id_tugas'].')" data-delete="Apakah anda yakin ingin menghapus tugas '.$list['nama_tugas'].'?"><span class="glyphicon glyphicon-trash"></span></a>
			                	</td>';
			        $result .= '<td class="kolom-tengah">
								<a class="btn btn-xs btn-warning" href="/elfis/admin/tugas_detail?id_tugas=' . $list['id_tugas'] . '" title="Detail">
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

	public function tugas_add() {

		if(session('id_group') == 3) {

			$nama_tugas = Input::get('add_nama_tugas');
			$id_materi = Input::get('add_nama_materi');
			$isi = Input::get('add_isi');
			$tugas_mulai = Input::get('add_tugas_mulai');
			$tugas_selesai = Input::get('add_tugas_selesai');
			$durasi = Input::get('add_tugas_durasi');


			$file_name = "";


			if(Input::hasFile('add_file_tugas')) {
				$file_name = Input::file('add_file_tugas')->getClientOriginalName();
				$path = public_path('uploads/file_tugas');
				Input::file('add_file_tugas')->move($path, $file_name);
			}

			$add_data_tugas = DB::insert('insert into tugas values ("", '.$id_materi.', "'.$nama_tugas.'", "'.$isi.'", "'.$file_name.'", "'.$tugas_mulai.'", "'.$tugas_selesai.'", "'.$durasi.'")');

			return 'Data telah tersimpan';
		
		} else {	
			return redirect('login');
		}

	}

	public function tugas_detail() {
		if(session('id_group') == 3) {
			

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

			return view('view_admin/tugas/detail', ['data_tugas' => $result]);

			
		}	
		else {
			return redirect('login');
		}
	}

	public function tugas_edit() {
		if(session('id_group') == 3) {

			$id_tugas = Input::get('id_tugas');
			$nama_tugas = Input::get('edit_nama_tugas');
			$id_materi = Input::get('edit_id_materi');
			$isi = Input::get('edit_isi');
			$tugas_mulai = Input::get('edit_tanggal_mulai');
			$tugas_selesai = Input::get('edit_tanggal_selesai');
			$durasi = Input::get('edit_durasi');

			$file_name = "";

			if(Input::hasFile('edit_file_tugas')) {
				$file_name = Input::file('edit_file_tugas')->getClientOriginalName();
				$path = public_path('uploads/file_tugas');
				Input::file('edit_file_tugas')->move($path, $file_name);
			}
			else {
				$file_name = Input::get('edit_file_tugas_lama');
			}

			

			// DB::update('update into tugas values ("", '.$id_materi.', "'.$nama_tugas.'", "'.$isi.'", "'.$file_name.'", "'.$tugas_mulai.'", "'.$tugas_selesai.'", "'.$durasi.'")');
			
			DB::table('tugas')
			->where('id_tugas', '=', $id_tugas)
			->update([
				'id_materi' => $id_materi, 
				'nama_tugas' => $nama_tugas, 
				'isi' => $isi, 
				'file' => $file_name, 
				'tugas_mulai' => $tugas_mulai, 
				'tugas_selesai' => $tugas_selesai, 
				'durasi' => $durasi
			]);

			return 'Data telah tersimpan';
			
		} else {	
			return redirect('login');
		}
	}

	public function tugas_delete() {

		if(session('id_group') == 3) {

			$id_tugas = trim(Input::get('id_tugas'));
				
			$data_delete = DB::delete('delete from tugas where id_tugas = "'.$id_tugas.'"');

			$this->json['sukses'] = 'Tugas berhasil dihapus';
			echo json_encode($this->json);

		} else {
			return redirect('login');
		}
	
	}


	public function jawaban_tugas() {
		if(session('id_group') == 3) {
			return view('view_admin/tugas/jawaban_tugas');
		}
		else {
			return redirect('login');
		}
	}

	public function jawaban_get_list() {
		if(session('id_group') == 3) {

			$search_by = trim(Input::get('search_by'));
			$search_input = trim(Input::get('search_input'));

			if ($search_by != null) {
				$sql_ext = "and ".$search_by." like '%".$search_input."%'";
			} else {
				$sql_ext = "";
			}

			$data_jawaban = DB::select('select a.*, b.nama_tugas from jawaban_tugas a JOIN tugas b where a.id_tugas = b.id_tugas '.$sql_ext);

			$result = '';

			$result .= '<table class="table table-hover table-bordered table-striped">';
			$result .= '<thead class="index">';
			$result .= '<tr>';
			$result .= '<th>No</th>';
			$result .= '<th>NIS</th>';
			$result .= '<th>Siswa/i</th>';
			$result .= '<th>Nama Tugas</th>';
			$result .= '<th>Jawaban Tugas</th>';
			$result .= '<th>Tanggal Unggah</th>';
			$result .= '<th><span class="glyphicon glyphicon-folder-open"></span></th>';
			$result .= '</tr>';
			$result .= '</thead>';
			$result .= '<tbody class="index">';

			if ($data_jawaban != true) {

				$result .= '<tr>';
				$result .= '<td colspan="7">No Data In Database</td>';
				$result .= '</tr>';
				$result .= '</tbody>';
				$result .= '</table>';

			} else {

				$i = 1;
				foreach ($data_jawaban as $row => $list) {
					$list = get_object_vars($list);

					$result .= '<tr>';
					$result .= '<td class="kolom-tengah">'.$i.'</td>';
					$result .= '<td>'.$list['nis'].'</td>';
					$result .= '<td>'.$list['upload_by'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['nama_tugas'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['file'].'</td>';
					$result .= '<td>'.$list['tanggal_unggah'].'</td>';
					$result .= '<td class="kolom-tengah">
									<a class="btn btn-info btn-xs" href=../public/uploads/file_jawaban_tugas/' . $list['file'] . ' title="Unduh"><span class="glyphicon glyphicon-download-alt"></span></a>
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

		} else {
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
  

	public function kuis_add() {
		if(session('id_group') == 3) {
			return view('view_admin/kuis/kuis_add');
		}
		else {
			return redirect('login');
		}
	}


	public function kuis_get_list() {
		if(session('id_group') == 3) {

			$search_by = trim(Input::get('search_by'));
			$search_input = trim(Input::get('search_input'));

			if ($search_by != null) {
				$sql_ext = "and ".$search_by." like '%".$search_input."%'";
			} else {
				$sql_ext = "";
			}

			$data_kuis = DB::select('select a.*,b.nama_materi from group_kuis a join materi b where a.id_materi=b.id_materi '.$sql_ext);

			$result = '';

			$result .= '<table class="table table-hover table-bordered table-striped">';
			$result .= '<thead class="index">';
			$result .= '<tr>';
			$result .= '<th>No</th>';
			$result .= '<th>Nama Kuis</th>';
			$result .= '<th>Nama Materi</th>';
			$result .= '<th>Tanggal Mulai</th>';
			$result .= '<th>Tanggal Selesai</th>';
			$result .= '<th>Durasi Kuis</th>';
			$result .= '<th><span class="glyphicon glyphicon-wrench"></span></th>';
			$result .= '</tr>';
			$result .= '</thead>';
			$result .= '<tbody class="index">';

			if ($data_kuis != true) {

				$result .= '<tr>';
				$result .= '<td colspan="7">No Data In Database</td>';
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
					$result .= '<td class="kolom-kanan">'.$list['kuis_mulai'].'</td>';
					$result .= '<td class="kolom-kanan">'.$list['kuis_selesai'].'</td>';
					$result .= '<td class="kolom-kanan">'.$list['durasi'].'</td>';
					$result .= '<td class="kolom-tengah">
									<a href="kuis_get_edit/'.$list['id'].'/'.$list['id_group_kuis'].'" class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-edit"></span> </a> 
			                		<a id="deleteData'.$list['id'].'" class="btn btn-danger btn-xs" onClick="deleteKuis('.$list['id'].')" data-delete="Apakah anda yakin ingin menghapus kuis '.$list['nama_group_kuis'].'?"><span class="glyphicon glyphicon-trash"></span></a>
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


	public function kuis_delete() {

		if(session('id_group') == 3) {

			$id_kuis = trim(Input::get('id_kuis'));

			$select_data = DB::select('select id_group_kuis from group_kuis where id='.$id_kuis);

			foreach ($select_data as $key => $value) {
				$value = get_object_vars($value);
				$id_group_kuis = $value['id_group_kuis'];
			}

			$delete_kuis = DB::delete('delete from group_kuis where id = '.$id_kuis);
			$delete_kuis_soal = DB::delete('delete from kuis where id_group_kuis = "'.$id_group_kuis.'"');

			$this->json['pesan'] = 'Data telah dihapus';
			echo json_encode($this->json);

		} else {
			return redirect('login');
		}

	}


	public function soal_get_param() {

		if(session('id_group') == 3) {

			$get_id = DB::select('select * from param_group_kuis');

			foreach ($get_id as $key => $value) {
				$value = get_object_vars($value);
				$id_kuis = $value['p_id_group_kuis']+1;
			}

			return ['data' => $id_kuis];

		} else {
			return redirect('login');
		}

	}


	public function soal_get_list() {
		if(session('id_group') == 3) {

			$get_id = DB::select('select * from param_group_kuis');

			foreach ($get_id as $key => $value) {
				$value = get_object_vars($value);
				$id_kuis = $value['p_id_group_kuis']+1;
			}

			$data_kuis = DB::select('select * from kuis where id_group_kuis="S00'.$id_kuis.'"');

			$result = '';

			$result .= '<table class="table table-hover table-bordered table-striped table_soal">';
			$result .= '<thead class="index">';
			$result .= '<tr>';
			$result .= '<th width="40px">No</th>';
			$result .= '<th>Soal</th>';
			$result .= '<th>Pilihan A</th>';
			$result .= '<th>Pilihan B</th>';
			$result .= '<th>Pilihan C</th>';
			$result .= '<th>Pilihan D</th>';
			$result .= '<th>Pilihan E</th>';
			$result .= '<th width="90px">Jawaban</th>';
			$result .= '<th width="70px"><span class="glyphicon glyphicon-wrench"></span></th>';
			$result .= '</tr>';
			$result .= '</thead>';
			$result .= '<tbody class="index">';

			if ($data_kuis != true) {

				$result .= '<tr>';
				$result .= '<td colspan="9">Belum ada soal</td>';
				$result .= '</tr>';
				$result .= '</tbody>';
				$result .= '</table>';

			} else {

				$i = 1;
				foreach ($data_kuis as $row => $list) {
					$list = get_object_vars($list);

					$result .= '<tr>';
					$result .= '<td class="kolom-tengah">'.$i.'</td>';
					$result .= '<td class="kolom-kiri">'.$list['soal'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['pil_a'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['pil_b'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['pil_c'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['pil_d'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['pil_e'].'</td>';
					$result .= '<td class="kolom-tengah">'.$list['jawaban'].'</td>';
					$result .= '<td class="kolom-tengah">
									<a class="btn btn-success btn-xs" onClick="getEdit('.$list['id'].')" data-toggle="modal" data-target="#modal-soal-edit"> <span class="glyphicon glyphicon-edit"></span> </a> 
			                		<a id="delete'.$list['id'].'" class="btn btn-danger btn-xs" onClick="deleteSoal('.$list['id'].')" data-delete="Apakah anda yakin ingin menghapus soal ini?"><span class="glyphicon glyphicon-trash"></span></a>
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


	public function soal_add_id() {

		if(session('id_group') == 3) {

			$id_kuis = trim(Input::get('id_kuis'));

			$check_data = DB::select('select id_group_kuis from group_kuis where id_group_kuis = "'.$id_kuis.'"');

			if ($check_data == null) {
				DB::insert('insert into group_kuis (id_group_kuis) values ("'.$id_kuis.'")');
			} else {
				return ['data_null' => 'data null'];
			}

		} else {
			return redirect('login');
		}

	}


	public function soal_add() {

		if(session('id_group') == 3) {

			$id_soal 		= Input::get('id_soal');
			$soal_kuis 		= Input::get('soal_kuis');
			$jwb_a			= Input::get('jwb_a');
			$jwb_b			= Input::get('jwb_b');
			$jwb_c			= Input::get('jwb_c');
			$jwb_d			= Input::get('jwb_d');
			$jwb_e			= Input::get('jwb_e');
			$jawaban		= Input::get('jawaban');

			$add_data_soal = DB::insert('insert into kuis values ("", "'.$id_soal.'", "'.$soal_kuis.'", "'.$jwb_a.'", "'.$jwb_b.'", "'.$jwb_c.'", "'.$jwb_d.'", "'.$jwb_e.'", "'.$jawaban.'")');

			$this->json['pesan'] = 'Data telah tersimpan';
			echo json_encode($this->json);

		} else {
			return redirect('login');
		}

	}


	public function soal_get_edit() {

		if(session('id_group') == 3) {

			$id = trim(Input::get('id'));
				
			$get_edit_data = DB::select('select * from kuis where id = '.$id.'');

			foreach ($get_edit_data as $list => $row) {
				$row = get_object_vars($row);
				$data_row = [

					'id'			=>	$row['id'],
					'soal'			=>	$row['soal'],
					'pil_a'			=>	$row['pil_a'],
					'pil_b'			=>	$row['pil_b'],
					'pil_c'			=>	$row['pil_c'],
					'pil_d'			=>	$row['pil_d'],
					'pil_e'			=>	$row['pil_e'],
					'jawaban'		=>	$row['jawaban']

					];
			}

			$response = array (
	            'soal' => $data_row
	        );

			echo json_encode($response);

		} else {
			return redirect('login');
		}

	}


	public function soal_edit() {

		if(session('id_group') == 3) {
			
			$id 		= trim(Input::get('id'));
			$soal 		= trim(Input::get('soal'));
			$jwb_a 		= trim(Input::get('jwb_a'));
			$jwb_b 		= trim(Input::get('jwb_b'));
			$jwb_c 		= trim(Input::get('jwb_c'));
			$jwb_d 		= trim(Input::get('jwb_d'));
			$jwb_e 		= trim(Input::get('jwb_e'));
			$jawaban 	= trim(Input::get('jawaban'));

			$edit_soal = DB::update('update kuis set soal="'.$soal.'", pil_a="'.$jwb_a.'", pil_b="'.$jwb_b.'", pil_c="'.$jwb_c.'", pil_d="'.$jwb_d.'", pil_e="'.$jwb_e.'", jawaban="'.$jawaban.'" where id="'.$id.'"');

			$this->json['pesan'] = 'Data telah terubah';
			echo json_encode($this->json);

		}
		else {
			return redirect('login');
		}


	}


	public function soal_delete() {

		if(session('id_group') == 3) {
			
			$id = Input::get('id');

			$delete_soal = DB::delete('delete from kuis where id = "'.$id.'"');

			$this->json['pesan'] = 'Data telah terhapus';
			echo json_encode($this->json);

		}
		else {
			return redirect('login');
		}

	}


	public function UpdateGroupKuis() {

		if(session('id_group') == 3) {
			
			$id_after			= Input::get('id_after');
			$id_param 			= Input::get('id_param');
			$id_group_kuis 		= Input::get('id_group_kuis');
			$nama_group_kuis 	= Input::get('nama_group_kuis');
			$id_materi 			= Input::get('id_materi');
			$kuis_mulai 		= Input::get('kuis_mulai');
			$kuis_selesai 		= Input::get('kuis_selesai');
			$durasi 			= Input::get('durasi');

			$add_param_id = DB::update('update param_group_kuis set p_id_group_kuis = '.$id_after.' where p_id_group_kuis = '.$id_param);

			$update_group_kuis = DB::update('update group_kuis set nama_group_kuis="'.$nama_group_kuis.'", id_materi='.$id_materi.', kuis_mulai="'.$kuis_mulai.'", kuis_selesai="'.$kuis_selesai.'", durasi="'.$durasi.'" where id_group_kuis="'.$id_group_kuis.'"');

			$this->json['pesan'] = 'Data telah disimpan';
			echo json_encode($this->json);

		}
		else {
			return redirect('login');
		}

	}


	public function KuisBatal() {

		if(session('id_group') == 3) {
	
			$id_kuis = Input::get('id_kuis');

			$hapus_group = DB::delete('delete from group_kuis where id_group_kuis = "'.$id_kuis.'"');
			$hapus_soal = DB::delete('delete from kuis where id_group_kuis = "'.$id_kuis.'"');

			$this->json['pesan'] = 'Batal membuat kuis';
			echo json_encode($this->json);
		}
		else {
			return redirect('login');
		}

	}


	public function kuis_get_edit($id, $id_group_kuis) {

		if(session('id_group') == 3) {

			return view('view_admin/kuis/kuis_edit')->with('id_kuis', $id)->with('id_group_kuis', $id_group_kuis);

		}
		else {
			return redirect('login');
		}

	}


	public function get_data_kuis() {

		if(session('id_group') == 3) {

			$id_kuis = Input::get('id_kuis');

			$getDataKuis = DB::select('select * from group_kuis where id = '.$id_kuis);

			foreach ($getDataKuis as $key => $row) {
				$row = get_object_vars($row);
				$data_row = [

					'nama_group_kuis'	=>	$row['nama_group_kuis'],
					'id_materi'			=>	$row['id_materi'],
					'kuis_mulai'		=>	$row['kuis_mulai'],
					'kuis_selesai'		=>	$row['kuis_selesai'],
					'durasi'			=>	$row['durasi']

					];
			}

			$response = array (
	            'data_kuis' => $data_row
	        );

			echo json_encode($response);

		}
		else {
			return redirect('login');
		}

	}


	public function soal_list_edit() {

		if(session('id_group') == 3) {

			$id_soal = Input::get('id_soal');

			$data_kuis = DB::select('select * from kuis where id_group_kuis="'.$id_soal.'"');

			$result = '';

			$result .= '<table class="table table-hover table-bordered table-striped table_soal">';
			$result .= '<thead class="index">';
			$result .= '<tr>';
			$result .= '<th width="40px">No</th>';
			$result .= '<th>Soal</th>';
			$result .= '<th>Pilihan A</th>';
			$result .= '<th>Pilihan B</th>';
			$result .= '<th>Pilihan C</th>';
			$result .= '<th>Pilihan D</th>';
			$result .= '<th>Pilihan E</th>';
			$result .= '<th width="90px">Jawaban</th>';
			$result .= '<th width="70px"><span class="glyphicon glyphicon-wrench"></span></th>';
			$result .= '</tr>';
			$result .= '</thead>';
			$result .= '<tbody class="index">';

			if ($data_kuis != true) {

				$result .= '<tr>';
				$result .= '<td colspan="9">Belum ada soal</td>';
				$result .= '</tr>';
				$result .= '</tbody>';
				$result .= '</table>';

			} else {

				$i = 1;
				foreach ($data_kuis as $row => $list) {
					$list = get_object_vars($list);

					$result .= '<tr>';
					$result .= '<td class="kolom-tengah">'.$i.'</td>';
					$result .= '<td class="kolom-kiri">'.$list['soal'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['pil_a'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['pil_b'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['pil_c'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['pil_d'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['pil_e'].'</td>';
					$result .= '<td class="kolom-tengah">'.$list['jawaban'].'</td>';
					$result .= '<td class="kolom-tengah">
									<a class="btn btn-success btn-xs" onClick="getEdit('.$list['id'].')" data-toggle="modal" data-target="#modal-soal-edit"> <span class="glyphicon glyphicon-edit"></span> </a> 
			                		<a id="delete'.$list['id'].'" class="btn btn-danger btn-xs" onClick="deleteSoal('.$list['id'].')" data-delete="Apakah anda yakin ingin menghapus soal ini?"><span class="glyphicon glyphicon-trash"></span></a>
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


	public function UpdateDataKuis() {

		if(session('id_group') == 3) {
			
			$id_kuis 			= Input::get('id_kuis');
			$nama_group_kuis 	= Input::get('edit_nama_kuis');
			$id_materi 			= Input::get('edit_id_materi');
			$kuis_mulai 		= Input::get('edit_kuis_mulai');
			$kuis_selesai 		= Input::get('edit_kuis_selesai');
			$durasi 			= Input::get('edit_durasi');

			$update_group_kuis = DB::update('update group_kuis set nama_group_kuis="'.$nama_group_kuis.'", id_materi='.$id_materi.', kuis_mulai="'.$kuis_mulai.'", kuis_selesai="'.$kuis_selesai.'", durasi="'.$durasi.'" where id="'.$id_kuis.'"');

			$this->json['pesan'] = 'Data telah diubah';
			echo json_encode($this->json);

		}
		else {
			return redirect('login');
		}

	}



// -------------------------------------------------------- ULANGAN --------------------------------------------------------

	public function ulangan() {
		if(session('id_group') == 3) {
			return view('view_admin/ulangan/index');
		}
		else {
			return redirect('login');
		}
	}
  

	public function ulangan_add() {
		if(session('id_group') == 3) {
			return view('view_admin/ulangan/ulangan_add');
		}
		else {
			return redirect('login');
		}
	}


	public function ulangan_get_list() {
		if(session('id_group') == 3) {

			$search_by = trim(Input::get('search_by'));
			$search_input = trim(Input::get('search_input'));

			if ($search_by != null) {
				$sql_ext = "and ".$search_by." like '%".$search_input."%'";
			} else {
				$sql_ext = "";
			}

			$data_ulangan = DB::select('select a.*,b.nama_materi from group_ulangan a join materi b where a.id_materi=b.id_materi '.$sql_ext);

			$result = '';

			$result .= '<table class="table table-hover table-bordered table-striped">';
			$result .= '<thead class="index">';
			$result .= '<tr>';
			$result .= '<th>No</th>';
			$result .= '<th>Nama Ulangan</th>';
			$result .= '<th>Nama Materi</th>';
			$result .= '<th>Tanggal Mulai</th>';
			$result .= '<th>Tanggal Selesai</th>';
			$result .= '<th>Durasi Ulangan</th>';
			$result .= '<th><span class="glyphicon glyphicon-wrench"></span></th>';
			$result .= '</tr>';
			$result .= '</thead>';
			$result .= '<tbody class="index">';

			if ($data_ulangan != true) {

				$result .= '<tr>';
				$result .= '<td colspan="7">No Data In Database</td>';
				$result .= '</tr>';
				$result .= '</tbody>';
				$result .= '</table>';

			} else {

				$i = 1;
				foreach ($data_ulangan as $row => $list) {
					$list = get_object_vars($list);

					// $mulai = date("Y-m-d"); 
					// $selesai = date("y-M-d");

					$result .= '<tr>';
					$result .= '<td class="kolom-tengah">'.$i.'</td>';
					$result .= '<td class="kolom-kiri">'.$list['nama_group_ulangan'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['nama_materi'].'</td>';
					$result .= '<td class="kolom-kanan">'.$list['ulangan_mulai'].'</td>';
					$result .= '<td class="kolom-kanan">'.$list['ulangan_selesai'].'</td>';
					$result .= '<td class="kolom-kanan">'.$list['durasi'].'</td>';
					$result .= '<td class="kolom-tengah">
									<a href="ulangan_get_edit/'.$list['id'].'/'.$list['id_group_ulangan'].'" class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-edit"></span> </a> 
			                		<a id="deleteData'.$list['id'].'" class="btn btn-danger btn-xs" onClick="deleteUlangan('.$list['id'].')" data-delete="Apakah anda yakin ingin menghapus ulangan '.$list['nama_group_ulangan'].'?"><span class="glyphicon glyphicon-trash"></span></a>
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


	public function ulangan_delete() {

		if(session('id_group') == 3) {

			$id_ulangan = trim(Input::get('id_ulangan'));

			$select_data = DB::select('select id_group_ulangan from group_ulangan where id='.$id_ulangan);

			foreach ($select_data as $key => $value) {
				$value = get_object_vars($value);
				$id_group_ulangan = $value['id_group_ulangan'];
			}

			$delete_ulangan = DB::delete('delete from group_ulangan where id = '.$id_ulangan);
			$delete_ulangan_soal = DB::delete('delete from ulangan where id_group_ulangan = "'.$id_group_ulangan.'"');

			$this->json['pesan'] = 'Data telah dihapus';
			echo json_encode($this->json);

		} else {
			return redirect('login');
		}

	}


	public function ulangan_soal_get_param() {

		if(session('id_group') == 3) {

			$get_id = DB::select('select * from param_group_ulangan');

			foreach ($get_id as $key => $value) {
				$value = get_object_vars($value);
				$id_ulangan = $value['p_id_group_ulangan']+1;
			}

			return ['data' => $id_ulangan];

		} else {
			return redirect('login');
		}

	}


	public function ulangan_soal_get_list() {
		if(session('id_group') == 3) {

			$get_id = DB::select('select * from param_group_ulangan');

			foreach ($get_id as $key => $value) {
				$value = get_object_vars($value);
				$id_ulangan = $value['p_id_group_ulangan']+1;
			}

			$data_ulangan = DB::select('select * from ulangan where id_group_ulangan="U00'.$id_ulangan.'"');

			$result = '';

			$result .= '<table class="table table-hover table-bordered table-striped table_soal">';
			$result .= '<thead class="index">';
			$result .= '<tr>';
			$result .= '<th width="40px">No</th>';
			$result .= '<th>Soal</th>';
			$result .= '<th>Pilihan A</th>';
			$result .= '<th>Pilihan B</th>';
			$result .= '<th>Pilihan C</th>';
			$result .= '<th>Pilihan D</th>';
			$result .= '<th>Pilihan E</th>';
			$result .= '<th width="90px">Jawaban</th>';
			$result .= '<th width="70px"><span class="glyphicon glyphicon-wrench"></span></th>';
			$result .= '</tr>';
			$result .= '</thead>';
			$result .= '<tbody class="index">';

			if ($data_ulangan != true) {

				$result .= '<tr>';
				$result .= '<td colspan="9">Belum ada soal</td>';
				$result .= '</tr>';
				$result .= '</tbody>';
				$result .= '</table>';

			} else {

				$i = 1;
				foreach ($data_ulangan as $row => $list) {
					$list = get_object_vars($list);

					$result .= '<tr>';
					$result .= '<td class="kolom-tengah">'.$i.'</td>';
					$result .= '<td class="kolom-kiri">'.$list['soal'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['pil_a'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['pil_b'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['pil_c'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['pil_d'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['pil_e'].'</td>';
					$result .= '<td class="kolom-tengah">'.$list['jawaban'].'</td>';
					$result .= '<td class="kolom-tengah">
									<a class="btn btn-success btn-xs" onClick="getEdit('.$list['id'].')" data-toggle="modal" data-target="#modal-soal-edit"> <span class="glyphicon glyphicon-edit"></span> </a> 
			                		<a id="delete'.$list['id'].'" class="btn btn-danger btn-xs" onClick="deleteSoal('.$list['id'].')" data-delete="Apakah anda yakin ingin menghapus soal ini?"><span class="glyphicon glyphicon-trash"></span></a>
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


	public function ulangan_soal_add_id() {

		if(session('id_group') == 3) {

			$id_ulangan = trim(Input::get('id_ulangan'));

			$check_data_ulangan = DB::select('select id_group_ulangan from group_ulangan where id_group_ulangan = "'.$id_ulangan.'"');

			if ($check_data_ulangan == null) {
				DB::insert('insert into group_ulangan (id_group_ulangan) values ("'.$id_ulangan.'")');
			} else {
				return ['data_null' => 'data null'];
			}

		} else {
			return redirect('login');
		}

	}


	public function ulangan_soal_add() {

		if(session('id_group') == 3) {

			$id_soal 		= Input::get('id_soal');
			$soal_ulangan 	= Input::get('soal_ulangan');
			$jwb_a			= Input::get('jwb_a');
			$jwb_b			= Input::get('jwb_b');
			$jwb_c			= Input::get('jwb_c');
			$jwb_d			= Input::get('jwb_d');
			$jwb_e			= Input::get('jwb_e');
			$jawaban		= Input::get('jawaban');

			$add_data_soal = DB::insert('insert into ulangan values ("", "'.$id_soal.'", "'.$soal_ulangan.'", "'.$jwb_a.'", "'.$jwb_b.'", "'.$jwb_c.'", "'.$jwb_d.'", "'.$jwb_e.'", "'.$jawaban.'")');

			$this->json['pesan'] = 'Data telah tersimpan';
			echo json_encode($this->json);

		} else {
			return redirect('login');
		}

	}


	public function ulangan_soal_get_edit() {

		if(session('id_group') == 3) {

			$id = trim(Input::get('id'));
				
			$get_edit_data = DB::select('select * from ulangan where id = '.$id.'');

			foreach ($get_edit_data as $list => $row) {
				$row = get_object_vars($row);
				$data_row = [

					'id'			=>	$row['id'],
					'soal'			=>	$row['soal'],
					'pil_a'			=>	$row['pil_a'],
					'pil_b'			=>	$row['pil_b'],
					'pil_c'			=>	$row['pil_c'],
					'pil_d'			=>	$row['pil_d'],
					'pil_e'			=>	$row['pil_e'],
					'jawaban'		=>	$row['jawaban']

					];
			}

			$response = array (
	            'soal' => $data_row
	        );

			echo json_encode($response);

		} else {
			return redirect('login');
		}

	}


	public function ulangan_soal_edit() {

		if(session('id_group') == 3) {
			
			$id 		= trim(Input::get('id'));
			$soal 		= trim(Input::get('soal'));
			$jwb_a 		= trim(Input::get('jwb_a'));
			$jwb_b 		= trim(Input::get('jwb_b'));
			$jwb_c 		= trim(Input::get('jwb_c'));
			$jwb_d 		= trim(Input::get('jwb_d'));
			$jwb_e 		= trim(Input::get('jwb_e'));
			$jawaban 	= trim(Input::get('jawaban'));

			$edit_soal = DB::update('update ulangan set soal="'.$soal.'", pil_a="'.$jwb_a.'", pil_b="'.$jwb_b.'", pil_c="'.$jwb_c.'", pil_d="'.$jwb_d.'", pil_e="'.$jwb_e.'", jawaban="'.$jawaban.'" where id="'.$id.'"');

			$this->json['pesan'] = 'Data telah terubah';
			echo json_encode($this->json);

		}
		else {
			return redirect('login');
		}


	}


	public function ulangan_soal_delete() {

		if(session('id_group') == 3) {
			
			$id = Input::get('id');

			$delete_soal = DB::delete('delete from ulangan where id = "'.$id.'"');

			$this->json['pesan'] = 'Data telah terhapus';
			echo json_encode($this->json);

		}
		else {
			return redirect('login');
		}

	}


	public function UpdateGroupUlangan() {

		if(session('id_group') == 3) {
			
			$id_after				= Input::get('id_after');
			$id_param 				= Input::get('id_param');
			$id_group_ulangan 		= Input::get('id_group_ulangan');
			$nama_group_ulangan 	= Input::get('nama_group_ulangan');
			$id_materi 				= Input::get('id_materi');
			$ulangan_mulai 			= Input::get('ulangan_mulai');
			$ulangan_selesai 		= Input::get('ulangan_selesai');
			$durasi 				= Input::get('durasi');

			$add_param_id = DB::update('update param_group_ulangan set p_id_group_ulangan = '.$id_after.' where p_id_group_ulangan = '.$id_param);

			$update_group_ulangan = DB::update('update group_ulangan set nama_group_ulangan="'.$nama_group_ulangan.'", id_materi='.$id_materi.', ulangan_mulai="'.$ulangan_mulai.'", ulangan_selesai="'.$ulangan_selesai.'", durasi="'.$durasi.'" where id_group_ulangan="'.$id_group_ulangan.'"');

			$this->json['pesan'] = 'Data telah disimpan';
			echo json_encode($this->json);

		}
		else {
			return redirect('login');
		}

	}


	public function UlanganBatal() {

		if(session('id_group') == 3) {
	
			$id_ulangan = Input::get('id_ulangan');

			$hapus_group = DB::delete('delete from group_ulangan where id_group_ulangan = "'.$id_ulangan.'"');
			$hapus_soal = DB::delete('delete from ulangan where id_group_ulangan = "'.$id_ulangan.'"');

			$this->json['pesan'] = 'Batal membuat ulangan';
			echo json_encode($this->json);
		}
		else {
			return redirect('login');
		}

	}


	public function ulangan_get_edit($id, $id_group_ulangan) {

		if(session('id_group') == 3) {

			return view('view_admin/ulangan/ulangan_edit')->with('id_ulangan', $id)->with('id_group_ulangan', $id_group_ulangan);

		}
		else {
			return redirect('login');
		}

	}


	public function get_data_ulangan() {

		if(session('id_group') == 3) {

			$id_ulangan = Input::get('id_ulangan');

			$getDataUlangan = DB::select('select * from group_ulangan where id = '.$id_ulangan);

			foreach ($getDataUlangan as $key => $row) {
				$row = get_object_vars($row);
				$data_row = [

					'nama_group_ulangan'	=>	$row['nama_group_ulangan'],
					'id_materi'				=>	$row['id_materi'],
					'ulangan_mulai'			=>	$row['ulangan_mulai'],
					'ulangan_selesai'		=>	$row['ulangan_selesai'],
					'durasi'				=>	$row['durasi']

					];
			}

			$response = array (
	            'data_ulangan' => $data_row
	        );

			echo json_encode($response);

		}
		else {
			return redirect('login');
		}

	}


	public function ulangan_soal_list_edit() {

		if(session('id_group') == 3) {

			$id_soal = Input::get('id_soal');

			$data_ulangan = DB::select('select * from ulangan where id_group_ulangan="'.$id_soal.'"');

			$result = '';

			$result .= '<table class="table table-hover table-bordered table-striped table_soal">';
			$result .= '<thead class="index">';
			$result .= '<tr>';
			$result .= '<th width="40px">No</th>';
			$result .= '<th>Soal</th>';
			$result .= '<th>Pilihan A</th>';
			$result .= '<th>Pilihan B</th>';
			$result .= '<th>Pilihan C</th>';
			$result .= '<th>Pilihan D</th>';
			$result .= '<th>Pilihan E</th>';
			$result .= '<th width="90px">Jawaban</th>';
			$result .= '<th width="70px"><span class="glyphicon glyphicon-wrench"></span></th>';
			$result .= '</tr>';
			$result .= '</thead>';
			$result .= '<tbody class="index">';

			if ($data_ulangan != true) {

				$result .= '<tr>';
				$result .= '<td colspan="9">Belum ada soal</td>';
				$result .= '</tr>';
				$result .= '</tbody>';
				$result .= '</table>';

			} else {

				$i = 1;
				foreach ($data_ulangan as $row => $list) {
					$list = get_object_vars($list);

					$result .= '<tr>';
					$result .= '<td class="kolom-tengah">'.$i.'</td>';
					$result .= '<td class="kolom-kiri">'.$list['soal'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['pil_a'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['pil_b'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['pil_c'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['pil_d'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['pil_e'].'</td>';
					$result .= '<td class="kolom-tengah">'.$list['jawaban'].'</td>';
					$result .= '<td class="kolom-tengah">
									<a class="btn btn-success btn-xs" onClick="getEdit('.$list['id'].')" data-toggle="modal" data-target="#modal-soal-edit"> <span class="glyphicon glyphicon-edit"></span> </a> 
			                		<a id="delete'.$list['id'].'" class="btn btn-danger btn-xs" onClick="deleteSoal('.$list['id'].')" data-delete="Apakah anda yakin ingin menghapus soal ini?"><span class="glyphicon glyphicon-trash"></span></a>
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


	public function UpdateDataUlangan() {

		if(session('id_group') == 3) {
			
			$id_ulangan 			= Input::get('id_ulangan');
			$nama_group_ulangan 	= Input::get('edit_nama_ulangan');
			$id_materi 				= Input::get('edit_id_materi');
			$ulangan_mulai 			= Input::get('edit_ulangan_mulai');
			$ulangan_selesai 		= Input::get('edit_ulangan_selesai');
			$durasi 				= Input::get('edit_durasi');

			$update_group_ulangan = DB::update('update group_ulangan set nama_group_ulangan="'.$nama_group_ulangan.'", id_materi='.$id_materi.', ulangan_mulai="'.$ulangan_mulai.'", ulangan_selesai="'.$ulangan_selesai.'", durasi="'.$durasi.'" where id="'.$id_ulangan.'"');

			$this->json['pesan'] = 'Data telah diubah';
			echo json_encode($this->json);

		}
		else {
			return redirect('login');
		}

	}


// -------------------------------------------------------- FORUM --------------------------------------------------------

	public function forum() {
		if(session('id_group') == 3) {
				
			return view('view_admin/forum/index');

		} else {
			return redirect('login');
		}
	}


	public function forum_get_list() {
		
		if(session('id_group') == 3) {

			$search_by = trim(Input::get('search_by'));
			$search_input = trim(Input::get('search_input'));

			if ($search_by != null) {
				$sql_ext = "where ".$search_by." like '%".$search_input."%'";
			} else {
				$sql_ext = "";
			}

			$data_forum = DB::select('select * from forum '.$sql_ext);
			// $data_forum = DB::table('forum')->get();

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
			$result .= '<th>Diposting Oleh</th>';
			$result .= '<th><span class="glyphicon glyphicon-wrench"></span></th>';
			$result .= '<th><span class="glyphicon glyphicon-folder-open"></span></th>';
			$result .= '</tr>';
			$result .= '</thead>';
			$result .= '<tbody class="index">';

			if ($data_forum != true) {

				$result .= '<tr>';
				$result .= '<td colspan="9">No Data In Database</td>';
				$result .= '</tr>';
				$result .= '</tbody>';
				$result .= '</table>';

			} else {

				$i = 1;
				foreach ($data_forum as $row => $list) {
					$list = get_object_vars($list);
					$result .= '<tr>';
					$result .= '<td class="kolom-tengah">'.$i.'</td>';
					$result .= '<td>'.$list['nama_forum'].'</td>';
					$result .= '<td>'.$list['role_access'].'</td>';
					$result .= '<td>'.$list['subyek'].'</td>';
					$result .= '<td>'.$list['keterangan'].'</td>';
					$result .= '<td class="kolom-tengah">'.$list['rate'].' <span class="glyphicon glyphicon-star"></span> </td>';
					$result .= '<td class="kolom-tengah">'.$list['forum_create_by'].'</td>';
					$result .= '<td class="kolom-tengah">
									<a class="btn btn-success btn-xs" onClick="getEdit('.$list['id_forum'].')" data-toggle="modal" data-target="#edit_forum"> <span class="glyphicon glyphicon-edit"></span> </a> 
			                		<a id="btn_delete'.$list['id_forum'].'" class="btn btn-danger btn-xs" onClick="deleteData('.$list['id_forum'].')" data-delete="Apakah anda yakin ingin menghapus forum '.$list['nama_forum'].'?"><span class="glyphicon glyphicon-trash"></span></a>
			                	</td>';
			        $result .= '<td class="kolom-tengah"><a class="btn btn-xs btn-warning" href="/elfis/admin/forum_isi">
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


	public function forum_add() {

		if(session('id_group') == 3) {

			$nama_forum = Input::get('add_nama_forum');
			$role_access = Input::get('add_role_access');
			$subyek = Input::get('add_subyek');
			$keterangan = Input::get('add_keterangan');
			$isi = Input::get('add_isi');

			$data_add = DB::insert('insert into forum values ("", "'.$nama_forum.'", "'.$role_access.'", "'.$subyek.'", "'.$keterangan.'", "'.$isi.'", 0, "'.date('Y-m-d H:i:s').'", "'.session('username').'")');

			$this->json['sukses'] = 'Forum berhasil dibuat';
			echo json_encode($this->json);

			// $message = "Data Telah Ditambah";
			// $response = array (
	  		//           'pesan' => $message
	  		// );
	  		// echo json_encode($response);

			// return ['key' => 'Data berhasil masuk ke database'];

		} else {
			return redirect('login');
		}

	}


	public function forum_delete() {

		if(session('id_group') == 3) {

			$id_forum = trim(Input::get('id_forum'));
				
			$data_delete = DB::delete('delete from forum where id_forum = "'.$id_forum.'"');

			$this->json['sukses'] = 'Forum berhasil dihapus';
			echo json_encode($this->json);

		} else {
			return redirect('login');
		}
	
	}


	public function forum_get_edit() {

		if(session('id_group') == 3) {

			$id_forum = trim(Input::get('id_forum'));
				
			$data_edit = DB::select('select * from forum where id_forum = '.$id_forum.'');

			foreach ($data_edit as $list => $row) {
				$row = get_object_vars($row);
				$data_row = [

					'id_forum'		=>	$row['id_forum'],
					'nama_forum'	=>	$row['nama_forum'],
					'role_access'	=>	$row['role_access'],
					'subyek'		=>	$row['subyek'],
					'keterangan'	=>	$row['keterangan'],
					'isi'			=>	$row['isi'],

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


	function forum_edit() {

		if(session('id_group') == 3) {

			$id_forum = Input::get('id_forum');
			$nama_forum = Input::get('edit_nama_forum');
			$role_access = Input::get('edit_role_access');
			$subyek = Input::get('edit_subyek');
			$keterangan = Input::get('edit_keterangan');
			$isi = Input::get('edit_isi');

			$data_update =  DB::update('update forum set nama_forum = "'.$nama_forum.'", role_access = "'.$role_access.'", subyek = "'.$subyek.'", keterangan = "'.$keterangan.'", isi = "'.$isi.'", forum_create = "'.date('Y-m-d H:i:s').'", forum_create_by = "'.session('username').'" where id_forum = '.$id_forum);

			$this->json['sukses'] = 'Forum berhasil diubah';
			echo json_encode($this->json);

		} else {
			return redirect('login');
		}

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

