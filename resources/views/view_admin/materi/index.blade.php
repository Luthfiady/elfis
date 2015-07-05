@extends('templates/admin_layouts')

@section('bread_admin')
Materi
@stop

@section('content')

<div class="main-content">

	<div class="row">
		<div class="col-md-12">
			<form class="form-inline" style="float:right;" data-toggle="validator">

				<div class="form-group">
					<select class="form-control inform-height" id="search_by">
						<option value=""> Kategori </option>
						<option value="a.nama_materi"> Nama </option>
						<option value="b.nama_pelajaran"> Pelajaran </option>
	        			<option value="c.nama_kelas"> Kelas </option>
	        			<option value="d.nama"> Nama Guru </option>
	        			<option value="a.create_date"> Waktu Unggah </option>
					</select>	
				</div>

				<div class="form-group">
					<input type="text" id="search_input" name="search_input" class="form-control inform-height" placeholder="Cari">
					<button type="submit" id="search_button" class="btn btn-sm btn-primary inform-height"> 
						<span class="glyphicon glyphicon-search"></span> 
					</button>
				</div>

				&nbsp 

				<!-- <a href="#" id="add_button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#formAddMateri">  -->
				<a href="{{ URL::to('admin/materiLatihan_add') }}" id="add_button" class="btn btn-sm btn-primary"> 
					<span class="glyphicon glyphicon-plus-sign"></span> Tambah Materi</a>
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

	
	<!-- ///////////////////////////////////////////////////////////// Modal Edit ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="editMateri" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.materi.modal_edit')
	</div>

	<script  type="text/javascript" src="{{asset('public/js/apps/materi.js')}}"></script>

</div>

@stop
