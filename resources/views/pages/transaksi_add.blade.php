@extends('layout')

@section('content')
<h4>Tambah Data Transaksi</h4>
	
	<h4 class="mt-4">Daftar Member :</h4>
	<table cellpadding="7">
		<tr>
			<th>Nama</th>
			<th>: {{ $member->nama }}</th>
		</tr>
		<tr>
			<th>Alamat</th>
			<th>: {{ $member->alamat }}</th>
		</tr>
		<tr>
			<th>Jenis Kelamin</th>
			<th>: {{ $member->jenis_kelamin }}</th>
		</tr>
		<tr>
			<th>Telepon</th>
			<th>: {{ $member->tlp }}</th>
		</tr>
	</table>

	<form method="post" action="{{ route('transaksi.store', request('id')) }}">
		@csrf
		<table class="table table-bordered mt-4">
			<tr>
				<th width="180">Kode Invoice</th>
				<th><input type="text" name="kode_invoice" value="INV-{{ date('M-Y H:s') }}" class="form-control"></th>
			</tr>
			<tr>
				<th width="180">Tanggal</th>
				<th><input type="datetime-local" name="tgl" class="form-control"></th>
			</tr>
			<tr>
				<th width="180">Batas Waktu</th>
				<th><input type="datetime-local" name="batas_waktu" class="form-control"></th>
			</tr>
			<tr>
				<th width="180">Tanggal Bayar</th>
				<th><input type="datetime-local" name="tgl_bayar" class="form-control"></th>
			</tr>
			<tr>
				<th width="180">Biaya Tambahan</th>
				<th><input type="number" name="biaya_tambahan" class="form-control" placeholder="Masukkan Biaya Tambahan"></th>
			</tr>
			<tr>
				<th width="180">Diskon</th>
				<th><input type="number" name="diskon" class="form-control" placeholder="Masukkan Diskon"></th>
			</tr>
			<tr>
				<th width="180">Pajak</th>
				<th><input type="number" name="pajak" class="form-control" placeholder="Masukkan Pajak"></th>
			</tr>
			<tr>
				<th>Status</th>
				<th>
					<select name="status" class="form-control">
						<option>-- Pilih Status --</option>
						<option value="baru">Baru</option>
						<option value="proses">Proses</option>
						<option value="selesai">Selesai</option>
						<option value="diambil">Diambil</option>
					</select>
				</th>
			</tr>
			<tr>
				<th>Status Dibayar</th>
				<th>
					<select name="dibayar" class="form-control">
						<option>-- Pilih Status Dibayar --</option>
						<option value="dibayar">Dibayar</option>
						<option value="belum_dibayar">Belum Dibayar</option>
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