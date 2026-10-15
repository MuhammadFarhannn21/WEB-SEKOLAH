@php
	$kepsek = \App\GuruTerbaik::where('status', 'aktif')->where('nama', 'like', 'Kepala Sekolah%')->first();
	$misi = collect(preg_split('/\r\n|\r|\n/', strip_tags($site->misi ?? '')))
		->map(fn ($m) => trim(preg_replace('/^\s*(\d+[\.\)]|[-•*])\s*/', '', $m)))
		->filter()
		->values();
@endphp

@if($kepsek || $site->visi || $misi->count())
<section class="m-section m-about" id="tentang">
	<div class="container">
		<div class="m-about-grid">
			@if($kepsek)
			<div class="m-principal reveal">
				<div class="m-principal-photo">
					<img src="{{ asset($kepsek->gambar) }}" alt="{{ $kepsek->mata_pelajaran }}" loading="lazy" onerror="this.style.display='none'">
					<span class="m-principal-badge"><i class="fa fa-star"></i> {{ $kepsek->nama }}</span>
				</div>
				<div class="m-principal-card">
					<i class="fa fa-quote-left"></i>
					<p>{{ $kepsek->pesan }}</p>
					<strong>{{ $kepsek->mata_pelajaran }}</strong>
					<small>{{ $kepsek->nama }} {{ $site->nama }}</small>
				</div>
			</div>
			@endif

			<div class="m-about-body reveal reveal-d2">
				<span class="m-eyebrow"><i class="fa fa-flag"></i> Tentang Kami</span>
				<h2 class="m-title">Selamat Datang di {{ $site->nama }}</h2>
				@if($site->keterangan && $site->keterangan !== 'kosong')
				<p class="m-sub">{{ \Illuminate\Support\Str::limit(strip_tags($site->keterangan), 260) }}</p>
				@endif

				@if($site->visi || $misi->count())
				<div class="m-tabs" data-tabs>
					<div class="m-tab-list" role="tablist">
						@if($site->visi)
						<button type="button" role="tab" class="active" data-tab="visi"><i class="fa fa-eye"></i> Visi</button>
						@endif
						@if($misi->count())
						<button type="button" role="tab" class="{{ $site->visi ? '' : 'active' }}" data-tab="misi"><i class="fa fa-bullseye"></i> Misi</button>
						@endif
					</div>
					@if($site->visi)
					<div class="m-tab-panel active" role="tabpanel" data-panel="visi">
						<blockquote class="m-visi">{{ strip_tags($site->visi) }}</blockquote>
					</div>
					@endif
					@if($misi->count())
					<div class="m-tab-panel {{ $site->visi ? '' : 'active' }}" role="tabpanel" data-panel="misi">
						<ol class="m-misi">
							@foreach($misi as $item)
							<li>{{ $item }}</li>
							@endforeach
						</ol>
					</div>
					@endif
				</div>
				@endif

				<div class="m-about-cta">
					<a href="{{ url('page/sambutan-kepala-sekolah') }}" class="m-btn m-btn-primary">Sambutan Lengkap <i class="fa fa-arrow-right"></i></a>
					<a href="{{ url('page/visi-dan-misi') }}" class="m-btn m-btn-outline">Profil Sekolah</a>
				</div>
			</div>
		</div>
	</div>
</section>
@endif
