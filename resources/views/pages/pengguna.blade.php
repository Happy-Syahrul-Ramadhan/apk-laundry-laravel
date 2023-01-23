@extends('layout')

@section('content')
<h4>Pengguna</h4>
	
	<div class="alert alert-primary" role="alert">
	@if( session('sucess'))
  	<p style="margin-left: 38%; color: green;">{{ session('sucess') }}</p>
  	@elseif( session('hapus'))
  	<p style="margin-left: 38%; color: red;">{{ session('hapus') }}</p>
  	@elseif( session('ubah'))
  	<p style="margin-left: 38%; color: blue;">{{ session('ubah') }}</p>
	@endif
	</div>
	<a href="{{ route('pengguna.add') }}" class="btn btn-primary mb-3" style="margin-left: 40%;">+Tambah Data</a>
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Role</th>
			<th>Aksi</th>
		</tr>

		@foreach( $user as $no=>$data )
		<tr>
			<td>{{ $no+1 }}</td>
			<td>{{ $data->nama }}</td>
			<td>{{ $data->username }}</td>
			<td>{{ $data->role }}</td>
			<td>
				<a href="{{ route('pengguna.ubah', $data->id) }}" class="btn btn-primary">Ubah</a>
				<a href="{{ route('pengguna.delete', $data->id) }}" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
		@endforeach
	</table>

@endsection