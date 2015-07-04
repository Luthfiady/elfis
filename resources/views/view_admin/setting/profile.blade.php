@extends('templates/admin_layouts')

@section('bread_admin')
Profil
@stop

@section('content')

<link rel="stylesheet" type="text/css" media="all" href="{{ asset('public/css/jasny-bootstrap.min.css') }}">

<div class="main-content-profile">
	
	<div class="row">
		
		<form method="post" target="target_submit" class="form form-horizontal" enctype="multipart/form-data" action="{{ URL::to('admin/profile_edit') }}" style="margin-top:-20px;">
      	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<div class="col-md-12">

			<legend> <h3 class="legend"> Edit Profil </h3> </legend>
			<div class="col-sm-3">
			    <div class="thumbnail" style="height:auto; width:100%;">
				    <img src="{{ asset ('public/uploads/file_profile')  . '/' . $data_guru->foto }} " style="height:100%; width:100%;">
			    </div>
			</div>
			<div class="col-sm-9">
				<div class="form-group">
					<label class="col-sm-3">NIK</label>
			        <div class="col-sm-5">
			        	<input type="text" class="form-control inform-height" id="add_nik" name="add_nik" value="{{$nik}}" readonly>
		            </div>
				</div>

				<div class="form-group">
					<label class="col-sm-3">Nama</label>
			        <div class="col-sm-5">
			        	<input type="text" class="form-control inform-height" id="add_nama" name="add_nama" value="{{ $data_guru->nama }}" placeholder="Nama">
		            </div>
				</div>

				<div class="form-group">
					<label class="col-sm-3">Tempat Lahir</label>
			        <div class="col-sm-5">
			        	<input type="text" class="form-control inform-height" id="add_tempat_lahir" name="add_tempat_lahir" value="{{ $data_guru->tempat_lahir }}" placeholder="Tempat Lahir">
		            </div>
				</div>

				<div class="form-group">
					<label class="col-sm-3">Tanggal Lahir</label>
			        <div class="col-sm-5">
			        	<div class="input-group date" id="datepicker_start">
		                  <input type="text" name="add_tgl_lahir" id="add_tgl_lahir" value="{{ date("d-m-Y", strtotime($data_guru->tanggal_lahir)) }}" class="form-control inform-height" placeholder="Tanggal Lahir">
		                    <span class="input-group-addon">
		                      <i class="glyphicon glyphicon-calendar"></i>
		                    </span>
		                </div>
		            </div>
				</div>

				<div class="form-group">
					<label class="col-sm-3">Agama</label>
			        <div class="col-sm-5">
			        	<input type="text" class="form-control inform-height" id="add_agama" name="add_agama" value="{{ $data_guru->agama }}" placeholder="Agama">
		            </div>
				</div>

				<div class="form-group">
					<label class="col-sm-3">Email</label>
			        <div class="col-sm-5">
			        	<input type="email" class="form-control inform-height" id="add_email" name="add_email" value="{{ $data_guru->email }}" placeholder="nama@email.com">
		            </div>
				</div>

				<div class="form-group">
					<label class="col-sm-3">No Telepon / HP</label>
			        <div class="col-sm-5">
			        	<input type="text" class="form-control inform-height" id="add_telp" name="add_telp" value="{{ $data_guru->telp }}" placeholder="081xxxxxxxxx">
		            </div>
		            <input type="hidden" name="old_foto" value="{{ $data_guru->foto }}" >

				</div>


				<div class="form-group">
					<label class="col-sm-3">Foto</label>
			        <div class="col-sm-5">
			        	<div class="fileinput fileinput-new" data-provides="fileinput">
						  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
						  <div>
						    <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih Foto</span><span class="fileinput-exists">Ubah</span><input type="file" name="add_foto"></span>
						    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
						  </div>
						</div>
		            </div>
				</div>

			    <div class="form-group">
					<div class="col-sm-3">
						
					</div>
					<div class="col-sm-5" style="text-align:right;"> 
						<button type="reset" id="reset_add_form" class="btn btn-default btn-sm">Reset</button>
						<button type="submit" onclick="EditProfile()" class="btn btn-primary btn-sm" value="save">Simpan</button>
						<iframe id="target_submit" name="target_submit" style="width:100px; display:none; height:100px;"></iframe>
					</div>
			    </div>
			</div>

			</form>
		</div>
	</div>

</div>

<script type="text/javascript" src="{{asset('public/js/apps/profile.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/js/jasny-bootstrap.min.js') }}"></script>
<script type="text/javascript">
  $('.fileinput').fileinput()

  $('#modalElement').data('modal',null);
</script>


@stop