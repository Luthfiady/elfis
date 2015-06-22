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


	public function getJurusan() {

		if(session('id_group') == 3) {

			$get_jurusan = DB::select('select DISTINCT * from jurusan ORDER BY id_jurusan ASC');

			$jurusan = "";
			foreach ($get_jurusan as $key => $value) {
				$value = get_object_vars($value);
				$jurusan[] = array(
                    'id_jurusan' => $value['id_jurusan'],
                    'nama_jurusan' => $value['nama_jurusan']
                );
			}

			return ['data' => $jurusan];

		} else {
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
<<<<<<< HEAD
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

			$data_rows = DB::select('select * from tugas '.$sql_ext);
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

			$data_tugas = DB::select('select a.*, b.id_materi, b.nama_materi, c.id_pelajaran, c.nama_pelajaran from tugas a JOIN materi b JOIN pelajaran c where a.id_materi = b.id_materi and b.id_pelajaran = c.id_pelajaran '.$sql_ext.' ORDER BY id_tugas ASC LIMIT '.$per_page.' OFFSET '.$offset);

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
=======
>>>>>>> 655f2c02d1b2df0f7413717a82e937ec8fec51bb


	public function getGuru() {

		if(session('id_group') == 3) {

			$get_guru = DB::select('select DISTINCT * from guru ORDER BY nik ASC');

			$guru = "";
			foreach ($get_guru as $key => $value) {
				$value = get_object_vars($value);
				$guru[] = array(
                    'nik' => $value['nik'],
                    'nama' => $value['nama']
                );
			}

			return ['data' => $guru];

		} else {
			return redirect('login');
		}

	}

	
}

