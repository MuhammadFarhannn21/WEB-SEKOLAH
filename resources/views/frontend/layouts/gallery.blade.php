@php $galleries = \App\Gallery::where('status', 'aktif')->orderBy('id', 'DESC')->limit(9)->get(); @endphp

@if($galleries->count() > 0)
<section class="m-section m-section-dark">
	<div class="container">
		<div class="m-head reveal">
			<div>
				<span class="m-eyebrow"><i class="fa fa-camera"></i> Galeri</span>
				<h2 class="m-title">Momen di Sekolah</h2>
				<p class="m-sub">Dokumentasi kegiatan dan aktivitas siswa. Klik foto untuk memperbesar.</p>
			</div>
			<div style="display:flex; gap:12px; align-items:center;">
				<div class="m-carousel-nav">
					<button type="button" data-prev="galleryCarousel" aria-label="Sebelumnya"><i class="fa fa-angle-left"></i></button>
					<button type="button" data-next="galleryCarousel" aria-label="Berikutnya"><i class="fa fa-angle-right"></i></button>
				</div>
				<a href="{{ url('/gallery') }}" class="m-btn m-btn-accent">Semua Foto <i class="fa fa-arrow-right"></i></a>
			</div>
		</div>

		<div class="m-carousel reveal" id="galleryCarousel" data-carousel>
			<div class="m-track">
				@foreach($galleries as $gallery)
				<a href="{{ asset($gallery->gambar) }}" data-fancybox="home-gallery" data-caption="{{ $gallery->nama }}" class="m-tile">
					<span class="img" style="background-image:url('{{ asset($gallery->gambar) }}')"></span>
					<span class="cap"><span>{{ \Illuminate\Support\Str::limit($gallery->nama, 40) }}</span><i class="fa fa-expand"></i></span>
				</a>
				@endforeach
			</div>
		</div>
	</div>
</section>
@endif
