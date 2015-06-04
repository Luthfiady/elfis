@extends('templates/siswa_layouts')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/apps/materi_siswa.css') }}">

@section('add_bread_siswa')
<li><a href="{{ URL::to('siswa/materi') }}">Materi</a></li>
@stop

@section('bread_siswa')
Detail Materi
@stop

@section('content')

<div class="main-content">
	
	<div class="row row-judul">

		<div class="col-md-12">			
			
	    	<div class="panel panel-info">
    			<div class="panel-heading">
			        <span class="panel-title">Detail Materi</span>
			        <div class="btn-group pull-right">
			            <div class="btn-group">
			            	<a href="#" id="add_button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#upload_tugas" title="Unduh Materi"> 
								<span class="glyphicon glyphicon-upload"></span> Unduh </a>
							<a href="{{URL::to('siswa/materi_soal')}}" class="btn btn-sm btn-primary">
								<span class="glyphicon glyphicon-pencil"></span> Latihan Soal </a>
							<a href="{{URL::to('siswa/materi')}}" class="btn btn-sm btn-primary"></span> Kembali </a>
						</div>
        			</div>
        			<div class="clearfix"></div>
    			</div>

    			<div class="panel-body-tgs">
        			<table class="table table-striped table-responsive">
						<thead class="tugas">
							<tr>
								<th colspan="2"><h3 class="namaMateri"> MTK-01 </h3></th>
							</tr>
						</thead>
						<tbody>
							<tr class="info">
								<td class="kolom-kiri">
									<div class="form-group">
										<p class="col-sm-2">Pelajaran</p>
								        <p class="col-sm-10">: &nbsp Matematika</p>
									</div>
									<div class="form-group">
										<p class="col-sm-2">Nama Guru</p>
								        <p class="col-sm-10">: &nbsp Sholeh</p>
									</div>
									<div class="form-group">
										<p class="col-sm-2">Waktu Unggah</p>
								        <p class="col-sm-10">: &nbsp 25/05/2015</p>
									</div>
								</td>
							</tr>							
						</tbody>
					</table>
    			</div>
			</div>
		</div>
	</div>

</div>
@stop