@extends('frontend.layouts.master')
@section('title', 'Fasilitas')

@section('konten')
@include('frontend.partials.page-hero', [
	'title' => 'Fasilitas Sekolah',
	'eyebrow' => 'Sarana & Prasarana', 'icon' => 'fa-building-o',
	'subtitle' => 'Sarana lengkap untuk mendukung kegiatan belajar, praktik, dan pengembangan diri siswa.',
	'crumbs' => ['Fasilitas' => null],
])

<section class="m-section m-section-soft m-page-body">
	<div class="container">
		@include('frontend.partials.item-grid', ['items' => $fasilitas, 'prefix' => 'fasilitas', 'label' => 'Fasilitas', 'icon' => 'fa-building'])
	</div>
</section>
@endsection
