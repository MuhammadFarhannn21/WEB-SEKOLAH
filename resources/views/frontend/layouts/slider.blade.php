@php $banners = \App\Banner::where('status', 'DiTampilkan')->limit(10)->get(); @endphp
<section class="home-slider" aria-label="Sorotan sekolah">
	<div class="slider-active">
		@forelse($banners as $banner)
		@php
			$pos = (string) $banner->posisi;
			$col = str_contains($pos, 'center') ? 'col-lg-8 offset-lg-2' : (str_contains($pos, 'right') ? 'col-lg-8 offset-lg-4' : 'col-lg-8 col-md-10');
		@endphp
		<div class="single-slider overlay" style="background-image:url('{{ asset($banner->gambar) }}');">
			<div class="container">
				<div class="row">
					<div class="{{ $col }} col-12">
						<div class="slider-text {{ $pos }}">
							<span class="m-hero-badge"><span class="dot"></span> {{ $site->nama }}</span>
							<h1>{!! $banner->judul !!}</h1>
							<p>{!! $banner->sub_judul !!}</p>
							<div class="m-hero-cta">
								<a href="{{ url('ppdb') }}" class="m-btn m-btn-accent"><i class="fa fa-pencil-square-o"></i> Daftar PPDB</a>
								<a href="#akses-cepat" class="m-btn m-btn-ghost">Jelajahi Sekolah <i class="fa fa-arrow-down"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@empty
		<div class="single-slider overlay" style="background-image:url('{{ asset($site->gambar_slider) }}');">
			<div class="container">
				<div class="slider-text">
					<span class="m-hero-badge"><span class="dot"></span> Selamat Datang</span>
					<h1>{{ $site->nama }}</h1>
					<div class="m-hero-cta">
						<a href="{{ url('ppdb') }}" class="m-btn m-btn-accent"><i class="fa fa-pencil-square-o"></i> Daftar PPDB</a>
					</div>
				</div>
			</div>
		</div>
		@endforelse
	</div>
	<a href="#akses-cepat" class="m-scroll-hint d-none d-md-block" aria-label="Gulir ke bawah"><i class="fa fa-angle-double-down"></i></a>
</section>
