@extends('frontend.layouts.master')
@section('title', 'Program Keahlian')

@php
	$warna = ['#1a73e8', '#12a37f', '#7c3aed', '#e8590c', '#d6336c', '#0ea5e9'];
	$urut = $jurusan->sortBy('id')->values();
@endphp

@section('konten')
@include('frontend.partials.page-hero', [
	'title' => $site->judul_jurusan ?: 'Kompetensi Keahlian',
	'eyebrow' => 'Program Keahlian', 'icon' => 'fa-graduation-cap',
	'subtitle' => $urut->count().' program keahlian unggulan '.$site->nama.'. Pilih sesuai minat dan bakatmu.',
	'crumbs' => ['Jurusan' => null],
])

<section class="m-section m-section-soft m-page-body">
	<div class="container">
		@if($site->judul_sub_jurusan)
		<p class="m-lead reveal">{{ strip_tags($site->judul_sub_jurusan) }}</p>
		@endif

		@if($urut->count())
		<div class="m-grid m-grid-3">
			@foreach($urut as $i => $j)
			<a href="{{ url('jurusan/'.$j->id) }}" class="m-card m-major-card reveal reveal-d{{ $i % 3 + 1 }}" style="--c: {{ $warna[$i % count($warna)] }}">
				<div class="m-major-art">
					<span class="num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
					<img src="{{ asset($j->gambar) }}" alt="{{ $j->judul }}" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('i'),{className:'fa fa-graduation-cap'}))">
				</div>
				<div class="m-card-body">
					<h4>{{ $j->judul }}</h4>
					<p>{{ \Illuminate\Support\Str::limit(strip_tags($j->sub_judul), 130) }}</p>
					<span class="m-link">Pelajari jurusan <i class="fa fa-arrow-right"></i></span>
				</div>
			</a>
			@endforeach
		</div>
		@else
			@include('frontend.partials.empty', ['icon' => 'fa-graduation-cap', 'title' => 'Belum ada data jurusan'])
		@endif
	</div>
</section>

@include('frontend.layouts.cta')
@endsection
