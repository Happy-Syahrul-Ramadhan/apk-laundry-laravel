@extends('layout')

@section('content')
<h4>Ubah Data Member</h4>
	
	<form method="post" action="{{ route('member.update', $member->id) }}">
		@csrf
		<table class="table table-bordered">
			<tr>
				<th width="180">Nama Member</th>
				<th><input type="text" value="{{ $member->nama }}" name="nama" placeholder="Masukkan Nama Member" class="form-control"></th>
			</tr>
			<tr>
				<th width="180">Alamat</th>
				<th><input type="text" value="{{ $member->alamat }}" name="alamat" placeholder="Masukkan Alamat" class="form-control"></th>
			</tr>
			<tr>
				<th width="180">jenis Kelamin</th>
				<th>
					<select name="jenis_kelamin" class="form-control">
						<option>-- Pilih jenis Kelamin --</option >
						<option value="L" {{ $member->jenis_kelamin != 'L' ?: 'selected' }}>L</option>
						<option value="P" {{ $member->jenis_kelamin != 'P' ?: 'selected' }}>P</option>
					</select>
				</th>
			</tr>
			<tr>
				<th width="180">Telepon</th>
				<th><input type="number" value="{{ $member->tlp }}" name="tlp" placeholder="Masukkan Telepon" class="form-control"></th>
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