@extends('layout')

@section('content')
<h4>Transaksi</h4>
	
	<div class="alert alert-primary" role="alert">
	@if( session('sucess'))
  	<p style="margin-left: 38%; color: green;">{{ session('sucess') }}</p>
  	@elseif( session('hapus'))
  	<p style="margin-left: 38%; color: green;">{{ session('hapus') }}</p>
  	@elseif( session('ubah'))
  	<p style="margin-left: 38%; color: green;">{{ session('ubah') }}</p>
	@endif
	</div>
	<a href="{{ route('member.add') }}" class="btn btn-primary mb-3" style="margin-left: 40%;">+Tambah Data</a>
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Nama Member</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>Telepon</th>
			<th>Aksi</th>
		</tr>

		@foreach( $member as $no=>$data )
		<tr>
			<td>{{ $no+1 }}</td>
			<td>{{ $data->nama }}</td>
			<td>{{ $data->alamat }}</td>
			<td>{{ $data->jenis_kelamin }}</td>
			<td>{{ $data->tlp }}</td>
			<td>
				<a href="{{ route('member.ubah', $data->id) }}" class="btn btn-primary">Ubah</a>
				<a href="{{ route('transaksi.member', $data->id) }}" class="btn btn-primary">Transaksi</a>
				<a href="{{ route('member.delete', $data->id) }}" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
		@endforeach

	</table>

@endsection