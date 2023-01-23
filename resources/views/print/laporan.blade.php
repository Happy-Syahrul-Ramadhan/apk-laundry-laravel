<!DOCTYPE html>
<html>
<head>
	<title>Generate Laporan</title>
</head>
<body>
	<h4 align="center">Generate Laporan</h4>

	<h4 align="center">Tanggal : {{ date('d-m-Y', strtotime(request('mulai'))) }} Sampai : {{ date('d-m-Y', strtotime(request('berakhir'))) }}</h4>
	<table border="1" cellpadding="10" cellspacing="0" align="center">
		<tr>
			<th>No</th>
			<th>Nama member</th>
			<th>Kode Invoice</th>
			<th>Tanggal</th>
			<th>Batas Waktu</th>
			<th>Tanggal Bayar</th>
			<th>Status</th>
			<th>Status Dibayar</th>
		</tr>

		@foreach( $transaksi as $no=>$data )
		<tr>
			<td>{{ $no+1 }}</td>
			<td>{{ $data->member->nama }}</td>
			<td>{{ $data->kode_invoice }}</td>
			<td>{{ $data->tgl }}</td>
			<td>{{ $data->batas_waktu }}</td>
			<td>{{ $data->tgl_bayar }}</td>
			<td>{{ $data->status }}</td>
			<td>{{ $data->dibayar }}</td>
		</tr>
		@endforeach
	</table>

	<script type="text/javascript">
		window.print()
	</script>

</body>
</html>