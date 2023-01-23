@extends('layout')

@section('content')
<h4>Transaksi</h4>
	
	
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

	<div class="alert alert-primary" role="alert">
	@if( session('hapus'))
  	<p style="margin-left: 39%; color: red;">{{ session('hapus') }}</p>
  	@elseif( session('ubah'))
  	<p style="margin-left: 39%; color: blue;">{{ session('ubah') }}</p>
	@endif
	</div>
	<a href="{{ route('transaksi.add', request('id')) }}" class="btn btn-primary mb-3" style="margin-left: 40%;">+Tambah Data</a>
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Kode Invoice</th>
			<th>Tanggal</th>
			<th>Batas Waktu</th>
			<th>Tanggal Bayar</th>
			<th>Status</th>
			<th>Status Dibayar</th>
			<th>Aksi</th>
		</tr>

		@foreach( $transaksi as $no=>$data )
		<tr>
			<td>{{ $no+1 }}</td>
			<td>{{ $data->kode_invoice }}</td>
			<td>{{ $data->tgl }}</td>
			<td>{{ $data->batas_waktu }}</td>
			<td>{{ $data->tgl_bayar }}</td>
			<td>{{ $data->status }}</td>
			<td>{{ $data->dibayar }}</td>
			<td>
				<a class="btn btn-primary" href="{{ route('transaksi.detail', $data->id) }}" >Detail</a>
				<a class="btn btn-primary" href="{{ route('transaksi.ubah', $data->id) }}" >Ubah</a>
				<a class="btn btn-danger" href="{{ route('transaksi.delete', $data->id) }}" >Hapus</a>
			</td>
		</tr>
		@endforeach
	</table>

@endsection