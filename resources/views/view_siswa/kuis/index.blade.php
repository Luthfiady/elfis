@extends('templates/siswa_layouts')

@section('bread_siswa')
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
						<option value=""> Nama Kuis </option>
	        			<option value=""> Materi </option>
	        			<option value=""> Nama Guru </option>
					</select>	
				</div>

				<div class="form-group">
					<input type="text" id="search_input" name="search_input" class="form-control inform-height" placeholder="Cari">
					<button type="submit" id="search_button" class="btn btn-sm btn-primary inform-height"> 
						<span class="glyphicon glyphicon-search"></span> 
					</button>
				</div>

			</form>
		</div>
	</div>


	<div class="row row-table-data">
		<div class="col-md-12 table-responsive">
			
			<table class="table table-hover table-bordered table-striped">
				<thead class="index">
					<th>No</th>
					<th>Nama Kuis</th>
					<th>Materi</th>
					<th>Nama Guru</th>
					<th>Tanggal Mulai</th>
					<th>Tanggal Selesai</th>
					<th>Durasi Kuis</th>
					<th><span class="glyphicon glyphicon-folder-open"></span></th>
				</thead>

				<tbody class="index">
					<tr>
						<td class="kolom-tengah">1</td>
						<td>Perancangan Sistem Informasi</a></td>
						<td>Perancangan Sistem</td>
						<td>Eko Prasetyo</td>
						<td class="kolom-kanan">20/05/2015</td>
						<td class="kolom-kanan">25/05/2015</td>
						<td class="kolom-kanan">00:10:00</td>
						<td class="kolom-tengah"><a class="btn btn-xs btn-warning" href="{{URL::to('siswa/kuis_soal')}}">
							<span class="glyphicon glyphicon-new-window"></span></a>
						</td>
					</tr>
					<tr>
						<td class="kolom-tengah">2</td>
						<td>Matematika Diskrit</td>
						<td>Matematika</td>
						<td>Budi Subardi</td>
						<td class="kolom-kanan">13/05/2015</td>
						<td class="kolom-kanan">15/05/2015</td>
						<td class="kolom-kanan">00:15:00</td>
						<td class="kolom-tengah"><a class="btn btn-xs btn-warning" href="{{URL::to('siswa/kuis_soal')}}">
							<span class="glyphicon glyphicon-new-window"></span></a>
						</td>
					</tr>
					<tr>
						<td class="kolom-tengah">3</td>
						<td>Present Tense</td>
						<td>Bahasa Inggris</td>
						<td>Shinta</td>
						<td class="kolom-kanan">14/05/2015</td>
						<td class="kolom-kanan">20/05/2015</td>
						<td class="kolom-kanan">00:30:00</td>
						<td class="kolom-tengah"><a class="btn btn-xs btn-warning" href="{{URL::to('siswa/kuis_soal')}}">
							<span class="glyphicon glyphicon-new-window"></span></a>
						</td>
					</tr>
					<tr>
						<td class="kolom-tengah">4</td>
						<td>Adobe Photoshop</td>
						<td>Desain</td>
						<td>Chyntia</td>
						<td class="kolom-kanan">16/05/2015</td>
						<td class="kolom-kanan">22/05/2015</td>
						<td class="kolom-kanan">00:50:00</td>
						<td class="kolom-tengah"><a class="btn btn-xs btn-warning" href="{{URL::to('siswa/kuis_soal')}}">
							<span class="glyphicon glyphicon-new-window"></span></a>
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

</div>

@stop
