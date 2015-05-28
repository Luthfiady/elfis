@extends('templates/admin_layouts')

@section('bread_admin')
User Profile
@stop

@section('content')

<div class="main-content-profile">
	
	<div class="row">
		<div class="col-md-2">
		    <div class="thumbnail">
			    <img src="{{ asset ('public/img/user.png') }}" style="height:180px; width:160px;">
			    <!-- <div class="caption">
			        <h4>Abdul Admin Rojak Suyadiningrat</h4>
			        <a href="#" class="btn btn-sm btn-primary" role="button">Ubah Foto</a>
				</div> -->
		    </div>
		</div>

		<div class="col-md-10">
			<form class="form form-horizontal" role="form" style="margin-top:-20px;">
				
				<legend> <h3 class="legend"> Profil </h3> </legend>

				<div class="form-group">
					<label class="col-sm-3">NIK</label>
			        <div class="col-sm-5">
			        	<input type="text" class="form-control inform-height" id="add_modul_code" placeholder="NIK">
		            </div>
				</div>

				<div class="form-group">
					<label class="col-sm-3">Nama</label>
			        <div class="col-sm-5">
			        	<input type="text" class="form-control inform-height" id="add_modul_code" placeholder="Nama">
		            </div>
				</div>

				<div class="form-group">
					<label class="col-sm-3">Tempat Lahir</label>
			        <div class="col-sm-5">
			        	<input type="text" class="form-control inform-height" id="add_modul_code" placeholder="Tempat Lahir">
		            </div>
				</div>

				<div class="form-group">
					<label class="col-sm-3">Tanggal Lahir</label>
			        <div class="col-sm-5">
			        	<input type="text" class="form-control inform-height" id="add_modul_code" placeholder="Tanggal Lahir">
		            </div>
				</div>

				<div class="form-group">
					<label class="col-sm-3">Agama</label>
			        <div class="col-sm-5">
			        	<input type="text" class="form-control inform-height" id="add_modul_code" placeholder="Agama">
		            </div>
				</div>

				<div class="form-group">
					<label class="col-sm-3">Email</label>
			        <div class="col-sm-5">
			        	<input type="email" class="form-control inform-height" id="add_modul_code" placeholder="Email">
		            </div>
				</div>

				<div class="form-group">
					<label class="col-sm-3">No Telepon / HP</label>
			        <div class="col-sm-5">
			        	<input type="text" class="form-control inform-height" id="add_modul_code" placeholder="No Telp/HP">
		            </div>
				</div>

			    <div class="form-group">
					<label class="col-sm-3">Foto Profil</label>
					<div class="col-sm-5">

            			<div class="input-group">
                			<span class="input-group-btn">
                    		<span class="btn btn-sm btn-primary btn-file">
                        	Browse <input type="file" accept="image/*" multiple>
                    		</span>
                			</span>
                			<input type="text" class="form-control inform-height" readonly>
            			</div>
			            <span class="help-block">
			                Ubah foto profil
			            </span>
					</div>
			    </div>

			    <div class="form-group">
					<div class="col-sm-6">
						
					</div>
					<div class="col-sm-2">
						<button type="submit" id="submit_add_form" class="btn btn-primary btn-sm" value="save">Simpan</button>
			    		<button type="reset" id="reset_add_form" class="btn btn-default btn-sm">Reset</button>
					</div>
			    </div>

			</form>
		</div>
	</div>

</div>

<script type="text/javascript">
	$(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
        
    });
});
</script>

@stop