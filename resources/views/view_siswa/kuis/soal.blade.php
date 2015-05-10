@extends('templates/siswa_layouts')

@section('bread_siswa')
Kuis
@stop

@section('content')

<div class="main-content">

	<div class="row row-judul">
		<div class="col-md-6">
			<h4 class="judul-soal"> Perancangan Sistem Informasi </h4>
		</div>

		<div class="col-md-6">
			<p class="durasi"> 00:04:09 / 00:20:00 </p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table table-soal">
				<thead class="thead-soal">
					<th width="30px">1.</th>
					<th>Huruf apa saja yang terdapat pada kata sistem, kecuali? aaaaaaaaaaaaaaaaabsdba,m sahd ashdhaslj dhjsa djabsndbh asjbdjl sajd naslk dnkasndlsandasn kdbas dbkjas bdkjas djbsa kjdbuaskdbuas dusa disiaohdiasjidsah</th>
				</thead>
				<tbody class="tbody-jawaban">
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
			</table>
		</div>
	</div>

</div>

@stop