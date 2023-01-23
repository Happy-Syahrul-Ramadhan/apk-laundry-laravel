@extends('layout')

@section('content')
<h4>Tambah Data Paket</h4>
	
	<form method="post" action="{{ route('paket.update', $paket->id) }}">
		@csrf
		<table class="table table-bordered">
			<tr>
				<th width="180">Nama Paket</th>
				<th><input type="text" value="{{ $paket->nama_paket }}" name="nama_paket" placeholder="Masukkan Nama Paket" class="form-control"></th>
			</tr>
			<tr>
				<th width="180">Jenis</th>
				<th>
					<select name="jenis" class="form-control">
						<option>-- Pilih Jenis Paket --</option >
						<option value="kiloan" {{ $paket->jenis != 'kiloan' ?: 'selected' }}>Kiloan</option >
						<option value="selimut" {{ $paket->jenis != 'selimut' ?: 'selected' }}>Selimut</option >
						<option value="bed_cover" {{ $paket->jenis != 'bed_cover' ?: 'selected' }}>Bed_Cover</option >
						<option value="kaos" {{ $paket->jenis != 'kaos' ?: 'selected' }}>Kaos</option >
						<option value="lain" {{ $paket->jenis != 'lain' ?: 'selected' }}>Lain</option >
					</select>
				</th>
			</tr>
			<tr>
				<th width="180">Harga</th>
				<th><input type="number" value="{{ $paket->harga }}" name="harga" placeholder="Masukkan Harga Paket" class="form-control"></th>
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