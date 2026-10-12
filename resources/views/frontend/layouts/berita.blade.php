@php $berita_list = \App\Post::with(['category', 'user'])->where('jenis', 'Berita')->where('status', 1)->orderBy('id', 'DESC')->limit(5)->get(); @endphp

@if($berita_list->count() > 0)
<section class="m-section">
	<div class="container">
		<div class="m-head reveal">
			<div>
				<span class="m-eyebrow"><i class="fa fa-bolt"></i> Berita Terkini</span>
				<h2 class="m-title">{!! $site->judul_berita ?: 'Kabar Terbaru dari Sekolah' !!}</h2>
				<p class="m-sub">Informasi, pengumuman, dan cerita kegiatan terbaru untuk siswa dan orang tua.</p>
			</div>
			<a href="{{ url('/berita') }}" class="m-btn m-btn-outline">Semua Berita <i class="fa fa-arrow-right"></i></a>
		</div>

		<div class="row">
			@php $utama = $berita_list->first(); @endphp
			<div class="col-lg-7 col-12 mb-4 reveal">
				<a href="{{ url('/berita/'.$utama->slug) }}" class="m-feature">
					<span class="img" style="background-image:url('{{ asset($utama->featured) }}')"></span>
					<span class="m-new"><i class="fa fa-star"></i> Terbaru</span>
					<div class="m-feature-body">
						<span class="m-chip">{{ $utama->category->title ?? 'Berita' }}</span>
						<h3>{{ \Illuminate\Support\Str::limit(strip_tags($utama->title), 95) }}</h3>
						<p>{{ \Illuminate\Support\Str::limit(strip_tags($utama->body), 150) }}</p>
						<div class="m-meta">
							<span><i class="fa fa-calendar"></i>{{ \Carbon\Carbon::parse($utama->published_at)->translatedFormat('d F Y') }}</span>
							@if($utama->user)<span><i class="fa fa-user"></i>{{ \Illuminate\Support\Str::limit($utama->user->name, 18) }}</span>@endif
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-5 col-12 mb-4">
				@foreach($berita_list->skip(1) as $i => $berita)
				<a href="{{ url('/berita/'.$berita->slug) }}" class="m-news-mini reveal reveal-d{{ $i }}">
					<span class="thumb" style="background-image:url('{{ asset($berita->featured) }}')"></span>
					<span>
						<span class="m-chip">{{ $berita->category->title ?? 'Berita' }}</span>
						<h5>{{ \Illuminate\Support\Str::limit(strip_tags($berita->title), 80) }}</h5>
						<span class="m-meta"><span><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($berita->published_at)->diffForHumans() }}</span></span>
					</span>
				</a>
				@endforeach
			</div>
		</div>
	</div>
</section>
@endif
