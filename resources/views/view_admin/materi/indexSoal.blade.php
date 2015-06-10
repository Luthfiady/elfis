@extends('templates/admin_layouts')

@section('bread_admin')
Soal
@stop

@section('content')

<div class="main-content">

	<div class="row">
		<div class="col-md-12">
			<form class="form-inline" style="float:right;">

				<div class="form-group">
					<select class="form-control inform-height" id="search_by">
						<option value=""> Kategori </option>
						<option value="nama_soal"> Nama Soal </option>
						<option value="a.nama_materi"> Materi </option>
						<option value="b.nama_pelajaran"> Pelajaran </option>
						<option value="d.nama_kelas"> Kelas </option>
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

				<a href="#" id="add_button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addSoal"> 
					<span class="glyphicon glyphicon-plus-sign"></span> Tambah Soal </a>
			</form>
		</div>
	</div>


	<div class="row row-table-data">
		<div class="col-md-12 table-responsive dataTable">			
			
		</div>
	</div>

	<div class="row row-paging-table">
		<nav>
		  <ul class="pagination">
		    <li>
		      <a href="#" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
		      </a>
		    </li>
		    <li><a href="#">1</a></li>
		    <li><a href="#">2</a></li>
		    <li><a href="#">3</a></li>
		    <li><a href="#">4</a></li>
		    <li><a href="#">5</a></li>
		    <li>
		      <a href="#" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		      </a>
		    </li>
		  </ul>
		</nav>
	</div>

	<!-- ///////////////////////////////////////////////////////////// Modal Add Soal///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="addSoal" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.materi.modal_addSoal')
	</div>

	<!-- ///////////////////////////////////////////////////////////// Modal Edit Soal ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="editSoal" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.materi.modal_editSoal')
	</div>

	<!-- ///////////////////////////////////////////////////////////// Modal Delete ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="deleteMateri" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.materi.modal_delete')
	</div>

	<script  type="text/javascript" src="{{asset('public/js/apps/materi_soal.js')}}"></script>

</div>

@stop
