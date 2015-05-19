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

        <link rel="icon" href="{{ asset('public/img/logo/icon.png') }}">

		<title>E-Learning SMKN 56 Jakarta</title>

		<!-- css style -->
		<link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap-theme.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap-datetimepicker.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap-datetimepicker.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('public/css/jquery-ui-1.11.3/jquery-ui.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('public/css/MyStyle.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('public/css/nivo-slider.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('public/themes/default/default.css') }}">

		<!-- Fonts -->
		<link rel="stylesheet" href="{{asset('public/fonts/style.css')}}">
		<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

		<!-- Scripts -->
		<script src="{{ asset('public/js/jquery.js') }}"></script>
		<script src="{{ asset('public/js/jquery.min.js') }}"></script>
		<script src="{{ asset('public/js/moment.js') }}"></script>
		<script src="{{ asset('public/js/jquery-1.11.2.min.js') }}"></script>
		<script src="{{ asset('public/js/jquery-ui-1.11.3/jquery-ui.js') }}"></script>
		<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('public/js/bootstrap-datetimepicker.js') }}"></script>
		<script src="{{ asset('public/js/bootstrap-datetimepicker.min.js') }}"></script>
		<script src="{{ asset('public/js/validator.js') }}"></script>
		<script src="{{ asset('public/js/jquery.nivo.slider.js') }}"></script>
		<script>
            var base_url = "{{url()}}";

	        $(window).load(function() {
	            $('#slider').nivoSlider();
	        });
		</script>

	</head>
	<body>
		
		<div class="container-fluid">
			
			<div class="row Row-Main-Header">
				@include('templates.siswa_header')
			</div> <!-- Tutup div row header -->

			<center>
			<div class="row Row-Main-Body">
				<div class="row">
					<ol class="breadcrumb">
					  <li><a href="{{ URL::to('siswa/') }}">Siswa</a></li>
					  @yield('add_bread_siswa')
					  <li class="active">@yield('bread_siswa')</li>
					</ol>
				</div>
					@yield('content')
			</div>
			</center>

			<div class="row Row-space"></div>

			<div class="row Row-Footer">
				<div class="col-md-12">
					<p class="footer"> COPYRIGHT ©2015 SITE. ALL RIGHT RESERVED </p>
				</div>
			</div> <!-- Tutup div row footer -->

		</div>
		

	</body>
</html>
