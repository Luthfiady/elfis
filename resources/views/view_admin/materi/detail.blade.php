@extends('templates/admin_layouts')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/apps/materi_admin.css') }}">

@section('add_bread_admin')
<li><a href="{{ URL::to('admin/materi') }}">Materi</a></li>
@stop

@section('bread_admin')
Detail Materi dan Soal
@stop

@section('content')

<div class="main-content">
	    <fieldset class="scheduler-border">
	    <legend class="scheduler-border">Detail Materi </legend>
		    <div class="row">
				<div class="col-md-6">
				</div>
				<div class="col-md-6">					
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

			<div class="row">
				<div class="col-md-6">
				</div>
				<div class="col-md-6">
					<h3 class="durasi">
						<a href="#" id="add_button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editMateri">Edit</a>
						<a href="#" id="add_button" class="btn btn-primary" data-toggle="modal" data-target="#deleteMateri" title="hapus">Hapus</a>
					</h3>
				</div>
			</div>
				<div class="row show-grid">
					<div class="col-md-12">
					Isi Materi 
					</div>
				</div>

	    </fieldset>

	    <div class="row jarak"></div>

	    <fieldset class="scheduler-border">
	    <legend class="scheduler-border">Detail Soal</legend>
		    <div class="row">
				<div class="col-md-6">
				</div>
				<div class="col-md-6">
					<h3 class="durasi">
						<a href="#" id="add_button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editMateri">Edit</a>
						<a href="#" id="add_button" class="btn btn-primary" data-toggle="modal" data-target="#deleteSoal" title="hapus">Hapus</a>
					</h3>
				</div>
			</div>
				<div class="row show-grid">
					<div class="col-md-12">
					Isi Soal
					</div>
				</div>

				<div class="row jarak"></div>

				<div class="row">
					<div class="col-md-12">
						<div class="col-md-3">
							<table class="table">
								<tbody class="index">
									<tr class="baris-tengah">
										<th>Jawaban A</th>
										<td>:</td>
										<td>10</td>
									</tr>
									<tr class="baris-tengah">
										<th>Jawaban B</th>
										<td>:</td>
										<td>9</td>
									</tr>
									<tr class="baris-tengah">
										<th>Jawaban C</th>
										<td>:</td>
										<td>8</td>
									</tr>
									<tr class="baris-tengah">
										<th>Jawaban D</th>
										<td>:</td>
										<td>7</td>
									</tr>
									<tr class="baris-tengah">
										<th style="color:red">Jawaban Benar</th>
										<td>:</td>
										<td>10</td>
									</tr>				
								</tbody>
							</table>
						</div>
					</div>
				</div>

	    </fieldset>

	    <!-- ///////////////////////////////////////////////////////////// Modal Delete Materi ///////////////////////////////////////////////////////////// -->

		<div class="modal fade" id="deleteMateri" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			@include('view_admin.materi.modal_delete')
		</div>


	    <!-- ///////////////////////////////////////////////////////////// Modal Delete Soal ///////////////////////////////////////////////////////////// -->

		<div class="modal fade" id="deleteSoal" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			@include('view_admin.materi.modal_deleteSoal')
		</div>

</div>
@stop