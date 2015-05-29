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
    
    <div class="row">
        <div class="col-sm-4">
            <div class="core-box" style="border-right: 2px solid #DDDDDD;">
                <div class="heading">
                    <i class="clip-list-3 circle-icon circle-green"></i>
                    <h3>Tugas</h3>
                </div>
                <div class="content">
                    Tidak ada tugas terbaru. aaaaaaaaaaaaaaaaaaaaaaa bbbbbbbbbbbbbbbb ccccccccccccccccccc ddddddddddddddddddd eeeeeeeeeeeeeeeeeee
                </div>
                <a class="view-more" href="">
                    View More <i class="clip-arrow-right-2"></i>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="core-box" style="border-right: 2px solid #DDDDDD;">
                <div class="heading">
                    <i class="clip-pencil-3 circle-icon circle-teal"></i>
                    <h3>Ujian</h3>
                </div>
                <div class="content">
                	Tidak ada ujian hari ini. aaaaaaaaaaaaaaaaa bbbbbbbbbbbbbbbb ccccccccccccccccccc ddddddddddddddddddd eeeeeeeeeeeeeeeeeee
                </div>
                <a class="view-more" href="">
                    View More <i class="clip-arrow-right-2"></i>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="core-box">
                <div class="heading">
                    <i class="clip-map circle-icon circle-bricky"></i>
                    <h3>Materi</h3>
                </div>
                <div class="content">
                    Tidak ada materi terbaru. aaaaaaaaaaaaaaaaa bbbbbbbbbbbbbbbb ccccccccccccccccccc ddddddddddddddddddd eeeeeeeeeeeeeeeeeee
                </div>
                <a class="view-more" href="">
                    View More <i class="clip-arrow-right-2"></i>
                </a>
            </div>
        </div>
    </div>

</div>


@stop

