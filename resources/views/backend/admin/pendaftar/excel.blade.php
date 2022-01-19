<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$namaFile.xls");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table border="1" cellpadding="5" cellspacing="0">
	<thead>
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Email</th>
			<th>Nama</th>
			<th>Telepon</th>
			<th>Tempat, Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Agama</th>
			<th>Asal Sekolah</th>
			<th>Alamat Rumah</th>
		</tr>
	</thead>
	<tbody>
		@php $no =1; @endphp
		@foreach($data as $row)
		<tr>
			<td>{{$no++}}</td>
			<td>{{$row->username}}</td>
			<td>{{$row->email}}</td>
			<td>{{$row->name}}</td>
			<td>{{$row->telepon}}</td>
			<td>{{$row->tempat_tanggal_lahir}}</td>
			<td>{{$row->jenis_kelamin}}</td>
			<td>{{$row->agama}}</td>
			<td>{{$row->asal_sekolah}}</td>
			<td>{{$row->alamat_rumah}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
</body>
</html>