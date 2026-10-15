@php
	$stats = [
		['fa-user',           $site->jumlah_siswa ?? 0,    'Siswa Aktif'],
		['fa-users',          $site->jumlah_guru ?? 0,     'Guru & Tenaga Pendidik'],
		['fa-graduation-cap', $site->jumlah_jurusan ?? 0,  'Program Keahlian'],
		['fa-trophy',         $site->jumlah_prestasi ?? 0, 'Prestasi Diraih'],
	];
	// Angka yang belum diisi admin (kosong/0) tidak ditampilkan
	$stats = array_values(array_filter($stats, fn ($s) => (int) preg_replace('/\D/', '', (string) $s[1]) > 0));
@endphp
@if(count($stats))
<section class="m-section m-section-dark" style="padding:72px 0;">
	<div class="container">
		<div class="m-stats" style="--cols: {{ count($stats) }}">
			@foreach($stats as $i => [$icon, $value, $label])
			<div class="m-stat reveal reveal-d{{ $i + 1 }}">
				<span class="m-stat-icon"><i class="fa {{ $icon }}"></i></span>
				<div>
					<h3 data-count="{{ $value }}">{{ $value }}</h3>
					<p>{{ $label }}</p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endif
