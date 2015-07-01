@extends('templates/admin_layouts')

<link rel="stylesheet" type="text/css" href="{{ asset('public/css/nivo-slider.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/themes/default/default.css') }}">

@section('bread_admin')
Dashboard
@stop

@section('content')

<div class="main-content">

    <div class="row row-dashboard-slider">
        <div class="col-md-12 contain-slider slider-wrapper theme-default">
			<div id="slider" class="nivoSlider">
                <img src="{{ asset('public/img/slider/1.png') }}">
                <img src="{{ asset('public/img/slider/2.png') }}">
                <img src="{{ asset('public/img/slider/3.png') }}">
            </div>
		</div>
    </div>

</div>


@stop

