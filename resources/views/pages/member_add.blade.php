@extends('layout')

@section('content')
<h4>Tambah Data Member</h4>
	
	<form method="post" action="{{ route('member.store') }}">
		@csrf
		<table class="table table-bordered">
			<tr>
				<th width="180">Nama Member</th>
				<th><input type="text" name="nama" placeholder="Masukkan Nama Member" class="form-control"></th>
			</tr>
			<tr>
				<th width="180">Alamat</th>
				<th><input type="text" name="alamat" placeholder="Masukkan Alamat" class="form-control"></th>
			</tr>
			<tr>
				<th width="180">jenis Kelamin</th>
				<th>
					<select name="jenis_kelamin" class="form-control">
						<option>-- Pilih jenis Kelamin --</option >
						<option value="L">L</option>
						<option value="P">P</option>
					</select>
				</th>
			</tr>
			<tr>
				<th width="180">Telepon</th>
				<th><input type="number" name="tlp" placeholder="Masukkan Telepon" class="form-control"></th>
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