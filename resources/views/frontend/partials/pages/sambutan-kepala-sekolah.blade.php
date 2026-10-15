@php
	$kepsek = \App\GuruTerbaik::where('status', 'aktif')->where('nama', 'like', 'Kepala Sekolah%')->first();
	$foto = $kepsek && $kepsek->gambar ? (\Illuminate\Support\Str::startsWith($kepsek->gambar, 'http') ? $kepsek->gambar : asset($kepsek->gambar)) : null;
	$isi = trim(strip_tags($post->body));
@endphp
@if($kepsek)
<div class="m-principal-row reveal">
	<div class="photo">
		@if($foto)<img src="{{ $foto }}" alt="{{ $kepsek->mata_pelajaran }}">@else<i class="fa fa-user"></i>@endif
	</div>
	<div>
		<span class="m-chip"><i class="fa fa-star"></i> Kepala Sekolah</span>
		<h3>{{ $kepsek->mata_pelajaran }}</h3>
		<p class="role">Kepala {{ $site->nama }}@if($kepsek->periode) · Periode {{ $kepsek->periode }}@endif</p>
		@if($kepsek->pesan)<blockquote><i class="fa fa-quote-left"></i> {{ $kepsek->pesan }}</blockquote>@endif
	</div>
</div>
@endif
<article class="m-article m-letter">
	<p class="m-letter-greet">Assalamu'alaikum Wr. Wb.</p>
	<div class="m-prose">
		@if($isi === '' || strcasecmp($isi, $post->title) === 0)
			<p class="text-muted"><em>Naskah sambutan belum diisi. Silakan lengkapi melalui menu Posts di halaman admin.</em></p>
		@else
			{!! $post->body !!}
		@endif
	</div>
	@if($kepsek)
	<div class="m-signature">
		@if($foto)<img src="{{ $foto }}" alt="">@endif
		<div><strong>{{ $kepsek->mata_pelajaran }}</strong><small>Kepala {{ $site->nama }}</small></div>
	</div>
	@endif
</article>
