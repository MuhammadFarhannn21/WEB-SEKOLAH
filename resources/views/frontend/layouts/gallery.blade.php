<section class="events section">
	<div class="container">
		<div class="row">
			<div class="col-12 wow zoomIn">
				<div class="section-title">
					<h2>{!! \App\Aplikasi::first()->judul_gallery !!}</h2>
					<p>{!! \App\Aplikasi::first()->judul_sub_gallery !!} <a href="{{ url('/gallery') }}">Lihat Semua</a></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="event-slider">
					@foreach(\App\Gallery::where('status','aktif')->orderBy('id','DESC')->limit(6)->get() as $gallery)
					<div class="single-event">
						<div class="head overlay">
							<img style="background-image: url({{ asset($gallery->gambar) }});width: 100%;height: 230px;background-size: cover;background-position: center center">
							<a href="{{ asset($gallery->gambar)}}" title="{{$gallery->nama}}" data-fancybox="photo" class="btn"><i class="fa fa-search"></i></a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>