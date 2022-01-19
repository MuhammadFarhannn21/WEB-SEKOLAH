<section class="blog section"  style="margin-top: -70px">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h2>{!! \App\Aplikasi::first()->judul_berita !!}</h2>
					<p>{!! \App\Aplikasi::first()->judul_sub_berita !!} <a href="{{ url('/berita')}}">Lihat Semua</a></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="blog-slider">
					@foreach(\App\Post::where('jenis','Berita')->where('status',1)->limit(6)->orderBy('id','DESC')->get() as $berita)
					<div class="single-blog">
						<div class="blog-head overlay">
							<div class="date">
								<?php $tanggal=date_create($berita->published_at); ?> 
								<h4>{{ date_format($tanggal,"d")}}<span>{{ date_format($tanggal,"M")}}</span></h4>
							</div>
							<img style="background-image: url({{ asset($berita->featured) }});width: 100%;height: 230px;background-size: cover;background-position: center center">
						</div>
						<div class="blog-content"  style="word-wrap: break-word;height: 250px">
							<h4 class="blog-title"><a href="{{ url('/berita/' . $berita->slug) }}"> {!! substr($berita->title, 0, 30) !!}..</a></h4>
							<div class="blog-info">
								<a href="#"><i class="fa fa-user"></i>By: {!! substr($berita->user->name, 0, 20) !!}</a>
								<a href="#"><i class="fa fa-archive"></i>{!! substr($berita->category->title, 0, 20) !!}</a>
								{{-- <a href="#"><i class="fa fa-heart-o"></i>53K</a> --}}
							</div>
							<p>{!! substr($berita->body, 0, 100) !!}.....</p>
							<div class="button">
								<a href="{{ url('/berita/' . $berita->slug) }}" class="btn">Lihat<i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>