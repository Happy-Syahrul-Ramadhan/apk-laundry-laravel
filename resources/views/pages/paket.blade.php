@extends('layout')

@section('content')
<h4>Paket</h4>
	
	<div class="alert align-items-center alert-primary" role="alert">
	@if( session('sucess'))
  	<p style="margin-left: 38%; color: green;">{{ session('sucess') }}</p>
  	@elseif( session('hapus'))
  	<p style="margin-left: 38%; color: red;">{{ session('hapus') }}</p>
  	@elseif( session('ubah'))
  	<p style="margin-left: 38%; color: blue;">{{ session('ubah') }}</p>
	@endif
	</div>
	<a href="{{ route('paket.add') }}" class="btn btn-primary mb-3" style="margin-left: 40%;">+Tambah Data</a>
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Nama Paket</th>
			<th>Jenis</th>
			<th>Harga</th>
			<th>Aksi</th>
		</tr>

		@foreach( $paket as $no=>$data )
		<tr>
			<td>{{ $no+1 }}</td>
			<td>{{ $data->nama_paket }}</td>
			<td>{{ $data->jenis }}</td>
			<td>{{ $data->harga }}</td>
			<td>
				<a href="{{ route('paket.ubah', $data->id) }}" class="btn btn-primary">Ubah</a>
				<a href="{{ route('paket.delete', $data->id) }}" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
		@endforeach
	</table>

@endsection