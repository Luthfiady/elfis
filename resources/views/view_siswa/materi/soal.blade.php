@extends('templates/siswa_layouts')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/materi_siswa.css') }}">

@section('add_bread_siswa')
<li><a href="{{ URL::to('siswa/materi') }}">Materi</a></li>
@stop

@section('bread_siswa')
MTK-01
@stop

@section('content')

<div class="main-content">
	<div class="row row-judul">
		<div class="col-md-6">
			<h4 class="judul-soal"> Soal MTK-01 </h4>
		</div>

		<div class="col-md-3">
			<h3>Waktu Mulai:</h3>
		</div>
		<div class="col-md-3">
			<h3>25/05/2015</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table table-soal">
				<thead class="thead-soal">
					<tr>
						<th width="30px">1.</th>
						<th>Berapakah hasil dari 5x5?</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td></td>
						<td>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="A">
									Huruf S
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="B">
									Huruf I
								</label>
								
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="C">
									Huruf T
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="D">
									Huruf O
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="E">
									Huruf M
								</label>
							</div>
						</td>
					</tr>
				</tbody>				
		</div>
	</div>		
</div>
	<!-- 
		<div class="col-md-2">
			<h4><strong>Waktu Mulai:</h4>
		</div>
		<div class="col-md-2">
			<h4>26/05/2015</strong></h4>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-2">
		Pertanyaan 1
		</div>
		<div class="col-xs-10">
		Berapakah hasil dari 5+5?
			<div class="radio">
				<label>
				<input type="radio" name="" id="" value="A">
					5
				</label>
			</div>
			<div class="radio">
				<label>
				<input type="radio" name="" id="" value="B" checked>
					10
				</label>
			</div>
			<div class="radio">
				<label>
				<input type="radio" name="" id="" value="C">
					9
				</label>
			</div>
			<div class="radio">
				<label>
				<input type="radio" name="" id="" value="D">
					6
				</label>
			</div>
			<div class="radio">
				<label>
				<input type="radio" name="" id="" value="E">
					7
				</label>
			</div> -->
		

	<div class="col-md-12">
			<nav>
				<ul class="pager">
					<li class="previous"><a class="paging" href="#"><span aria-hidden="true">&larr;</span> Previous</a></li>
					<li class="next"><a class="paging" href="{{URL::to('siswa/materi_nilai')}}">Next <span aria-hidden="true">&rarr;</span></a></li>
				</ul>
			</nav>
		</div>


</div>
@stop