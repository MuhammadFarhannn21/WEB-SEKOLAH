{{-- Akses cepat untuk calon siswa, siswa & orang tua --}}
@php
	$quickLinks = [
		['PPDB Online',     'Daftar jadi siswa baru',    url('ppdb'),     'fa-pencil-square-o', 'bg-g1'],
		['Cek Status PPDB', 'Pantau proses pendaftaran', url('login'),    'fa-check-circle-o',  'bg-g3'],
		['Agenda',          'Kalender kegiatan',         url('agenda'),   'fa-calendar',        'bg-g2'],
		['Berita',          'Informasi & pengumuman',    url('berita'),   'fa-newspaper-o',     'bg-g4'],
		['Bursa Kerja',     'Lowongan & mitra industri', url('bkk'),      'fa-briefcase',       'bg-g6'],
		['Buku Tamu',       'Kirim pesan ke sekolah',    url('tamu'),     'fa-comments-o',      'bg-g5'],
	];
@endphp
<section class="m-quick" id="akses-cepat">
	<div class="container">
		<div class="m-quick-grid reveal">
			@foreach($quickLinks as [$label, $desc, $href, $icon, $bg])
			<a href="{{ $href }}" class="m-quick-item">
				<span class="m-quick-icon {{ $bg }}"><i class="fa {{ $icon }}"></i></span>
				<strong>{{ $label }}</strong>
				<small>{{ $desc }}</small>
			</a>
			@endforeach
		</div>
	</div>
</section>
