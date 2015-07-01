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

