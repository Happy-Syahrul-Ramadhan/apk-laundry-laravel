@extends('layout')

@section('content')
<h4>Laporan</h4>
	
	
	<form method="get" action="{{ route('laporan.generate') }}">
		<table class="table table-bordered">
			<tr>
				<th width="180">Tanggal Mulai</th>
				<th><input type="datetime-local" name="mulai" class="form-control"></th>
			</tr>
			<tr>
				<th width="180">Tanggal Berakhir</th>
				<th><input type="datetime-local" name="berakhir" class="form-control"></th>
			</tr>
			<tr>
				<th></th>
				<th>
					<button class="btn btn-primary">Generate</button>
				</th>
			</tr>
		</table>
	</form>

@endsection