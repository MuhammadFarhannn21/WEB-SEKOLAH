@if($data->cicilan_2_status != "Diterima")
<a href="{{ $diterima }}" class="text-white btn-sm btn-primary" id="btnDiterimaCicilan2" data-toggle="tooltip" data-placement="bottom">Konfirmasi</a>
@endif
@if($data->cicilan_2_status == "Menunggu Konfirmasi Admin")
<div class="py-2"></div>
@endif

@if($data->cicilan_2_status != "Ditolak")
<a href="{{ $ditolak }}" class="text-white btn-sm btn-danger" id="btnDitolakCicilan2" data-toggle="tooltip" data-placement="bottom">Ditolak</a>
@endif
