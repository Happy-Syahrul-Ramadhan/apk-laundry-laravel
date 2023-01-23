@extends('layout')

@section('content')
<h4>Tambah Data pengguna</h4>
	
	<form method="post" action="{{ route('pengguna.store') }}">
		@csrf
		<table class="table table-bordered">
			<tr>
				<th width="180">Nama pengguna</th>
				<th><input type="text" name="nama" placeholder="Masukkan Nama pengguna" class="form-control"></th>
			</tr>
			<tr>
				<th width="180">Username</th>
				<th><input type="text" name="username" placeholder="Masukkan Username" class="form-control"></th>
			</tr>
			<tr>
				<th width="180">Password</th>
				<th><input type="password" name="password" placeholder="Masukkan Password" class="form-control"></th>
			</tr>
			<tr>
				<th width="180">Role</th>
				<th>
					<select name="role" class="form-control">
						<option>-- Pilih Role --</option >
						<option value="admin">Admin</option >
						<option value="kasir">Kasir</option >
						<option value="owner">Owner</option >
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