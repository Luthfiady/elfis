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

class Admin_NilaiController extends Controller {

	public $status = false;

	public function nilai() {
		if(session('id_group') == 3) {
			return view('view_admin/nilai/index');
		}
		else {
			return redirect('login');
		}
	}


	public function nilai_get_list() {
		if(session('id_group') == 3) {

			$kategori 	= trim(Input::get('kategori'));
			$materi 	= Input::get('nama_materi');
			$jurusan 	= Input::get('nama_jurusan');
			$kelas 		= Input::get('nama_kelas');

			if($kategori != null) {

				if(Input::get('paging') == null) {
					$nopage = 1;
		        }
		        else{
		            $nopage = Input::get('paging');
		        }


		        $sql_ext = '';
				if ($jurusan != null) {
					$sql_ext .= ' and f.id_jurusan="'.$jurusan.'"';
				} else {
					$sql_ext .= '';
				}

				if ($kelas != null) {
					$sql_ext .= ' and e.id_kelas="'.$kelas.'"';
				} else {
					$sql_ext .= '';
				}

				if ($materi != null) {
					$sql_ext .= ' and c.id_materi="'.$materi.'"';
				} else {
					$sql_ext .= '';
				}


				if ($kategori == 'Kuis') {

					$data_rows = DB::select('select a.*, c.nama_materi, d.nama, e.nama_kelas, f.nama_jurusan from nilai_kuis a join group_kuis b join materi c join siswa d join kelas e join jurusan f where a.id_group_kuis=b.id_group_kuis and b.id_materi=c.id_materi and a.nis=d.nis and d.id_kelas=e.id_kelas and e.id_jurusan=f.id_jurusan'.$sql_ext);

					$has_sql = 'select a.*, c.nama_materi, d.nama, e.nama_kelas, f.nama_jurusan from nilai_kuis a join group_kuis b join materi c join siswa d join kelas e join jurusan f where a.id_group_kuis = b.id_group_kuis and b.id_materi = c.id_materi and a.nis = d.nis and d.id_kelas = e.id_kelas and e.id_jurusan = f.id_jurusan';

				} elseif ($kategori == 'Tugas') {
					
					$data_rows = DB::select('select a.*, c.nama_materi, d.nama, e.nama_kelas, f.nama_jurusan from nilai_tugas a join tugas b join materi c join siswa d join kelas e join jurusan f where a.id_tugas = b.id_tugas and b.id_materi = c.id_materi and a.nis = d.nis and d.id_kelas = e.id_kelas and e.id_jurusan = f.id_jurusan'.$sql_ext);

					$has_sql = 'select a.*, c.nama_materi, d.nama, e.nama_kelas, f.nama_jurusan from nilai_tugas a join tugas b join materi c join siswa d join kelas e join jurusan f where a.id_tugas = b.id_tugas and b.id_materi = c.id_materi and a.nis = d.nis and d.id_kelas = e.id_kelas and e.id_jurusan = f.id_jurusan';

				} elseif ($kategori == 'Ulangan') {
					
					$data_rows = DB::select('select a.*, c.nama_materi, d.nama, e.nama_kelas, f.nama_jurusan from nilai_ulangan a join group_ulangan b join materi c join siswa d join kelas e join jurusan f where a.id_group_ulangan = b.id_group_ulangan and b.id_materi = c.id_materi and a.nis = d.nis and d.id_kelas = e.id_kelas and e.id_jurusan = f.id_jurusan'.$sql_ext);

					$has_sql = 'select a.*, c.nama_materi, d.nama, e.nama_kelas, f.nama_jurusan from nilai_ulangan a join group_ulangan b join materi c join siswa d join kelas e join jurusan f where a.id_group_ulangan = b.id_group_ulangan and b.id_materi = c.id_materi and a.nis = d.nis and d.id_kelas = e.id_kelas and e.id_jurusan = f.id_jurusan';

				}

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

				$data_nilai = DB::select($has_sql.' '.$sql_ext.' ORDER BY e.id_kelas ASC LIMIT '.$per_page.' OFFSET '.$offset);

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
				$result .= '<th>Nama Siswa</th>';
				$result .= '<th>Jurusan</th>';
				$result .= '<th>Kelas</th>';
				$result .= '<th>Nama Materi</th>';
				$result .= '<th>Keterangan</th>';
				$result .= '<th>Nilai</th>';
				$result .= '</tr>';
				$result .= '</thead>';
				$result .= '<tbody class="index">';

				if ($data_nilai != true) {

					$result .= '<tr>';
					$result .= '<td colspan="8">No Data In Database</td>';
					$result .= '</tr>';
					$result .= '</tbody>';
					$result .= '</table>';

				} else {

					$i = $limit_start;
					foreach ($data_nilai as $row => $list) {
						$list = get_object_vars($list);

						$result .= '<tr>';
						$result .= '<td class="kolom-tengah">'.$i.'</td>';
						$result .= '<td class="kolom-tengah">'.$list['nis'].'</td>';
						$result .= '<td class="kolom-kiri">'.$list['nama'].'</td>';
						$result .= '<td class="kolom-kiri">'.$list['nama_jurusan'].'</td>';
						$result .= '<td class="kolom-tengah">'.$list['nama_kelas'].'</td>';
						$result .= '<td class="kolom-kiri">'.$list['nama_materi'].'</td>';
						$result .= '<td class="kolom-tengah">'.$kategori.'</td>';
						$result .= '<td class="kolom-kanan">'.$list['nilai'].'</td>';
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

				$this->json['data_null'] = 'Pilih Kategori Nilai';
				echo json_encode($this->json);

			}

			
		} else {
			return redirect('login');
		}
	}

}