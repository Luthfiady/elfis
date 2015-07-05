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

class Guru_MateriController extends Controller {

	public $status = false;
// -------------------------------------------------------- MATERI --------------------------------------------------------

	public function materi() {

		if(session('id_group') == 2) {
			$pelajaran = DB::table('pelajaran')->get(['id_pelajaran', 'nama_pelajaran']);
			$kelas = DB::table('kelas')->get(['id_kelas', 'nama_kelas']);
			$guru = DB::table('guru')->get(['nik', 'nama']);

			return view('view_guru/materi/index', ['data_pelajaran' => $pelajaran, 'data_kelas' => $kelas, 'data_guru' => $guru]);
		}
		else {
			return redirect('login');
		}
	}

	public function materi_get_list(){
		if(session('id_group') == 2){
			$search_by = trim(Input::get('search_by'));
			$search_input = trim(Input::get('search_input'));

			if(Input::get('paging') == null) {
				$nopage = 1;
	        }
	        else{
	            $nopage = Input::get('paging');
	        }

			if ($search_by != null) {
				$sql_ext = "and ".$search_by." LIKE '%".$search_input."%'";
			} else {
				$sql_ext = "";
			}

			$data_rows = DB::select('select a.*, b.nama_pelajaran, c.nama_kelas, d.nama from materi a JOIN pelajaran b JOIN kelas c JOIN guru d where a.id_pelajaran = b.id_pelajaran and a.id_kelas = c.id_kelas and d.nik="'.session('id_user').'" '.$sql_ext);

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

			$data_materi = DB::select('select a.*, b.nama_pelajaran, c.nama_kelas, d.nama from materi a JOIN pelajaran b JOIN kelas c JOIN guru d where a.id_pelajaran = b.id_pelajaran and a.id_kelas = c.id_kelas and d.nik="'.session('id_user').'" '.$sql_ext.' ORDER BY id_materi DESC LIMIT '.$per_page.' OFFSET '.$offset);

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

				$i = $limit_start;
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
			        $result .= '<td class="kolom-tengah"><a class="btn btn-xs btn-warning" href="/elfis/guru/materi_detail?id_materi=' . $list['id_materi'] . '" title="Detail">
									<span class="glyphicon glyphicon-new-window"></span></a>
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

	// 
	public function materiLatihan_add() {
		if(session('id_group') == 2) {
			return view('view_guru/materi/materiLatihan_add');
		}
		else {
			return redirect('login');
		}
	}
	//

	public function materi_add() {

		if(session('id_group') == 2) {

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
		if(session('id_group') == 2) {

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
		if(session('id_group') == 2){
			$id_materi = trim(Input::get('id_materi'));

			$data_delete = DB::delete('delete from materi where id_materi = "'.$id_materi.'"');

			$this->json['sukses'] = 'Tugas berhasil dihapus';
			echo json_encode($this->json);
		} else{
			return redirect('login');
		}
	}


	public function materi_detail() {
		if(session('id_group') == 2) {			

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
			
			return view('view_guru/materi/detail', ['data_materi' => $result]);

			
		}	
		else {
			return redirect('login');
		}
	}


	
// -------------------------------------------------------- MATERI-LATIHAN --------------------------------------------------------

	public function AddIdLatihan() {

		if(session('id_group') == 2) {

			$id_latihan = trim(Input::get('id_latihan'));

			$check_data = DB::select('select id_group_latihan from group_latihan where id_group_latihan = "'.$id_latihan.'"');

			if ($check_data == null) {
				DB::insert('insert into group_latihan (id_group_latihan) values ("'.$id_latihan.'")');
			} else {
				return ['data_null' => 'data null'];
			}

		} else {
			return redirect('login');
		}
	}	


	public function latihan() {
		if(session('id_group') == 2) {
			return view('view_guru/materi/indexSoal');
		}
		else {
			return redirect('login');
		}
	}


	public function latihanMateri_add() {
		if(session('id_group') == 2) {
			return view('view_guru/materi/latihanMateri_add');
		}
		else {
			return redirect('login');
		}
	}


	public function latihan_get_list() {
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
				$sql_ext = "and ".$search_by." LIKE '%".$search_input."%'";
			} else {
				$sql_ext = "";
			}

			$data_rows = DB::select('select a.*,b.nama_materi from group_latihan a join materi b where a.id_materi=b.id_materi '.$sql_ext);
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

			$data_latihan = DB::select('select a.*,b.nama_materi from group_latihan a join materi b where a.id_materi=b.id_materi '.$sql_ext.' ORDER BY id_materi ASC LIMIT '.$per_page.' OFFSET '.$offset);

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
			$result .= '<th>Nama Latihan</th>';
			$result .= '<th>Nama Materi</th>';
			$result .= '<th><span class="glyphicon glyphicon-wrench"></span></th>';
			$result .= '</tr>';
			$result .= '</thead>';
			$result .= '<tbody class="index">';

			if ($data_latihan != true) {

				$result .= '<tr>';
				$result .= '<td colspan="7">No Data In Database</td>';
				$result .= '</tr>';
				$result .= '</tbody>';
				$result .= '</table>';

			} else {

				$i = $limit_start;
				foreach ($data_latihan as $row => $list) {
					$list = get_object_vars($list);

					$result .= '<tr>';
					$result .= '<td class="kolom-tengah">'.$i.'</td>';
					$result .= '<td class="kolom-kiri">'.$list['nama_group_latihan'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['nama_materi'].'</td>';
					$result .= '<td class="kolom-tengah">
									<a href="latihan/'.$list['nama_group_latihan'].'/'.$list['id'].'" class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-edit"></span> </a> 
			                		<a id="deleteData'.$list['id'].'" class="btn btn-danger btn-xs" onClick="deleteLatihan('.$list['id'].')" data-delete="Apakah anda yakin ingin menghapus latihan '.$list['nama_group_latihan'].'?"><span class="glyphicon glyphicon-trash"></span></a>
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


	public function latihan_delete() {

		if(session('id_group') == 2) {

			$id_latihan = trim(Input::get('id_latihan'));

			$select_data = DB::select('select id_group_latihan from group_latihan where id='.$id_latihan);

			foreach ($select_data as $key => $value) {
				$value = get_object_vars($value);
				$id_group_latihan = $value['id_group_latihan'];
			}

			$delete_latihan = DB::delete('delete from group_latihan where id = '.$id_latihan);
			$delete_latihan_soal = DB::delete('delete from latihan where id_group_latihan = "'.$id_group_latihan.'"');

			$this->json['pesan'] = 'Data telah dihapus';
			echo json_encode($this->json);

		} else {
			return redirect('login');
		}

	}


	public function latihan_get_param() {

		if(session('id_group') == 2) {

			$get_id = DB::select('select * from param_group_latihan');

			foreach ($get_id as $key => $value) {
				$value = get_object_vars($value);
				$id_latihan = $value['p_id_group_latihan']+1;
			}

			return ['data' => $id_latihan];

		} else {
			return redirect('login');
		}

	}


	public function latihan_soal_list() {
		if(session('id_group') == 2) {

			$get_id = DB::select('select * from param_group_latihan');

			foreach ($get_id as $key => $value) {
				$value = get_object_vars($value);
				$id_latihan = $value['p_id_group_latihan']+1;
			}

			$data_latihan = DB::select('select * from latihan where id_group_latihan="L00'.$id_latihan.'"');

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

			if ($data_latihan != true) {

				$result .= '<tr>';
				$result .= '<td colspan="9">Belum ada soal</td>';
				$result .= '</tr>';
				$result .= '</tbody>';
				$result .= '</table>';

			} else {

				$i = 1;
				foreach ($data_latihan as $row => $list) {
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
									<a class="btn btn-success btn-xs" onClick="latihan_getEdit('.$list['id'].')" data-toggle="modal" data-target="#modal-soal-edit"> <span class="glyphicon glyphicon-edit"></span> </a> 
			                		<a id="delete'.$list['id'].'" class="btn btn-danger btn-xs" onClick="latihan_deleteSoal('.$list['id'].')" data-delete="Apakah anda yakin ingin menghapus soal ini?"><span class="glyphicon glyphicon-trash"></span></a>
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


	public function latihan_AddSoal() {

		if(session('id_group') == 2) {

			$id_soal 		= Input::get('id_soal');
			$soal_latihan 	= Input::get('soal_latihan');
			$jwb_a			= Input::get('jwb_a');
			$jwb_b			= Input::get('jwb_b');
			$jwb_c			= Input::get('jwb_c');
			$jwb_d			= Input::get('jwb_d');
			$jwb_e			= Input::get('jwb_e');
			$jawaban		= Input::get('jawaban');

			$add_data_soal = DB::insert('insert into latihan values ("", "'.$id_soal.'", "'.$soal_latihan.'", "'.$jwb_a.'", "'.$jwb_b.'", "'.$jwb_c.'", "'.$jwb_d.'", "'.$jwb_e.'", "'.$jawaban.'")');

			$this->json['pesan'] = 'Data telah tersimpan';
			echo json_encode($this->json);

		} else {
			return redirect('login');
		}

	}


	public function latihan_soal_get_edit() {

		if(session('id_group') == 2) {

			$id = trim(Input::get('id'));
				
			$get_edit_data = DB::select('select * from latihan where id = '.$id.'');

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



	public function latihan_soal_edit() {

		if(session('id_group') == 2) {
			
			$id 		= trim(Input::get('id'));
			$soal 		= trim(Input::get('soal'));
			$jwb_a 		= trim(Input::get('jwb_a'));
			$jwb_b 		= trim(Input::get('jwb_b'));
			$jwb_c 		= trim(Input::get('jwb_c'));
			$jwb_d 		= trim(Input::get('jwb_d'));
			$jwb_e 		= trim(Input::get('jwb_e'));
			$jawaban 	= trim(Input::get('jawaban'));

			$edit_soal = DB::update('update latihan set soal="'.$soal.'", pil_a="'.$jwb_a.'", pil_b="'.$jwb_b.'", pil_c="'.$jwb_c.'", pil_d="'.$jwb_d.'", pil_e="'.$jwb_e.'", jawaban="'.$jawaban.'" where id="'.$id.'"');

			$this->json['pesan'] = 'Data telah terubah';
			echo json_encode($this->json);

		}
		else {
			return redirect('login');
		}


	}


	public function latihan_DeleteSoal() {

		if(session('id_group') == 2) {
			
			$id = Input::get('id');

			$delete_soal = DB::delete('delete from latihan where id = "'.$id.'"');

			$this->json['pesan'] = 'Data telah terhapus';
			echo json_encode($this->json);

		}
		else {
			return redirect('login');
		}

	}


	public function AddDetailLatihan() {

		if(session('id_group') == 2) {
			
			$id_after				= Input::get('id_after');
			$id_param 				= Input::get('id_param');
			$id_group_latihan 		= Input::get('id_group_latihan');
			$nama_group_latihan 	= Input::get('nama_group_latihan');
			$id_materi 				= Input::get('id_materi');

			$add_param_id = DB::update('update param_group_latihan set p_id_group_latihan = '.$id_after.' where p_id_group_latihan = '.$id_param);

			$update_group_latihan = DB::update('update group_latihan set nama_group_latihan="'.$nama_group_latihan.'", id_materi="'.$id_materi.'" where id_group_latihan="'.$id_group_latihan.'"');

			$this->json['pesan'] = 'Data telah disimpan';
			echo json_encode($this->json);

		}
		else {
			return redirect('login');
		}

	}


	public function LatihanBatal() {

		if(session('id_group') == 2) {
	
			$id_latihan = Input::get('id_latihan');

			$hapus_group = DB::delete('delete from group_latihan where id_group_latihan = "'.$id_latihan.'"');
			$hapus_soal = DB::delete('delete from latihan where id_group_latihan = "'.$id_latihan.'"');

			$this->json['pesan'] = 'Batal membuat latihan';
			echo json_encode($this->json);
		}
		else {
			return redirect('login');
		}

	}


	public function latihan_edit($nama_group_latihan, $id) {

		if(session('id_group') == 2) {

			return view('view_guru/materi/latihanMateri_edit')->with('nama_group_latihan', $nama_group_latihan)->with('id', $id);

		}
		else {
			return redirect('login');
		}

	}


	public function get_detail_latihan() {

		if(session('id_group') == 2) {

			$id_latihan = Input::get('id_latihan');

			$getDataLatihan = DB::select('select * from group_latihan where id='.$id_latihan);

			foreach ($getDataLatihan as $key => $row) {
				$row = get_object_vars($row);

				$data_row = [

					'id_group_latihan'		=>	$row['id_group_latihan'],
					'nama_group_latihan'	=>	$row['nama_group_latihan'],
					'id_materi'				=>	$row['id_materi']

					];
			}

			$response = array (
	            'data_latihan' => $data_row
	        );

			echo json_encode($response);

		}
		else {
			return redirect('login');
		}

	}


	public function latihan_soal_list_edit() {

		if(session('id_group') == 2) {

			$id_group_latihan = Input::get('id_group_latihan');

			$data_latihan = DB::select('select * from latihan where id_group_latihan="'.$id_group_latihan.'"');

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

			if ($data_latihan != true) {

				$result .= '<tr>';
				$result .= '<td colspan="9">Belum ada soal</td>';
				$result .= '</tr>';
				$result .= '</tbody>';
				$result .= '</table>';

			} else {

				$i = 1;
				foreach ($data_latihan as $row => $list) {
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
									<a class="btn btn-success btn-xs" onClick="latihan_getEdit('.$list['id'].')" data-toggle="modal" data-target="#modal-soal-edit"> <span class="glyphicon glyphicon-edit"></span> </a> 
			                		<a id="delete'.$list['id'].'" class="btn btn-danger btn-xs" onClick="latihan_deleteSoal('.$list['id'].')" data-delete="Apakah anda yakin ingin menghapus soal ini?"><span class="glyphicon glyphicon-trash"></span></a>
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


	public function UpdateLatihan() {

		if(session('id_group') == 2) {
			
			$id_latihan 			= Input::get('id_latihan');
			$nama_group_latihan 	= Input::get('edit_nama_latihan');
			$id_materi 				= Input::get('edit_id_materi');


			$update_group_latihan = DB::update('update group_latihan set nama_group_latihan="'.$nama_group_latihan.'", id_materi="'.$id_materi.'" where id="'.$id_latihan.'"');

			$this->json['pesan'] = 'Data telah diubah';
			echo json_encode($this->json);

		}
		else {
			return redirect('login');
		}

	}


}
