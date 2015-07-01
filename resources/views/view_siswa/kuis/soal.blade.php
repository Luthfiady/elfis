@extends('templates/siswa_layouts')

<link rel="stylesheet" type="text/css" href="{{ asset('public/css/apps/kuis_siswa.css') }}">

@section('add_bread_siswa')
<li><a href="{{ URL::to('siswa/kuis') }}">Kuis</a></li>
@stop

@section('bread_siswa')
{{$nama_group_kuis}}
@stop

@section('content')

<div class="main-content">

	<input type="hidden" id="id" value="{{$id}}" />
	<input type="hidden" id="id_group_kuis" value="" />
	<input type="hidden" id="session_durasi" value="{{$session_durasi}}" />

	<div class="row row-judul">
		<div class="col-md-6">
			<h4 class="judul-soal"> {{$nama_group_kuis}} </h4>
		</div>

		<div class="col-md-6 rata-kanan-text">
			<div class="col-xs-7"></div>
			<h3 class="durasi countdown-durasi col-xs-2"></h3><h3 class="durasi-a col-xs-1">|</h3><h3 class="durasi durasi-soal col-xs-2"></h3>
		</div>
	</div>
	<form class="form form-horizontal" id="form_soal" role="form" data-toggle="validator" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="row row-table-data-soal dataNilai">
		<div class="col-md-12 table-responsive dataSoal">
			
		</div>
	</div>

	<div class="row row-paging-table">
		<div class="col-md-12">
			<nav class="pg">
				<ul class="pager">
					
				</ul>
			</nav>
		</div>
	</div>
	</form>
</div>

<script type="text/javascript" src="{{asset('public/js/apps/siswa_jawab_kuis.js')}}"></script>

@stop