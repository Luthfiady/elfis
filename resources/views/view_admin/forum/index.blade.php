@extends('templates/admin_layouts')


@section('bread_admin')
Forum
@stop

@section('content')

<div class="main-content">

	<div class="row">
		<div class="col-md-12">
			<form class="form-inline" style="float:right;">

				<!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
				<div class="form-group">
					<select class="form-control inform-height" id="search_by" name="search_by">
						<option value=""> Kategori </option>
						<option value="nama_forum"> Nama Forum </option>
						<option value="role_access"> Hak Akses </option>
	        			<option value="subyek"> Subyek </option>
	        			<option value="keterangan"> Keterangan </option>
	        			<option value="created_by"> Diposting </option>
					</select>	
				</div>

				<div class="form-group">
					<input type="text" id="search_input" name="search_input" class="form-control inform-height" placeholder="Cari">
					<button type="submit" id="search_button" class="btn btn-sm btn-primary inform-height"> 
						<span class="glyphicon glyphicon-search"></span> 
					</button>
				</div>

				&nbsp 

				<a href="#" id="add_button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add_forum"> 
					<span class="glyphicon glyphicon-plus-sign"></span> Tambah </a>

			</form>
		</div>
	</div>


	<div class="row row-table-data">
		<div class="col-md-12 dataTable table-responsive">

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

	<div class="modal fade" id="add_forum" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.forum.modal_add')
	</div>

	<!-- ///////////////////////////////////////////////////////////// Modal Edit ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="edit_forum" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.forum.modal_edit')
	</div>


</div>

<script type="text/javascript" src="{{asset('public/js/apps/forum.js')}}"></script>

@stop