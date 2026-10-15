{{--
	Halaman detail post (berita/acara/forum).
	Parameter: $post, $prefix (berita|event|forum), $listLabel (mis. 'Berita'), $listUrl
--}}
@php
	$tgl = \Carbon\Carbon::parse($post->published_at ?? $post->created_at);
	$plain = trim(html_entity_decode(strip_tags($post->body)));
	$menit = max(1, (int) ceil(str_word_count($plain) / 200));
	$sebelum = \App\Post::where('jenis', $post->jenis)->where('status', 1)->where('id', '<', $post->id)->orderBy('id', 'DESC')->first();
	$sesudah = \App\Post::where('jenis', $post->jenis)->where('status', 1)->where('id', '>', $post->id)->orderBy('id', 'ASC')->first();
	$terkait = \App\Post::where('jenis', $post->jenis)->where('status', 1)->where('id', '!=', $post->id)
		->when($post->category_id, fn ($q) => $q->orderByRaw('category_id = ? DESC', [$post->category_id]))
		->orderBy('id', 'DESC')->limit(2)->get();
	$shareUrl = url()->current();
@endphp

@include('frontend.partials.page-hero', [
	'title' => $post->title,
	'eyebrow' => $post->category->title ?? $listLabel,
	'icon' => 'fa-bookmark-o',
	'image' => $post->featured ?: null,
	'crumbs' => [$listLabel => $listUrl, \Illuminate\Support\Str::limit($post->title, 40) => null],
	'meta' => '<span><i class="fa fa-calendar-o"></i> '.e($tgl->translatedFormat('l, d F Y')).'</span>'
		.'<span><i class="fa fa-user-o"></i> '.e($post->user->name ?? 'Admin').'</span>'
		.($post->jam_event ? '<span><i class="fa fa-clock-o"></i> '.e($post->jam_event).'</span>' : '')
		.'<span><i class="fa fa-book"></i> '.$menit.' menit baca</span>',
])

<section class="m-section m-section-soft m-page-body">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<article class="m-article">
					@if($post->featured)
					<figure class="m-article-cover">
						<a href="{{ asset($post->featured) }}" data-fancybox="artikel"><img src="{{ asset($post->featured) }}" alt="{{ $post->title }}" onerror="this.closest('figure').remove()"></a>
					</figure>
					@endif

					<div class="m-prose">
						{!! $post->body !!}
					</div>

					<div class="m-share">
						<span>Bagikan:</span>
						<a class="fb" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}" target="_blank" rel="noopener" aria-label="Bagikan ke Facebook"><i class="fa fa-facebook"></i></a>
						<a class="tw" href="https://twitter.com/intent/tweet?url={{ urlencode($shareUrl) }}&text={{ urlencode($post->title) }}" target="_blank" rel="noopener" aria-label="Bagikan ke X/Twitter"><i class="fa fa-twitter"></i></a>
						<a class="wa" href="https://wa.me/?text={{ urlencode($post->title.' '.$shareUrl) }}" target="_blank" rel="noopener" aria-label="Bagikan ke WhatsApp"><i class="fa fa-whatsapp"></i></a>
						<button type="button" class="cp" data-copy="{{ $shareUrl }}" aria-label="Salin tautan"><i class="fa fa-link"></i> <em>Salin tautan</em></button>
					</div>

					@if($sebelum || $sesudah)
					<nav class="m-prevnext" aria-label="Navigasi artikel">
						@if($sebelum)
						<a href="{{ url($prefix.'/'.$sebelum->slug) }}" class="prev">
							<i class="fa fa-arrow-left"></i>
							<span><small>Sebelumnya</small><strong>{{ \Illuminate\Support\Str::limit($sebelum->title, 60) }}</strong></span>
						</a>
						@else <span></span> @endif
						@if($sesudah)
						<a href="{{ url($prefix.'/'.$sesudah->slug) }}" class="next">
							<span><small>Selanjutnya</small><strong>{{ \Illuminate\Support\Str::limit($sesudah->title, 60) }}</strong></span>
							<i class="fa fa-arrow-right"></i>
						</a>
						@endif
					</nav>
					@endif
				</article>

				@if($terkait->count())
				<div class="m-related">
					<h3 class="m-block-title"><i class="fa fa-th-large"></i> Baca Juga</h3>
					<div class="m-grid m-grid-2">
						@foreach($terkait as $p)
							@include('frontend.partials.post-card', ['p' => $p])
						@endforeach
					</div>
				</div>
				@endif

				<div class="m-article m-comments">
					<h3 class="m-block-title"><i class="fa fa-comments-o"></i> Komentar</h3>
					<div id="disqus_thread"></div>
					<script>
					(function () {
						var d = document, s = d.createElement('script');
						s.src = 'https://smk-kosgoro.disqus.com/embed.js';
						s.setAttribute('data-timestamp', +new Date());
						(d.head || d.body).appendChild(s);
					})();
					</script>
					<noscript>Aktifkan JavaScript untuk melihat komentar.</noscript>
				</div>
			</div>

			@include('frontend.partials._berita')
		</div>
	</div>
</section>
