@extends('templates/admin_layouts')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/apps/forum.css') }}">

@section('add_bread_admin')
<li><a href="{{ URL::to('admin/forum') }}">Forum</a></li>
@stop

@section('bread_admin')
{{$nama_forum}}
@stop

@section('content')

<div class="main-content">

	<div class="row"> <!-- Header Forum -->
		<div class="col-md-12">
			<h3 class="header-judul">{{$nama_forum}}</h3>
			<input class="form-control" type="hidden" id="id_forum" value="{{$id_forum}}" />
		</div>
	</div>

	<div class="row row-isi-forum"> <!-- Isi Forum Pembuat -->
		<div class="col-md-12 table-responsive dataHead">

		</div>
	</div>

	<div class="row"> <!-- Header Komentar Forum -->
		<div class="col-md-12">
			<ul class="nav nav-tabs">
				<li role="presentation" class="active"><a href="#">Votes</a></li>
			  	<li role="presentation"><a href="#">Newer</a></li>
			  	<li role="presentation"><a href="#">Older</a></li>

			  	<button href="#" class="btn btn-sm btn-primary inform-height form-right" data-toggle="modal" data-target="#add_comment">Tambah</button>
			  	<p class="info-komentar form-right jml_komentar"></p>
			  	
			</ul>
		</div>
	</div>

	<div class="row"> <!-- Isi Komentar -->
		<div class="col-md-12 table-responsive dataChild" style="text-align:center;"> <!-- Header User Komen -->

		</div>
	</div>

	<div class="row row-paging-table">
		<div class="pg num-page">
	        <ul class="pagination pagination-sm">

	        </ul>
	    </div>
	</div>

	<div class="row space-footer">
	</div>

	<input type="hidden" id="base_url" value="<?php echo ('localhost/elfis/admin/') ?>"/>

	<!-- ///////////////////////////////////////////////////////////// Modal Add ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="add_comment" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.forum.modal_comment_add')
	</div>

	<!-- ///////////////////////////////////////////////////////////// Modal Edit ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="edit_comment" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.forum.modal_comment_edit')
	</div>

</div>

<script type="text/javascript" src="{{asset('public/js/apps/forum_isi.js')}}"></script>

@stop