@php $jmlPrestasi = (int) preg_replace('/\D/', '', (string) $site->jumlah_prestasi); @endphp
@if($jmlPrestasi > 0)
<div class="m-trophy reveal">
	<i class="fa fa-trophy"></i>
	<div><b data-count="{{ $jmlPrestasi }}">{{ $jmlPrestasi }}</b><span>prestasi telah diraih warga {{ $site->nama }}</span></div>
</div>
@endif
<article class="m-article">
	<h3 class="m-block-title"><i class="fa fa-trophy"></i> Daftar Prestasi</h3>
	<div class="m-prose">{!! $post->body !!}</div>
</article>
@php $beritaPrestasi = \App\Post::where('status', 1)->where('jenis', 'Berita')->whereHas('category', fn ($q) => $q->where('slug', 'prestasi'))->orderBy('id', 'DESC')->limit(4)->get(); @endphp
@if($beritaPrestasi->count())
<div class="m-related">
	<h3 class="m-block-title"><i class="fa fa-newspaper-o"></i> Berita Prestasi</h3>
	<div class="m-grid m-grid-2">
		@foreach($beritaPrestasi as $p)
			@include('frontend.partials.post-card', ['p' => $p])
		@endforeach
	</div>
</div>
@endif
