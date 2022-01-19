<section class="about-us section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-12">
				<div class="single-image overlay">
					<img style="background-image: url({{ asset(\App\Timeline::where('status','aktif')->where('posisi',1)->first()->featured)}});width: 100%;height: 320px;background-position: center center;background-size: cover">
					<a href="{{ \App\Timeline::where('status','aktif')->where('posisi',1)->first()->link_youtube}}" class="btn video-popup mfp-fade"><i class="fa fa-play"></i></a>
				</div>
			</div>
			<div class="col-lg-6 col-12">
				<div class="about-text">
					<h2>{{ \App\Timeline::where('status','aktif')->where('posisi',1)->first()->judul }}</h2>
					{!! \App\Timeline::where('status','aktif')->where('posisi',1)->first()->body !!}
					<div class="button">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>