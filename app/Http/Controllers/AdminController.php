<?php

namespace App\Http\Controllers;

use Input;
use DB;
use Session;
use Illuminate\Http\Response;

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


// -------------------------------------------------------- MATERI --------------------------------------------------------

	public function materi() {
		if(session('id_group') == 3) {
			return view('view_admin/materi/index');
		}
		else {
			return redirect('login');
		}
	}

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

			$data_tugas = DB::select('select a.*, b.nama_materi, c.nama_pelajaran from tugas a JOIN materi b JOIN pelajaran c where a.id_materi = b.id_materi and b.id_pelajaran = c.id_pelajaran '.$sql_ext);


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
					$result .= '<tr>';
					$result .= '<td class="kolom-tengah">'.$i.'</td>';
					$result .= '<td>'.$list['nama_tugas'].'</td>';
					$result .= '<td>'.$list['nama_materi'].'</td>';
					$result .= '<td>'.$list['nama_pelajaran'].'</td>';
					$result .= '<td>'.$list['tugas_mulai'].'</td>';
					$result .= '<td>'.$list['tugas_selesai'].'</td>';
					$result .= '<td class="kolom-tengah">
									<a class="btn btn-xs btn-success" data-toggle="modal" data-target="#edit_tugas" title="Ubah">
									<span class="glyphicon glyphicon-edit"></span></a>
			                		<a class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></a>
			                	</td>';
			        $result .= '<td class="kolom-tengah">
								<a class="btn btn-xs btn-warning" href="/elfis/admin/tugas_detail" title="Detail">
								<span class="glyphicon glyphicon-new-window"></span>
								</a>
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

		}
		else {
			return redirect('login');
		}
	}

	public function tugas_detail() {
		if(session('id_group') == 3) {
			return view('view_admin/tugas/detail');
		}
		else {
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
			$result .= '<th><span class="glyphicon glyphicon-wrench"></span></th>';
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
					$result .= '<td class="kolom-tengah">'.$list['nis'].'</td>';
					$result .= '<td class="kolom-tengah">'.$list['upload_by'].'</td>';
					$result .= '<td class="kolom-tengah">'.$list['nama_tugas'].'</td>';
					$result .= '<td><a href="#" title="Unduh">'.$list['file'].'<span class="glyphicon glyphicon-download"></span></a></td>';
					$result .= '<td class="kolom-kanan"">'.$list['tanggal_unggah'].'</td>';
					$result .= '<td class="kolom-tengah">
									<a class="btn btn-danger btn-xs" title="Hapus"><span class="glyphicon glyphicon-trash"></span></a>
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
									<a class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-edit"></span> </a> 
			                		<a class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
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


	public function soal_get_list() {
		if(session('id_group') == 3) {

			$id_param = trim(Input::get('id_param'));
			$data_kuis = DB::select('select * from kuis where id_group_kuis="'.$id_param.'"');

			$result = '';

			$result .= '<table class="table table-hover table-bordered table-striped table_soal">';
			$result .= '<thead class="index">';
			$result .= '<tr>';
			$result .= '<th>No</th>';
			$result .= '<th>Soal</th>';
			$result .= '<th>Pilihan A</th>';
			$result .= '<th>Pilihan B</th>';
			$result .= '<th>Pilihan C</th>';
			$result .= '<th>Pilihan D</th>';
			$result .= '<th>Pilihan E</th>';
			$result .= '<th>Jawaban</th>';
			$result .= '<th><span class="glyphicon glyphicon-wrench"></span></th>';
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
					$result .= '<td class="kolom-kiri">'.$list['jawaban'].'</td>';
					$result .= '<td class="kolom-tengah">
									<a class="btn btn-success btn-xs" onClick="getEdit('.$list['id'].')" data-toggle="modal" data-target="#modal-soal-edit"> <span class="glyphicon glyphicon-edit"></span> </a> 
			                		<a class="btn btn-danger btn-xs" onClick="deleteSoal('.$list['id'].')"><span class="glyphicon glyphicon-trash"></span></a>
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


	public function kuisGetId() {

		if(session('id_group') == 3) {

			$get_id = DB::select('select * from param_group_kuis ORDER BY p_id_group_kuis DESC LIMIT 1');

			foreach ($get_id as $key => $value) {
				$value = get_object_vars($value);
				$id_before = $value['p_id_group_kuis']+1;
			}

			return ['data' => $id_before];

		} else {
			return redirect('login');
		}

	}


	public function soal_add_id() {

		if(session('id_group') == 3) {

			$id_kuis = trim(Input::get('id_kuis'));

			$check_data = DB::select('select id_group_kuis from group_kuis where id_group_kuis = "'.$id_kuis.'"');

			if ($check_data != null) {
				return ['data_null' => 'data null'];
			} else {
				$add_id_kuis = DB::insert('insert into group_kuis (id_group_kuis) values ("'.$id_kuis.'")');
			}

		} else {
			return redirect('login');
		}

	}


	public function soal_add() {

		if(session('id_group') == 3) {

			$id_soal = Input::get('id_soal');
			$soal_kuis = Input::get('soal_kuis');
			$jwb_a	= Input::get('jwb_a');
			$jwb_b	= Input::get('jwb_b');
			$jwb_c	= Input::get('jwb_c');
			$jwb_d	= Input::get('jwb_d');
			$jwb_e	= Input::get('jwb_e');
			$jawaban	= Input::get('jawaban');

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



// -------------------------------------------------------- UJIAN --------------------------------------------------------

	public function ujian() {
		if(session('id_group') == 3) {
			return view('view_admin/ujian/index');
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
			                		<a class="btn btn-danger btn-xs" onClick="deleteData('.$list['id_forum'].')"><span class="glyphicon glyphicon-trash"></span></a>
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

			$data_add = DB::insert('insert into forum values (?, ?, ?, ?, ?, ?, ?, ?, ?)',
								['', $nama_forum, $role_access, $subyek, $keterangan, $isi, '0', date('Y-m-d H:i:s'), session('username')]);

			// $message = "Data Telah Ditambah";

			// $response = array (
	  //           'pesan' => $message
	  //       );

	  //       echo json_encode($response);

			return view('view_admin/forum/index');

		} else {
			return redirect('login');
		}

	}


	public function forum_delete() {

		if(session('id_group') == 3) {

			$id_forum = trim(Input::get('id_forum'));
				
			$data_delete = DB::delete('delete from forum where id_forum = "'.$id_forum.'"');

			return view('view_admin/forum/index');

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

			$data_update =  DB::update('update forum set nama_forum = "'.$nama_forum.'", role_access = "'.$role_access.'", subyek = "'.$subyek.'", 
				keterangan = "'.$keterangan.'", isi = "'.$isi.'", forum_create = "'.date('Y-m-d H:i:s').'", forum_create_by = "'.session('username').'" 
				where id_forum = '.$id_forum.'');

			// $data = DB::table('forum')
			// 	->where('id_forum', '=', $id_forum)
			// 	->update(['nama_forum' => $nama_forum], ['role_access' => $role_access], ['subyek' => $subyek], ['keterangan' => $keterangan],
			// 		['isi' => $isi], ['forum_create' => date('Y-m-d H:i:s')], ['forum_create_by' => 'SAdmin']);

			// $data = DB::table('forum')
			// 	->where('id_forum', $id_forum)
			// 	->update(['nama_forum' => $nama_forum])
			// 	->update(['role_access' => $role_access])
			// 	->update(['subyek' => $subyek])
			// 	->update(['keterangan' => $keterangan])
			// 	->update(['isi' => $isi])
			// 	->update(['forum_create' => date('Y-m-d H:i:s')])
			// 	->update(['forum_create_by' => 'Admin']);

			return view('view_admin/forum/index');

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

