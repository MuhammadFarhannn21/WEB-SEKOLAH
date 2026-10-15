@extends('frontend.layouts.master')
@section('title', 'Ekstrakurikuler')

@section('konten')
@include('frontend.partials.page-hero', [
	'title' => 'Ekstrakurikuler',
	'eyebrow' => 'Bakat & Minat', 'icon' => 'fa-star-o',
	'subtitle' => 'Beragam kegiatan untuk membentuk karakter, kreativitas, dan prestasi siswa di luar kelas.',
	'crumbs' => ['Ekstrakurikuler' => null],
])

<section class="m-section m-section-soft m-page-body">
	<div class="container">
		@include('frontend.partials.item-grid', ['items' => $ekskul, 'prefix' => 'ekstrakurikuler', 'label' => 'Ekskul', 'icon' => 'fa-futbol-o', 'chipClass' => 'm-chip-green'])
	</div>
</section>
@endsection
