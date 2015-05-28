@extends('templates/admin_layouts')

@section('bread_admin')
Reset Password
@stop

@section('content')

<div class="main-content-profile">
	
	<div class="row">
		<div class="col-md-3">
		    
		</div>

		<div class="col-md-6">
			<form class="form form-horizontal" role="form" style="margin-top:-20px;">
				
			<legend> <h3 class="legend"> Reset Password </h3> </legend>

				<div class="form-group">
					<label class="col-sm-4">Username</label>
			        <div class="col-sm-8">
			        	<input type="text" class="form-control inform-height" id="add_modul_code" placeholder="Username">
		            </div>
				</div>

			    <div class="form-group">
					<div class="col-sm-12" style="text-align:right;">
						<button type="submit" id="submit_add_form" class="btn btn-primary btn-sm" value="save">Reset Password</button> 
						<button type="reset" id="reset_add_form" class="btn btn-default btn-sm">Reset</button>
					</div>
			    </div>

			</form>
		</div>

		<div class="col-md-3">
		    
		</div>

	</div>

</div>


@stop