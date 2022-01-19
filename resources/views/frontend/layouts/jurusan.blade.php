<section class="our-features section">
	<div class="container">
		<div class="row">
			<div class="col-12 wow zoomIn">
				<div class="section-title">
					<h2>{!! \App\Aplikasi::first()->judul_jurusan !!}</h2>
					<p>{!! \App\Aplikasi::first()->judul_sub_jurusan !!}</p>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			@foreach(\App\Jurusan::all() as $jurusan)
			<div class="col-lg-4 col-md-4 col-12 wow fadeInUp">
				<!-- Single Feature -->
				<div class="single-feature">
					<div class="feature-head">
						<a href="#"><img style="width: 100%;height: 250px;background-image: url({{ asset($jurusan->gambar)}});background-size: cover;background-position: center center"></a>
					</div>
					<h2><a href="#">{{$jurusan->judul}}</a></h2>
					<p>{{$jurusan->sub_judul}}</p>	
				</div>
				<!--/ End Single Feature -->
			</div>
			@endforeach
		</div>
	</div>
</section>