<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-Learning SMKN 56 Jakarta</title>

	<!-- css style -->
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-theme.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/MyStyle.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/nivo-slider.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/themes/default/default.css') }}">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

</head>
<body>
	
	<div class="container"> 
		
		<div class="row Row-Header-Login">
			<div class="col-md-12">
				<img src="{{ asset('/img/logo/logo.jpg') }}" alt="SMKN 56 Jakarta" height="80px">


				<!-- <h2 class="header"> SMK Negeri 53 Jakarta </h2> -->
			</div>
		</div> <!-- Tutup div row header -->


		<div class="row Row-Body-Login">
			<div class="col-md-9 contain-slider slider-wrapper theme-default">
				<div id="slider" class="nivoSlider">
					<img src="{{ asset('/img/slider/1.jpg') }}">
					<img src="{{ asset('/img/slider/2.jpg') }}">
					<img src="{{ asset('/img/slider/3.jpg') }}">
					<img src="{{ asset('/img/slider/4.jpg') }}">
					<img src="{{ asset('/img/slider/5.jpg') }}">
                </div>
			</div> 

			<div class="col-md-3">
				<form class="form-horizontal" role="form" method="post" action="{{ URL::to('do_login') }}" name="myform">
				<fieldset>
					<legend> <h3 class="legend"> Login </h3> </legend>
					<div class="form-group">
						<label class="col-sm-4">Username</label>
						<div class="col-sm-8">
							<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
							<input type="text" class="form-control" style="height:30px;" name="id_user" id="login_username" placeholder="Username" required autofocus>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4">Password</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" style="height:30px;" name="password" id="login_password" placeholder="Password" required>
						</div>
					</div>

					<div class="form-group show-pass">
						<input type="checkbox" id="show_password" value="1"> Show Password 
					</div>
{{ $alert }}
					<div class="form-group">
		                <div class="col-sm-12" align="right">
		                	<div id="login_message" style="text-align:left; margin-bottom:10px;"></div>
		                    <button type="submit" id="login_submit" value="login" class="btn btn-primary"><strong> Login </strong></button>
		                </div>
		            </div>
				</fieldset>
				</form>
			</div>
		</div> <!-- Tutup div row body -->

		<div class="row Row-Footer">
			<div class="col-md-12">
				<p class="footer"> COPYRIGHT ©2015 SITE. ALL RIGHT RESERVED </p>
			</div>
		</div> <!-- Tutup div row footer -->

	</div> <!-- Tutup div container -->

	<!-- Scripts -->
	<script src="{{ asset('/js/jquery.min.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/js/jquery-1.11.2.min.js') }}"></script>
	<script src="{{ asset('/js/jquery.nivo.slider.js') }}"></script>
	<script src="{{ asset('/js/login.js') }}"></script>
	
	<script>
        $(window).load(function() {
            $('#slider').nivoSlider();
        });
	</script>

</body>
</html>
