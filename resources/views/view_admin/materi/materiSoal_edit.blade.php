@extends('templates/admin_layouts')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/apps/materi.css') }}">
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('public/css/jasny-bootstrap.min.css') }}">

@section('add_bread_admin')
<li><a href="{{ URL::to('admin/materi') }}">Materi</a></li>
@stop

@section('bread_admin')
Mengubah Materi
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
			<form method="post" target="target_submit" class="form form-horizontal" enctype="multipart/form-data" action="{{ URL::to('admin/materi_edit') }}" data-toggle="validator">
	      	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	      	<input type="text" id="editIdMateri" name="id_materi" style="display:none;" />
				<div class="form-group">
		            <div class="col-md-1"></div>
		            <label class="col-sm-2 label-right">Pelajaran</label>
		            <div class="col-sm-8">
		              <select class="form-control" id="editPelajaran" name="editPelajaran" required>
		                
		              </select>
		            </div>
		            <div class="col-md-1"></div>
		        </div>

		         <div class="form-group">
		            <div class="col-md-1"></div>
		            <label class="col-sm-2 label-right">Kelas</label>
		            <div class="col-sm-8">
		              <select class="form-control" id="editKelas" name="editKelas" required>
		                
		              </select>
		            </div>
		            <div class="col-md-1"></div>
		        </div>

		        <div class="form-group">
		            <div class="col-md-1"></div>
		            <label class="col-sm-2 label-right">Guru</label>
		            <div class="col-sm-8">
		              <select class="form-control" id="editGuru" name="editGuru" required>
		               
		              </select>
		            </div>
		            <div class="col-md-1"></div>
		        </div>

		        <div class="form-group">
		            <div class="col-md-1"></div>
		            <label class="col-sm-2 label-right">Nama Materi</label>
		            <div class="col-sm-8">
		              <input type="text" class="form-control inform-height" id="editNamaMateri" name="editNamaMateri" value="Nama Materi" required>
		            </div>
		            <div class="col-md-1"></div>
		        </div>

		        <div class="form-group">
		        	<div class="col-md-1"></div>
		            <label class="col-sm-2 label-right">Isi Materi</label>
		            <div class="col-sm-8">
		            	<textarea class="form-control" rows="10" id="editIsi" name="editIsi" value="Isi Materi" required></textarea>
		            </div>
		            <div class="col-md-1"></div>
		        </div>

		        <div class="form-group">
		            <div class="col-sm-1"></div>
		            <label class="col-sm-2 ">File Lama</label>
		            <div class="col-sm-8">
		              <input type="text" protected id="edit_file_materi" name="edit_file_materi_lama" class="form-control inform-height" style="border: 0; "/>
		            </div>
		            <div class="col-sm-1"></div>

		            <div class="col-sm-3"></div>
		            <div class="col-sm-9 help-block with-errors"></div>
		        </div>

		        <div class="form-group">
		            <div class="col-sm-1"></div>
		            <label class="col-sm-2 ">File Baru</label>
		            <div class="col-sm-8">
		              <div class="fileinput fileinput-new" data-provides="fileinput">
		                <span class="btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="edit_file_materi"></span>
		                <span class="fileinput-filename"></span>
		                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
		              </div>
		            </div>
		            <div class="col-sm-1"></div>
		            <div class="col-sm-3"></div>
		            <div class="col-sm-9 help-block with-errors"></div>
		        </div>
			
		</div>
	</div>

<!-- Daftar Materi -->
	<div class="row row-judul">
		<div class="col-md-12">
			<legend><h4 class="judul-soal"> Daftar Soal </h4></legend>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<a href="#" id="add_button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addSoal"> <span class="glyphicon glyphicon-plus-sign"></span> Tambah </a>
		</div>
		<div class="col-md-12 dataTable">
			
		</div>		
	</div>
				<div class="form-group" style="float:right;">
				    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
		          	<button type="reset" id="reset_add_form" class="btn btn-primary btn-sm">Reset</button>
			        <button type="submit" class="btn btn-primary btn-sm" onclick="AddDataMateri()" >Simpan Ubah</button>
		          	<iframe id="target_submit" name="target_submit" style="width:100px; height:100px; display:none;"></iframe>
				</div>
			</form>

	<!-- ///////////////////////////////////////////////////////////// Modal Add Soal///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="addSoal" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.materi.modal_addSoal')
	</div>

	<!-- ///////////////////////////////////////////////////////////// Modal Edit Soal ///////////////////////////////////////////////////////////// -->

	<div class="modal fade" id="editSoal" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		@include('view_admin.materi.modal_editSoal')
	</div>

<!-- End Daftar Materi -->

<script  type="text/javascript" src="{{asset('public/js/apps/materi_soal.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/js/jasny-bootstrap.min.js') }}"></script>
<script type="text/javascript">
  $('.fileinput').fileinput()
</script>

</div>
@stop