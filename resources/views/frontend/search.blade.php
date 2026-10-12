@extends('frontend.layouts.master')

@section('konten')
<!-- Start Breadcrumbs -->
<section class="breadcrumbs overlay" style="background-image: url({{ asset(\App\Aplikasi::first()->gambar_total_siswa) }})">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>{{$judul}}</h2>
				<ul class="bread-list">
					<li><a href="{{ url('/')}}">Home</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!--/ End Breadcrumbs -->

<!-- Blogs -->
<section class="blog b-archives section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="row">
					@if(count($post) > 0)
					@foreach($post as $berita)
					<div class="col-lg-6 col-12">
						<!-- Single Blog -->
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
									<a href="#"><i class="fa fa-user"></i>By: {!! substr($berita->user->name ?? 'Admin', 0, 20) !!}</a>
									<a href="#"><i class="fa fa-archive"></i>{!! substr($berita->category->title, 0, 20) !!}</a>
									{{-- <a href="#"><i class="fa fa-heart-o"></i>53K</a> --}}
								</div>
								<p>{!! substr($berita->body, 0, 100) !!}.....</p>
								<div class="button">
									<a href="{{ url('/berita/' . $berita->slug) }}" class="btn">Lihat<i class="fa fa-angle-double-right"></i></a>
								</div>
							</div>
						</div>
						<!-- End Single Blog -->
					</div>
					@endforeach
					
					@endif
				</div>
				
			</div>
			@include('frontend.partials._berita')
		</div>
	</div>
</section>
<!--/ End Blogs -->

@endsection