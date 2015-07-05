@extends('templates/siswa_layouts')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/apps/kuis_siswa.css') }}">

@section('add_bread_siswa')
<li><a href="{{ URL::to('siswa/latihan') }}">Materi</a></li>
@stop

@section('bread_siswa')
Nilai
@stop

@section('content')

<div class="main-content">

	<div class="row row-judul">

		<div class="col-md-12">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form class="form form-horizontal" role="form" style="margin-top:-20px;">

					<legend> <h3 class="legend"> Hasil Latihan </h3> </legend>

					<div class="form-group">
						<p class="col-sm-6">Jawaban Benar</p>
				        <p class="col-sm-6">: &nbsp 28</p>
					</div>

					<div class="form-group">
						<p class="col-sm-6">Total Soal</p>
				        <p class="col-sm-6">: &nbsp 30</p>
					</div>

					<div class="form-group">
						<p class="col-sm-6">Nilai</p>
				        <p class="col-sm-6">: &nbsp 85</p>
					</div>

					<!-- <div class="form-group">
						<p class="col-sm-6">Durasi Mengerjakan</p>
				        <p class="col-sm-6">: &nbsp 00:05:00</p>
					</div> -->

				    <div class="form-group">
						<div class="col-sm-12" style="text-align:center;">
							<a href="{{URL::to('siswa/latihan')}}" type="submit" class="btn btn-primary btn-sm">Tutup</a>
						</div>
				    </div>

				</form>
			</div>
			<div class="col-md-4"></div>
		</div>

	</div>

</div>

@stop