@extends('frontend.layouts.master')
@section('title', 'Bursa Kerja Khusus')

@php
	$mitras = \App\MitraPerusahaan::where('status', 'aktif')->orderBy('nama')->get();
	$waBkk = 'https://wa.me/6285695888470';
	$igBkk = 'https://www.instagram.com/bkksmkkosgoro/';
	$emailBkk = 'bkksmkkosgoro@gmail.com';
	$layanan = [
		['fa-briefcase', 'Penyaluran Tenaga Kerja', 'Menghubungkan lulusan dengan perusahaan mitra yang membutuhkan tenaga kerja terampil dan berkualitas.'],
		['fa-newspaper-o', 'Informasi Lowongan Kerja', 'Informasi lowongan terkini dari berbagai perusahaan dan industri yang relevan dengan kompetensi keahlian.'],
		['fa-graduation-cap', 'Pelatihan Kerja', 'Pelatihan dan pembekalan kerja untuk meningkatkan kompetensi dan kesiapan lulusan memasuki dunia industri.'],
	];
	$infoBkk = '<div class="m-hero-card"><h6><i class="fa fa-info-circle"></i> Info BKK</h6><ul>'
		.'<li><i class="fa fa-user-o"></i><span><small>Penanggung Jawab</small>Nunyk Laila, S.Pd.</span></li>'
		.'<li><i class="fa fa-envelope-o"></i><span><small>Email</small>'.$emailBkk.'</span></li>'
		.'<li><i class="fa fa-handshake-o"></i><span><small>Mitra Industri</small>'.$mitras->count().' perusahaan</span></li>'
		.'<li><i class="fa fa-calendar-o"></i><span><small>Aktif Sejak</small>2021</span></li>'
		.'</ul></div>';
@endphp

@section('konten')
@include('frontend.partials.page-hero', [
	'title' => 'Bursa Kerja Khusus',
	'eyebrow' => 'BKK '.$site->nama, 'icon' => 'fa-briefcase',
	'subtitle' => 'Membantu lulusan mendapatkan pekerjaan yang sesuai kompetensi keahlian melalui jaringan mitra industri terpercaya.',
	'crumbs' => ['BKK' => null],
	'meta' => '<a href="'.$waBkk.'" target="_blank" rel="noopener" class="m-btn m-btn-accent m-btn-sm"><i class="fa fa-whatsapp"></i> Hubungi BKK</a>'
		.'<a href="'.$igBkk.'" target="_blank" rel="noopener" class="m-btn m-btn-ghost m-btn-sm"><i class="fa fa-instagram"></i> Instagram</a>',
	'aside' => $infoBkk,
])

<section class="m-section m-page-body">
	<div class="container">
		<div class="m-head center reveal">
			<span class="m-eyebrow"><i class="fa fa-th-large"></i> Layanan</span>
			<h2 class="m-title">Layanan BKK</h2>
			<p class="m-sub">Kami siap membantu lulusan memasuki dunia kerja.</p>
		</div>
		<div class="m-grid m-grid-3">
			@foreach($layanan as $i => [$ikon, $judul, $teks])
			<div class="m-service reveal reveal-d{{ $i + 1 }}">
				<span class="m-service-icon bg-g{{ [1, 3, 4][$i] }}"><i class="fa {{ $ikon }}"></i></span>
				<h4>{{ $judul }}</h4>
				<p>{{ $teks }}</p>
			</div>
			@endforeach
		</div>
	</div>
</section>

<section class="m-section m-section-soft">
	<div class="container">
		<div class="m-head reveal">
			<div>
				<span class="m-eyebrow"><i class="fa fa-handshake-o"></i> Mitra Industri</span>
				<h2 class="m-title">Mitra Perusahaan</h2>
				<p class="m-sub">Perusahaan yang telah bekerja sama dengan BKK {{ $site->nama }}.</p>
			</div>
			@if($mitras->count() > 6)
			<div class="m-filter m-filter-inline">
				<i class="fa fa-search"></i>
				<input type="search" placeholder="Cari perusahaan..." data-filter="#grid-mitra" aria-label="Cari perusahaan">
			</div>
			@endif
		</div>

		@if($mitras->count())
		<div class="m-grid m-grid-4" id="grid-mitra">
			@foreach($mitras as $i => $mitra)
			<div class="m-partner-card reveal reveal-d{{ $i % 4 + 1 }}" data-filter-text="{{ strtolower($mitra->nama.' '.$mitra->bidang) }}">
				@if($mitra->logo)
					<img src="{{ asset($mitra->logo) }}" alt="{{ $mitra->nama }}" loading="lazy">
				@else
					<span class="initial">{{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr(preg_replace('/^(PT\.?|CV\.?)\s*/i', '', $mitra->nama), 0, 1)) }}</span>
				@endif
				<h4>{{ $mitra->nama }}</h4>
				@if($mitra->bidang)<span class="m-chip m-chip-soft">{{ $mitra->bidang }}</span>@endif
				@if($mitra->deskripsi)<p>{{ \Illuminate\Support\Str::limit($mitra->deskripsi, 80) }}</p>@endif
				@if($mitra->website)
				<a href="{{ $mitra->website }}" target="_blank" rel="noopener" class="m-link"><i class="fa fa-globe"></i> Kunjungi website</a>
				@endif
			</div>
			@endforeach
		</div>
		<p class="m-filter-empty" hidden>Tidak ada perusahaan yang cocok.</p>
		@else
			@include('frontend.partials.empty', ['icon' => 'fa-building', 'title' => 'Data mitra segera ditampilkan', 'text' => 'Hubungi BKK untuk informasi kerja sama.'])
		@endif
	</div>
</section>

<section class="m-section">
	<div class="container">
		<div class="m-contact-strip reveal">
			<div>
				<h3>Hubungi BKK {{ $site->nama }}</h3>
				<p>Siap membantu lulusan mendapatkan pekerjaan terbaik.</p>
			</div>
			<div class="m-contact-grid">
				<a href="{{ $waBkk }}" target="_blank" rel="noopener"><i class="fa fa-whatsapp"></i><span><small>WhatsApp</small>+62 856-9588-8470</span></a>
				<a href="mailto:{{ $emailBkk }}"><i class="fa fa-envelope-o"></i><span><small>Email</small>{{ $emailBkk }}</span></a>
				<a href="{{ $igBkk }}" target="_blank" rel="noopener"><i class="fa fa-instagram"></i><span><small>Instagram</small>@bkksmkkosgoro</span></a>
				@if($site->alamat)<span><i class="fa fa-map-marker"></i><span><small>Alamat</small>{{ $site->alamat }}</span></span>@endif
			</div>
		</div>
	</div>
</section>
@endsection
