@extends('frontend.layouts.master')
@section('title', 'Kegiatan')

@section('konten')
@include('frontend.partials.page-hero', [
	'title' => 'Kegiatan & Acara',
	'eyebrow' => 'Agenda Acara', 'icon' => 'fa-calendar',
	'subtitle' => 'Dokumentasi acara dan kegiatan yang diselenggarakan '.$site->nama.'.',
	'crumbs' => ['Kegiatan' => null],
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
					@include('frontend.partials.empty', ['icon' => 'fa-calendar', 'title' => 'Belum ada kegiatan', 'text' => 'Kegiatan dan acara sekolah akan tampil di sini.', 'action' => url('/agenda'), 'actionLabel' => 'Lihat Agenda'])
				@endif
			</div>
			@include('frontend.partials._berita')
		</div>
	</div>
</section>
@endsection
