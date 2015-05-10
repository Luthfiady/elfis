@extends('templates/guru_layouts')

@section('bread_guru')
Nilai
@stop

@section('content')

<div class="main-content">

	<div class="row">
		<div class="col-md-12">
			<form class="form-inline" style="float:right;">

				<div class="form-group">
					<select class="form-control inform-height" id="search_by">
						<option value=""> Jurusan </option>
						<option value="modul_code"> Multimedia 1 </option>
	        			<option value="modul_name"> Multimedia 2 </option>
					</select>	

					<select class="form-control inform-height" id="search_by">
						<option value=""> Kelas </option>
						<option value="modul_code"> XI M1 </option>
	        			<option value="modul_name"> XI M2 </option>
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
		<div class="col-md-12">
			
			<table class="table table-hover table-bordered table-striped table-responsive">
				<thead>
					<th>A</th>
					<th>B</th>
					<th>C</th>
				</thead>

				<tbody>
					<tr>
						<td>1</td>
						<td>2</td>
						<td>3</td>
					</tr>
					<tr>
						<td>4</td>
						<td>5</td>
						<td>6</td>
					</tr>
					<tr>
						<td>7</td>
						<td>8</td>
						<td>9</td>
					</tr>
					<tr>
						<td>10</td>
						<td>11</td>
						<td>12</td>
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
