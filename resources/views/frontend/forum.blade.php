@extends('frontend.layouts.master')
@section('title', 'Forum')

@section('konten')
@include('frontend.partials.page-hero', [
	'title' => 'Forum Diskusi',
	'eyebrow' => 'Forum', 'icon' => 'fa-comments-o',
	'subtitle' => 'Ruang berbagi informasi dan diskusi warga '.$site->nama.'.',
	'crumbs' => ['Forum' => null],
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
					@include('frontend.partials.empty', ['icon' => 'fa-comments-o', 'title' => 'Belum ada topik forum', 'text' => 'Topik diskusi akan tampil di sini.'])
				@endif
			</div>
			@include('frontend.partials._berita')
		</div>
	</div>
</section>
@endsection
