@php
	$misi = collect(preg_split('/\r\n|\r|\n/', strip_tags($site->misi ?? '')))
		->map(fn ($m) => trim(preg_replace('/^\s*(\d+[\.\)]|[-•*])\s*/', '', $m)))
		->filter()->values();
	$nilai = [['fa-star', 'Unggul', 'bg-g1'], ['fa-heart', 'Integritas', 'bg-g3'], ['fa-users', 'Kolaborasi', 'bg-g4'], ['fa-lightbulb-o', 'Inovatif', 'bg-g2']];
@endphp

<div class="m-vision reveal">
	<span class="m-vision-icon"><i class="fa fa-eye"></i></span>
	<span class="m-vision-label">Visi</span>
	@if($site->visi)
		<blockquote>{{ strip_tags($site->visi) }}</blockquote>
	@else
		<blockquote class="is-empty">Visi belum diisi. Silakan isi melalui menu Konfigurasi di halaman admin.</blockquote>
	@endif
</div>

<div class="m-article">
	<h3 class="m-block-title"><i class="fa fa-rocket"></i> Misi</h3>
	@if($misi->count())
	<ol class="m-misi m-misi-full">
		@foreach($misi as $i => $m)
		<li class="reveal reveal-d{{ $i % 4 + 1 }}">{{ $m }}</li>
		@endforeach
	</ol>
	@else
	<p class="text-muted"><em>Misi belum diisi. Silakan isi melalui menu Konfigurasi di halaman admin.</em></p>
	@endif
</div>

<div class="m-values">
	@foreach($nilai as $i => [$ic, $label, $bg])
	<div class="reveal reveal-d{{ $i + 1 }}"><i class="fa {{ $ic }} {{ $bg }}"></i><strong>{{ $label }}</strong></div>
	@endforeach
</div>
