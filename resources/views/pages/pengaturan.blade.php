@extends('layout')

@section('content')
<h4>Pengaturan Outlet</h4>
	

	<div class="alert alert-primary" role="alert">
  	<p style="margin-left: 38%; color: green;">{{ session('sucess') }}</p>
	</div>
	<form method="post" action="{{ route('outlet.update') }}">
		@csrf
		<table class="table table-bordered">
			<tr>
				<th width="180">Nama Outlet</th>
				<th><input type="text" value="{{ $outlet->nama }}" name="nama" class="form-control"></th>
			</tr>
			<tr>
				<th width="180">Alamat</th>
				<th><input type="text" value="{{ $outlet->alamat }}" name="alamat" class="form-control"></th>
			</tr>
			<tr>
				<th width="180">telepon</th>
				<th><input type="number" value="{{ $outlet->tlp }}" name="tlp" class="form-control"></th>
			</tr>
			<tr>
				<th></th>
				<th>
					<button type="submit" class="btn btn-primary">Ubah</button>
					<a class="btn btn-danger" href="{{ route('outlet.delete') }}" onclick="return confirm('apakah anda yakin ingin menghapus data outlet??')">Hapus</a>
				</th>
			</tr>
		</table>
	</form>

@endsection