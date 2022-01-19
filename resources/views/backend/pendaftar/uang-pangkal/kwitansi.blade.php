<!DOCTYPE html>
<html>
<head>
	<title>Kwitansi Pembayaran Uang Pangkal</title>
</head>
<body>
	<img src="favicon.ico" style="position: absolute;left: 20px" width="100px" height="100px">
	<h5 style="color: #0171bb;position: absolute;left: 230px">YAYASAN DHARMA SETIA KOSGORO</h5>
	<h3 style="color: #0171bb;position: absolute;top: 20px;left: 215px">SMK KOSGORO KOTA BOGOR</h3>
	<h5 style="color: #0171bb;position: absolute;top: 40px;left: 170px">SK Kepala Dinas Pendidikan Kota Bogor No. 421.5/109 - Disdik 2008</h5>
	<h5 style="color: #0171bb;position: absolute;top: 60px;left: 150px">Jl. Pajajaran No. 217 A Bogor - Telp. 7545041 smkkosgorobogor@gmail.com</h5>
	
	<h5 style="color:#010101;position: absolute;top: 100px;left: 40px">Sudah Terima Dari : {{ Auth::user()->name }}</h5>
	<h5 style="color:#010101;position: absolute;top: 125px;left: 40px">Uang Sejumlah Rp. : {{ number_format($uangSejumlah,2,',','.') }}</h5>
	<h5 style="color:#010101;position: absolute;top: 150px;left: 40px">Untuk Pembayaran : {{$untukPembayaran}}</h5>

		<p style="border: 2px solid #0171bb;color:#010101;position: absolute;top: 230px;left: 40px;padding: 5px;font-weight: bold;">
			Sisa Pembayaran Rp : {{ number_format($sisaPembayaran,2,',','.')}}
		</p>

	<h5 style="color:#010101;position: absolute;top: 150px;left: 470px">Bogor, {{ $tanggal->format('d-m-Y H:i:s') }}</h5>
	<h5 style="color:#010101;position: absolute;top: 170px;left: 470px">TTD</h5>
	<h5 style="color:#010101;position: absolute;top: 240px;left: 470px">{{$userAdmin == null ? "-" : $userAdmin->name}}</h5>
</body>
</html>