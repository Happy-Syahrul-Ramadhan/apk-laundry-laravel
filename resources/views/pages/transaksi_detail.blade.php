@extends('layout')

@section('content')
<h4>Transaksi</h4>
	
	<div class="row">
	<div class="col-md-5">
	<h4 class="mt-4">Daftar Transaksi :</h4>
	<table cellpadding="7">
		<tr>
			<th>Nama Member</th>
			<th>: {{ $transaksi->member->nama }}</th>
		</tr>
		<tr>
			<th>Kode Invoice</th>
			<th>: {{ $transaksi->kode_invoice }}</th>
		</tr>
		<tr>
			<th>tanggal</th>
			<th>: {{ $transaksi->tgl }}</th>
		</tr>
		<tr>
			<th>Batas Waktu</th>
			<th>: {{ $transaksi->batas_waktu }}</th>
		</tr>
		<tr>
			<th>Tanggal Bayar</th>
			<th>: {{ $transaksi->tgl_bayar }}</th>
		</tr>
		<tr>
			<th>Status</th>
			<th>: {{ $transaksi->status }}</th>
		</tr>
		<tr>
			<th>Status Dibayar</th>
			<th>: {{ $transaksi->dibayar }}</th>
		</tr>
	</table>
	</div>

	<div class="col-md-7">
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Nama Paket</th>
			<th>Qty</th>
			<th>Harga</th>
			<th>Total</th>
			<th>Keterangan</th>
		</tr>

		@foreach( $transaksi->DetailTransaksi as $no=>$data )
		<tr>
			<td>{{ $no+1 }}</td>
			<td>{{ $data->paket->nama_paket }}</td>
			<td>{{ $data->qty }}</td>
			<td>{{ $data->paket->harga }}</td>
			<td>{{ $data->paket->harga * $data->qty }}</td>
			<td>{{ $data->keterangan }}</td>
		</tr>
		@endforeach
	</table>
	</div>
	</div>

	<form method="post" action="{{ route('transaksiDetail.store', $transaksi->id) }}">
		@csrf
		<table class="table table-bordered mt-4">
			<tr>
				<th width="180">Nama Paket</th>
				<th>
					<select name="id_paket" class="form-control">
						<option>-- Pilih Paket --</option>
						@foreach( $paket as $data )
						<option value="{{ $data->id }}">{{ $data->nama_paket }}</option>
						@endforeach
					</select>
				</th>
			</tr>
			<tr>
				<th>Qty</th>
				<th><input type="number" name="qty" placeholder="Masukkan Qty" class="form-control"></th>
			</tr>
			<tr>
				<th>Keterangan</th>
				<th><input type="text" name="keterangan" placeholder="Masukkan Keterangan" class="form-control"></th>
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