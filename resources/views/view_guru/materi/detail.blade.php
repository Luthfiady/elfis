@extends('templates/guru_layouts')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/materi_guru.css') }}">

@section('bread_guru')
Detail Materi
@stop

@section('content')

<div class="main-content">
	<fieldset class="scheduler-border">
        <legend class="scheduler-border">Detail Materi</legend>

    <div class="row show-grid">
		<div class="col-md-3">
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
		<div class="col-md-8">
		aku
		</div>
	</div>
	</fieldset>

	<fieldset class="scheduler-border">
        <legend class="scheduler-border">Detail Soal</legend>
    <div class="row">
			<table class="table">
				<tbody class="index">
					<tr class="col-md-3 baris-tengah">
						<th>Soal</th>
						<td>:</td>
						<td>1</td>
					</tr>
					<tr class="col-md-3 baris-tengah">
						<th></th>
						<td></td>
						<td></td>
					</tr>
					<tr class="col-md-3 baris-tengah">
						<th></th>
						<td></td>
						<td></td>
					</tr>
					<tr class="col-md-3 baris-tengah" style="color: red">
						<th>Jumlah Soal</th>
						<td>:</td>
						<td>15</td>
					</tr>
					<tr class="col-md-3 baris-tengah">
						<th>Jawaban A</th>
						<td>:</td>
						<td>Aku</td>
					</tr>
					<tr class="col-md-3 baris-tengah">
						<th>Jawaban B</th>
						<td>:</td>
						<td>Kamu</td>
					</tr>
					<tr class="col-md-3 baris-tengah">
						<th>Jawaban C</th>
						<td>:</td>
						<td>Dia</td>
					</tr>
					<tr class="col-md-3 baris-tengah">
						<th>Jawaban D</th>
						<td>:</td>
						<td>Anda</td>
					</tr>
					<tr class="col-md-3 baris-tengah">
						<th>Jawaban Benar</th>
						<td>:</td>
						<td>A</td>
					</tr>				
				</tbody>
			</table>
	</div>
	<div class="modal-footer">
		<table class="table">
			<tr class="col-md-3">
			</tr>
			<tr class="col-md-3">
			</tr>
			<tr class="col-md-3">
			</tr>
			<tr class="col-md-3 baris-kanan" style="color: red">
				<th>Jawaban Benar</th>
				<td>:</td>
				<td>A</td>
			</tr>
		</table>
	</div>
    </fieldset> 

    <fieldset class="scheduler-border">
        <legend class="scheduler-border">Diakses Oleh</legend>

    <div class="row">
		<div class="col-md-3 table-responsive">			
			<table class="table table-hover table-bordered table-striped">
				<thead class="index">
					<tr>
						<th>Nama Siswa</th>
						<th>Nama Materi</th>
					</tr>
				</thead>
				<tbody class="index">
					<tr>
						<td class="kolom-tengah">1</td>
						<td class="kolom-tengah">MTK-01</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	</fieldset>   

</div>

@stop