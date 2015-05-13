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
		<div class="col-md-6">
			<h3 class="header-pembuat">Tubagus Axel Luthfiady</h3>
			<h4 class="sub-header-buat">Sabtu, 9 Mei 2015</h4>
			<h4 class="sub-header-buat">15:30 WIB</h4>
		</div>
		<div class="col-md-6 header-right">
			<h3 class="header-pembuat">Forum Contoh Untuk Semua</h3>
			<h4 class="sub-header-buat">Rating 5 Bintang</h4>
			<h4 class="sub-header-buat"><a href="#">Suka</a></h4>
		</div>
	</div>

	<div class="row row-isi-forum"> <!-- Isi Forum Pembuat -->
		<div class="col-md-12">
			<table class="table isi-forum table-bordered">
				<tr><td>aaaaaaaaaaaaaaaaaa bbbbbbbbbbbbbbbbbbbbbbbbb cccccccccccccccccccccc dddddddddddddddddddddddddddddddddd
				eeeeeeeeeeeeeeeeeeeeeeeee fffffffffffffffffffffff gggggggggggggggggggggggg hhhhhhhhhhhhhhhhhhhhhhhhhhhh
				iiiiiiiiiiiiiiiiiiiiiiii jjjjjjjjjjjjjjjjjjjjjjjjjj kkkkkkkkkkkkkkkkkk llllllllllllllllllllllllllllllll
				sdadsa sdandjkasndjsad sajd js ndjksdnjks bdjksa jdk jsakb djksa bdjksab djksabdjkbsajkd bsajkbdk 
				dsadsadsa skld klasndklsnadlksn adbsakbdksabdlksad;k sldb lsbd ljasbdsabld b;sakdlsab djsabdkjbsaljd bjksbdksakj
				dsadsadsad sdn aldn sabd jsbadbysgduisbayidgsi aduisa du vsayidv uasv dyivsa ifdi avdpoadubsai ydgiusa bi</td></tr>
			</table>
		</div>
	</div>

	<div class="row"> <!-- Header Komentar Forum -->
		<div class="col-md-12">
			<ul class="nav nav-tabs">
				<li role="presentation" class="active"><a href="#">Votes</a></li>
			  	<li role="presentation"><a href="#">Newew</a></li>
			  	<li role="presentation"><a href="#">Older</a></li>
			  	<form class="form-inline form-right">
			  		<div class="form-group form-group-khusus">
				  		<h4 class="sub-header-buat">4 Jawaban &nbsp</h4>
				  	</div>
				  	<div class="form-group form-group-khusus">
				  		<button href="#" class="btn btn-sm btn-primary inform-height">Tambah Komentar</button>
				  	</div>
			  	</form>
			</ul>
		</div>
	</div>

	<div class="row"> <!-- Isi Komentar -->
		<div class="col-md-12"> <!-- Header User Komen -->
			<table class="table header-komentar" style="background-color: lightgray;">
				<tr>
					<td>
						Anditika Maulida Purnamasari
					</td>
					<td style="text-align:right;">
						Judul Komentar Untuk Semua
					</td>
				</tr>
				<tr>
					<td>
						Minggu, 10 Mei 2015
					</td>
					<td style="text-align:right;">
						Rating 5 Rating
					</td>
				</tr>
				<tr>
					<td>
						20:20 WIB
					</td>
					<td style="text-align:right;">
						<a href=""> Suka</a>
					</td>
				</tr>
			</table>
		</div>
		<div class="col-md-12"> <!-- Isi User Komen -->
			
		</div>
	</div>

</div>

@stop