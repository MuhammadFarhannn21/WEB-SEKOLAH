@extends('frontend.layouts.master')

@section('meta')
<meta name="keywords" content="{{ $post->slug }}">
<meta name="description" content="{{ substr($post->body, 0, 100) }}">
<meta property="og:url"    content="{{ url($_SERVER['REQUEST_URI']) }}" />
<meta property="og:type"   content="article" />
<meta property="og:title"  content="{{ $post->title }}" />
<meta property="og:description" content="{{ substr($post->body, 0, 100) }}" />
<meta property="og:image"  content="{{ asset($post->featured)}}" />
@endsection

@section('konten')
<section class="breadcrumbs overlay" style="background-image: url({{ asset(\App\Aplikasi::first()->gambar_total_siswa) }})">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>{{$post->title}}</h2>
				<ul class="bread-list">
					<li><a href="{{url('/')}}">Home<i class="fa fa-angle-right"></i></a></li>
					<li class="active"><a href="{{ url('/event',$post->slug)}}">{{$post->slug}}</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
	
<section class="blog b-archives single section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="blog-detail">
					<div class="b-gallery">
						<div class="single-image">
							<img src="{{ asset($post->featured)}}" alt="#">
						</div>
						<div class="single-image">
							<img src="{{ asset($post->featured)}}" alt="#">
						</div>
						<div class="single-image">
							<img src="{{ asset($post->featured)}}" alt="#">
						</div>
					</div>
					<div class="detail-content">
						<div class="blog-info">
							<a href="#"><i class="fa fa-user"></i>By: {{$post->user->name}}</a>
							<a href="#"><i class="fa fa-calendar"></i><?php $tanggal=date_create($post->published_at); ?> 
								{{ date_format($tanggal,"d M Y")}}
							<a href="#"><i class="fa fa-archive"></i>{{$post->category->title}}</a>
						</div>
						<h2 class="blog-title" style="margin-top: 20px"><a href="{{ url('/event',$post->slug)}}">{{ $post->title}}</a></h2>
						{!! $post->body!!}
					</div>
					<div class="blog-bottom">
						<ul class="share">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						</ul>
						<!-- Next Prev -->
						<ul class="prev-next">
							<li class="prev"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
							<li class="next"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
						</ul>
						<!--/ End Next Prev -->
					</div>
					<div class="comment-main">
						<div class="comment-title">
							<h2 class=" text-primary">Komentar</h2>
						</div>
						<!-- Form -->
						<!-- Form -->
						<div id="disqus_thread"></div>
						<script>

						/**
						*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
						*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
						/*
						var disqus_config = function () {
						this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
						this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
						};
						*/
						(function() { // DON'T EDIT BELOW THIS LINE
						var d = document, s = d.createElement('script');
						s.src = 'https://smk-kosgoro.disqus.com/embed.js';
						s.setAttribute('data-timestamp', +new Date());
						(d.head || d.body).appendChild(s);
						})();
						</script>
						<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
						<!--/ End Form -->
					</div>
				</div>
			</div>
			@include('frontend.partials._berita')
		</div>
	</div>
</section>

@endsection