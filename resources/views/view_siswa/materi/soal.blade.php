@extends('templates/siswa_layouts')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/apps/materi_siswa.css') }}">

@section('add_bread_siswa')
<li><a href="{{ URL::to('siswa/materi') }}">Materi</a></li>
@stop

@section('bread_siswa')
Soal
@stop

@section('content')

<div class="main-content">
	<div class="row row-judul">
		<div class="col-md-6">
			<h4 class="judul-soal"> Soal MTK-01 </h4>
		</div>

		<div class="col-md-3">
			<h3 class="mulai">Waktu Mulai:</h3>
		</div>
		<div class="col-md-3">
			<h3 class="mulai">25/05/2015</h3>
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
									7
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="B">
									8
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
									10
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="E">
									11
								</label>
							</div>
						</td>
					</tr>
				</tbody>

				<thead class="thead-soal">
					<tr>
						<th width="30px">2.</th>
						<th>Berapakah hasil 3x5?</th>
					</tr>
				</thead>
				
				<tbody>
					<tr>
						<td></td>
						<td>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="A">
									5
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="B">
									10
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="C">
									15
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="D">
									20
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="E">
									25
								</label>
							</div>
						</td>
					</tr>
				</tbody>

				<thead class="thead-soal">
					<tr>
						<th width="30px">3.</th>
						<th>Berapakah hasil 1+1?</th>
					</tr>
				</thead>
				
				<tbody>
					<tr>
						<td></td>
						<td>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="A">
									1
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="B">
									2
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="C">
									3
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="D">
									4
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="E">
									5
								</label>
							</div>
						</td>
					</tr>
				</tbody>

				<thead class="thead-soal">
					<tr>
						<th width="30px">4.</th>
						<th>Berapakah hasil 3x5?</th>
					</tr>
				</thead>
				
				<tbody>
					<tr>
						<td></td>
						<td>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="A">
									5
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="B">
									10
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="C">
									15
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="D">
									20
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="E">
									25
								</label>
							</div>
						</td>
					</tr>
				</tbody>

				<thead class="thead-soal">
					<tr>
						<th width="30px">5.</th>
						<th>Berapakah hasil 3x5?</th>
					</tr>
				</thead>
				
				<tbody>
					<tr>
						<td></td>
						<td>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="A">
									5
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="B">
									10
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="C">
									15
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="D">
									20
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="E">
									25
								</label>
							</div>
						</td>
					</tr>
				</tbody>

				<thead class="thead-soal">
					<tr>
						<th width="30px">6.</th>
						<th>Berapakah hasil 3x5?</th>
					</tr>
				</thead>
				
				<tbody>
					<tr>
						<td></td>
						<td>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="A">
									5
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="B">
									10
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="C">
									15
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="D">
									20
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="E">
									25
								</label>
							</div>
						</td>
					</tr>
				</tbody>

				<thead class="thead-soal">
					<tr>
						<th width="30px">7.</th>
						<th>Berapakah hasil 3x5?</th>
					</tr>
				</thead>
				
				<tbody>
					<tr>
						<td></td>
						<td>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="A">
									5
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="B">
									10
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="C">
									15
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="D">
									20
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="E">
									25
								</label>
							</div>
						</td>
					</tr>
				</tbody>

				<thead class="thead-soal">
					<tr>
						<th width="30px">8.</th>
						<th>Berapakah hasil 3x5?</th>
					</tr>
				</thead>
				
				<tbody>
					<tr>
						<td></td>
						<td>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="A">
									5
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="B">
									10
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="C">
									15
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="D">
									20
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="E">
									25
								</label>
							</div>
						</td>
					</tr>
				</tbody>

				<thead class="thead-soal">
					<tr>
						<th width="30px">9.</th>
						<th>Berapakah hasil 3x5?</th>
					</tr>
				</thead>
				
				<tbody>
					<tr>
						<td></td>
						<td>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="A">
									5
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="B">
									10
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="C">
									15
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="D">
									20
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="E">
									25
								</label>
							</div>
						</td>
					</tr>
				</tbody>

				<thead class="thead-soal">
					<tr>
						<th width="30px">10.</th>
						<th>Berapakah hasil 3x5?</th>
					</tr>
				</thead>
				
				<tbody>
					<tr>
						<td></td>
						<td>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="A">
									5
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="B">
									10
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="C">
									15
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="D">
									20
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="" id="" value="E">
									25
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
					<li class="previous"><a class="paging" href="{{URL::to('siswa/materi')}}"><span aria-hidden="true">&larr;</span> Sebelumnya</a></li>
					<li class="next"><a class="paging" href="{{URL::to('siswa/materi_nilai')}}">Selanjutnya <span aria-hidden="true">&rarr;</span></a></li>
				</ul>
			</nav>
		</div>
	</div>		
</div>
		
@stop