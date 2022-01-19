<?php
header("Content-type: application/vnd-ms-excel");
 
header("Content-Disposition: attachment; filename=Laporan-pembayaran-uang-pangkal.xls");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pembayaran Uang Pangkal</title>
</head>
<body>
	<table border="1" cellpadding="5" cellspacing="0">
		<thead>
			<tr>
			  <th>No</th>
              <th>NISN</th>
              <th>Nama</th>
              <th>Telepon</th>
              <th>Asal Sekolah</th>
              <th>Tanggal Bayar</th>
              <th>Sudah Dibayar</th>
              <th>Belum Dibayar</th>
			</tr>
		</thead>
		<tbody>
	        @php
	        $totalSudahBayar = 0;
	        $totalBelumBayar = 0;
	        $no=1;
	        @endphp
	        @foreach($data as $row)
	        @php

	        $totalCicilanDiterima = 0;
	        if($row->cicilan_1_status == "Diterima")
	        {
	          $totalCicilanDiterima += $row->cicilan_1_jumlah;
	        }
	        if($row->cicilan_2_status == "Diterima")
	        {
	          $totalCicilanDiterima += $row->cicilan_2_jumlah;
	        }
	        if($row->cicilan_3_status == "Diterima")
	        {
	          $totalCicilanDiterima += $row->cicilan_3_jumlah;
	        }

	        $belumBayar = $row->jenisFormulir->biaya_uang_pangkal - $totalCicilanDiterima;
	        $sudahBayar = $jenisFormulir->biaya_uang_pangkal - $belumBayar;

	        $totalSudahBayar += $sudahBayar;
	        $totalBelumBayar += $belumBayar;
	        @endphp
	         <tr>
	              <td>{{$no++}}</td>
	              <td>{{$row->user->formulir->nisn}}</td>
	              <td>{{$row->user->name}}</td>
	              <td>{{$row->user->telepon}}</td>
	              <td>{{$row->user->asal_sekolah}}</td>
	              <td>{{$row->created_at->format('d/m/Y')}}</td>
	              <td>{{number_format($sudahBayar)}}</td>
	              <td>{{number_format($belumBayar)}}</td>
	          </tr>
	         @endforeach
	    </tbody> 
	    <tfoot>
	        <tr>
	            <th width="10px" colspan="6">Total</th>
	            <th>{{ number_format($totalSudahBayar) }}</th>
	            <th>{{ number_format($totalBelumBayar) }}</th>
	        </tr>
	    </tfoot> 
	</table>
</body>
</html>