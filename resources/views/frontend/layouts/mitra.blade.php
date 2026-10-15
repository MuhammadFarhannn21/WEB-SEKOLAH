@php $mitra_list = \App\MitraPerusahaan::where('status', 'aktif')->orderBy('nama')->get(); @endphp

@if($mitra_list->count())
<section class="m-section m-partners">
	<div class="container">
		<div class="m-head center reveal">
			<span class="m-eyebrow"><i class="fa fa-handshake-o"></i> Mitra Industri</span>
			<h2 class="m-title">Dipercaya {{ $mitra_list->count() }} Mitra Dunia Usaha & Industri</h2>
			<p class="m-sub">Tempat praktik kerja lapangan dan penyaluran lulusan melalui Bursa Kerja Khusus.</p>
		</div>
	</div>

	{{-- Daftar diulang dua kali agar animasi berjalan tanpa jeda --}}
	<div class="m-marquee reveal" aria-label="Daftar mitra industri">
		<div class="m-marquee-track">
			@foreach([1, 2] as $loopCopy)
				@foreach($mitra_list as $m)
				<div class="m-partner" @if($loopCopy === 2) aria-hidden="true" @endif>
					@if($m->logo)
						<img src="{{ asset($m->logo) }}" alt="{{ $m->nama }}" loading="lazy">
					@else
						<span class="initial">{{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr(preg_replace('/^(PT\.?|CV\.?)\s*/i', '', $m->nama), 0, 1)) }}</span>
					@endif
					<span class="label">
						<strong>{{ $m->nama }}</strong>
						@if($m->bidang)<small>{{ $m->bidang }}</small>@endif
					</span>
				</div>
				@endforeach
			@endforeach
		</div>
	</div>

	<div class="container" style="text-align:center; margin-top:34px;">
		<a href="{{ url('/bkk') }}" class="m-btn m-btn-outline">Lihat Bursa Kerja Khusus <i class="fa fa-arrow-right"></i></a>
	</div>
</section>
@endif
