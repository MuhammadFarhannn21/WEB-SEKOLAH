<?php
header("Content-type: application/vnd-ms-excel");
 
header("Content-Disposition: attachment; filename=Laporan-pembayaran-formulir.xls");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pembayaran Formulir</title>
</head>
<body>
	<table border="1" cellspacing="0" cellpadding="5">	
		<thead>
			<tr>
			  <th>No</th>
              <th>Nama</th>
              <th>Telepon</th>
              <th>Asal Sekolah</th>
              <th>Tanggal Bayar</th>
              <th>Status</th>
              <th>Uang Masuk</th>
			</tr>
		</thead>
		<tbody>
	        @php
	        $totalPemasukan = 0;
	        $no=1;
	        @endphp
	        @foreach($data as $row)
	        @php
	        $totalPemasukan += $row->jenisFormulir->biaya_formulir;
	        @endphp
	         <tr>
	              <td>{{$no++}}</td>
	              <td>{{$row->user->name}}</td>
	              <td>{{$row->user->telepon}}</td>
	              <td>{{$row->user->asal_sekolah}}</td>
	              <td>{{$row->created_at->format('d/m/Y H:i:s')}}</td>
	              <td>{{$row->status}}</td>
	              <td>{{number_format($row->jenisFormulir->biaya_formulir)}}</td>
	          </tr>
	         @endforeach
	      </tbody> 
	      <tfoot>
	        <tr>
	            <th width="10px" colspan="6">Total</th>
	            <th>{{ number_format($totalPemasukan) }}</th>
	        </tr>
	      </tfoot>  
		</table>
</body>
</html>