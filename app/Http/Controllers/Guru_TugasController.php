<?php

namespace App\Http\Controllers;

use Input;
use DB;
use Redirect;
use URL;
use Session;
use Response;
use Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Guru_TugasController extends Controller {

	public $status = false;

// -------------------------------------------------------- INDEX --------------------------------------------------------

	public function index() {
		if(session('id_group') == 2) {
			return view('view_guru/dashboard');
		}
		else {
			return redirect('login');
		}
	}


	public function getMateri() {

		if(session('id_group') == 2) {

			$get_materi = DB::select('select DISTINCT * from materi ORDER BY id_materi DESC');

			$materi = "";
			foreach ($get_materi as $key => $value) {
				$value = get_object_vars($value);
				$materi[] = array(
                    'id_materi' => $value['id_materi'],
                    'nama_materi' => $value['nama_materi']
                );
			}

			return ['data' => $materi];

		} else {
			return redirect('login');
		}

	}


	public function getTugas() {

	if(session('id_group') == 2) {

		$get_tugas = DB::select('select DISTINCT * from tugas ORDER BY id_tugas DESC');

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

// -------------------------------------------------------- TUGAS --------------------------------------------------------

	public function tugas() {
		if(session('id_group') == 2) {
			return view('view_guru/tugas/index');
		}
		else {
			return redirect('login');
		}
	}

	public function tugas_get_list() {
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

			$data_rows = DB::select('select a.*, b.id_materi, b.nama_materi, c.id_pelajaran, c.nama_pelajaran from tugas a JOIN materi b JOIN pelajaran c where a.id_materi = b.id_materi and b.id_pelajaran = c.id_pelajaranz '.$sql_ext);
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

			$data_tugas = DB::select('select a.*, b.id_materi, b.nama_materi, c.id_pelajaran, c.nama_pelajaran from tugas a JOIN materi b JOIN pelajaran c where a.id_materi = b.id_materi and b.id_pelajaran = c.id_pelajaran and (tugas_mulai<=ADDDATE("'.date('Y-m-d').'",10) and tugas_selesai>="'.date('Y-m-d').'") '.$sql_ext.' ORDER BY id_tugas DESC LIMIT '.$per_page.' OFFSET '.$offset);

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

				$i = $limit_start;
				foreach ($data_tugas as $row => $list) {
					$list = get_object_vars($list);

					$mulai = date("d-m-Y", strtotime($list['tugas_mulai'])); 
					$selesai = date("d-m-Y", strtotime($list['tugas_selesai']));

					$data_test = "'" . $list['id_tugas'] . "','" . $list['nama_tugas'] .  "','" . $list['id_materi'] . "','" . $list['isi'] . "','" . $mulai . "','" . $selesai . "','" . $list['durasi'] . "','" . $list['file'] .  "'";

					$result .= '<tr>';
					$result .= '<td class="kolom-tengah">'.$i.'</td>';
					$result .= '<td>'.$list['nama_tugas'].'</td>';
					$result .= '<td>'.$list['nama_materi'].'</td>';
					$result .= '<td>'.$list['nama_pelajaran'].'</td>';
					$result .= '<td>'.$mulai.'</td>';
					$result .= '<td>'.$selesai.'</td>';
					$result .= '<td class="kolom-tengah">
									<a class="btn btn-xs btn-success" data-toggle="modal" data-target="#edit_tugas" 
									onclick="open_tugas_edit(' . $data_test . ')"
									title="Ubah">
									<span class="glyphicon glyphicon-edit"></span></a>
			                		<a id="btn_delete'.$list['id_tugas'].'" title="Hapus" class="btn btn-danger btn-xs" onClick="deleteData('.$list['id_tugas'].')" data-delete="Apakah anda yakin ingin menghapus tugas '.$list['file'].'?"><span class="glyphicon glyphicon-trash"></span></a>
			                	</td>';
			        $result .= '<td class="kolom-tengah">
								<a class="btn btn-xs btn-warning" href="/elfis/guru/tugas_detail?id_tugas=' . $list['id_tugas'] . '" title="Detail">
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
	            'result' => $result,
	            'paging' => $paging
	        );

	        echo json_encode($response);

		}
		else {
			return redirect('login');
		}
	}

	public function tugas_add() {

		if(session('id_group') == 2) {

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

			$tugas_mulai 		= date("Y-m-d", strtotime($tugas_mulai));
			$tugas_selesai 		= date("Y-m-d", strtotime($tugas_selesai));

			$add_data_tugas = DB::insert('insert into tugas values ("", '.$id_materi.', "'.$nama_tugas.'", "'.$isi.'", "'.$file_name.'", "'.$tugas_mulai.'", "'.$tugas_selesai.'", "'.$durasi.'")');

			return 'Data telah tersimpan';
		
		} else {	
			return redirect('login');
		}

	}

	public function tugas_detail() {
		if(session('id_group') == 2) {
			

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

			return view('view_guru/tugas/detail', ['data_tugas' => $result]);

			
		}	
		else {
			return redirect('login');
		}
	}

	public function tugas_edit() {
		if(session('id_group') == 2) {

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

			$tugas_mulai 		= date("Y-m-d", strtotime($tugas_mulai));
			$tugas_selesai 		= date("Y-m-d", strtotime($tugas_selesai));			

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

		if(session('id_group') == 2) {

			$id_tugas = trim(Input::get('id_tugas'));
				
			$data_delete = DB::delete('delete from tugas where id_tugas = "'.$id_tugas.'"');

			$this->json['sukses'] = 'Tugas berhasil dihapus';
			echo json_encode($this->json);

		} else {
			return redirect('login');
		}
	
	}


// -------------------------------------------------------- JAWABANTUGAS -------------------------------------------------------

	public function jawaban_tugas() {
		if(session('id_group') == 2) {
			return view('view_guru/tugas/jawaban_tugas');
		}
		else {
			return redirect('login');
		}
	}

	public function jawaban_get_list() {
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

			$data_rows = DB::select('select a.*, b.nama_tugas from jawaban_tugas a JOIN tugas b where a.id_tugas = b.id_tugas '.$sql_ext);
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


			$data_jawaban = DB::select('select a.*, b.nama_tugas from jawaban_tugas a JOIN tugas b where a.id_tugas = b.id_tugas '.$sql_ext.' ORDER BY id_jawaban_tugas DESC LIMIT '.$per_page.' OFFSET '.$offset);

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
			$result .= '<th>NIS</th>';
			$result .= '<th>Siswa/i</th>';
			$result .= '<th>Nama Tugas</th>';
			$result .= '<th>Jawaban Tugas</th>';
			$result .= '<th>Tanggal Unggah</th>';
			$result .= '<th><span class="glyphicon glyphicon-wrench"></span></th>';
			$result .= '<th><span class="glyphicon glyphicon-folder-open"></span></th>';
			$result .= '</tr>';
			$result .= '</thead>';
			$result .= '<tbody class="index">';

			if ($data_jawaban != true) {

				$result .= '<tr>';
				$result .= '<td colspan="8">No Data In Database</td>';
				$result .= '</tr>';
				$result .= '</tbody>';
				$result .= '</table>';

			} else {

				$i = $limit_start;
				foreach ($data_jawaban as $row => $list) {
					$list = get_object_vars($list);

					$tgl_unggah = date("d-m-Y", strtotime($list['tanggal_unggah']));

					$result .= '<tr>';
					$result .= '<td class="kolom-tengah">'.$i.'</td>';
					$result .= '<td>'.$list['nis'].'</td>';
					$result .= '<td>'.$list['upload_by'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['nama_tugas'].'</td>';
					$result .= '<td class="kolom-kiri">'.$list['file'].'</td>';
					$result .= '<td>'.$tgl_unggah.'</td>';
					$result .= '<td class="kolom-tengah">
									<a id="btn_delete'.$list['id_jawaban_tugas'].'" title="Hapus" class="btn btn-danger btn-xs" onClick="deleteData('.$list['id_jawaban_tugas'].')" data-delete="Apakah anda yakin ingin menghapus tugas milik '.$list['upload_by'].' untuk tugas '.$list['nama_tugas'].'?"><span class="glyphicon glyphicon-trash"></span></a>
			                	</td>';
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
	            'result' => $result,
	            'paging' => $paging
	        );

	        echo json_encode($response);

		} else {
			return redirect('login');
		}
	}

	public function jawaban_delete() {

	if(session('id_group') == 2) {

		$id_jawaban_tugas = trim(Input::get('id_jawaban_tugas'));
			
		$data_delete = DB::delete('delete from jawaban_tugas where id_jawaban_tugas = "'.$id_jawaban_tugas.'"');

		$this->json['sukses'] = 'Tugas berhasil dihapus';
		echo json_encode($this->json);

	} else {
		return redirect('login');
	}

}

// -------------------------------------------------------- NILAI TUGAS --------------------------------------------------------

	public function nilai_tugas() {

		if(session('id_group') == 2) {

			$id_tugas = Input::get('add_nama_tugas');
			$nis = Input::get('add_nis');
			$nilai = Input::get('add_nilaiTugas');

			$nilai_tugas = DB::insert('insert into nilai_tugas values ("", '.$id_tugas.', "'.$nis.'", "'.$nilai.'")');

			return 'Data telah tersimpan';
		
		} else {	
			return redirect('login');
		}
	}
}