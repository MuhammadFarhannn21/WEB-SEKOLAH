@php $fasilitas_list = \App\Fasilitas::where('status', 'aktif')->get(); @endphp

@if($fasilitas_list->count() > 0)
<section class="m-section m-section-soft">
	<div class="container">
		<div class="m-head reveal">
			<div>
				<span class="m-eyebrow"><i class="fa fa-building-o"></i> Fasilitas</span>
				<h2 class="m-title">Fasilitas Sekolah</h2>
				<p class="m-sub">Sarana lengkap untuk mendukung kegiatan belajar dan praktik siswa.</p>
			</div>
			<div style="display:flex; gap:12px; align-items:center;">
				<div class="m-carousel-nav">
					<button type="button" data-prev="fasilitasCarousel" aria-label="Sebelumnya"><i class="fa fa-angle-left"></i></button>
					<button type="button" data-next="fasilitasCarousel" aria-label="Berikutnya"><i class="fa fa-angle-right"></i></button>
				</div>
				<a href="{{ url('/fasilitas') }}" class="m-btn m-btn-outline">Semua <i class="fa fa-arrow-right"></i></a>
			</div>
		</div>

		<div class="m-carousel reveal" id="fasilitasCarousel" data-carousel>
			<div class="m-track">
				@foreach($fasilitas_list as $item)
				<a href="{{ url('fasilitas/'.$item->id) }}" class="m-card">
					<div class="m-card-media">
						@if($item->foto)
							<span class="img" style="background-image:url('{{ asset($item->foto) }}')"></span>
						@else
							<span class="m-ph"><i class="fa fa-building"></i></span>
						@endif
						<span class="m-chip">Fasilitas</span>
					</div>
					<div class="m-card-body">
						<h4>{{ $item->nama }}</h4>
						@if($item->deskripsi)<p>{{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 110) }}</p>@endif
						<span class="m-link">Lihat detail <i class="fa fa-arrow-right"></i></span>
					</div>
				</a>
				@endforeach
			</div>
		</div>
	</div>
</section>
@endif
