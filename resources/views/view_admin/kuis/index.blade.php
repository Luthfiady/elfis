@extends('templates/admin_layouts')


@section('bread_admin')
Kuis
@stop

@section('content')

<div class="main-content">

	<div class="row">
		<div class="col-md-12">
			<form class="form-inline" style="float:right;">

				<div class="form-group">
					<select class="form-control inform-height" id="search_by">
						<option value=""> Kategori </option>
						<option value=""> Nama Ujian </option>
	        			<option value=""> Materi </option>
					</select>	
				</div>

				<div class="form-group">
					<input type="text" id="search_input" name="search_input" class="form-control inform-height" placeholder="Cari">
					<button type="submit" id="search_button" class="btn btn-sm btn-primary inform-height"> 
						<span class="glyphicon glyphicon-search"></span> 
					</button>
				</div>

				&nbsp 

				<a href="#" id="add_button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add_kuis"> 
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
							<a class="btn btn-xs btn-success" href="#" data-toggle="modal" data-target="#edit_kuis">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
							<a class="btn btn-xs btn-danger" href="#">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
						</td>
					</tr>
					<tr>
						<td class="kolom-tengah">2</td>
						<td>Matematika Diskrit</td>
						<td>Matematika</td>
						<td class="kolom-kanan">13/05/2015</td>
						<td class="kolom-kanan">15/05/2015</td>
						<td class="kolom-kanan">00:15:00</td>
						<td class="kolom-tengah">
							<a class="btn btn-xs btn-success" href="#" data-toggle="modal" data-target="#edit_kuis">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
							<a class="btn btn-xs btn-danger" href="#">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
						</td>
					</tr>
					<tr>
						<td class="kolom-tengah">3</td>
						<td>Present Tense</td>
						<td>Bahasa Inggris</td>
						<td class="kolom-kanan">14/05/2015</td>
						<td class="kolom-kanan">20/05/2015</td>
						<td class="kolom-kanan">00:30:00</td>
						<td class="kolom-tengah">
							<a class="btn btn-xs btn-success" href="#" data-toggle="modal" data-target="#edit_kuis">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
							<a class="btn btn-xs btn-danger" href="#">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
						</td>
					</tr>
					<tr>
						<td class="kolom-tengah">4</td>
						<td>Adobe Photoshop</td>
						<td>Desain Web</td>
						<td class="kolom-kanan">16/05/2015</td>
						<td class="kolom-kanan">22/05/2015</td>
						<td class="kolom-kanan">00:50:00</td>
						<td class="kolom-tengah">
							<a class="btn btn-xs btn-success" href="#" data-toggle="modal" data-target="#edit_kuis">
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

	<div class="modal fade" id="add_kuis" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.kuis.modal_add')
	</div>

	<!-- ///////////////////////////////////////////////////////////// Modal Edit ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="edit_kuis" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.kuis.modal_add')
	</div>

</div>

<script type="text/javascript" src="{{asset('public/js/apps/kuis.js')}}"></script>

@stop
