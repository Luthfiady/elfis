@extends('templates/admin_layouts')

@section('add_bread_admin')
<li><a href="{{ URL::to('admin/kuis') }}">Kuis</a></li>
@stop

@section('bread_admin')
Tambah Kuis
@stop
	
@section('content')

<div class="main-content">

	<!-- ///////////////////////////////////////////////////////////// Detail Kuis ///////////////////////////////////////////////////////////// -->
 
	<div class="row row-judul">
		<div class="col-md-12">
			<legend> <h4 class="judul-soal"> Detail Kuis </h4> </legend>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form id="add_form" class="form form-horizontal" role="form" data-toggle="validator">

				<div class="form-group">
					<label class="col-sm-2 label-modal-soal">Nama Kuis</label>
					<div class="col-sm-5">
						<input type="text" class="form-control inform-height" id="add_nama_kuis" placeholder="Nama Kuis" required>
					</div>
					<div class="col-sm-5"></div>

					<div class="col-sm-3"></div>
					<div class="col-sm-9 help-block with-errors"></div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 label-modal-soal">Nama Materi</label>
					<div class="col-sm-5">
						<select class="form-control" id="nama_materi" required>
							<option value=""> Nama Materi </option>
							<option value="A"> Materi A </option>
							<option value="B"> Materi B </option>
							<option value="C"> Materi C </option>
							<option value="D"> Materi D </option>
						</select>
					</div>
					<div class="col-sm-5"></div>

					<div class="col-sm-3"></div>
					<div class="col-sm-9 help-block with-errors"></div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 label-modal-soal">Mulai</label>
					<div class="col-sm-5">
						<div class="input-group date" id="datepicker_start">
							<input type="text" id="tgl_mulai" class="form-control inform-height" placeholder="Tanggal Mulai" required>
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-calendar"></i>
							</span>
						</div>
					</div>
					<div class="col-sm-5"></div>

					<div class="col-sm-3"></div>
					<div class="col-sm-9 help-block with-errors"></div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 label-modal-soal">Selesai</label>
					<div class="col-sm-5">
						<div class="input-group date" id="datepicker_end">
							<input type="text" id="tgl_selesai" class="form-control inform-height" placeholder="Tanggal Selesai" required>
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-calendar"></i>
							</span>
						</div>
					</div>
					<div class="col-sm-5"></div>

					<div class="col-sm-3"></div>
					<div class="col-sm-9 help-block with-errors"></div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 label-modal-soal">Durasi Kuis</label>
					<div class="col-sm-5">
						<div class="input-group date" id="time_durasi">
							<input type="text" id="durasi" class="form-control inform-height" placeholder="Durasi Kuis" required>
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-time"></i>
							</span>
						</div>
					</div>
					<div class="col-sm-5"></div>

					<div class="col-sm-3"></div>
					<div class="col-sm-9 help-block with-errors"></div>
				</div>

          	</form>
		</div>		
	</div>


	<!-- ///////////////////////////////////////////////////////////// Daftar Add ///////////////////////////////////////////////////////////// -->


	<div class="row row-judul">
		<div class="col-md-12">
			<legend><h4 class="judul-soal"> Daftar Soal </h4></legend>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<a href="#" id="add_button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-soal-add"> <span class="glyphicon glyphicon-plus-sign"></span> Tambah </a>
		</div>
		<div class="col-md-12 daftar-soal">
			<table class="table table-hover table-bordered table-striped">
				<thead class="index">
					<tr>
						<th>No</th>
						<th>Nama Kuis</th>
						<th>Materi</th>
						<th>Tanggal Mulai</th>
						<th>Tanggal Selesai</th>
						<th>Durasi Kuis</th>
						<th><span class="glyphicon glyphicon-wrench"></span></th>
					</tr>
				</thead>

				<tbody class="index">
					<tr>
						<td class="kolom-tengah">1</td>
						<td>Perancangan Sistem Informasi</a></td>
						<td>Perancangan Sistem</td>
						<td class="kolom-kanan">20/05/2015</td>
						<td class="kolom-kanan">25/05/2015</td>
						<td class="kolom-kanan">00:10:00</td>
						<td class="kolom-tengah">
							<a class="btn btn-xs btn-success" href="#" data-toggle="modal" data-target="#modal-soal-edit">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
							<a class="btn btn-xs btn-danger" href="#">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>		
	</div>

    <div class="form-group" style="float:right;">
        <button type="reset" id="reset_add_form" class="btn btn-primary btn-sm">Reset</button>
        <a type="submit" id="simpan_kuis" class="btn btn-primary btn-sm" value="save">Simpan</a>
        <button type="submit" id="btn_hide" class="btn btn-primary btn-sm" style="display:none;">hide</button>
    </div>


	<!-- ///////////////////////////////////////////////////////////// Modal Add ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="modal-soal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    @include('view_admin.kuis.modal_soal_add')
	</div>

	<!-- ///////////////////////////////////////////////////////////// Modal Edit ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="modal-soal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    @include('view_admin.kuis.modal_soal_edit')
	</div>

</div>

<link rel="stylesheet" type="text/css" href="{{ asset('public/css/apps/kuis.css') }}">
<script type="text/javascript" src="{{asset('public/js/apps/kuis.js')}}"></script>

@stop