@extends('templates/admin_layouts')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/apps/tugas.css') }}">

@section('add_bread_admin')
<li><a href="{{ URL::to('admin/tugas') }}">Tugas</a></li>
@stop

@section('bread_admin')
{{ $data_tugas['nama_tugas'] }}
@stop

@section('content')

<div class="main-content">

	<div class="row row-judul">

		<div class="col-md-12">
		
			<div class="panel panel-default">
    			<div class="panel-heading">
			        <span class="panel-title">Detail Tugas</span>
			        <div class="btn-group pull-right">
			            <div class="btn-group">
							<a href="{{URL::to('admin/tugas')}}" class="btn btn-primary">Kembali</a>
						</div>
        			</div>
        			<div class="clearfix"></div>
    			</div>

    			<div class="panel-body-tgs">
        			<table class="table table-striped table-responsive">
						<thead class="tugas">
							<tr>
								<th colspan="2"><h3 class="judul-tugas"> {{ $data_tugas['nama_tugas'] }} </h3></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="kolom-kiri">
									<div class="form-group">
										<p class="col-sm-2">Materi</p>
								        <p class="col-sm-10">: &nbsp {{ $data_tugas['nama_materi'] }}</p>
									</div>
									<div class="form-group">
										<p class="col-sm-2">Pelajaran</p>
								        <p class="col-sm-10">: &nbsp {{ $data_tugas['nama_pelajaran'] }}</p>
									</div>
									<div class="form-group">
										<p class="col-sm-2">Tanggal Mulai</p>
								        <p class="col-sm-10">: &nbsp {{ $data_tugas['tugas_mulai'] }}</p>
									</div>
									<div class="form-group">
										<p class="col-sm-2">Tanggal Selesai</p>
								        <p class="col-sm-10">: &nbsp {{ $data_tugas['tugas_selesai'] }} &nbsp</p>
									</div>
									<div class="form-group">
										<p class="col-sm-2">Batas Waktu</p>
								        <p class="col-sm-10">: &nbsp {{ $data_tugas['durasi'] }} &nbsp<span class="label label-danger">Deadline!</span></p>
									</div>
									<div class="form-group">
										<p class="col-sm-2">File Tugas</p>
								        <p class="col-sm-10">: &nbsp <a href="{{ URL::to('public/uploads/file_tugas/' . $data_tugas['file']) }}" title="Unduh">{{ $data_tugas['file'] }} <span class="glyphicon glyphicon-download-alt"></span></a></p>
									</div>
								</td>
							</tr>
							<tr>
								<td class="kolom-kiri">
									<div class="form-group">
										<p class="col-sm-2">Uraian Tugas</p>
										<p class="col-sm-10">: &nbsp</p>								        
									</div>
									<div class="form-group" id="right">
										<p class="col-sm-12 text-justify">
										<br /> {{ $data_tugas['isi'] }}
										</p>
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