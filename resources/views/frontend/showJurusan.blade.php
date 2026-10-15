@extends('frontend.layouts.master')
@section('title', $jurusan->judul)

@php
	$warna = ['#1a73e8', '#12a37f', '#7c3aed', '#e8590c', '#d6336c', '#0ea5e9'];
	$semua = \App\Jurusan::orderBy('id')->get();
	$posisi = max(0, $semua->search(fn ($j) => $j->id === $jurusan->id));
	$w = $warna[$posisi % count($warna)];
	$tambahan = trim(html_entity_decode(strip_tags($jurusan->keterangan ?? '')));
	$keunggulan = [
		['fa-users', 'Tenaga pengajar berpengalaman & bersertifikat'],
		['fa-building', 'Fasilitas praktik modern & lengkap'],
		['fa-handshake-o', 'Kerja sama dengan dunia usaha & industri'],
		['fa-certificate', 'Sertifikasi kompetensi nasional'],
		['fa-briefcase', 'Peluang kerja & karier yang luas'],
		['fa-graduation-cap', 'Siap melanjutkan ke perguruan tinggi'],
	];
	$wa = $site->telepon ? 'https://wa.me/'.preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $site->telepon)) : null;
@endphp

@section('konten')
@include('frontend.partials.page-hero', [
	'title' => $jurusan->judul,
	'eyebrow' => 'Program Keahlian '.str_pad($posisi + 1, 2, '0', STR_PAD_LEFT).' / '.str_pad($semua->count(), 2, '0', STR_PAD_LEFT),
	'icon' => 'fa-graduation-cap',
	'subtitle' => \Illuminate\Support\Str::limit(strip_tags($jurusan->sub_judul), 180),
	'crumbs' => ['Jurusan' => url('/jurusan'), $jurusan->judul => null],
	'aside' => '<div class="m-major-badge" style="--c: '.$w.'"><img src="'.e(asset($jurusan->gambar)).'" alt="" onerror="this.replaceWith(Object.assign(document.createElement(\'i\'),{className:\'fa fa-graduation-cap\'}))"></div>',
])

<section class="m-section m-section-soft m-page-body" style="--c: {{ $w }}">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<article class="m-article">
					<h3 class="m-block-title"><i class="fa fa-info-circle"></i> Tentang Jurusan</h3>
					<div class="m-prose">
						<p>{{ strip_tags($jurusan->sub_judul) }}</p>
						@if(mb_strlen($tambahan) > 60)
							{!! $jurusan->keterangan !!}
						@endif
					</div>
				</article>

				<div class="m-article">
					<h3 class="m-block-title"><i class="fa fa-star-o"></i> Mengapa Memilih Jurusan Ini?</h3>
					<div class="m-features">
						@foreach($keunggulan as $i => [$ikon, $teks])
						<div class="m-feature-item reveal reveal-d{{ $i % 2 + 1 }}">
							<span><i class="fa {{ $ikon }}"></i></span>
							<p>{{ $teks }}</p>
						</div>
						@endforeach
					</div>
				</div>
			</div>

			<aside class="col-lg-4 col-12 mt-5 mt-lg-0">
				<div class="m-sidebar">
					<div class="m-widget m-widget-cta" style="background: linear-gradient(140deg, var(--navy), {{ $w }});">
						<i class="fa fa-pencil-square-o"></i>
						<h5>Tertarik bergabung?</h5>
						<p>Daftarkan diri sekarang dan raih masa depan cerah bersama kami.</p>
						<a href="{{ url('/ppdb') }}" class="m-btn m-btn-accent m-btn-sm">Daftar Sekarang <i class="fa fa-arrow-right"></i></a>
						@if($wa)
						<a href="{{ $wa }}" target="_blank" rel="noopener" class="m-btn m-btn-ghost m-btn-sm" style="margin-top:10px;"><i class="fa fa-whatsapp"></i> Tanya via WhatsApp</a>
						@endif
					</div>

					<div class="m-widget">
						<h5><i class="fa fa-info"></i> Info Jurusan</h5>
						<ul class="m-info-list">
							<li><i class="fa fa-clock-o"></i><span><small>Durasi Pendidikan</small>3 Tahun</span></li>
							@if($site->alamat)<li><i class="fa fa-map-marker"></i><span><small>Lokasi</small>{{ $site->alamat }}</span></li>@endif
							@if($site->telepon)<li><i class="fa fa-phone"></i><span><small>Kontak</small>{{ $site->telepon }}</span></li>@endif
						</ul>
					</div>

					<div class="m-widget">
						<h5><i class="fa fa-th-large"></i> Jurusan Lainnya</h5>
						@foreach($semua as $i => $l)
							@continue($l->id === $jurusan->id)
							<a href="{{ url('jurusan/'.$l->id) }}" class="m-mini-post" style="--c: {{ $warna[$i % count($warna)] }}">
								<span class="thumb m-thumb-logo"><img src="{{ asset($l->gambar) }}" alt="" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('i'),{className:'fa fa-graduation-cap'}))"></span>
								<span><strong>{{ $l->judul }}</strong></span>
							</a>
						@endforeach
					</div>
				</div>
			</aside>
		</div>
	</div>
</section>
@endsection
