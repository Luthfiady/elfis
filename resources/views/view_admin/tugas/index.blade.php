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
						<option value="modul_code"> Nama Tugas </option>
	        			<option value="modul_name"> Materi </option>
					</select>	
				</div>

				<div class="form-group">
					<input type="text" id="search_input" name="search_input" class="form-control inform-height" placeholder="Cari">
					<button type="submit" id="search_button" class="btn btn-sm btn-primary inform-height"> 
						<span class="glyphicon glyphicon-search"></span> 
					</button>
				</div>

				&nbsp 

				<a href="#" id="add_button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add_tugas"> 
					<span class="glyphicon glyphicon-plus-sign"></span> Tambah </a>

			</form>
		</div>
	</div>


	<div class="row row-table-data">
		<div class="col-md-12 table-responsive">
			
			<table class="table table-hover table-bordered table-striped">
				<thead class="index">
					<tr>
						<th>No</th>
						<th>Nama Tugas</th>
						<th>Materi</th>
						<th>Pelajaran</th>
						<th>Tanggal Mulai</th>
						<th>Tanggal Selesai</th>
						<th><span class="glyphicon glyphicon-wrench"></span></th>
					</tr>
				</thead>

				<tbody class="index">
					<tr>
						<td class="kolom-tengah">1</td>
						<td>Membuat maket rumah masing-masing</td>
						<td>Bangunan dan Landscape</td>
						<td>Bangunan</td>
						<td class="kolom-kanan">23/5/2015</td>
						<td class="kolom-kanan">29/5/2015</td>
						<td class="kolom-tengah">
							<a class="btn btn-xs btn-success" href="#" data-toggle="modal" data-target="#edit_tugas" title="Ubah">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
							<a class="btn btn-xs btn-danger" href="#" title="Hapus">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
							<a class="btn btn-xs btn-info" href="#" title="Unduh File">
								<span class="glyphicon glyphicon-download-alt"></span>
							</a>
						</td>
					</tr>
					<tr>
						<td class="kolom-tengah">2</td>
						<td>Menghancurkan maket teman</td>
						<td>Bangunan dan Landscape</td>
						<td>Bangunan</td>
						<td class="kolom-kanan">23/5/2015</td>
						<td class="kolom-kanan">29/5/2015</td>
						<td class="kolom-tengah">
							<a class="btn btn-xs btn-success" href="#" data-toggle="modal" data-target="#edit_tugas" title="Ubah">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
							<a class="btn btn-xs btn-danger" href="#" title="Hapus">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
							<a class="btn btn-xs btn-info" href="#" title="Unduh File">
								<span class="glyphicon glyphicon-download-alt"></span>
							</a>
						</td>
					</tr>
				</tbody>
			</table>

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

		<!-- ///////////////////////////////////////////////////////////// Modal Add ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="add_tugas" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.tugas.modal_add')
	</div>
	<div class="modal fade" id="edit_tugas" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.tugas.modal_edit')
	</div>

	<script type="text/javascript" src="{{asset('public/js/apps/kuis.js')}}"></script>

</div>

@stop
