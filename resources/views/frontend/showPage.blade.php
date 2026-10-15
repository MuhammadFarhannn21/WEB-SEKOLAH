@extends('frontend.layouts.master')
@section('title', $post->title)

@section('meta')
<meta name="keywords" content="{{ $post->slug }}">
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:description" content="{{ \Illuminate\Support\Str::limit(strip_tags($post->body), 155) }}" />
@if($post->featured)<meta property="og:image" content="{{ asset($post->featured) }}" />@endif
@endsection

@php
	$halaman = [
		'visi-dan-misi' => ['Visi & Misi', 'fa-eye', 'Arah dan tujuan pendidikan '.$site->nama.'.'],
		'struktur-organisasi' => ['Struktur Organisasi', 'fa-sitemap', 'Kenali lebih dekat tim pengelola '.$site->nama.'.'],
		'sambutan-kepala-sekolah' => ['Sambutan Kepala Sekolah', 'fa-commenting-o', 'Pesan dan harapan dari Kepala '.$site->nama.'.'],
		'sk-sekolah' => ['SK Sekolah', 'fa-file-text-o', 'Surat keputusan dan legalitas '.$site->nama.'.'],
		'prestasi' => ['Prestasi Sekolah', 'fa-trophy', 'Pencapaian dan penghargaan yang diraih warga sekolah.'],
		'selayang-pandang' => ['Selayang Pandang', 'fa-university', 'Mengenal lebih dekat '.$site->nama.'.'],
	];
	[$judul, $ikon, $sub] = $halaman[$post->slug] ?? [$post->title, 'fa-file-text-o', null];
	$tampilan = view()->exists('frontend.partials.pages.'.$post->slug) ? $post->slug : 'default';
@endphp

@section('konten')
@include('frontend.partials.page-hero', [
	'title' => $judul,
	'eyebrow' => 'Tentang Sekolah', 'icon' => $ikon,
	'subtitle' => $sub,
	'crumbs' => ['Tentang Sekolah' => null, $judul => null],
])

<section class="m-section m-section-soft m-page-body">
	<div class="container">
		@if($tampilan === 'struktur-organisasi')
			@include('frontend.partials.pages.struktur-organisasi')
		@else
		<div class="row">
			<div class="col-lg-8 col-12">
				@include('frontend.partials.pages.'.$tampilan)
			</div>
			@include('frontend.partials.pages._sidebar')
		</div>
		@endif
	</div>
</section>
@endsection
