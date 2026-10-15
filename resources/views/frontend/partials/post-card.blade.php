{{-- Kartu post (berita/acara/forum/halaman). Parameter: $p (App\Post) --}}
@php
	$prefix = ['Berita' => 'berita', 'Acara' => 'event', 'forum' => 'forum', 'Pages' => 'page'][$p->jenis] ?? 'berita';
	$tgl = $p->published_at ? \Carbon\Carbon::parse($p->published_at) : $p->created_at;
@endphp
<a href="{{ url($prefix.'/'.$p->slug) }}" class="m-card m-post-card">
	<div class="m-card-media">
		@if($p->featured)
			<span class="img" style="background-image:url('{{ asset($p->featured) }}')"></span>
		@else
			<span class="m-ph"><i class="fa fa-newspaper-o"></i></span>
		@endif
		<span class="m-chip">{{ $p->category->title ?? ($p->jenis === 'Acara' ? 'Acara' : 'Berita') }}</span>
		@if($tgl)
		<span class="m-date-badge"><b>{{ $tgl->format('d') }}</b>{{ $tgl->translatedFormat('M Y') }}</span>
		@endif
	</div>
	<div class="m-card-body">
		<h4>{{ strip_tags($p->title) }}</h4>
		<p>{{ \Illuminate\Support\Str::limit(trim(html_entity_decode(strip_tags($p->body))), 120) }}</p>
		<div class="m-card-foot">
			<span class="m-meta">
				<span><i class="fa fa-user-o"></i>{{ \Illuminate\Support\Str::limit($p->user->name ?? 'Admin', 18) }}</span>
				@if($p->jam_event)<span><i class="fa fa-clock-o"></i>{{ $p->jam_event }}</span>@endif
			</span>
			<span class="m-link">Baca <i class="fa fa-arrow-right"></i></span>
		</div>
	</div>
</a>
