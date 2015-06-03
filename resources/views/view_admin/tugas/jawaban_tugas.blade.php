@extends('templates/admin_layouts')

@section('add_bread_admin')
<li><a href="{{ URL::to('admin/tugas') }}">Tugas</a></li>
@stop

@section('bread_admin')
Jawaban Tugas
@stop

@section('content')

<div class="main-content">

	<div class="row row-judul">

		<div class="col-md-12">
		
			<form class="form-inline pull-right">

				<div class="form-group">
					<select class="form-control inform-height" id="search_by">
						<option value=""> Kategori </option>
						<option value="modul_code"> Nama Tugas </option>
	        			<option value="modul_name"> Materi </option>
	        			<option value="modul_name"> Pelajaran </option>
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
		<div class="col-md-12 table-responsive">
			
			<table class="table table-hover table-bordered table-striped">
				<thead class="index">
					<tr>
						<th>No</th>
						<th>Siswa/i</th>
						<th>Jawaban Tugas</th>
						<th>Materi</th>
						<th>Pelajaran</th>
						<th>Tanggal Unggah</th>
						<th><span class="glyphicon glyphicon-wrench"></span></th>
					</tr>
				</thead>

				<tbody class="index">
					<tr>
						<td class="kolom-tengah">1</td>
						<td>Anditika</td>
						<td><a href="#" title="Unduh">
								Anditika_IT8A_Menggambar Gunung.docx <span class="glyphicon glyphicon-download"></span>
							</a>
						</td>
						<td>Bangunan dan Perancangan</td>
						<td>Bangunan</td>
						<td class="kolom-kanan">29/5/2015</td>
						<td class="kolom-tengah">
							<a class="btn btn-xs btn-danger" href="#" title="Hapus">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
						</td>
					</tr>
					<tr>
						<td class="kolom-tengah">2</td>
						<td>Ayu</td>
						<td><a href="#" title="Unduh">
								Ayu_IT8A_Menghancurkan Gunung.doc <span class="glyphicon glyphicon-download"></span>
							</a>
						</td>
						<td>Bangunan dan Perancangan</td>
						<td>Bangunan</td>
						<td class="kolom-kanan">29/5/2015</td>
						<td class="kolom-tengah">
							<a class="btn btn-xs btn-danger" href="#" title="Hapus">
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

	<div class="modal fade" id="add_NilaiTugas" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.tugas.modal_nilai_add')
	</div>

	<script type="text/javascript" src="{{asset('public/js/apps/tugas.js')}}"></script>

</div>

@stop
