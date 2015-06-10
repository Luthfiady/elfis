@extends('templates/siswa_layouts')

@section('bread_siswa')
Tugas
@stop

@section('content')

<div class="main-content">

	<div class="row">
		<div class="col-md-12">
			<form class="form-inline pull-right">

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

				<a href="#" id="add_button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add_jawabanTugas"> 
					<span class="glyphicon glyphicon-upload"></span> Unggah Tugas </a>

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
						<th><span class="glyphicon glyphicon-folder-open"></span></th>
					</tr>
				</thead>

				<tbody class="index">
					<tr>
						<td class="kolom-tengah">1</td>
						<td>Perancangan Sistem Informasi</a></td>
						<td>Perancangan Sistem</td>
						<td>Sistem Informasi</td>
						<td class="kolom-kanan">20/05/2015</td>
						<td class="kolom-kanan">25/05/2015</td>
						<td class="kolom-tengah">
							<a class="btn btn-xs btn-warning" href="{{URL::to('siswa/tugas_detail')}}" title="detail">
								<span class="glyphicon glyphicon-new-window"></span>
							</a>
						</td>
					</tr>
					<tr>
						<td class="kolom-tengah">2</td>
						<td>Matematika Diskrit</td>
						<td>Matematika</td>
						<td>Matematika Diskrit</td>
						<td class="kolom-kanan">13/05/2015</td>
						<td class="kolom-kanan">15/05/2015</td>
						<td class="kolom-tengah">
							<a class="btn btn-xs btn-warning" href="{{URL::to('siswa/tugas_detail')}}" title="detail">
								<span class="glyphicon glyphicon-new-window"></span>
							</a>
						</td>
					</tr>
					<tr>
						<td class="kolom-tengah">3</td>
						<td>Present Tense</td>
						<td>Tenses</td>
						<td>Bahasa Inggris</td>
						<td class="kolom-kanan">14/05/2015</td>
						<td class="kolom-kanan">20/05/2015</td>
						<td class="kolom-tengah">
							<a class="btn btn-xs btn-warning" href="{{URL::to('siswa/tugas_detail')}}" title="detail">
								<span class="glyphicon glyphicon-new-window"></span>
							</a>
						</td>
					</tr>
					<tr>
						<td class="kolom-tengah">4</td>
						<td>Adobe Photoshop</td>
						<td>Desain</td>
						<td>Graphic Desain</td>
						<td class="kolom-kanan">16/05/2015</td>
						<td class="kolom-kanan">22/05/2015</td>
						<td class="kolom-tengah">
							<a class="btn btn-xs btn-warning" href="{{URL::to('siswa/tugas_detail')}}" title="detail">
								<span class="glyphicon glyphicon-new-window"></span>
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

	<div class="modal fade" id="add_jawabanTugas" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_siswa.tugas.modal_upload')
	</div>

</div>

@stop