@extends('templates/admin_layouts')

@section('bread_admin')
Tugas
@stop

@section('content')

<div class="main-content">

	<div class="row">
		<div class="col-md-12">
			<form class="form-inline" style="float:right;">

				<div class="form-group">
					<select class="form-control inform-height" id="search_by">
						<option value=""> Kategori </option>
						<option value="a.nama_tugas"> Nama Tugas </option>
	        			<option value="b.nama_materi"> Materi </option>
	        			<option value="c.nama_pelajaran"> Pelajaran </option>
					</select>	
				</div>

				<div class="form-group">
					<input type="text" id="search_input" name="search_input" class="form-control inform-height" placeholder="Cari">
					<button type="submit" id="search_button" class="btn btn-sm btn-primary inform-height"> 
						<span class="glyphicon glyphicon-search"></span> 
					</button>
				</div>

				&nbsp 

				<a href="#" id="add_button" class="btn btn-sm btn-primary" onclick="clear_form()" data-toggle="modal" data-target="#add_tugas"> 
					<span class="glyphicon glyphicon-plus-sign"></span> Tambah </a>

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

	<div class="modal fade" id="add_tugas" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.tugas.modal_add')
	</div>
	<!-- ///////////////////////////////////////////////////////////// Modal Edit ///////////////////////////////////////////////////////////// -->
	<div class="modal fade" id="edit_tugas" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.tugas.modal_edit')
	</div>

</div>

<script type="text/javascript" src="{{asset('public/js/apps/tugas.js')}}"></script>

@stop
