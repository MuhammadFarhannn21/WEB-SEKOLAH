<section class="testimonials overlay section" data-stellar-background-ratio="0.5" style="background-image: url({{ asset(\App\Aplikasi::first()->gambar_slider) }});width: 100%;background-size: cover;background-position: center center">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="testimonial-slider">
					<!-- Single Testimonial -->
					@foreach(\App\KalimatBijak::limit(20)->orderBy('id','DESC')->get() as $kata)
					<div class="single-testimonial">
						<img src="{{ asset($kata->gambar)}}" alt="#">
						<div class="main-content" style="height:  110px">
							<h4 class="name">{{$kata->nama}}</h4>
							<p>{!! substr($kata->kalimat, 0, 150) !!}</p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>