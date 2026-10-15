@extends('frontend.layouts.master')
@section('title', 'Galeri')

@section('konten')
@include('frontend.partials.page-hero', [
	'title' => strip_tags($site->judul_gallery) ?: 'Galeri Sekolah',
	'eyebrow' => 'Galeri Foto', 'icon' => 'fa-camera',
	'subtitle' => strip_tags($site->judul_sub_gallery) ?: 'Dokumentasi kegiatan dan momen berharga di sekolah.',
	'crumbs' => ['Galeri' => null],
])

<section class="m-section m-section-soft m-page-body">
	<div class="container">
		@if($gallery->count())
		<div class="m-gallery">
			@foreach($gallery as $i => $data)
			<a href="{{ asset($data->gambar) }}" data-fancybox="galeri" data-caption="{{ $data->nama }}" class="m-tile reveal reveal-d{{ $i % 4 + 1 }}">
				<span class="img" style="background-image:url('{{ asset($data->gambar) }}')"></span>
				<span class="cap"><span>{{ $data->nama }}</span><i class="fa fa-expand"></i></span>
			</a>
			@endforeach
		</div>
		<div class="m-pagination">{{ $gallery->links('vendor.pagination.bootstrap-4') }}</div>
		@else
			@include('frontend.partials.empty', ['icon' => 'fa-camera', 'title' => 'Belum ada foto', 'text' => 'Foto kegiatan akan tampil di sini.'])
		@endif
	</div>
</section>
@endsection
