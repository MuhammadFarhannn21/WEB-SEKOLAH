@extends('frontend.layouts.master')
@section('title', 'Berita')

@section('konten')
@include('frontend.partials.page-hero', [
	'title' => 'Berita Terkini',
	'eyebrow' => 'Kabar Sekolah', 'icon' => 'fa-newspaper-o',
	'subtitle' => 'Informasi, pengumuman, dan cerita kegiatan terbaru dari '.$site->nama.'.',
	'crumbs' => ['Berita' => null],
])

<section class="m-section m-section-soft m-page-body">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				@if($post->count())
				<div class="m-grid m-grid-2">
					@foreach($post as $p)
						<div class="reveal">@include('frontend.partials.post-card', ['p' => $p])</div>
					@endforeach
				</div>
				<div class="m-pagination">{{ $post->links('vendor.pagination.bootstrap-4') }}</div>
				@else
					@include('frontend.partials.empty', ['icon' => 'fa-newspaper-o', 'title' => 'Belum ada berita', 'text' => 'Berita terbaru akan tampil di sini.'])
				@endif
			</div>
			@include('frontend.partials._berita')
		</div>
	</div>
</section>
@endsection
