<!DOCTYPE html>
<html>
<head>
	<title>Detail Kelas {{ $kelas->id_kelas }}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Detail Kelas {{ $kelas->id_kelas }}</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>Kelas</th>
				<th>Nim</th>
				<th>Nama</th>
                <th>Tanda Tangan </th>
			</tr>
		</thead>
		<tbody>
            @foreach ($kelas->mahasiswa as $kelasa)
			<tr>
				<td> {{ $kelas->id_kelas }}</td>
				<td>{{ $kelasa->nim }}</td>
				<td>{{ $kelasa->nama }}</td>
                <td> </td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
