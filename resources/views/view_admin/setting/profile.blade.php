@extends('templates/admin_layouts')

@section('bread_admin')
Profil
@stop

@section('content')

<div class="main-content-profile">
	
	<div class="row">
		<div class="col-md-2">
		    <div class="thumbnail">
			    <img src="{{ asset ('public/img/user.png') }}" style="height:180px; width:140px;">
		    </div>
		</div>

		<div class="col-md-10">
			<form class="form form-horizontal" role="form" style="margin-top:-20px;">

				<legend> <h3 class="legend"> Edit Profil </h3> </legend>

				<div class="form-group">
					<label class="col-sm-3">NIK</label>
			        <div class="col-sm-5">
			        	<input type="text" class="form-control inform-height" id="add_nik" name="add_nik" value="{{$nik}}" readonly>
		            </div>
				</div>

				<div class="form-group">
					<label class="col-sm-3">Nama</label>
			        <div class="col-sm-5">
			        	<input type="text" class="form-control inform-height" id="add_nama" name="add_nama" value="{{$nama_user}}" placeholder="Nama">
		            </div>
				</div>

				<div class="form-group">
					<label class="col-sm-3">Tempat Lahir</label>
			        <div class="col-sm-5">
			        	<input type="text" class="form-control inform-height" id="add_tempat_lahir" name="add_tempat_lahir" placeholder="Tempat Lahir">
		            </div>
				</div>

				<div class="form-group">
					<label class="col-sm-3">Tanggal Lahir</label>
			        <div class="col-sm-5">
			        	<div class="input-group date" id="datepicker_start">
		                  <input type="text" name="add_tgl_lahir" id="add_tgl_lahir" class="form-control inform-height" placeholder="Tanggal Lahir">
		                    <span class="input-group-addon">
		                      <i class="glyphicon glyphicon-calendar"></i>
		                    </span>
		                </div>
		            </div>
				</div>

				<div class="form-group">
					<label class="col-sm-3">Agama</label>
			        <div class="col-sm-5">
			        	<input type="text" class="form-control inform-height" id="add_agama" name="add_agama" placeholder="Agama">
		            </div>
				</div>

				<div class="form-group">
					<label class="col-sm-3">Email</label>
			        <div class="col-sm-5">
			        	<input type="email" class="form-control inform-height" id="add_email" name="add_email" placeholder="Email">
		            </div>
				</div>

				<div class="form-group">
					<label class="col-sm-3">No Telepon / HP</label>
			        <div class="col-sm-5">
			        	<input type="text" class="form-control inform-height" id="add_telp" name="add_telp" placeholder="No Telp/HP">
		            </div>
				</div>

				<div class="form-group">
					<label class="col-sm-3">Foto</label>
			        <div class="col-sm-5">
			        	<input type="file" class="form-control inform-height" id="add_foto" name="add_foto">
		            </div>
				</div>

			    <div class="form-group">
					<div class="col-sm-3">
						
					</div>
					<div class="col-sm-5" style="text-align:right;"> 
						<button type="reset" id="reset_add_form" class="btn btn-default btn-sm">Reset</button>
						<button type="submit" id="submit_add_form" class="btn btn-primary btn-sm" value="save">Simpan</button>
					</div>
			    </div>

			</form>
		</div>
	</div>

</div>

<script type="text/javascript" src="{{asset('public/js/apps/profile.js')}}"></script>


@stop