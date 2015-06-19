<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <link rel="icon" href="{{ asset('public/img/logo/icon.png') }}">
    
	<title>E-Learning SMKN 56 Jakarta</title>

	<!-- css style -->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap-theme.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/MyStyle.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/nivo-slider.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/themes/default/default.css') }}">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

</head>
<body>
	
	<div class="container"> 
		
		<div class="row Row-Header-Login">
			<div class="col-md-12">
				<img src="{{ asset('public/img/logo/logo.png') }}" alt="SMKN 56 Jakarta" height="80px">


				<!-- <h2 class="header"> SMK Negeri 53 Jakarta </h2> -->
			</div>
		</div> <!-- Tutup div row header -->


		<div class="row Row-Body-Login">
			<div class="col-md-9 contain-slider slider-wrapper theme-default">
				<div id="slider" class="nivoSlider">
					<img src="{{ asset('public/img/slider/1.png') }}">
					<img src="{{ asset('public/img/slider/2.png') }}">
					<img src="{{ asset('public/img/slider/3.png') }}">
                </div>
			</div> 

			<div class="col-md-3" style="margin-top:15px;">
				<form class="form-horizontal" role="form" method="post" name="myform">
				<fieldset>
					<legend> <h3 class="legend"> Login </h3> </legend>
					<div class="form-group">
						<label class="col-sm-4">Username</label>
						<div class="col-sm-8">
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
						<input type="checkbox" id="show_password" value="1"> Lihat Password 
					</div>

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
	<script src="{{ asset('public/js/jquery.min.js') }}"></script>
	<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('public/js/jquery-1.11.2.min.js') }}"></script>
	<script src="{{ asset('public/js/jquery.nivo.slider.js') }}"></script>
	<script src="{{ asset('public/js/login.js') }}"></script>


</body>
</html>
