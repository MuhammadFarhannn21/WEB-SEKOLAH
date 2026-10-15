@extends('frontend.layouts.master')
@section('title', $category->title)

@section('konten')
@include('frontend.partials.page-hero', [
	'title' => $category->title,
	'eyebrow' => 'Kategori', 'icon' => 'fa-folder-open-o',
	'subtitle' => 'Kumpulan berita dalam kategori '.$category->title.'.',
	'crumbs' => ['Berita' => url('/berita'), $category->title => null],
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
					@include('frontend.partials.empty', ['icon' => 'fa-folder-open-o', 'title' => 'Belum ada berita di kategori ini', 'action' => url('/berita'), 'actionLabel' => 'Semua Berita'])
				@endif
			</div>
			@include('frontend.partials._berita')
		</div>
	</div>
</section>
@endsection
