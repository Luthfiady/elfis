@extends('templates/admin_layouts')

@section('bread_admin')
Nilai
@stop

@section('content')

<div class="main-content">

	<div class="row">
		<div class="col-md-12">
			<form class="form-inline" style="float:right;">

				<div class="form-group">
					<select class="form-control inform-height" id="search_by">
						<option value=""> Kelas </option>
						<option value="modul_code"> XI M1 </option>
	        			<option value="modul_name"> XI M2 </option>
					</select>	

					<select class="form-control inform-height" id="search_by">
						<option value=""> Materi </option>
						<option value="modul_code"> Bahasa Indonesia </option>
	        			<option value="modul_name"> Perkabelan </option>
					</select>	
					
				</div>

				<button type="submit" id="search_button" class="btn btn-sm btn-primary inform-height"> 
					<span class="glyphicon glyphicon-search"></span> 
				</button>

				&nbsp 

				<a href="#" id="add_button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add_div_form"> 
					<span class="glyphicon glyphicon-plus-sign"></span> Tambah 
				</a>

			</form>
		</div>
	</div>


	<div class="row row-table-data">
		<div class="col-md-12 table-responsive">
			
			<table class="table table-hover table-bordered table-striped">
				<thead class="index">
<<<<<<< HEAD
					<tr>
						<th>A</th>
						<th>B</th>
						<th>C</th>
					</tr>
=======
					<th>No</th>
					<th>NIS</th>
					<th>Nama Siswa</th>
					<th>Kelas</th>
					<th>Nama Materi</th>
					<th>Keterangan</th>
					<th>Nilai</th>
>>>>>>> ecfcd779a18e4d6a585ef4a75df1000040a5b1cb
				</thead>

				<tbody class="index">
					<tr>
						<td class="kolom-tengah">1</td>
						<td class="kolom-tengah">10001</td>
						<td>Faried Muharam</td>
						<td class="kolom-tengah">XI M1</td>
						<td>Perkabelan</td>
						<td>Ujian</td>
						<td class="kolom-kanan">90</td>
					</tr>
					<tr>
						<td class="kolom-tengah">2</td>
						<td class="kolom-tengah">10001</td>
						<td>Faried Muharam</td>
						<td class="kolom-tengah">XI M1</td>
						<td>Perkabelan</td>
						<td>Kuis</td>
						<td class="kolom-kanan">95</td>
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
