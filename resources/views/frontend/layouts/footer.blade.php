<footer class="footer overlay section wow fadeIn" style="background-image: url({{ asset(\App\Aplikasi::first()->gambar_footer) }});width: 100%;background-size: cover;background-position: center center">
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<!-- About -->
					<div class="single-widget about">
						<p style="text-align: justify;">{{ \App\Aplikasi::first()->keterangan}}</p>
						<ul class="list">
							<li><i class="fa fa-phone"></i>Telepon: {{ \App\Aplikasi::first()->telepon}} </li>
							<li><i class="fa fa-envelope"></i>Email: <a href="mailto:{{ \App\Aplikasi::first()->email}}">{{ \App\Aplikasi::first()->email}}</a></li>
							<li><i class="fa fa-map-o"></i>Alamat: {{ \App\Aplikasi::first()->alamat}}</li>
						</ul>
					</div>
					<!--/ End About -->
				</div>
				<div class="col-md-2">
					
				</div>
				<div class="col-md-3">
					<!-- Useful Links -->
					<div class="single-widget useful-links">
						<h2>Tautan</h2>
						<ul>
							<li><a href="{{ url('/berita')}}"><i class="fa fa-angle-right"></i>Berita</a></li>
							<li><a href="{{ url('/event')}}"><i class="fa fa-angle-right"></i>Event</a></li>
							<li><a href="{{ url('/forum')}}"><i class="fa fa-angle-right"></i>Forum</a></li>
							<li><a href="{{ url('/gallery')}}"><i class="fa fa-angle-right"></i>Gallery</a></li>
						</ul>
					</div>
					<!--/ End Useful Links -->
				</div>
				<div class="col-md-3">
					<!-- Latest News -->
					<div class="single-widget latest-news">
						<h2>Berita Terbaru</h2>
						<div class="news-inner">
							@foreach(\App\Post::where('jenis','Berita')->where('status',1)->inRandomOrder()->limit(3)->get() as $berita)
							<div class="single-news" style="word-wrap: break-word">
								<img style="background-image: url({{ asset($berita->featured) }});width: 50px;height: 50px;background-size: cover;background-position: center center">
								<h4><a href="{{ url('/berita/'.$berita->slug)}}">{!! substr($berita->title, 0, 30) !!}</a></h4>
								<p>{!! substr($berita->title, 0, 50) !!}</p>
							</div>
							@endforeach
						</div>
					</div>
					<!--/ End Latest News -->
				</div>
				
			</div>
		</div>
	</div>

	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bottom-head">
						<div class="row">
							<div class="col-12">
								<!-- Social -->
								<ul class="social">
									<li><a href="{{ \App\Aplikasi::first()->link_facebook}}"><i class="fa fa-facebook"></i></a></li>
									<li><a href="{{ \App\Aplikasi::first()->link_google}}"><i class="fa fa-google-plus "></i></a></li>
									<li><a href="{{ \App\Aplikasi::first()->link_instagram}}"><i class="fa fa-instagram"></i></a></li>
									<li><a href="{{ \App\Aplikasi::first()->link_youtube}}"><i class="fa fa-youtube"></i></a></li>
								</ul>
								<!-- End Social -->
								<!-- Copyright -->
								<div class="copyright">
									<p>{{ \App\Aplikasi::first()->copyright}}</p>
								</div>
								<!--/ End Copyright -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>