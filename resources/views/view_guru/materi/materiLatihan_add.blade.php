@extends('templates/guru_layouts')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/apps/materi.css') }}">
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('public/css/jasny-bootstrap.min.css') }}">

@section('add_bread_guru')
<li><a href="{{ URL::to('guru/materi') }}">Materi</a></li>
@stop

@section('bread_guru')
Tambah Materi
@stop
	
@section('content')


<div class="main-content">

<!-- Detail Materi -->
	<div class="row row-judul">
		<div class="col-md-12">
			<legend> <h4 class="judul-soal"> Detail Materi </h4> </legend>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form method="post" target="target_submit" class="form form-horizontal" enctype="multipart/form-data" action="{{ URL::to('guru/materi_add') }}" data-toggle="validator">
	        	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				<div class="form-group">
		            <label class="col-sm-2 label-modal-soal">Pelajaran</label>
		            <div class="col-sm-5">
		              <select class="form-control input-materi" id="addPelajaran" name="addPelajaran" required>
		               
		              </select>
		            </div>
		            
		            <div class="col-sm-5 help-block with-errors"></div>
		        </div>
		        <div class="form-group">
		            <label class="col-sm-2 label-modal-soal">Kelas</label>
		            <div class="col-sm-5">
		              <select class="form-control input-materi" id="addKelas" name="addKelas" required>
		               
		              </select>
		            </div>

		            <div class="col-sm-5 help-block with-errors"></div>
		        </div>
		        <div class="form-group">
		            <label class="col-sm-2 label-modal-soal">Guru</label>
		            <div class="col-sm-5">
		              <select class="form-control input-materi" id="addGuru" name="addGuru" required>
		               
		              </select>
		            </div>

		            <div class="col-sm-5 help-block with-errors"></div>
		        </div>
		         <div class="form-group">
		            <label class="col-sm-2 label-modal-soal">Nama Materi</label>
		            <div class="col-sm-5">
		              <input type="text" class="form-control input-materi inform-height" id="addNamaMateri" name="addNamaMateri" placeholder="Nama Materi" required>
		            </div>

            		<div class="col-sm-5 help-block with-errors"></div>
		        </div>
		        <div class="form-group">
		            <label class="col-sm-2 label-modal-soal">Isi Materi</label>
		            <div class="col-sm-5">
		            	<textarea class="form-control input-materi" rows="10" id="addIsiMateri" name="addIsiMateri" required></textarea>
		            </div>

            		<div class="col-sm-5 help-block with-errors"></div>
		        </div>
		        <div class="form-group">
		        	<label class="col-sm-2 label-modal-soal" id="addFileUpload" name="addFileUpload" for="fileUpload">File Upload</label>
		        	<div class="col-sm-5">
		            <div class="fileinput fileinput-new input-group" data-provides="fileinput" type="file">
		                <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
		                <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="add_file_materi"></span>
		                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
		              	</div>
		            </div>

            		<div class="col-sm-5 help-block with-errors"></div>
		        </div>
			
		</div>
	</div>
				<div class="col-sm-7">
				<div class="form-group" style="float:right;">
				        <button type="reset" id="reset_add_form" class="btn btn-primary btn-sm">Reset</button>
			        	<button type="submit" class="btn btn-primary btn-sm" onclick="addDataMateri()" value="save">Simpan</button>
			        	<iframe id="target_submit" name="target_submit" style="width:100px; display:none; height:100px; position:relative;"></iframe>
				</div>
				</div>
			</form>

	<!-- ///////////////////////////////////////////////////////////// Modal Add Soal///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="addSoal" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_guru.materi.modal_addSoal')
	</div>

	<!-- ///////////////////////////////////////////////////////////// Modal Edit Soal ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="editSoal" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_guru.materi.modal_editSoal')
	</div>

<!-- End Daftar Materi -->

<script type="text/javascript" src="{{asset('public/js/apps/materi.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/js/jasny-bootstrap.min.js') }}"></script>
<script type="text/javascript">
  $('.fileinput').fileinput()
</script>

</div>
@stop