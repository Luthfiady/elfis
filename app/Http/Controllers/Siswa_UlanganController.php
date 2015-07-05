<?php 

namespace App\Http\Controllers;

use Input;
use DB;
use Session;
use Illuminate\Http\Response;

class Siswa_UlanganController extends Controller {

	public $status = false;

// -------------------------------------------------------- ULANGAN --------------------------------------------------------

	public function ulangan() {
		if(session('id_group') == 1) {
			return view('view_siswa/ulangan/index');
		}
		else {
			return redirect('login');
		}
	}
 

	public function ulangan_get_list() {
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

			$cek_data_soal = DB::select('select id_group_ulangan from nilai_ulangan where nis="'.session('id_user').'"');
			
			
			if ($cek_data_soal!=null) {
				$and_data = '';
				foreach ($cek_data_soal as $cek => $gets) {
					$gets = get_object_vars($gets);
					$p_id = $gets['id_group_ulangan'];
					$jml_data = count($cek_data_soal);
					$l = $jml_data;

					for($c=1; $c<=$l; $c++){					 
						$and_data .= 'and a.id_group_ulangan<>"'.$p_id.'" ';
					}
				}

			} else {
				$and_data = '';
			}

			$data_rows = DB::select('select a.*,b.nama_materi,c.nama from group_ulangan a join materi b join guru c where a.id_materi=b.id_materi and b.nik=c.nik and (ulangan_mulai<=ADDDATE("'.date('Y-m-d').'",7) and ulangan_selesai>="'.date('Y-m-d').'") '.$and_data.' '.$sql_ext);
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

			$data_ulangan = DB::select('select a.*,b.nama_materi,c.nama from group_ulangan a join materi b join guru c where a.id_materi=b.id_materi and b.nik=c.nik and (ulangan_mulai<=ADDDATE("'.date('Y-m-d').'",7) and ulangan_selesai>="'.date('Y-m-d').'") '.$and_data.' '.$sql_ext.' ORDER BY a.ulangan_mulai ASC LIMIT '.$per_page.' OFFSET '.$offset);

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
			$result .= '<th>Nama Guru</th>';
			$result .= '<th>Tanggal Mulai</th>';
			$result .= '<th>Tanggal Selesai</th>';
			$result .= '<th>Durasi Ulangan</th>';
			$result .= '<th><span class="glyphicon glyphicon-folder-open"></span></th>';
			$result .= '</tr>';
			$result .= '</thead>';
			$result .= '<tbody class="index">';

			if ($data_ulangan != true) {

				$result .= '<tr>';
				$result .= '<td colspan="8">Tidak ada soal ulangan</td>';
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
					$result .= '<td class="kolom-kiri">'.$list['nama'].'</td>';
					$result .= '<td class="kolom-kanan">'.$list['ulangan_mulai'].'</td>';
					$result .= '<td class="kolom-kanan">'.$list['ulangan_selesai'].'</td>';
					$result .= '<td class="kolom-kanan">'.$list['durasi'].'</td>';

					$tgl_ulangan_mulai = $list['ulangan_mulai'];

					if ($tgl_ulangan_mulai > date('Y-m-d')) {
						$result .= '<td class="kolom-tengah"><a class="btn btn-xs btn-warning" href="ulangan/'.$list['nama_group_ulangan'].'/'.$list['id'].'" disabled>
									<span class="glyphicon glyphicon-new-window"></span></a>
								</td>';
					} else {
						$result .= '<td class="kolom-tengah"><a class="btn btn-xs btn-warning" href="ulangan/'.$list['nama_group_ulangan'].'/'.$list['id'].'">
									<span class="glyphicon glyphicon-new-window"></span></a>
								</td>';
					}

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


	public function ulangan_soal($nama_group_ulangan, $id) {
		if(session('id_group') == 1) {

			$user = session('id_user');

			session_start();

			if(isset($_SESSION["durasi_ulangan".$user.$id])) {
				$session_durasi = time() - $_SESSION["durasi_ulangan".$user.$id];
			} else {
				$_SESSION["durasi_ulangan".$user.$id] = time();
				$session_durasi = 0;
			}

			return view('view_siswa/ulangan/soal')->with('nama_group_ulangan', $nama_group_ulangan)->with('id', $id)->with('session_durasi', $session_durasi);
		}
		else {
			return redirect('login');
		}
	}


	public function ulangan_get_id() {
		if(session('id_group') == 1) {

			$id = Input::get('id');

			$get_id = DB::select('select * from group_ulangan where id='.$id);

			foreach ($get_id as $list => $row) {
				$row = get_object_vars($row);
				$data_row = [

					'id_group_ulangan'	=>	$row['id_group_ulangan'],
					'durasi'		=>	$row['durasi']

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


	public function ulangan_get_soal() {
		if(session('id_group') == 1) {

			$id_group_ulangan = Input::get('id_group_ulangan');

			if(Input::get('paging') == null) {
				$nopage = 1;
	        }
	        else{
	            $nopage = Input::get('paging');
	        }

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

	        if ($nopage > 1) $paging .= '<li class="previous pga"><a class="paging" href="#" aria-label="Previous" id="'.$prev.'"> <span aria-hidden="true">&larr;</span> Sebelumnya</a></li>';
	      	
	        if ($nopage < $total_page) {
	        	$paging .= '<li class="next pga"><a class="paging" href="#" aria-label="Next" id="'.$next.'"> Selanjutnya <span aria-hidden="true">&rarr;</span> </a></li>';
	        }
	        elseif ($nopage = $total_page) {
	        	$paging .= '<li class="next pgn"><a id="submit_getNilai" class="btn btn-lg paging next-nilai"> Selesai </a></li>';
	        }


			$result = '';

			$result .= '<table class="table table-soal">';

			if ($data_ulangan == null) {

				$result .= '<thead class="thead-soal">';
				$result .= '<tr>';
				$result .= '<th> Soal Tidak Tersedia </th>';
				$result .= '<tr>';
				$result .= '</thead>';
				$result .= '</table>';

			} else {

				$i = $limit_start;
				$a = 1;
				foreach ($data_ulangan as $row => $list) {
					$list = get_object_vars($list);

					$id_jwb_user = $list['id'].session('id_user');

					$radio_show = DB::select('select jawaban from param_radio_ulangan where id_jwb_user="radio_'.$id_jwb_user.'"');
					
					$result .= '<thead class="thead-soal">';
					$result .= '<tr>';
					$result .= '<th width="30px">'.$i.'.</th>';
					$result .= '<th class="kolom-justify">'.$list['soal'].'</th>';
					$result .= '<tr>';
					$result .= '</thead>';
					$result .= '<tbody>';
					$result .= '<tr>';
					$result .= '<td><input type="hidden" name="id_soal_'.$a.'" value="'.$list['id'].'">';
					$result .= '<input type="hidden" name="id_group_ulangan" value="'.$list['id_group_ulangan'].'">';
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


	public function AddParamJawaban() {
		if(session('id_group') == 1) {

			$a=1;

			if(isset($_POST)){
				
				$id_group_ulangan = $_POST['id_group_ulangan'];

				for($i=1; $i<=$a; $i++){

					if(isset($_POST['id_soal_'.$a])){

						$id_soal = $_POST['id_soal_'.$a];
						$id_jwb_user = $_POST['input_jwb_'.$a];

						$cek_data = DB::select('select id_jwb_user from param_radio_ulangan where id_jwb_user="'.$id_jwb_user.'"');

						if (isset($_POST[$id_jwb_user])) {
							$jawaban = $_POST[$id_jwb_user];

							if ($cek_data == null) {
								$insert_param_jwb = DB::insert('insert into param_radio_ulangan values("", "'.$id_group_ulangan.'", "'.$id_soal.'", "'.$jawaban.'", "'.$id_jwb_user.'", "'.date('Y-m-d H:i:s').'", "'.session('id_user').'")');
							} else {
								$update_param_jwb = DB::update('update param_radio_ulangan set jawaban="'.$jawaban.'" where id_jwb_user="'.$id_jwb_user.'"');
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

	public function ulangan_get_nilai() {
		
		if(session('id_group') == 1) {

			$id_group_ulangan = Input::get('id_group_ulangan');

			$soal = DB::select('select * from ulangan where id_group_ulangan="'.$id_group_ulangan.'"');
			$jawaban = DB::select('select b.jawaban from param_radio_ulangan a join ulangan b where a.id_soal=b.id and a.jawaban=b.jawaban and a.id_group_ulangan="'.$id_group_ulangan.'" and a.nis="'.session('id_user').'"');

			$jml_soal = count($soal);
			$jwb_benar = count($jawaban);

			$nilai = ($jwb_benar / $jml_soal) * 100;
			$total_nilai = round($nilai, 2);

			$result = '';

			$result .= '<div class="col-md-12 nilai-kiri">';
			$result .= '<div class="col-md-4"></div>';
			$result .= '<div class="col-md-4">';

			$result .= '<legend> <h3 class="legend"> Hasil Ulangan </h3> </legend>';
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
								<a href="../../ulangan" type="submit" class="btn btn-primary btn-sm">Tutup</a>
							</div>
					    </div>';
			$result .= '</div>';
			$result .= '<div class="col-md-4"></div>';
			$result .= '</div>';
			$result .= '';

			$insert_nilai = DB::insert('insert into nilai_ulangan values("", "'.$id_group_ulangan.'", "'.session('id_user').'", "'.$total_nilai.'", "'.date('Y-m-d H:i:s').'")');

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