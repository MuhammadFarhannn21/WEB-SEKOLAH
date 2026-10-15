@php
	$jabatan = [
		'Kepala Sekolah', 'Waka. Bid. Kesiswaan', 'Waka. Bid. Kurikulum', 'Waka. Bid. Adm. Sarpras',
		'Ka. Program TKJ, MM, RPL', 'Ka. Program KKR', 'Ka. Hubinmas', 'Bendahara Sekolah', 'Komite Sekolah',
	];
	$anggota = \App\GuruTerbaik::where('status', 'aktif')->where('tipe', 'Guru')->whereIn('nama', $jabatan)->get()
		->sortBy(fn ($g) => array_search($g->nama, $jabatan))->values();
	$tingkat = [
		'Pimpinan' => $anggota->filter(fn ($g) => str_starts_with($g->nama, 'Kepala Sekolah')),
		'Wakil Kepala Sekolah' => $anggota->filter(fn ($g) => str_starts_with($g->nama, 'Waka')),
		'Kepala Program & Unit' => $anggota->reject(fn ($g) => str_starts_with($g->nama, 'Kepala Sekolah') || str_starts_with($g->nama, 'Waka')),
	];
@endphp

@if($anggota->count())
<div class="m-org">
	@foreach($tingkat as $label => $orang)
		@continue($orang->isEmpty())
		<div class="m-org-level">
			<span class="m-org-label">{{ $label }}</span>
			<div class="m-org-row">
				@foreach($orang as $i => $g)
				@php $foto = $g->gambar ? (\Illuminate\Support\Str::startsWith($g->gambar, 'http') ? $g->gambar : asset($g->gambar)) : null; @endphp
				<button type="button" class="m-person reveal reveal-d{{ $i % 4 + 1 }} {{ $loop->parent->first ? 'is-lead' : '' }}" aria-label="{{ $g->nama }}: {{ $g->mata_pelajaran }}">
					<span class="photo">
						@if($foto)<img src="{{ $foto }}" alt="" loading="lazy">@else<i class="fa fa-user"></i>@endif
					</span>
					<span class="info">
						<strong>{{ $g->mata_pelajaran }}</strong>
						<small>{{ $g->nama }}</small>
					</span>
					<span class="more">
						<strong>{{ $g->mata_pelajaran }}</strong>
						<small>{{ $g->nama }}</small>
						@if($g->lulusan)<small><i class="fa fa-university"></i> {{ $g->lulusan }}</small>@endif
						@if($g->periode)<small><i class="fa fa-calendar-o"></i> Periode {{ $g->periode }}</small>@endif
						@if($g->pesan)<em>"{{ \Illuminate\Support\Str::limit($g->pesan, 80) }}"</em>@endif
					</span>
				</button>
				@endforeach
			</div>
		</div>
	@endforeach
	<p class="m-org-hint"><i class="fa fa-hand-pointer-o"></i> Arahkan kursor atau ketuk kartu untuk melihat informasi lengkap.</p>
</div>
@else
	@include('frontend.partials.empty', ['icon' => 'fa-sitemap', 'title' => 'Belum ada data struktur organisasi', 'text' => 'Data diambil dari menu Guru & Staff di halaman admin.'])
@endif

@if(trim(strip_tags($post->body)) !== '' && strcasecmp(trim(strip_tags($post->body)), $post->title) !== 0)
<div class="row justify-content-center">
	<div class="col-lg-9 col-12">
		<article class="m-article" style="margin-top:40px;"><div class="m-prose">{!! $post->body !!}</div></article>
	</div>
</div>
@endif
