@extends('templates/siswa_layouts')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/tugas.css') }}">

@section('add_bread_siswa')
<li><a href="{{ URL::to('siswa/tugas') }}">Tugas</a></li>
@stop

@section('bread_siswa')
Menggambar Gunung
@stop

@section('content')

<div class="main-content">

	<div class="row row-judul">

		<div class="col-md-12">
				<table class="table table-soal table-bordered">
					<thead class="tugas">
						<tr>
							<th colspan="2"><legend><h3 class="judul-tugas"> Menggambar Gunung </h3></legend></th>
						</tr>
					</thead>
					<tbody class="tugas">
						<tr>
							<td class="kolom-kanan">Materi</td>
							<td class="kolom-kiri">: &nbsp Manusia dan Lingkungan</td>
						</tr>
						<tr>
							<td class="kolom-kanan">Pelajaran</td>
							<td class="kolom-kiri">: &nbsp Biologi</td>
						</tr>
							<td class="kolom-kanan">Tugas Mulai</td>
							<td class="kolom-kiri">: &nbsp 6/03/2015</td>
						</tr>
						<tr>
							<td class="kolom-kanan">Tugas Selesai</td>
							<td class="kolom-kiri">: &nbsp 8/03/2015</td>
						</tr>
						<tr>
							<td class="kolom-kanan">File Tugas</td>
							<td class="kolom-kiri">: &nbsp ManusiaLingkungan.doc</td>
						</tr>
						<tr>
							<td colspan="2">Isi:</td>
						</tr>
					</tbody>
				</table>
				<div class="form-group">
					<div class="col-sm-12" style="text-align:center;">
						<a href="" class="btn btn-primary btn-sm">Unduh</a>
						<a href="{{URL::to('siswa/tugas')}}" type="submit" class="btn btn-primary btn-sm">Tutup</a>
					</div>
	    		</div>
			</div>
		</div>

	</div>

</div>

@stop