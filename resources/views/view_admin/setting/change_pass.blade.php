@extends('templates/admin_layouts')

@section('bread_admin')
Ubah Password
@stop

@section('content')

<div class="main-content-profile">
	
	<div class="row">
		<div class="col-md-3">
		    
		</div>

		<div class="col-md-6">
			<form id="add_form" class="form form-horizontal" role="form" data-toggle="validator" method="post">
				
			<legend> <h3 class="legend"> Ubah Password </h3> </legend>

				<div class="form-group">
					<label class="col-sm-4">Username</label>
			        <div class="col-sm-8">
			        	<input type="text" class="form-control inform-height" value="{{$nama_user}}" readonly>
		            </div>
				</div>

				<div class="form-group">
					<label class="col-sm-4">Password Lama</label>
			        <div class="col-sm-8">
			        	<input type="password" class="form-control inform-height" id="old_password" placeholder="Password Lama" required>
		            </div>
		            <div class="col-sm-4"></div>
            		<div class="col-sm-8 help-block with-errors"></div>
				</div>

				<div class="form-group">
					<label class="col-sm-4">Password Baru</label>
			        <div class="col-sm-8">
			        	<input type="password" class="form-control inform-height" id="new_password" placeholder="Password Baru" required>
		            </div>
		            <div class="col-sm-4"></div>
            		<div class="col-sm-8 help-block with-errors"></div>
				</div>

				<div class="form-group">
					<label class="col-sm-4">Ulangi Password</label>
			        <div class="col-sm-8">
			        	<input type="password" class="form-control inform-height" id="repeat_password" placeholder="Ulang Password" data-match="#new_password" data-match-error="Password doesn't match" required>
		            </div>
		            <div class="col-sm-4"></div>
            		<div class="col-sm-8 help-block with-errors"></div>
				</div>

			    <div class="form-group">
					<div class="col-sm-12" style="text-align:right;">
						<button type="reset" id="reset_add_form" class="btn btn-default btn-sm">Reset</button>
						<button type="save" id="submit_add_form" class="btn btn-primary btn-sm">Simpan</button>
					</div>
			    </div>

			</form>
		</div>

		<div class="col-md-3">
		    
		</div>
	</div>

</div>

<script type="text/javascript" src="{{asset('public/js/apps/change_password.js')}}"></script>


@stop