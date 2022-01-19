
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
			<th>NISN</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Email</th>
			<th>Nama Panggilan</th>
			<th>Telepon</th>
			<th>Tempat, Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Agama</th>
			<th>Alamat Rumah</th>
			<th>Asal Sekolah</th>
			<th>Asal Daerah Sekolah</th>
		</tr>
	</thead>
	<tbody>
		@php $no =1; @endphp
		@foreach($data as $row)
		<tr>
			<td>{{$no++}}</td>
			<td>{{$row->nisn}}</td>
			<td>{{$row->user->name}}</td>
			<td>{{$row->user->username}}</td>
			<td>{{$row->user->email}}</td>
			<td>{{$row->user->telepon}}</td>
			<td>{{$row->user->tempat_tanggal_lahir}}</td>
			<td>{{$row->user->jenis_kelamin}}</td>
			<td>{{$row->user->agama}}</td>
			<td>{{$row->user->alamat_rumah}}</td>
			<td>{{$row->user->asal_sekolah}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
</body>
</html>