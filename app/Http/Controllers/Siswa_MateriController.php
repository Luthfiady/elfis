<?php 

namespace App\Http\Controllers;

use Input;
use DB;
use Session;
use Illuminate\Http\Response;

class Siswa_MateriController extends Controller {

	public $status = false;

// -------------------------------------------------------- MATERI --------------------------------------------------------
	public function materi() {

		if(session('id_group') == 1) {
			$pelajaran = DB::table('pelajaran')->get(['id_pelajaran', 'nama_pelajaran']);
			$kelas = DB::table('kelas')->get(['id_kelas', 'nama_kelas']);
			$guru = DB::table('guru')->get(['nik', 'nama']);

			return view('view_siswa/materi/index', ['data_pelajaran' => $pelajaran, 'data_kelas' => $kelas, 'data_guru' => $guru]);
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
			        $result .= '<td class="kolom-tengah"><a class="btn btn-xs btn-warning" href="/elfis/siswa/materi_detail?id_materi=' . $list['id_materi'] . '" title="Detail">
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


	public function materi_detail() {
		if(session('id_group') == 1) {			

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
			
			return view('view_siswa/materi/detail', ['data_materi' => $result]);

			
		}	
		else {
			return redirect('login');
		}
	}

// -------------------------------------------------------- LATIHAN --------------------------------------------------------
	public function latihan() {
		if(session('id_group') == 1) {
			return view('view_siswa/materi/indexLatihan');
		}
		else {
			return redirect('login');
		}
	}
 

	public function latihan_get_list() {
		if(session('id_group') == 1) {

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

			$cek_data_soal = DB::select('select id_group_latihan from nilai_latihan where nis="'.session('id_user').'"');
			
			
			if ($cek_data_soal!=null) {
				$and_data = '';
				foreach ($cek_data_soal as $cek => $gets) {
					$gets = get_object_vars($gets);
					$p_id = $gets['id_group_latihan'];
					$jml_data = count($cek_data_soal);
					$l = $jml_data;

					for($c=1; $c<=$l; $c++){					 
						$and_data .= 'and a.id_group_latihan<>"'.$p_id.'" ';
					}
				}

			} else {
				$and_data = '';
			}

			$data_rows = DB::select('select a.*,b.nama_materi,c.nama from group_latihan a join materi b join guru c where a.id_materi=b.id_materi and b.nik=c.nik '.$and_data.' '.$sql_ext);
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

			$data_latihan = DB::select('select a.*,b.nama_materi,c.nama from group_latihan a join materi b join guru c where a.id_materi=b.id_materi and b.nik=c.nik '.$and_data.' '.$sql_ext.' ORDER BY id_group_latihan ASC LIMIT '.$per_page.' OFFSET '.$offset);

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
			$result .= '<th>Nama Guru</th>';
			$result .= '<th><span class="glyphicon glyphicon-folder-open"></span></th>';
			$result .= '</tr>';
			$result .= '</thead>';
			$result .= '<tbody class="index">';

			if ($data_latihan != true) {

				$result .= '<tr>';
				$result .= '<td colspan="8">Tidak ada soal latihan</td>';
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
					$result .= '<td class="kolom-kiri">'.$list['nama'].'</td>';

				
					$result .= '<td class="kolom-tengah"><a class="btn btn-xs btn-warning" href="latihan/'.$list['nama_group_latihan'].'/'.$list['id'].'">
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


	public function latihan_soal($nama_group_latihan, $id) {
		if(session('id_group') == 1) {

			$user = session('id_user');

			session_start();

			if(isset($_SESSION["durasi_latihan".$user.$id])) {
				$session_durasi = time() - $_SESSION["durasi_latihan".$user.$id];
			} else {
				$_SESSION["durasi_latihan".$user.$id] = time();
				$session_durasi = 0;
			}

			return view('view_siswa/materi/soal')->with('nama_group_latihan', $nama_group_latihan)->with('id', $id)->with('session_durasi', $session_durasi);
		}
		else {
			return redirect('login');
		}
	}


	public function latihan_get_id() {
		if(session('id_group') == 1) {

			$id = Input::get('id');

			$get_id = DB::select('select * from group_latihan where id='.$id);

			foreach ($get_id as $list => $row) {
				$row = get_object_vars($row);
				$data_row = [

					'id_group_latihan'	=>	$row['id_group_latihan']

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


	public function latihan_get_soal() {
		if(session('id_group') == 1) {

			$id_group_latihan = Input::get('id_group_latihan');

			if(Input::get('paging') == null) {
				$nopage = 1;
	        }
	        else{
	            $nopage = Input::get('paging');
	        }

			$data_rows = DB::select('select * from latihan where id_group_latihan="'.$id_group_latihan.'"');
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

			$data_latihan = DB::select('select * from latihan where id_group_latihan="'.$id_group_latihan.'" ORDER BY id ASC LIMIT '.$per_page.' OFFSET '.$offset);

			$limit_start = $offset + 1;

	        $prev = $nopage - 1;
	        $next = $nopage + 1;

	        $paging = '';

	        if ($nopage > 1) $paging .= '<li class="previous pga"><a class="paging" href="#" aria-label="Previous" id="'.$prev.'"> <span aria-hidden="true">&larr;</span> Sebelumnya</a></li>';
	      	
	        if ($nopage < $total_page) {
	        	$paging .= '<li class="next pga"><a class="paging" href="#" aria-label="Next" id="'.$next.'"> Selanjutnya <span aria-hidden="true">&rarr;</span> </a></li>';
	        }
	        elseif ($nopage = $total_page) {
	        	$paging .= '<li class="next pgn"><a id="submit_getNilai" class="btn btn-lg paging next-nilai"> Selesai </a></li>';
	        }


			$result = '';

			$result .= '<table class="table table-soal">';

			if ($data_latihan == null) {

				$result .= '<thead class="thead-soal">';
				$result .= '<tr>';
				$result .= '<th> Soal Tidak Tersedia </th>';
				$result .= '<tr>';
				$result .= '</thead>';
				$result .= '</table>';

			} else {

				$i = $limit_start;
				$a = 1;
				foreach ($data_latihan as $row => $list) {
					$list = get_object_vars($list);

					$id_jwb_user = $list['id'].session('id_user');

					$radio_show = DB::select('select jawaban from param_radio_latihan where id_jwb_user="radio_'.$id_jwb_user.'"');
					
					$result .= '<thead class="thead-soal">';
					$result .= '<tr>';
					$result .= '<th width="30px">'.$i.'.</th>';
					$result .= '<th class="kolom-justify">'.$list['soal'].'</th>';
					$result .= '<tr>';
					$result .= '</thead>';
					$result .= '<tbody>';
					$result .= '<tr>';
					$result .= '<td><input type="hidden" name="id_soal_'.$a.'" value="'.$list['id'].'">';
					$result .= '<input type="hidden" name="id_group_latihan" value="'.$list['id_group_latihan'].'">';
					$result .= '<input id="input_jwb" type="hidden" name="input_jwb_'.$a.'" value="radio_'.$id_jwb_user.'"</td>';
					$result .= '<td class="kolom-justify">';
					
					$a++;

					if ($radio_show == null) {

						$result .= '<div class="radio"><label> <input type="radio" name="radio_'.$id_jwb_user.'" value="A" /> '.$list['pil_a'].' </label></div>';
						$result .= '<div class="radio"><label> <input type="radio" name="radio_'.$id_jwb_user.'" value="B" /> '.$list['pil_b'].' </label></div>';
						$result .= '<div class="radio"><label> <input type="radio" name="radio_'.$id_jwb_user.'" value="C" /> '.$list['pil_c'].' </label></div>';
						$result .= '<div class="radio"><label> <input type="radio" name="radio_'.$id_jwb_user.'" value="D" /> '.$list['pil_d'].' </label></div>';
						$result .= '<div class="radio"><label> <input type="radio" name="radio_'.$id_jwb_user.'" value="E" /> '.$list['pil_e'].' </label></div>';
						
					} else {
						foreach ($radio_show as $key => $value) {
							$value = get_object_vars($value);
							$cek_radio = $value['jawaban'];
							

							if($cek_radio == "A") {
								$cek_a = 'checked="checked"';
								$cek_b = '';
								$cek_c = '';
								$cek_d = '';
								$cek_e = '';
							} 
							elseif($cek_radio == "B") {
								$cek_b = 'checked="checked"';
								$cek_a = '';
								$cek_c = '';
								$cek_d = '';
								$cek_e = '';
							}
							elseif($cek_radio == "C") {
								$cek_c = 'checked="checked"';
								$cek_a = '';
								$cek_b = '';
								$cek_d = '';
								$cek_e = '';
							}
							elseif($cek_radio == "D") {
								$cek_d = 'checked="checked"';
								$cek_a = '';
								$cek_b = '';
								$cek_c = '';
								$cek_e = '';
							}
							elseif($cek_radio == "E") {
								$cek_e = 'checked="checked"';
								$cek_a = '';
								$cek_b = '';
								$cek_c = '';
								$cek_d = '';
							}

							$result .= '<div class="radio"><label> <input type="radio" name="radio_'.$id_jwb_user.'" value="A" '.$cek_a.' /> '.$list['pil_a'].' </label></div>';
							$result .= '<div class="radio"><label> <input type="radio" name="radio_'.$id_jwb_user.'" value="B" '.$cek_b.' /> '.$list['pil_b'].' </label></div>';
							$result .= '<div class="radio"><label> <input type="radio" name="radio_'.$id_jwb_user.'" value="C" '.$cek_c.' /> '.$list['pil_c'].' </label></div>';
							$result .= '<div class="radio"><label> <input type="radio" name="radio_'.$id_jwb_user.'" value="D" '.$cek_d.' /> '.$list['pil_d'].' </label></div>';
							$result .= '<div class="radio"><label> <input type="radio" name="radio_'.$id_jwb_user.'" value="E" '.$cek_e.' /> '.$list['pil_e'].' </label></div>';
						
						}

					}

					$result .= '</td>';
					$result .= '</tr>';
					$result .= '</tbody>';
					$i++;

				}

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


	public function latihan_AddParamJawaban() {
		if(session('id_group') == 1) {

			$a=1;

			if(isset($_POST)){
				
				$id_group_latihan = $_POST['id_group_latihan'];

				for($i=1; $i<=$a; $i++){

					if(isset($_POST['id_soal_'.$a])){

						$id_soal = $_POST['id_soal_'.$a];
						$id_jwb_user = $_POST['input_jwb_'.$a];

						$cek_data = DB::select('select id_jwb_user from param_radio_latihan where id_jwb_user="'.$id_jwb_user.'"');

						if (isset($_POST[$id_jwb_user])) {
							$jawaban = $_POST[$id_jwb_user];

							if ($cek_data == null) {
								$insert_param_jwb = DB::insert('insert into param_radio_latihan values("", "'.$id_group_latihan.'", "'.$id_soal.'", "'.$jawaban.'", "'.$id_jwb_user.'", "'.date('Y-m-d H:i:s').'", "'.session('id_user').'")');
							} else {
								$update_param_jwb = DB::update('update param_radio_latihan set jawaban="'.$jawaban.'" where id_jwb_user="'.$id_jwb_user.'"');
							}
						} else {
							
						}
						
						$a++;

					} else {
						$a = $i;
					}
					
				}
				
			} else {
				$this->json['data'] = 'data null';
				echo json_encode($this->json);
			}

		}
		else {
			return redirect('login');
		}
	}


	// -------------------------------------------------------- Nilai --------------------------------------------------------

	public function latihan_get_nilai() {
		
		if(session('id_group') == 1) {

			$id_group_latihan = Input::get('id_group_latihan');

			$soal = DB::select('select * from latihan where id_group_latihan="'.$id_group_latihan.'"');
			$jawaban = DB::select('select b.jawaban from param_radio_latihan a join latihan b where a.id_soal=b.id and a.jawaban=b.jawaban and a.id_group_latihan="'.$id_group_latihan.'" and a.nis="'.session('id_user').'"');

			$jml_soal = count($soal);
			$jwb_benar = count($jawaban);

			$nilai = ($jwb_benar / $jml_soal) * 100;
			$total_nilai = round($nilai, 2);

			$result = '';

			$result .= '<div class="col-md-12 nilai-kiri">';
			$result .= '<div class="col-md-4"></div>';
			$result .= '<div class="col-md-4">';

			$result .= '<legend> <h3 class="legend"> Hasil Latihan </h3> </legend>';
			$result .= '<div class="form-group">
							<p class="col-sm-6">Jawaban Benar</p>
					        <p class="col-sm-6">: &nbsp '.$jwb_benar.' </p>
						</div>';
			$result .= '<div class="form-group">
							<p class="col-sm-6">Total Soal</p>
					        <p class="col-sm-6">: &nbsp '.$jml_soal.' </p>
						</div>';
			$result .= '<div class="form-group">
							<p class="col-sm-6">Nilai</p>
					        <p class="col-sm-6">: &nbsp '.$total_nilai.' </p>
						</div>';
			$result .= '<div class="form-group">
							<div class="col-sm-12" style="text-align:center;">
								<a href="../../latihan" type="submit" class="btn btn-primary btn-sm">Tutup</a>
							</div>
					    </div>';
			$result .= '</div>';
			$result .= '<div class="col-md-4"></div>';
			$result .= '</div>';
			$result .= '';

			$insert_nilai = DB::insert('insert into nilai_latihan values("", "'.$id_group_latihan.'", "'.session('id_user').'", "'.$total_nilai.'", "'.date('Y-m-d H:i:s').'")');

			$response = array (
	            'result' => $result
	        );

	        echo json_encode($response);


		}
		else {
			return redirect('login');
		}

	}


}