<?php

namespace App\Http\Controllers;

use Input;
use DB;
use Session;
use Illuminate\Http\Response;

class Guru_UlanganController extends Controller {

	public $status = false;


// -------------------------------------------------------- ULANGAN INDEX --------------------------------------------------------

	public function ulangan() {
		if(session('id_group') == 2) {
			return view('view_guru/ulangan/index');
		}
		else {
			return redirect('login');
		}
	}


	public function ulangan_get_list() {
		if(session('id_group') == 2) {

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

			$data_rows = DB::select('select a.*,b.nama_materi from group_ulangan a join materi b where a.id_materi=b.id_materi and (ulangan_mulai<=ADDDATE("'.date('Y-m-d').'",7) and ulangan_selesai>="'.date('Y-m-d').'") and nik="'.session('id_user').'" '.$sql_ext);
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

			$data_ulangan = DB::select('select a.*,b.nama_materi from group_ulangan a join materi b where a.id_materi=b.id_materi and (ulangan_mulai<=ADDDATE("'.date('Y-m-d').'",7) and ulangan_selesai>="'.date('Y-m-d').'") and nik="'.session('id_user').'" '.$sql_ext.' ORDER BY a.ulangan_mulai ASC LIMIT '.$per_page.' OFFSET '.$offset);

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

				$i = $limit_start;
				foreach ($data_ulangan as $row => $list) {
					$list = get_object_vars($list);

					$mulai = date("d-m-Y", strtotime($list['ulangan_mulai'])); 
					$selesai = date("d-m-Y", strtotime($list['ulangan_selesai']));

					$result .= '<tr>';
					$result .= '<td class="kolom-tengah">'.$i.'</td>';
					$result .= '<td class="kolom-kiri">'.$list['nama_group_ulangan'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['nama_materi'].'</td>';
					$result .= '<td class="kolom-kanan">'.$mulai.'</td>';
					$result .= '<td class="kolom-kanan">'.$selesai.'</td>';
					$result .= '<td class="kolom-kanan">'.$list['durasi'].'</td>';
					$result .= '<td class="kolom-tengah">
									<a href="ulangan/'.$list['nama_group_ulangan'].'/'.$list['id'].'" class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-edit"></span> </a> 
			                		<a id="deleteData'.$list['id'].'" class="btn btn-danger btn-xs" onClick="deleteUlangan('.$list['id'].')" data-delete="Apakah anda yakin ingin menghapus ulangan '.$list['nama_group_ulangan'].'?"><span class="glyphicon glyphicon-trash"></span></a>
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


	public function ulangan_delete() {

		if(session('id_group') == 2) {

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


// -------------------------------------------------------- ULANGAN ADD --------------------------------------------------------

	public function ulangan_add() {
		if(session('id_group') == 2) {
			return view('view_guru/ulangan/ulangan_add');
		}
		else {
			return redirect('login');
		}
	}


	public function ulangan_get_id() {

		if(session('id_group') == 2) {

			$get_id = DB::select('select * from param_group_ulangan');

			foreach ($get_id as $key => $value) {
				$value = get_object_vars($value);
				$id_ulangan = $value['p_id_group_ulangan']+1;
			}

			$this->json['data'] = $id_ulangan;
			echo json_encode($this->json);

		} else {
			return redirect('login');
		}

	}


	public function ulangan_soal_list() {
		if(session('id_group') == 2) {

			if(Input::get('paging') == null) {
				$nopage = 1;
	        }
	        else{
	            $nopage = Input::get('paging');
	        }

			$id_ulangan = Input::get('id_ulangan');

			$data_rows = DB::select('select * from ulangan where id_group_ulangan = "'.$id_ulangan.'"');
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

			$data_ulangan = DB::select('select * from ulangan where id_group_ulangan = "'.$id_ulangan.'" ORDER BY id ASC LIMIT '.$per_page.' OFFSET '.$offset);

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

				$i = $limit_start;
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
	            'result' => $result,
	            'paging' => $paging
	        );

	        echo json_encode($response);

		} else {
			return redirect('login');
		}
	}


	public function AddIdUlangan() {

		if(session('id_group') == 2) {

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


	public function ulangan_AddSoal() {

		if(session('id_group') == 2) {

			$submit			= Input::get('submit');
			$id_soal 		= Input::get('id_soal');
			$soal_ulangan 	= Input::get('soal_ulangan');
			$jwb_a			= Input::get('jwb_a');
			$jwb_b			= Input::get('jwb_b');
			$jwb_c			= Input::get('jwb_c');
			$jwb_d			= Input::get('jwb_d');
			$jwb_e			= Input::get('jwb_e');
			$jawaban		= Input::get('jawaban');

			if ($submit == null) {
				$this->json['pesan'] = 'Data null';
				echo json_encode($this->json);
			} else {
				$add_data_soal = DB::insert('insert into ulangan values ("", "'.$id_soal.'", "'.$soal_ulangan.'", "'.$jwb_a.'", "'.$jwb_b.'", "'.$jwb_c.'", "'.$jwb_d.'", "'.$jwb_e.'", "'.$jawaban.'")');

				$this->json['pesan'] = 'Data telah tersimpan';
				echo json_encode($this->json);
			}

		} else {
			return redirect('login');
		}

	}


	public function ulangan_DeleteSoal() {

		if(session('id_group') == 2) {
			
			$id = Input::get('id');

			$delete_soal = DB::delete('delete from ulangan where id = "'.$id.'"');

			$this->json['pesan'] = 'Data telah terhapus';
			echo json_encode($this->json);

		}
		else {
			return redirect('login');
		}

	}


	public function ulangan_soal_get_edit() {

		if(session('id_group') == 2) {

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

		if(session('id_group') == 2) {
			
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


	public function AddDetailUlangan() {

		if(session('id_group') == 2) {
			
			$id_after				= Input::get('id_after');
			$id_before 				= Input::get('id_before');
			$id_group_ulangan 		= Input::get('id_group_ulangan');
			$nama_group_ulangan 	= Input::get('nama_group_ulangan');
			$id_materi 				= Input::get('id_materi');
			$mulai 					= Input::get('ulangan_mulai');
			$selesai 				= Input::get('ulangan_selesai');
			$durasi 				= Input::get('durasi');

			$ulangan_mulai 			= date("Y-m-d", strtotime($mulai));
			$ulangan_selesai 		= date("Y-m-d", strtotime($selesai));

			$add_param_id = DB::update('update param_group_ulangan set p_id_group_ulangan = '.$id_after.' where p_id_group_ulangan = '.$id_before);

			$update_group_ulangan = DB::update('update group_ulangan set nama_group_ulangan="'.$nama_group_ulangan.'", id_materi='.$id_materi.', ulangan_mulai="'.$ulangan_mulai.'", ulangan_selesai="'.$ulangan_selesai.'", durasi="'.$durasi.'", created="'.date('Y-m-d H:i:s').'", created_by="'.session('username').'" where id_group_ulangan="'.$id_group_ulangan.'"');

			$this->json['pesan'] = 'Data telah disimpan';
			echo json_encode($this->json);

		}
		else {
			return redirect('login');
		}

	}


	public function UlanganBatal() {

		if(session('id_group') == 2) {
	
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


// -------------------------------------------------------- ULANGAN EDIT --------------------------------------------------------

	public function ulangan_edit($nama_group_ulangan, $id) {

		if(session('id_group') == 2) {

			return view('view_guru/ulangan/ulangan_edit')->with('id_ulangan', $id)->with('nama_group_ulangan', $nama_group_ulangan);

		}
		else {
			return redirect('login');
		}

	}


	public function get_detail_ulangan() {

		if(session('id_group') == 2) {

			$id = Input::get('id');

			$getDataUlangan = DB::select('select * from group_ulangan where id='.$id);

			foreach ($getDataUlangan as $key => $row) {
				$row = get_object_vars($row);

				$ulangan_mulai = date("d-m-Y", strtotime($row['ulangan_mulai']));
				$ulangan_selesai = date("d-m-Y", strtotime($row['ulangan_selesai']));

				$data_row = [

					'id_group_ulangan'		=>	$row['id_group_ulangan'],
					'nama_group_ulangan'	=>	$row['nama_group_ulangan'],
					'id_materi'				=>	$row['id_materi'],
					'ulangan_mulai'			=>	$ulangan_mulai,
					'ulangan_selesai'		=>	$ulangan_selesai,
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

		if(session('id_group') == 2) {

			if(Input::get('paging') == null) {
				$nopage = 1;
	        }
	        else{
	            $nopage = Input::get('paging');
	        }

			$id_group_ulangan = Input::get('id_group_ulangan');

			$data_rows = DB::select('select * from ulangan where id_group_ulangan="'.$id_group_ulangan.'"');
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

			$data_ulangan = DB::select('select * from ulangan where id_group_ulangan="'.$id_group_ulangan.'" ORDER BY id ASC LIMIT '.$per_page.' OFFSET '.$offset);

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

				$i = $limit_start;
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
	            'result' => $result,
	            'paging' => $paging
	        );

	        echo json_encode($response);

		} else {
			return redirect('login');
		}

	}


	public function UpdateUlangan() {

		if(session('id_group') == 2) {
			
			$id_ulangan 			= Input::get('id_ulangan');
			$nama_group_ulangan 	= Input::get('edit_nama_ulangan');
			$id_materi 				= Input::get('edit_id_materi');
			$mulai 					= Input::get('edit_ulangan_mulai');
			$selesai 				= Input::get('edit_ulangan_selesai');
			$durasi 				= Input::get('edit_durasi');

			$ulangan_mulai 		= date("Y-m-d", strtotime($mulai));
			$ulangan_selesai 	= date("Y-m-d", strtotime($selesai));

			$update_group_ulangan = DB::update('update group_ulangan set nama_group_ulangan="'.$nama_group_ulangan.'", id_materi='.$id_materi.', ulangan_mulai="'.$ulangan_mulai.'", ulangan_selesai="'.$ulangan_selesai.'", durasi="'.$durasi.'", created="'.date('Y-m-d H:i:s').'", created_by="'.session('username').'" where id="'.$id_ulangan.'"');

			$this->json['pesan'] = 'Data telah diubah';
			echo json_encode($this->json);

		}
		else {
			return redirect('login');
		}

	}


}