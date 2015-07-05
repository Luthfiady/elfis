@extends('templates/admin_layouts')

@section('bread_admin')
Latihan
@stop

@section('content')

<div class="main-content">

	<div class="row">
		<div class="col-md-12">
			<form class="form-inline" style="float:right;">

				<div class="form-group">
					<select class="form-control inform-height" id="search_by">
						<option value=""> Kategori </option>
						<option value="nama_group_latihan"> Nama Latihan </option>
	        			<option value="b.nama_materi"> Nama Materi </option>
					</select>	
				</div>

				<div class="form-group">
					<input type="text" id="search_input" name="search_input" class="form-control inform-height" placeholder="Cari">
					<button type="submit" id="search_button" class="btn btn-sm btn-primary inform-height"> 
						<span class="glyphicon glyphicon-search"></span> 
					</button>
				</div>

				&nbsp 

				<a href="{{ URL::to('admin/latihanMateri_add') }}" id="add_button" class="btn btn-sm btn-primary"> 
					<span class="glyphicon glyphicon-plus-sign"></span> Tambah </a>

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

<script type="text/javascript" src="{{asset('public/js/apps/soal_latihan.js')}}"></script>

@stop
