<section class="about-us section" style="margin-top: -30px">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-12">
				<div class="about-text">
					<h2>{{ \App\Timeline::where('status','aktif')->where('posisi',2)->first()->judul }}</h2>
					{!! \App\Timeline::where('status','aktif')->where('posisi',2)->first()->body !!}
					<div class="button">
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-22">
				<div class="single-image overlay">
					<img style="background-image: url({{ asset(\App\Timeline::where('status','aktif')->where('posisi',2)->first()->featured)}});width: 200%;height: 320px;background-position: center center;background-size: cover">
					<a href="{{ \App\Timeline::where('status','aktif')->where('posisi',2)->first()->link_youtube}}" class="btn video-popup mfp-fade"><i class="fa fa-play"></i></a>
				</div>
			</div>
			
		</div>
	</div>
</section>