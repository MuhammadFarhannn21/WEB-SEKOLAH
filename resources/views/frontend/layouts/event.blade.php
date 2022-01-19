<section class="events section">
	<div class="container">
		<div class="row">
			<div class="col-12 wow zoomIn">
				<div class="section-title">
					<h2>{!! \App\Aplikasi::first()->judul_event !!}</h2>
					<p>{!! \App\Aplikasi::first()->judul_sub_event !!} <a href="{{ url('/event')}}">Lihat Semua</a></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="event-slider">
					@foreach(\App\Post::where('jenis','Acara')->where('status',1)->limit(6)->orderBy('id','DESC')->get() as $berita)
						<div class="single-event">
							<div class="head overlay">
								<img style="background-image: url({{ asset($berita->featured) }});width: 100%;height: 230px;background-size: cover;background-position: center center">
								<a href="{{ asset($berita->featured) }}" data-fancybox="photo" class="btn"><i class="fa fa-search"></i></a>
							</div>
							<div class="event-content" style="word-wrap: break-word;height: 250px">
								<div class="meta"> 
									<?php $tanggal=date_create($berita->published_at); ?> 
								
									<span><i class="fa fa-calendar"></i>{{ date_format($tanggal,"d M Y")}}</span>
									{{-- <span><i class="fa fa-clock-o"></i>12.00-5.00PM</span> --}}
								</div>
								<h4><a href="{{url('/event/'.$berita->slug)}}"> {!! substr($berita->title, 0, 30) !!}</a></h4>
								<p>{!! substr($berita->body, 0, 100) !!}</p>
								<div class="button">
									<a href="{{url('/event/'.$berita->slug)}}" class="btn">Lihat</a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>