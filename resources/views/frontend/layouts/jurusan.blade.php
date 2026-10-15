@php
	$jurusan_list = \App\Jurusan::orderBy('id')->get();
	$warna = ['#1a73e8', '#12a37f', '#7c3aed', '#e8590c', '#d6336c', '#0ea5e9'];
@endphp

@if($jurusan_list->count())
<section class="m-section m-section-soft" id="program-keahlian">
	<div class="container">
		<div class="m-head reveal">
			<div>
				<span class="m-eyebrow"><i class="fa fa-graduation-cap"></i> Program Keahlian</span>
				<h2 class="m-title">{{ $site->judul_jurusan ?: 'Kompetensi Keahlian' }}</h2>
				<p class="m-sub">Pilih jurusan yang sesuai dengan minat dan bakatmu. Klik untuk melihat penjelasannya.</p>
			</div>
			<a href="{{ url('/jurusan') }}" class="m-btn m-btn-outline">Semua Jurusan <i class="fa fa-arrow-right"></i></a>
		</div>

		<div class="m-program reveal" data-tabs>
			<div class="m-program-list" role="tablist">
				@foreach($jurusan_list as $i => $j)
				<button type="button" role="tab" class="{{ $i === 0 ? 'active' : '' }}" data-tab="jurusan-{{ $j->id }}" style="--c: {{ $warna[$i % count($warna)] }}">
					<span class="logo">
						<img src="{{ asset($j->gambar) }}" alt="" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('i'),{className:'fa fa-graduation-cap'}))">
					</span>
					<span class="name">{{ $j->judul }}</span>
					<i class="fa fa-angle-right arrow"></i>
				</button>
				@endforeach
			</div>

			<div class="m-program-panels">
				@foreach($jurusan_list as $i => $j)
				<article class="m-tab-panel m-program-panel {{ $i === 0 ? 'active' : '' }}" role="tabpanel" data-panel="jurusan-{{ $j->id }}" style="--c: {{ $warna[$i % count($warna)] }}">
					<div class="m-program-art">
						<img src="{{ asset($j->gambar) }}" alt="{{ $j->judul }}" loading="lazy" onerror="this.replaceWith(Object.assign(document.createElement('i'),{className:'fa fa-graduation-cap m-program-fallback'}))">
					</div>
					<div class="m-program-text">
						<span class="m-program-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }} / {{ str_pad($jurusan_list->count(), 2, '0', STR_PAD_LEFT) }}</span>
						<h3>{{ $j->judul }}</h3>
						<p>{{ \Illuminate\Support\Str::limit(strip_tags($j->sub_judul), 320) }}</p>
						<a href="{{ url('jurusan/'.$j->id) }}" class="m-btn m-btn-primary">Pelajari Jurusan <i class="fa fa-arrow-right"></i></a>
					</div>
				</article>
				@endforeach
			</div>
		</div>
	</div>
</section>
@endif
