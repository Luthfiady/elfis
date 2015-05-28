@extends('templates/admin_layouts')

@section('bread_admin')
Managemen User
@stop

@section('content')

<div class="main-content">

	<div class="row">
		<div class="col-md-12">
			<form class="form-inline" style="float:right;">

				<div class="form-group">
					<select class="form-control inform-height" id="search_by">
						<option value=""> Kategori </option>
						<option value="modul_code"> Nama User </option>
	        			<option value="modul_name"> Nama Group </option>
					</select>	
				</div>

				<div class="form-group">
					<input type="text" id="search_input" name="search_input" class="form-control inform-height" placeholder="Cari">
					<button type="submit" id="search_button" class="btn btn-sm btn-primary inform-height"> 
						<span class="glyphicon glyphicon-search"></span> 
					</button>
				</div>

				&nbsp 

				<a href="#" id="add_button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add_user"> 
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
						<th>ID User</th>
						<th>Nama User</th>
						<th>Nama Group</th>
						<th><span class="glyphicon glyphicon-wrench"></span></th>
					</tr>
				</thead>

				<tbody class="index">
					<tr>
						<td class="kolom-tengah">1</td>
						<td>10003</td>
						<td>Axel</td>
						<td>Admin</td>
						<td class="kolom-tengah">
							<a class="btn btn-xs btn-success" href="#" data-toggle="modal" data-target="#edit_user">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
							<a class="btn btn-xs btn-danger" href="#">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
						</td>
					</tr>
					<tr>
						<td class="kolom-tengah">2</td>
						<td>10002</td>
						<td>Tubagus</td>
						<td>Guru</td>
						<td class="kolom-tengah">
							<a class="btn btn-xs btn-success" href="#" data-toggle="modal" data-target="#edit_user">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
							<a class="btn btn-xs btn-danger" href="#">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
						</td>
					</tr>
					<tr>
						<td class="kolom-tengah">3</td>
						<td>10001</td>
						<td>Luthfiady</td>
						<td>Siswa</td>
						<td class="kolom-tengah">
							<a class="btn btn-xs btn-success" href="#" data-toggle="modal" data-target="#edit_user">
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

	<div class="modal fade" id="add_user" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.user.modal_add_user')
	</div>

	<!-- ///////////////////////////////////////////////////////////// Modal Edit ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="edit_user" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.user.modal_edit_user')
	</div>

</div>

@stop
