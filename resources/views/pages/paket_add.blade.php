@extends('layout')

@section('content')
<h4>Tambah Data Paket</h4>
	
	<form method="post" action="{{ route('paket.store') }}">
		@csrf
		<table class="table table-bordered">
			<tr>
				<th width="180">Nama Paket</th>
				<th><input type="text" name="nama_paket" placeholder="Masukkan Nama Paket" class="form-control"></th>
			</tr>
			<tr>
				<th width="180">Jenis</th>
				<th>
					<select name="jenis" class="form-control">
						<option>-- Pilih Jenis Paket --</option >
						<option value="kiloan">Kiloan</option >
						<option value="selimut">Selimut</option >
						<option value="bed_cover">Bed_Cover</option >
						<option value="kaos">Kaos</option >
						<option value="lain">Lain</option >
					</select>
				</th>
			</tr>
			<tr>
				<th width="180">Harga</th>
				<th><input type="number" name="harga" placeholder="Masukkan Harga Paket" class="form-control"></th>
			</tr>
			<tr>
				<th></th>
				<th>
					<button type="submit" class="btn btn-primary">Submit</button>
				</th>
			</tr>
		</table>
	</form>

@endsection