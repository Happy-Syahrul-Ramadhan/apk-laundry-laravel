@extends('layout')

@section('content')
<h4>Tambah Data Transaksi</h4>
	
	<h4 class="mt-4">Daftar Member :</h4>
	<table cellpadding="7">
		<tr>
			<th>Nama</th>
			<th>: {{ $transaksi->member->nama }}</th>
		</tr>
		<tr>
			<th>Alamat</th>
			<th>: {{ $transaksi->member->alamat }}</th>
		</tr>
		<tr>
			<th>Jenis Kelamin</th>
			<th>: {{ $transaksi->member->jenis_kelamin }}</th>
		</tr>
		<tr>
			<th>Telepon</th>
			<th>: {{ $transaksi->member->tlp }}</th>
		</tr>
	</table>

	<form method="post" action="{{ route('transaksi.update', request('id')) }}">
		@csrf
		<table class="table table-bordered mt-4">
			<tr>
				<th width="180">Status</th>
				<th>
					<select name="status" class="form-control">
						<option>-- Pilih Status --</option>
						<option value="baru" {{ $transaksi->status != 'baru' ?: 'selected' }}>Baru</option>
						<option value="proses" {{ $transaksi->status != 'proses' ?: 'selected' }}>Proses</option>
						<option value="selesai" {{ $transaksi->status != 'selesai' ?: 'selected' }}>Selesai</option>
						<option value="diambil" {{ $transaksi->status != 'diambil' ?: 'selected' }}>Diambil</option>
					</select>
				</th>
			</tr>
			<tr>
				<th>Status Dibayar</th>
				<th>
					<select name="dibayar" class="form-control">
						<option>-- Pilih Status Dibayar --</option>
						<option value="dibayar" {{ $transaksi->dibayar != 'dibayar' ?: 'selected' }}>Dibayar</option>
						<option value="belum_dibayar" {{ $transaksi->dibayar != 'belum_dibayar' ?: 'selected' }}>Belum Dibayar</option>
					</select>
				</th>
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