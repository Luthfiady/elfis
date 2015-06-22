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

					$data_testMateri ="'" . $list['id_materi'] . "','" . $list['id_pelajaran'] . "','" . $list['nik'] . "','" . $list['id_kelas'] . "','" . $list['nama_materi'] . "','" . $list['isi'] . "','" . $list['file'] . "'";

					$result .= '<tr>';
					$result .= '<td class="kolom-tengah">'.$i.'</td>';
					$result .= '<td>'.$list['nama_materi'].'</td>';
					$result .= '<td>'.$list['nama_pelajaran'].'</td>';
					$result .= '<td>'.$list['nama_kelas'].'</td>';
					$result .= '<td>'.$list['create_date'].'</td>';
					$result .= '<td>'.$list['nama'].'</td>';
					$result .= '<td class="kolom-tengah">
									<a class="btn btn-success btn-xs" data-toggle="modal" data-target="#editMateri" onClick="open_materi_edit(' . $data_testMateri . ')"> <span class="glyphicon glyphicon-edit"></span> </a> 
			                		<a id="btn_delete'.$list['id_materi'].'" title="Hapus" class="btn btn-danger btn-xs" onClick="deleteData('.$list['id_materi'].')" data-delete="Apakah Anda yakin ingin menghapus tugas '.$list['nama_materi'].'?"><span class="glyphicon glyphicon-trash"></span></a>
			                	</td>';
			        $result .= '<td class="kolom-tengah"><a class="btn btn-xs btn-warning" href="/elfis/admin/materi_detail?id_materi=' . $list['id_materi'] . '" title="Detail">
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
	public function materiSoal_add() {
		if(session('id_group') == 3) {
			return view('view_admin/materi/materiSoal_add');
		}
		else {
			return redirect('login');
		}
	}
	//

	public function materi_add() {

		if(session('id_group') == 3) {

			$id_pelajaran = Input::get('addPelajaran');
			$nik = Input::get('addGuru');
			$id_kelas = Input::get('addKelas');
			$nama_materi = Input::get('addNamaMateri');
			$isi = Input::get('addIsiMateri');

			$file_name = "";


			if(Input::hasFile('add_file_materi')) {
				$file_name = Input::file('add_file_materi')->getClientOriginalName();
				$path = public_path('uploads/file_materi');
				Input::file('add_file_materi')->move($path, $file_name);
			}

			// $add_data_materi = DB::insert('insert into materi values ("", "'.$id_pelajaran.'", "'.$id_kelas.'", "'.$nama.'", "'.$isi.'", "'.$file_name.'", "'.date('Y-m-d').'", "'.session('username').'")'); 

			DB::table('materi')->insert(['id_pelajaran' => $id_pelajaran, 'id_kelas' => $id_kelas, 'nik' => $nik, 'nama_materi' => $nama_materi,'isi' => $isi, 'file' => $file_name, 'create_date' => date('Y-m-d'), 'created_by' => session('username')]);
			
			return 'Data telah tersimpan';
		
		} else {	
			return redirect('login');
		}

	}

	public function materi_edit() {
		if(session('id_group') == 3) {

			$id_materi = Input::get('id_materi');
			$pelajaran = Input::get('editPelajaran');
			$kelas = Input::get('editKelas');
			$nik = Input::get('editGuru');
			$nama_materi = Input::get('editNamaMateri');
			$isi = Input::get('editIsi');

			$file_name = "";

			if(Input::hasFile('edit_file_materi')) {
				$file_name = Input::file('edit_file_materi')->getClientOriginalName();
				$path = public_path('uploads/file_materi');
				Input::file('edit_file_materi')->move($path, $file_name);
			}
			else {
				$file_name = Input::get('edit_file_materi_lama');
			}

			DB::table('materi')
			->where('id_materi', '=', $id_materi)
			->update([
				'id_pelajaran' => $pelajaran, 
				'nik' => $nik, 
				'id_kelas' => $kelas, 
				'nama_materi' => $nama_materi, 
				'isi' => $isi,
				'file' => $file_name
			]);

			return 'Data telah tersimpan';
			
		} else {	
			return redirect('login');
		}
	}

	//

	public function materi_delete(){
		if(session('id_group') == 3){
			$id_materi = trim(Input::get('id_materi'));

			$data_delete = DB::delete('delete from materi where id_materi = "'.$id_materi.'"');

			$this->json['sukses'] = 'Tugas berhasil dihapus';
			echo json_encode($this->json);
		} else{
			return redirect('login');
		}
	}


	public function materi_detail() {
		if(session('id_group') == 3) {			

			$data_materi = DB::table('materi')
			->join('pelajaran', 'materi.id_pelajaran', '=', 'pelajaran.id_pelajaran')
			->join('kelas', 'materi.id_kelas', '=', 'kelas.id_kelas')
			->join('guru', 'materi.nik', '=', 'guru.nik')
			->where('materi.id_materi', '=', Input::get('id_materi'))
			->get(['materi.*', 'pelajaran.nama_pelajaran', 'kelas.nama_kelas', 'guru.nama']);

			$result = [];

			foreach ($data_materi as $key => $value) {
				foreach ($value as $k => $v) {
					$result[$k] = $v;
				}
			}
			// 'select  from tugas a JOIN materi b JOIN pelajaran c where a.id_materi = b.id_materi and b.id_pelajaran = c.id_pelajaran and a.id_tugas = "' . Input::get('id_tugas') . '"');

			return view('view_admin/materi/detail', ['data_materi' => $result]);

			
		}	
		else {
			return redirect('login');
		}
	}


	// public function delete_pb_alat() {
	// 	$this->m_alat->deleteDataPb_alat($this->input->post('IDPROSES'), $this->input->post('IDALAT'));
	// 	redirect("index.php/cak_pb_master");
	// }

	
// -------------------------------------------------------- MATERI-SOAL --------------------------------------------------------

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
									<a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editSoal" title="edit"> <span class="glyphicon glyphicon-edit"></span> </a> 
			                		<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteSoal" title="hapus"><span class="glyphicon glyphicon-trash"></span></a>
			                	</td>';
			        $result .= '<td class="kolom-tengah"><a class="btn btn-sm btn-warning" href="/elfis/admin/materi_detail">
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
}
	

	
