@php $ekskul_list = \App\Ekstrakurikuler::where('status', 'aktif')->get(); @endphp

@if($ekskul_list->count() > 0)
<section class="m-section">
	<div class="container">
		<div class="m-head reveal">
			<div>
				<span class="m-eyebrow" style="background:rgba(18,163,127,.1); color:var(--success);"><i class="fa fa-star"></i> Ekstrakurikuler</span>
				<h2 class="m-title">Kembangkan Bakat & Minat</h2>
				<p class="m-sub">Beragam kegiatan ekstrakurikuler untuk membentuk karakter, kreativitas, dan prestasi siswa.</p>
			</div>
			<div style="display:flex; gap:12px; align-items:center;">
				<div class="m-carousel-nav">
					<button type="button" data-prev="ekskulCarousel" aria-label="Sebelumnya"><i class="fa fa-angle-left"></i></button>
					<button type="button" data-next="ekskulCarousel" aria-label="Berikutnya"><i class="fa fa-angle-right"></i></button>
				</div>
				<a href="{{ url('/ekstrakurikuler') }}" class="m-btn m-btn-outline">Semua <i class="fa fa-arrow-right"></i></a>
			</div>
		</div>

		<div class="m-carousel reveal" id="ekskulCarousel" data-carousel>
			<div class="m-track">
				@foreach($ekskul_list as $item)
				<a href="{{ url('ekstrakurikuler/'.$item->id) }}" class="m-card">
					<div class="m-card-media" style="background:linear-gradient(135deg,#0f6e56,#1a73e8);">
						@if($item->foto)
							<span class="img" style="background-image:url('{{ asset($item->foto) }}')"></span>
						@else
							<span class="m-ph"><i class="fa fa-star"></i></span>
						@endif
						<span class="m-chip" style="background:var(--success);">Ekskul</span>
					</div>
					<div class="m-card-body">
						<h4>{{ $item->nama }}</h4>
						@if($item->pembina)<div class="m-meta" style="margin:0 0 10px;"><span><i class="fa fa-user" style="color:var(--success)"></i>Pembina: {{ $item->pembina }}</span></div>@endif
						@if($item->deskripsi)<p>{{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 100) }}</p>@endif
						<span class="m-link" style="color:var(--success)">Lihat detail <i class="fa fa-arrow-right"></i></span>
					</div>
				</a>
				@endforeach
			</div>
		</div>
	</div>
</section>
@endif
