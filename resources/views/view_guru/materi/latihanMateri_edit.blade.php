@extends('templates/guru_layouts')

@section('add_bread_guru')
<li><a href="{{ URL::to('guru/latihan') }}">Latihan</a></li>
@stop

@section('bread_guru')
{{$nama_group_latihan}}
@stop
	
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('public/css/apps/materi.css') }}">

<div class="main-content">

	<!-- ///////////////////////////////////////////////////////////// Detail Kuis ///////////////////////////////////////////////////////////// -->
 
	<div class="row row-judul">
		<div class="col-md-12">
			<legend> <h4 class="judul-soal"> Detail Latihan </h4> </legend>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form id="add_form" class="form form-horizontal" role="form" data-toggle="validator">

				<div class="form-group">
					<label class="col-sm-2 label-modal-soal">Nama Latihan</label>
					<div class="col-sm-5">
						<input type="text" class="form-control inform-height" id="edit_nama_latihan" placeholder="Nama Latihan" required>
					</div>
					<div class="col-sm-5 help-block with-errors"></div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 label-modal-soal">Nama Materi</label>
					<div class="col-sm-5">
						<select class="form-control" id="edit_nama_materi" required>
							
						</select>
					</div>
					<div class="col-sm-5 help-block with-errors"></div>
				</div>


				<input class="form-control" type="hidden" id="id_latihan" value="{{$id}}">
				<input class="form-control" type="hidden" id="id_group_latihan" value="">

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
			<a href="#" id="add_edit_button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-soal-add"> <span class="glyphicon glyphicon-plus-sign"></span> Tambah </a>
		</div>
		<div class="col-md-12 dataTable">
			
		</div>
	</div>

    <div class="form-group" style="float:right;">
        <button type="submit" id="ubah_latihan" class="btn btn-primary btn-sm">Ubah</button>
        <button type="reset" id="reset_edit_form" class="btn btn-primary btn-sm">Reset</button>
        <a href="{{URL::to('guru/latihan')}}" class="btn btn-sm btn-primary" id="redirect" style="display:none;"> </a>
    </div>
	</form>

	<!-- ///////////////////////////////////////////////////////////// Modal Add ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="modal-soal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    @include('view_guru.materi.modal_soal_add')
	</div>

	<!-- ///////////////////////////////////////////////////////////// Modal Edit ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="modal-soal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    @include('view_guru.materi.modal_soal_edit')
	</div>

</div>


<script type="text/javascript" src="{{asset('public/js/apps/soal_latihan_edit.js')}}"></script>

@stop