@extends('templates/guru_layouts')

@section('add_bread_guru')
<li><a href="{{ URL::to('guru/tugas') }}">Tugas</a></li>
@stop

@section('bread_guru')
Jawaban Tugas
@stop

@section('content')

<div class="main-content">

	<div class="row row-judul">

		<div class="col-md-12">
		
			<form class="form-inline" style="float:right;">

				<div class="form-group">
					<select class="form-control inform-height" id="search_by">
						<option value=""> Kategori </option>
						<option value="a.upload_by"> Siswa/i </option>
						<option value="a.nis"> NIS </option>
						<option value="b.nama_tugas"> Nama Tugas </option>
					</select>	
				</div>

				<div class="form-group">
					<input type="text" id="search_input" name="search_input" class="form-control inform-height" placeholder="Cari">
					<button type="submit" id="search_button" class="btn btn-sm btn-primary inform-height"> 
						<span class="glyphicon glyphicon-search"></span> 
					</button>
				</div>

				&nbsp 

				<a href="#" id="add_button" class="btn btn-sm btn-primary inform-height" data-toggle="modal" data-target="#add_NilaiTugas"> 
					<span class="glyphicon glyphicon-plus-sign"></span> Tambah Nilai </a>
			</form>
		</div>
	</div>


	<div class="row row-table-data">
		<div class="col-md-12 table-responsive dataTable">
			
		</div>
	</div>

	<div class="row row-paging-table">
		<div class="pg num-page">
	        <ul class="pagination pagination-sm">

	        </ul>
	    </div>
	</div>

	<input type="hidden" id="base_url" value="<?php echo ('localhost/elfis/admin/') ?>"/>

<!-- ///////////////////////////////////////////////////////////// Modal Add ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="add_NilaiTugas" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_guru.tugas.modal_nilai_add')
	</div>

</div>

<script type="text/javascript" src="{{asset('public/js/apps/jawaban_tugas.js')}}"></script>

@stop
