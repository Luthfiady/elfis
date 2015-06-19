<?php 

namespace App\Http\Controllers;

use Input;
use DB;
use Session;
use Illuminate\Http\Response;

class Guru_KuisController extends Controller {

	public $status = false;


// -------------------------------------------------------- KUIS --------------------------------------------------------

public function AddIdKuis() {

		if(session('id_group') == 2) {

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


	public function kuis() {
		if(session('id_group') == 2) {
			return view('view_guru/kuis/index');
		}
		else {
			return redirect('login');
		}
	}
  

	public function kuis_add() {
		if(session('id_group') == 2) {
			return view('view_guru/kuis/kuis_add');
		}
		else {
			return redirect('login');
		}
	}


	public function kuis_get_list() {
		if(session('id_group') == 2) {

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

					$mulai = date("d-m-Y", strtotime($list['kuis_mulai'])); 
					$selesai = date("d-m-Y", strtotime($list['kuis_selesai']));

					$result .= '<tr>';
					$result .= '<td class="kolom-tengah">'.$i.'</td>';
					$result .= '<td class="kolom-kiri">'.$list['nama_group_kuis'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['nama_materi'].'</td>';
					$result .= '<td class="kolom-kanan">'.$mulai.'</td>';
					$result .= '<td class="kolom-kanan">'.$selesai.'</td>';
					$result .= '<td class="kolom-kanan">'.$list['durasi'].'</td>';
					$result .= '<td class="kolom-tengah">
									<a href="kuis_edit/'.$list['id'].'/'.$list['id_group_kuis'].'" class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-edit"></span> </a> 
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

		if(session('id_group') == 2) {

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


	public function get_param() {

		if(session('id_group') == 2) {

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


	public function soal_list() {
		if(session('id_group') == 2) {

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


	public function AddSoal() {

		if(session('id_group') == 2) {

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

		if(session('id_group') == 2) {

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

		if(session('id_group') == 2) {
			
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


	public function DeleteSoal() {

		if(session('id_group') == 2) {
			
			$id = Input::get('id');

			$delete_soal = DB::delete('delete from kuis where id = "'.$id.'"');

			$this->json['pesan'] = 'Data telah terhapus';
			echo json_encode($this->json);

		}
		else {
			return redirect('login');
		}

	}


	public function AddDetailKuis() {

		if(session('id_group') == 2) {
			
			$id_after			= Input::get('id_after');
			$id_param 			= Input::get('id_param');
			$id_group_kuis 		= Input::get('id_group_kuis');
			$nama_group_kuis 	= Input::get('nama_group_kuis');
			$id_materi 			= Input::get('id_materi');
			$mulai 				= Input::get('kuis_mulai');
			$selesai 			= Input::get('kuis_selesai');
			$durasi 			= Input::get('durasi');

			$kuis_mulai 		= date("Y-m-d", strtotime($mulai));
			$kuis_selesai 		= date("Y-m-d", strtotime($selesai));

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

		if(session('id_group') == 2) {
	
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


	public function kuis_edit($id, $id_group_kuis) {

		if(session('id_group') == 2) {

			return view('view_guru/kuis/kuis_edit')->with('id_kuis', $id)->with('id_group_kuis', $id_group_kuis);

		}
		else {
			return redirect('login');
		}

	}


	public function get_detail_kuis() {

		if(session('id_group') == 2) {

			$id_kuis = Input::get('id_kuis');

			$getDataKuis = DB::select('select * from group_kuis where id = '.$id_kuis);

			foreach ($getDataKuis as $key => $row) {
				$row = get_object_vars($row);

				$kuis_mulai = date("d-m-Y", strtotime($row['kuis_mulai']));
				$kuis_selesai = date("d-m-Y", strtotime($row['kuis_selesai']));

				$data_row = [

					'nama_group_kuis'	=>	$row['nama_group_kuis'],
					'id_materi'			=>	$row['id_materi'],
					'kuis_mulai'		=>	$kuis_mulai,
					'kuis_selesai'		=>	$kuis_selesai,
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

		if(session('id_group') == 2) {

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


	public function UpdateKuis() {

		if(session('id_group') == 2) {
			
			$id_kuis 			= Input::get('id_kuis');
			$nama_group_kuis 	= Input::get('edit_nama_kuis');
			$id_materi 			= Input::get('edit_id_materi');
			$mulai 				= Input::get('edit_kuis_mulai');
			$selesai 			= Input::get('edit_kuis_selesai');
			$durasi 			= Input::get('edit_durasi');

			$kuis_mulai 		= date("Y-m-d", strtotime($mulai));
			$kuis_selesai 		= date("Y-m-d", strtotime($selesai));

			$update_group_kuis = DB::update('update group_kuis set nama_group_kuis="'.$nama_group_kuis.'", id_materi='.$id_materi.', kuis_mulai="'.$kuis_mulai.'", kuis_selesai="'.$kuis_selesai.'", durasi="'.$durasi.'" where id="'.$id_kuis.'"');

			$this->json['pesan'] = 'Data telah diubah';
			echo json_encode($this->json);

		}
		else {
			return redirect('login');
		}

	}



}