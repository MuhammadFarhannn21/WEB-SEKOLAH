{{--
	Detail fasilitas / ekstrakurikuler.
	Parameter: $item, $others, $prefix, $label, $icon
--}}
<section class="m-section m-section-soft m-page-body">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<article class="m-article">
					<figure class="m-article-cover {{ $item->foto ? '' : 'is-empty' }}">
						@if($item->foto)
							<a href="{{ asset($item->foto) }}" data-fancybox="{{ $prefix }}"><img src="{{ asset($item->foto) }}" alt="{{ $item->nama }}" onerror="var f=this.closest('figure');f.classList.add('is-empty');f.innerHTML='<i class=&quot;fa {{ $icon }}&quot;></i>'"></a>
						@else
							<i class="fa {{ $icon }}"></i>
						@endif
					</figure>

					@if(!empty($item->pembina))
					<div class="m-info-row">
						<span class="m-info-pill"><i class="fa fa-user-o"></i> Pembina: <b>{{ $item->pembina }}</b></span>
					</div>
					@endif

					<div class="m-prose">
						@if($item->deskripsi)
							{!! nl2br(e($item->deskripsi)) !!}
						@else
							<p class="text-muted"><em>Deskripsi {{ strtolower($label) }} ini belum tersedia.</em></p>
						@endif
					</div>

					<div class="m-article-actions">
						<a href="{{ url($prefix) }}" class="m-btn m-btn-outline"><i class="fa fa-arrow-left"></i> Semua {{ $label }}</a>
						<a href="{{ url('/ppdb') }}" class="m-btn m-btn-primary">Daftar Sekarang <i class="fa fa-arrow-right"></i></a>
					</div>
				</article>
			</div>

			<aside class="col-lg-4 col-12 mt-5 mt-lg-0">
				<div class="m-sidebar">
					<div class="m-widget">
						<h5><i class="fa {{ $icon }}"></i> {{ $label }} Lainnya</h5>
						@forelse($others as $lain)
						<a href="{{ url($prefix.'/'.$lain->id) }}" class="m-mini-post">
							<span class="thumb" @if($lain->foto) style="background-image:url('{{ asset($lain->foto) }}')" @endif>@unless($lain->foto)<i class="fa {{ $icon }}"></i>@endunless</span>
							<span>
								<strong>{{ $lain->nama }}</strong>
								@if($lain->deskripsi)<small>{{ \Illuminate\Support\Str::limit($lain->deskripsi, 50) }}</small>@endif
							</span>
						</a>
						@empty
						<p class="m-widget-empty">Belum ada {{ strtolower($label) }} lainnya.</p>
						@endforelse
					</div>
					<div class="m-widget m-widget-cta">
						<i class="fa fa-graduation-cap"></i>
						<h5>Tertarik bergabung?</h5>
						<p>Nikmati fasilitas dan kegiatan sekolah dengan mendaftar sebagai peserta didik baru.</p>
						<a href="{{ url('/ppdb') }}" class="m-btn m-btn-accent m-btn-sm">Info PPDB <i class="fa fa-arrow-right"></i></a>
					</div>
				</div>
			</aside>
		</div>
	</div>
</section>
