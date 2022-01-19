<section class="team section" style="margin-top: -80px">
	<div class="container">
		<div class="row">
			<div class="col-12 wow zoomIn">
				<div class="section-title">
					<h2>{!! \App\Aplikasi::first()->judul_guru !!}</h2>
					<p>{!! \App\Aplikasi::first()->judul_sub_guru !!}</p>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			@foreach(\App\GuruTerbaik::where('status','aktif')->limit(8)->get() as $guru)
			<div class="col-lg-3 col-md-6 col-12 wow fadeIn" data-wow-delay="0.4s">
				<!-- Single Team -->
				<div class="single-team">
					<img style="background-image: url({{ asset($guru->gambar) }});width: 100%;height: 330px;background-size: cover;background-position: center center">
					<div class="team-hover">
						<h4>{{$guru->nama}}<span>{{$guru->mata_pelajaran}}</span></h4>
						<p>{{$guru->pesan}}</p>
						
					</div>
				</div>
				<!--/ End Single Team -->
			</div>
			@endforeach

		</div>
	</div>
</section>