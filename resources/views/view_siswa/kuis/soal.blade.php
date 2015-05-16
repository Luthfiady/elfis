@extends('templates/siswa_layouts')

<link rel="stylesheet" type="text/css" href="{{ asset('public/css/kuis_soal.css') }}">

@section('add_bread_siswa')
<li><a href="{{ URL::to('siswa/kuis') }}">Kuis</a></li>
@stop

@section('bread_siswa')
Perancangan Sistem Informasi
@stop

@section('content')

<div class="main-content">

	<div class="row row-judul">
		<div class="col-md-6">
			<h4 class="judul-soal"> Perancangan Sistem Informasi </h4>
		</div>

		<div class="col-md-6">
			<h3 class="durasi"> 00:04:09 / 00:20:00 </h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			
			<table class="table table-soal">
				<thead class="thead-soal">
					<th width="30px">1.</th>
					<th>Huruf apa saja yang terdapat pada kata sistem, kecuali?</th>
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

				<thead class="thead-soal">
					<th width="30px">2.</th>
					<th>Suku kata apa saja yang terdapat pada kata informasi, kecuali?</th>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="A">
									Huruf IN
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="B">
									Huruf SIS
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="C">
									Huruf MA
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="D">
									Huruf FOR
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
			</table>

		</div>
		<div class="col-md-12">
			<nav>
				<ul class="pager">
					<li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Previous</a></li>
					<li class="next"><a href="{{URL::to('siswa/kuis_nilai')}}">Next <span aria-hidden="true">&rarr;</span></a></li>
				</ul>
			</nav>
		</div>
	</div>

</div>

@stop