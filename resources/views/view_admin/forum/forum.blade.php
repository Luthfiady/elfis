@extends('templates/admin_layouts')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/forum.css') }}">

@section('add_bread_admin')
<li><a href="{{ URL::to('admin/forum') }}">Forum</a></li>
@stop

@section('bread_admin')
Forum Contoh Untuk Semua
@stop

@section('content')

<div class="main-content">

	<div class="row"> <!-- Header Forum -->
		<div class="col-md-12">
			<h3 class="header-judul">Forum Contoh Untuk Semua</h3>
		</div>
	</div>

	<div class="row row-isi-forum"> <!-- Isi Forum Pembuat -->
		<div class="col-md-12 table-responsive">

			<table class="table table-header-forum">
				<tr class="forum-kepala">
					<td>
						<p class="header-pembuat">Tubagus Axel Luthfiady</p>
						<p class="sub-header-buat">Sabtu, 9 Mei 2015 | 15:30 WIB</p>
					</td>
					<td class="header-right">
						<p class="sub-header-buat">Rating 5 <span class="glyphicon glyphicon-star"></span> &nbsp|&nbsp <a href="#" class="rating">Suka</a></p>
						<a href="#" class="rating" data-toggle="modal" data-target="#edit_comment">Edit</a>
					</td>
				</tr>
				<tr class="forum">
					<td colspan="2">Segalanya yang terjadi sudahlah terjadi, di Indonesia banyak yang sudah seperti ini apa adanya. Aku mah apah atuh!
					Itulah salah satu yang menjadi tren saat ini di kalangan anak muda, ckckck. Ampun dah yaa hahahaha</td>
				</tr>
			</table>

		</div>
	</div>

	<div class="row"> <!-- Header Komentar Forum -->
		<div class="col-md-12">
			<ul class="nav nav-tabs">
				<li role="presentation" class="active"><a href="#">Votes</a></li>
			  	<li role="presentation"><a href="#">Newer</a></li>
			  	<li role="presentation"><a href="#">Older</a></li>

			  	<button href="#" class="btn btn-sm btn-primary inform-height form-right" data-toggle="modal" data-target="#add_comment">Tambah</button>
			  	<p class="info-komentar form-right">4 Komentar &nbsp</p>
			  	
			</ul>
		</div>
	</div>

	<div class="row"> <!-- Isi Komentar -->
		<div class="col-md-12 table-responsive"> <!-- Header User Komen -->

			<table class="table table-komentar-forum">
				<tr class="forum-komentar">
					<td>
						<p class="header-pembuat">Anditika Maulida Purnamasari</p>
						<p class="sub-header-buat">Sabtu, 9 Mei 2015 | 15:30 WIB</p>
					</td>
					<td class="header-right">
						<p class="sub-header-buat">Rating 3 <span class="glyphicon glyphicon-star"></span> &nbsp|&nbsp <a href="#" class="rating">Suka</a></p>
						<a href="#" class="rating" data-toggle="modal" data-target="#edit_comment">Edit</a>
					</td>
				</tr>

				<tr class="forum">
					<td colspan="2">Sedang ada apa ini? hahahaha </td>
				</tr>

				<tr class="forum-komentar">
					<td>
						<p class="header-pembuat">Anditika Maulida Purnamasari</p>
						<p class="sub-header-buat">Sabtu, 9 Mei 2015 | 15:30 WIB</p>
					</td>
					<td class="header-right">
						<p class="sub-header-buat">Rating 3 <span class="glyphicon glyphicon-star"></span> &nbsp|&nbsp <a href="#" class="rating">Suka</a></p>
						<a href="#" class="rating" data-toggle="modal" data-target="#edit_comment">Edit</a>
					</td>
				</tr>

				<tr class="forum">
					<td colspan="2">Sedang ada apa ini? sdasdnakld dsajdhkja dasdhas dadh </td>
				</tr>

				<tr class="forum-komentar">
					<td>
						<p class="header-pembuat">Anditika Maulida Purnamasari</p>
						<p class="sub-header-buat">Sabtu, 9 Mei 2015 | 15:30 WIB</p>
					</td>
					<td class="header-right">
						<p class="sub-header-buat">Rating 3 <span class="glyphicon glyphicon-star"></span> &nbsp|&nbsp <a href="#" class="rating">Suka</a></p>
						<a href="#" class="rating" data-toggle="modal" data-target="#edit_comment">Edit</a>
					</td>
				</tr>

				<tr class="forum">
					<td colspan="2">Sedang ada apa ini? sdasdnakld dsajdhkja dasdhas dadh \n sdbnjkasbdj /n dsajkbdjsak </td>
				</tr>
			</table>

		</div>
	</div>

	<!-- ///////////////////////////////////////////////////////////// Modal Add ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="add_comment" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.forum.modal_comment_add')
	</div>

	<!-- ///////////////////////////////////////////////////////////// Modal Edit ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="edit_comment" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.forum.modal_comment_edit')
	</div>

</div>

@stop