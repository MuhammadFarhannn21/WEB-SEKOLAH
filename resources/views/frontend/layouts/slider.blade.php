<section class="home-slider">
	<div class="slider-active">
		<!-- Single Slider -->
		@foreach(\App\Banner::where('status','DiTampilkan')->limit(10)->get() as $banner)
		<div class="single-slider overlay" style="background-image:url({{ asset($banner->gambar)}} );">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-12">
						<div class="slider-text {{$banner->posisi}}">
							<h1>{!! $banner->judul !!}</h1>
							<p>{!! $banner->sub_judul !!}</p>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		<!--/ End Single Slider -->
	</div>
</section>