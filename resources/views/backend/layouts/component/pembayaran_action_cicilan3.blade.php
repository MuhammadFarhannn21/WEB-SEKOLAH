@if($data->cicilan_3_status != "Diterima")
<a href="{{ $diterima }}" class="text-white btn-sm btn-primary" id="btnDiterimaCicilan3" data-toggle="tooltip" data-placement="bottom">Konfirmasi</a>
@endif

@if($data->cicilan_3_status == "Menunggu Konfirmasi Admin")
<div class="py-2"></div>
@endif

@if($data->cicilan_3_status != "Ditolak")
<a href="{{ $ditolak }}" class="text-white btn-sm btn-danger" id="btnDitolakCicilan3" data-toggle="tooltip" data-placement="bottom">Ditolak</a>
@endif
