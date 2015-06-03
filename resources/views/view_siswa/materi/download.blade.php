@extends('templates/siswa_layouts')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/materi_siswa.css') }}">

@section('add_bread_siswa')
<li><a href="{{ URL::to('siswa/materi') }}">Materi</a></li>
@stop

@section('bread_siswa')
Download
@stop

@section('content')

<div class="main-content">
	    <fieldset class="scheduler-border">
	    <legend class="scheduler-border">Detail Materi</legend>
		    <div class="row">
				<div class="col-md-6">
				</div>
				<div class="col-md-6">
					<h3 class="durasi">
						<a href="#" class="btn btn-primary">Unduh</a>
						<a href="{{URL::to('siswa/materi_soal')}}" class="btn btn-primary">Latihan Soal</a>
					</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-6">
				<h3 class="juduldownload"><strong>MTK-01</strong></h3>
					<table class="table">
						<tbody class="index">
							<tr class="baris-tengah">
								<th>Pelajaran</th>
								<td>:</td>
								<td>Matematika</td>
							</tr>
							<tr class="baris-tengah">
								<th>Kelas</th>
								<td>:</td>
								<td>2MM1</td>
							</tr>
							<tr class="baris-tengah">
								<th>Nama Materi</th>
								<td>:</td>
								<td>MTK-01</td>
							</tr>
							<tr class="baris-tengah">
								<th>Oleh</th>
								<td>:</td>
								<td>Dwi</td>
							</tr>				
						</tbody>
			</table>
				</div>
				<div class="col-md-3">
				</div>
			</div>

			<div class="row jarak"></div>

			<div class="row show-grid">
				<div class="col-md-12">
				Isi Materi
				</div>
			</div>

	    </fieldset>
</div>
@stop