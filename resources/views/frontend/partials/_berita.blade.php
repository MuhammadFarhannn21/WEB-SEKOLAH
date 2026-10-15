{{-- Sidebar halaman berita/acara/forum --}}
<aside class="col-lg-4 col-12 mt-5 mt-lg-0">
	<div class="m-sidebar">
		<div class="m-widget">
			<h5><i class="fa fa-search"></i> Cari Berita</h5>
			<form action="{{ url('/search') }}" method="get" class="m-search-inline">
				<input type="search" name="q" value="{{ request('q') }}" placeholder="Kata kunci..." required aria-label="Kata kunci">
				<button type="submit" aria-label="Cari"><i class="fa fa-search"></i></button>
			</form>
		</div>

		<div class="m-widget">
			<h5><i class="fa fa-folder-open-o"></i> Kategori</h5>
			<ul class="m-cat-list">
				@foreach(\App\Category::withCount(['posts' => fn ($q) => $q->where('jenis', 'Berita')->where('status', 1)])->orderBy('title')->get() as $kategori)
				<li>
					<a href="{{ url('/kategori/'.$kategori->slug) }}" class="{{ request()->is('kategori/'.$kategori->slug) ? 'active' : '' }}">
						<span>{{ $kategori->title }}</span>
						<b>{{ $kategori->posts_count }}</b>
					</a>
				</li>
				@endforeach
			</ul>
		</div>

		@foreach([['Berita', 'berita', 'Berita Terbaru', 'fa-newspaper-o'], ['Acara', 'event', 'Acara Terbaru', 'fa-calendar']] as [$jenis, $prefix, $judul, $ikon])
			@php $items = \App\Post::where('status', 1)->where('jenis', $jenis)->orderBy('id', 'DESC')->limit(4)->get(); @endphp
			@if($items->count())
			<div class="m-widget">
				<h5><i class="fa {{ $ikon }}"></i> {{ $judul }}</h5>
				@foreach($items as $item)
				<a href="{{ url('/'.$prefix.'/'.$item->slug) }}" class="m-mini-post">
					<span class="thumb" @if($item->featured) style="background-image:url('{{ asset($item->featured) }}')" @endif></span>
					<span>
						<strong>{{ \Illuminate\Support\Str::limit(strip_tags($item->title), 60) }}</strong>
						<small><i class="fa fa-calendar-o"></i> {{ \Carbon\Carbon::parse($item->published_at ?? $item->created_at)->translatedFormat('d M Y') }}</small>
					</span>
				</a>
				@endforeach
			</div>
			@endif
		@endforeach

		<div class="m-widget m-widget-cta">
			<i class="fa fa-graduation-cap"></i>
			<h5>Ingin bergabung?</h5>
			<p>Pendaftaran peserta didik baru dilakukan secara online.</p>
			<a href="{{ url('/ppdb') }}" class="m-btn m-btn-accent m-btn-sm">Info PPDB <i class="fa fa-arrow-right"></i></a>
		</div>
	</div>
</aside>
