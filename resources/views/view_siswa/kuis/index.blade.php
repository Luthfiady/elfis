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
						<option value="nama_group_kuis"> Nama Kuis </option>
	        			<option value="b.nama_materi"> Nama Materi </option>
	        			<option value="c.nama"> Nama Guru </option>
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
		<div class="col-md-12 dataTable table-responsive">
			
		</div>
	</div>

	<div class="row row-paging-table">
		<div class="pg num-page">
	        <ul class="pagination pagination-sm">

	        </ul>
	    </div>
	</div>

</div>

<script type="text/javascript" src="{{asset('public/js/apps/siswa_kuis.js')}}"></script>

@stop
