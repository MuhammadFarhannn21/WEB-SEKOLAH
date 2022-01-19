@extends('frontend.layouts.master')

@section('konten')
<!-- Start Breadcrumbs -->
<section class="breadcrumbs overlay" style="background-image: url({{ asset(\App\Aplikasi::first()->gambar_total_siswa) }})">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>{!! \App\Aplikasi::first()->judul_gallery !!}</h2>
				<ul class="bread-list">
					<li><a href="{{ url('/')}}">Home<i class="fa fa-angle-right"></i></a></li>
					<li class="active"><a href="{{ url('/gallery')}}">Gallery</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!--/ End Breadcrumbs -->

<section class="team-style2 section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h2>{!! \App\Aplikasi::first()->judul_gallery !!}</h2>
					<p>{!! \App\Aplikasi::first()->judul_sub_gallery !!}</p>
				</div>
			</div>
		</div>
		<div class="row">
			@foreach($gallery as $data)
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Single Team -->
				<div class="single-team">
					<div class="image">
						<img style="background-image: url({{ asset($data->gambar)}});width: 100%;height: 200px;background-size: cover;background-position: center center">
						<a href="{{ asset($data->gambar)}}" data-fancybox="photo"><i class="fa fa-search"></i></a>
					</div>
					<!--team-content -->
					<div class="team-content"  style="word-wrap: break-word">
						<h4 class="name">{{$data->nama}}</h4>
						
					</div>
				</div>
				<!--/ End Single Team -->
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection