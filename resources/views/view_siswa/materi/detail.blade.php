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
		
			<div class="panel panel-default">
    			<div class="panel-heading">
			        <span class="panel-title">Detail Materi</span>
			        <div class="btn-group pull-right">
			            <div class="btn-group">
							<a href="{{URL::to('siswa/materi')}}" class="btn btn-primary">Kembali</a>
						</div>
        			</div>
        			<div class="clearfix"></div>
    			</div>

    			<div class="panel-body-tgs">
        			<table class="table table-striped table-responsive">
        				<thead class="tugas">
							<tr>
								<th colspan="2"><h3 class="judul-tugas"> {{ $data_materi['nama_materi'] }} </h3></th>
							</tr>
						</thead>
						<tbody>
							<tr class="">
								<td class="kolom-kiri">
									<div class="form-group">
										<p class="col-sm-2">Pelajaran</p>
								        <p class="col-sm-10">: &nbsp {{ $data_materi['nama_pelajaran'] }}</p>
									</div>
									<div class="form-group">
										<p class="col-sm-2">Kelas</p>
								        <p class="col-sm-10">: &nbsp {{ $data_materi['nama_kelas'] }}</p>
									</div>
									<div class="form-group">
										<p class="col-sm-2">Guru</p>
								        <p class="col-sm-10">: &nbsp {{ $data_materi['nama'] }}</p>
									</div>
									<div class="form-group">
										<p class="col-sm-2">File Materi</p>
								        <p class="col-sm-10">: &nbsp <a href="{{ URL::to('public/uploads/file_materi/'.$data_materi['file']) }}" title="Unduh">{{ $data_materi['file'] }} <span class="glyphicon glyphicon-download-alt"></span></a></p>
									</div>
								</td>
							</tr>
							<tr>
								<td class="kolom-kiri">
									<div class="form-group">
										<p class="col-sm-2">Uraian Materi</p>
										<p class="col-sm-10">: &nbsp</p>								        
									</div>
									<div class="form-group" id="right">
										<p class="col-sm-12 text-justify">
										<br /> {{ $data_materi['isi'] }}
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