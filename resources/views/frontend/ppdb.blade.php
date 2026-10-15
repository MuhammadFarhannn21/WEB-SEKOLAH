@extends('frontend.layouts.master')
@section('title', 'PPDB')

@php
	$linkDaftar = 'https://ppdb.ydsk.org/login';
	$waPpdb = 'https://wa.me/6281221724926';
	$warna = ['#1a73e8', '#12a37f', '#7c3aed', '#e8590c', '#d6336c', '#0ea5e9'];
	$jurusan = \App\Jurusan::orderBy('id')->get();
	$syarat = [
		['fa-id-card-o', 'Fotokopi Ijazah / SKL (Surat Keterangan Lulus)'],
		['fa-home', 'Fotokopi Kartu Keluarga (KK)'],
		['fa-credit-card', 'Kartu NISN (Nomor Induk Siswa Nasional)'],
		['fa-picture-o', 'Pas foto terbaru ukuran 3x4'],
		['fa-certificate', 'Fotokopi Akte Kelahiran'],
	];
	$alur = [
		['Kunjungi Website PPDB', 'Buka ppdb.ydsk.org lalu klik tombol Daftar.'],
		['Buat Akun', 'Daftarkan diri dengan data yang valid dan lengkap.'],
		['Isi Formulir', 'Lengkapi formulir pendaftaran dan pilih jurusan.'],
		['Unggah Dokumen', 'Unggah semua dokumen persyaratan yang diminta.'],
		['Selesai', 'Tunggu konfirmasi dari panitia PPDB melalui WhatsApp/Email.'],
	];
	$infoPpdb = '<div class="m-hero-card"><h6><i class="fa fa-info-circle"></i> Info PPDB</h6><ul>'
		.'<li><i class="fa fa-calendar-o"></i><span><small>Periode Pendaftaran</small>September 2025 — Juli 2026</span></li>'
		.'<li><i class="fa fa-graduation-cap"></i><span><small>Program Keahlian</small>'.$jurusan->count().' Kompetensi Keahlian</span></li>'
		.'<li><i class="fa fa-money"></i><span><small>Biaya Pendaftaran</small>Hubungi Admin PPDB</span></li>'
		.'</ul></div>';
@endphp

@section('konten')
@include('frontend.partials.page-hero', [
	'title' => 'Penerimaan Peserta Didik Baru 2026/2027',
	'eyebrow' => 'PPDB Sedang Berlangsung', 'icon' => 'fa-circle m-live',
	'subtitle' => $site->nama.' membuka pendaftaran peserta didik baru tahun ajaran 2026/2027. Pendaftaran dibuka mulai September 2025 hingga Juni/Juli 2026.',
	'crumbs' => ['PPDB' => null],
	'meta' => '<a href="'.$linkDaftar.'" target="_blank" rel="noopener" class="m-btn m-btn-accent"><i class="fa fa-pencil-square-o"></i> Daftar Sekarang</a>'
		.'<a href="'.$waPpdb.'" target="_blank" rel="noopener" class="m-btn m-btn-ghost"><i class="fa fa-whatsapp"></i> Tanya Admin</a>',
	'aside' => $infoPpdb,
])

@if($jurusan->count())
<section class="m-section m-section-soft">
	<div class="container">
		<div class="m-head center reveal">
			<span class="m-eyebrow"><i class="fa fa-graduation-cap"></i> Pilihan Jurusan</span>
			<h2 class="m-title">Jurusan yang Dibuka</h2>
			<p class="m-sub">{{ $jurusan->count() }} kompetensi keahlian tersedia untuk tahun ajaran 2026/2027.</p>
		</div>
		<div class="m-grid m-grid-3">
			@foreach($jurusan as $i => $j)
			<a href="{{ url('jurusan/'.$j->id) }}" class="m-major-row reveal reveal-d{{ $i % 3 + 1 }}" style="--c: {{ $warna[$i % count($warna)] }}">
				<span class="logo"><img src="{{ asset($j->gambar) }}" alt="" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('i'),{className:'fa fa-graduation-cap'}))"></span>
				<span>
					<strong>{{ $j->judul }}</strong>
					<small>{{ \Illuminate\Support\Str::limit(strip_tags($j->sub_judul), 90) }}</small>
				</span>
				<i class="fa fa-angle-right arrow"></i>
			</a>
			@endforeach
		</div>
	</div>
</section>
@endif

<section class="m-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-12 mb-5 mb-lg-0">
				<div class="m-head reveal" style="margin-bottom:24px;">
					<div>
						<span class="m-eyebrow"><i class="fa fa-check-square-o"></i> Persyaratan</span>
						<h2 class="m-title">Siapkan Berkas Ini</h2>
						<p class="m-sub">Centang berkas yang sudah Anda siapkan.</p>
					</div>
				</div>
				<div class="m-checklist reveal" data-checklist>
					@foreach($syarat as [$ikon, $teks])
					<label class="m-check">
						<input type="checkbox">
						<span class="box"><i class="fa fa-check"></i></span>
						<i class="fa {{ $ikon }} ic"></i>
						<span>{{ $teks }}</span>
					</label>
					@endforeach
					<div class="m-check-progress"><span></span><small><b data-checked>0</b> dari {{ count($syarat) }} berkas siap</small></div>
				</div>
			</div>
			<div class="col-lg-6 col-12">
				<div class="m-head reveal" style="margin-bottom:24px;">
					<div>
						<span class="m-eyebrow"><i class="fa fa-list-ol"></i> Alur</span>
						<h2 class="m-title">Alur Pendaftaran</h2>
						<p class="m-sub">Lima langkah mudah, semuanya online.</p>
					</div>
				</div>
				<ol class="m-timeline">
					@foreach($alur as $i => [$judul, $teks])
					<li class="reveal reveal-d{{ $i % 4 + 1 }}">
						<span class="num">{{ $i + 1 }}</span>
						<div><strong>{{ $judul }}</strong><p>{{ $teks }}</p></div>
					</li>
					@endforeach
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="m-section m-section-soft">
	<div class="container">
		<div class="m-contact-strip reveal">
			<div>
				<h3>Siap bergabung dengan {{ $site->nama }}?</h3>
				<p>Daftarkan diri sekarang dan raih masa depan cerah bersama kami.</p>
				<a href="{{ $linkDaftar }}" target="_blank" rel="noopener" class="m-btn m-btn-accent" style="margin-top:18px;"><i class="fa fa-pencil-square-o"></i> Daftar Sekarang</a>
			</div>
			<div class="m-contact-grid">
				<a href="{{ $waPpdb }}" target="_blank" rel="noopener"><i class="fa fa-whatsapp"></i><span><small>WhatsApp Admin PPDB</small>+62 812-2172-4926</span></a>
				<a href="{{ $linkDaftar }}" target="_blank" rel="noopener"><i class="fa fa-globe"></i><span><small>Website PPDB</small>ppdb.ydsk.org</span></a>
				@if($site->alamat)<span><i class="fa fa-map-marker"></i><span><small>Alamat Sekolah</small>{{ $site->alamat }}</span></span>@endif
			</div>
		</div>
	</div>
</section>
@endsection
