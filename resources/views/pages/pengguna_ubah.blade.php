@extends('layout')

@section('content')
<h4>Ubah Data pengguna</h4>
	
	<form method="post" action="{{ route('pengguna.update', $user->id) }}">
		@csrf
		<table class="table table-bordered">
			<tr>
				<th width="180">Nama pengguna</th>
				<th><input type="text" value="{{ $user->nama }}" name="nama" placeholder="Masukkan Nama pengguna" class="form-control"></th>
			</tr>
			<tr>
				<th width="180">Username</th>
				<th><input type="text" value="{{ $user->username }}" name="username" placeholder="Masukkan Username" class="form-control"></th>
			</tr>
			<tr>
				<th width="180">Password</th>
				<th><input type="password" name="password" placeholder="Masukkan Password (Opsional)" class="form-control"></th>
			</tr>
			<tr>
				<th width="180">Role</th>
				<th>
					<select name="role" class="form-control">
						<option>-- Pilih Role --</option >
						<option value="admin" {{ $user->role != 'admin' ?: 'selected' }}>Admin</option >
						<option value="kasir" {{ $user->role != 'kasir' ?: 'selected' }}>Kasir</option >
						<option value="owner" {{ $user->role != 'owner' ?: 'selected' }}>Owner</option >
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