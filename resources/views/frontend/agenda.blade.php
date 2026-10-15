@extends('frontend.layouts.master')
@section('title', 'Agenda')

@php
	$semuaAgenda = \App\Agenda::orderBy('start', 'ASC')->get();
	$hariIni = now()->startOfDay();
	$mendatang = $semuaAgenda->filter(fn ($a) => \Carbon\Carbon::parse($a->end ?: $a->start)->gte($hariIni))->values();
	$lewat = $semuaAgenda->filter(fn ($a) => \Carbon\Carbon::parse($a->end ?: $a->start)->lt($hariIni))->sortByDesc('start')->take(6)->values();
@endphp

@section('konten')
@include('frontend.partials.page-hero', [
	'title' => 'Agenda Sekolah',
	'eyebrow' => 'Kalender Kegiatan', 'icon' => 'fa-calendar',
	'subtitle' => 'Jadwal kegiatan dan agenda penting '.$site->nama.'.',
	'crumbs' => ['Agenda' => null],
])

<section class="m-section m-section-soft m-page-body">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="m-article m-calendar reveal">
					<div id="calendar"></div>
				</div>
			</div>
			<aside class="col-lg-4 col-12 mt-5 mt-lg-0">
				<div class="m-sidebar">
					<div class="m-widget">
						<h5><i class="fa fa-bell-o"></i> Agenda Mendatang</h5>
						@forelse($mendatang->take(8) as $agenda)
							@include('frontend.partials.agenda-item', ['agenda' => $agenda])
						@empty
							<p class="m-widget-empty">Belum ada agenda mendatang.</p>
						@endforelse
					</div>
					@if($lewat->count())
					<div class="m-widget">
						<h5><i class="fa fa-history"></i> Agenda Sebelumnya</h5>
						@foreach($lewat as $agenda)
							@include('frontend.partials.agenda-item', ['agenda' => $agenda, 'past' => true])
						@endforeach
					</div>
					@endif
				</div>
			</aside>
		</div>
	</div>
</section>
@endsection

@section('assets-bottom')
<script src="{{ asset('backend/plugins/moment/moment.js') }}"></script>
<script src="{{ asset('backend/plugins/fullcalendar/js/fullcalendar.min.js') }}"></script>
<script>
$(function () {
    $('#calendar').fullCalendar({
        header: { left: 'title', center: '', right: 'prev,next today' },
        editable: false,
        firstDay: 1,
        height: 'auto',
        defaultView: 'month',
        monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        dayNames: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
        dayNamesShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
        buttonText: { today: 'Hari ini' },
        events: @json($semuaAgenda->map(fn ($a) => ['title' => $a->title, 'start' => $a->start, 'end' => $a->end])->values()),
    });
});
</script>
@endsection
