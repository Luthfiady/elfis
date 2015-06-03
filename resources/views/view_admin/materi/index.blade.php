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
						<option value=""> Nama </option>
						<option value=""> Pelajaran </option>
	        			<option value=""> Nama Guru </option>
					</select>	
				</div>

				<div class="form-group">
					<input type="text" id="search_input" name="search_input" class="form-control inform-height" placeholder="Cari">
					<button type="submit" id="search_button" class="btn btn-sm btn-primary inform-height"> 
						<span class="glyphicon glyphicon-search"></span> 
					</button>
				</div>

				&nbsp 

				<a href="#" id="add_button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addMateri"> 
					<span class="glyphicon glyphicon-plus-sign"></span> Tambah Materi</a>

				<a href="#" id="add_button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addSoal"> 
					<span class="glyphicon glyphicon-plus-sign"></span> Tambah Soal</a>

			</form>
		</div>
	</div>


	<div class="row row-table-data">
		<div class="col-md-12 table-responsive">
			
			<table class="table table-hover table-bordered table-striped">
				<thead class="index">
					<tr>
						<th>No.</th>
						<th>Nama Materi</th>
						<th>Pelajaran</th>
						<th>Kelas</th>
						<th>Waktu Unggah</th>
						<th>Keterangan</th>
						<th colspan="3">Action</th>
					</tr>
				</thead>

				<tbody class="index">
					<tr>
						<td class="kolom-tengah">1</td>
						<td class="kolom-tengah">MTK-01</td>
						<td class="kolom-tengah">Matematika</td>
						<td class="kolom-tengah">XIMM2</td>
						<td class="kolom-tengah">25/05/2015</td>
						<td class="kolom-tengah">Materi</td>
						<td class="kolom-tengah"><a class="btn btn-danger btn-xs" href="{{URL::to('admin/materi_detail')}}" title="detail">
							<span class="glyphicon glyphicon-folder-open"></span></td></a>
						<td class="kolom-tengah">
							<a href="#" id="add_button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#editMateri" title="edit"> 
							<span class="glyphicon glyphicon-pencil"></span></td></a>
						<td class="kolom-tengah">
							<a href="#" id="add_button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteMateri" title="hapus"> 
							<span class="glyphicon glyphicon-remove"></span></td></a>
					</tr>
					<tr>
						<td class="kolom-tengah">1</td>
						<td class="kolom-tengah">MTK-01</td>
						<td class="kolom-tengah">Matematika</td>
						<td class="kolom-tengah">XIMM2</td>
						<td class="kolom-tengah">25/05/2015</td>
						<td class="kolom-tengah">Soal</td>
						<td class="kolom-tengah"><a class="btn btn-danger btn-xs" href="{{URL::to('admin/materi_detail')}}" title="detail">
							<span class="glyphicon glyphicon-folder-open"></span></td></a>
						<td class="kolom-tengah">
							<a href="#" id="add_button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#editSoal" title="edit"> 
							<span class="glyphicon glyphicon-pencil"></span></td></a>
						<td class="kolom-tengah">
							<a href="#" id="add_button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteMateri" title="hapus"> 
							<span class="glyphicon glyphicon-remove"></span></td></a>
					</tr>
					<tr>
						<td class="kolom-tengah">2</td>
						<td class="kolom-tengah">BINDO-02</td>
						<td class="kolom-tengah">Bahasa Indonesia</td>
						<td class="kolom-tengah">XIMM2</td>
						<td class="kolom-tengah">25/05/2015</td>
						<td class="kolom-tengah">Materi</td>
						<td class="kolom-tengah"><a class="btn btn-danger btn-xs" href="{{URL::to('admin/materi_detail')}}" title="detail">
							<span class="glyphicon glyphicon-folder-open"></span></td></a>
						<td class="kolom-tengah">
							<a href="#" id="add_button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#editMateri" title="edit"> 
							<span class="glyphicon glyphicon-pencil"></span></td></a>
						<td class="kolom-tengah">
							<a href="#" id="add_button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteMateri" title="hapus"> 
							<span class="glyphicon glyphicon-remove"></span></td></a>
					</tr>
					<tr>
						<td class="kolom-tengah">3</td>
						<td class="kolom-tengah">SB-03</td>
						<td class="kolom-tengah">Seni Budaya</td>
						<td class="kolom-tengah">XIMM2</td>
						<td class="kolom-tengah">25/05/2015</td>
						<td class="kolom-tengah">Materi</td>
						<td class="kolom-tengah"><a class="btn btn-danger btn-xs" href="{{URL::to('admin/materi_detail')}}" title="detail">
							<span class="glyphicon glyphicon-folder-open"></span></td></a>
						<td class="kolom-tengah">
							<a href="#" id="add_button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#editMateri" title="edit"> 
							<span class="glyphicon glyphicon-pencil"></span></td></a>
						<td class="kolom-tengah">
							<a href="#" id="add_button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteMateri" title="buka"> 
							<span class="glyphicon glyphicon-remove"></span></td></a>
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

	<div class="modal fade" id="addMateri" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.materi.modal_add')
	</div>

	<!-- ///////////////////////////////////////////////////////////// Modal Add Soal///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="addSoal" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.materi.modal_addSoal')
	</div>

	<!-- ///////////////////////////////////////////////////////////// Modal Edit ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="editMateri" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.materi.modal_edit')
	</div>

	<!-- ///////////////////////////////////////////////////////////// Modal Edit Soal ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="editSoal" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.materi.modal_editSoal')
	</div>

	<!-- ///////////////////////////////////////////////////////////// Modal Delete ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="deleteMateri" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.materi.modal_delete')
	</div>

</div>

@stop
