@extends('templates/admin_layouts')


@section('bread_admin')
Forum
@stop

@section('content')

<div class="main-content">

	<div class="row">
		<div class="col-md-12">
			<form class="form-inline" style="float:right;">

				<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
				<div class="form-group">
					<select class="form-control inform-height" id="search_by" name="search_by">
						<option value=""> Kategori </option>
						<option value="nama_forum"> Nama Forum </option>
						<option value="role_access"> Hak Akses </option>
	        			<option value="subyek"> Subyek </option>
	        			<option value="keterangan"> Keterangan </option>
	        			<option value="created_by"> Diposting </option>
					</select>	
				</div>

				<div class="form-group">
					<input type="text" id="search_input" name="search_input" class="form-control inform-height" placeholder="Cari">
					<button type="submit" id="search_button" class="btn btn-sm btn-primary inform-height"> 
						<span class="glyphicon glyphicon-search"></span> 
					</button>
				</div>

				&nbsp 

				<a href="#" id="add_button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add_forum"> 
					<span class="glyphicon glyphicon-plus-sign"></span> Tambah </a>

			</form>
		</div>
	</div>


	<div class="row row-table-data">
		<div class="col-md-12 dataTable table-responsive">

			<table class="table table-hover table-bordered table-striped">
				<thead class="index">
					<tr>
						<th>No</th>
						<th>Nama Forum</th>
						<th>Hak Akses</th>
						<th>Subyek</th>
						<th>Keterangan</th>
						<th>Rating</th>
						<th>Dispoting Oleh</th>
						<th><span class="glyphicon glyphicon-wrench"></span></th>
					</tr>
				</thead>
 
				<tbody class="index">
				<?php $i = 1; ?>
				@foreach($ForumData as $df)
					<tr>
						<td class="kolom-tengah">{{$i}}</td>
						<td><a class="link-to" href="{{ URL::to('admin/forum_isi') }}"> {{ $df->nama_forum }} </a></td>
						<td> {{ $df->role_access }} </td>
						<td> {{ $df->subyek }} </td>
						<td> {{ $df->keterangan }} </td>
						<td class="kolom-tengah"> {{ $df->rate }}  <span class="glyphicon glyphicon-star"></span> </td>
						<td class="kolom-tengah"> {{ $df->forum_create_by }} </td>
						<td class="kolom-tengah">
							<a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target="#edit_forum"> <span class="glyphicon glyphicon-edit"></span> </a> 
	                		<a class="btn btn-danger btn-xs" href="#"><span class="glyphicon glyphicon-trash"></span></a>
	                	</td>
					</tr>
					<?php $i++; ?>
				@endforeach
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

	<div class="modal fade" id="add_forum" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.forum.modal_add')
	</div>

	<!-- ///////////////////////////////////////////////////////////// Modal Edit ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="edit_forum" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.forum.modal_edit')
	</div>


</div>

<script type="text/javascript" src="{{asset('public/js/apps/forum.js')}}"></script>

@stop