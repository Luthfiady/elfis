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
					<select class="form-control inform-height" id="nama_jurusan" style="width:300px;">
						<option value="">Pilih Jurusan</option>
					</select>

					<select class="form-control inform-height" id="nama_kelas" style="width:150px;">
						<option value="">Pilih Kelas</option>
					</select>	

					<select class="form-control inform-height" id="nama_materi" style="width:225px;">
						<option value="">Pilih Materi</option>
					</select>

					<select class="form-control inform-height" id="search_by">
						<option value=""> Kategori Nilai </option>
						<option value="Kuis"> Kuis </option>
	        			<option value="Tugas"> Tugas </option>
	        			<option value="Ulangan"> Ulangan </option>
					</select>	
					
				</div>

				<button type="submit" id="search_button" class="btn btn-sm btn-primary inform-height" value="search"> 
					<span class="glyphicon glyphicon-search"></span> 
				</button>

			</form>
		</div>
	</div>


	<div class="row row-table-data">
		<div class="col-md-12 table-responsive dataTable">
			
		</div>
	</div>

	<div class="row row-paging-table">
		<div class="pg num-page">
	        <ul class="pagination pagination-sm">

	        </ul>
	    </div>
	</div>

</div>

<script type="text/javascript" src="{{asset('public/js/apps/nilai.js')}}"></script>

@stop
