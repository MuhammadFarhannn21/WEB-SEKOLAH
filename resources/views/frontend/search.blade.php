@extends('frontend.layouts.master')
@section('title', 'Pencarian')

@section('konten')
@include('frontend.partials.page-hero', [
	'title' => $judul ? 'Hasil pencarian "'.$judul.'"' : 'Pencarian',
	'eyebrow' => 'Pencarian', 'icon' => 'fa-search',
	'subtitle' => count($post).' hasil ditemukan.',
	'crumbs' => ['Pencarian' => null],
])

<section class="m-section m-section-soft m-page-body">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<form action="{{ url('/search') }}" method="get" class="m-search-big reveal">
					<i class="fa fa-search"></i>
					<input type="search" name="q" value="{{ $judul }}" placeholder="Cari berita, pengumuman, kegiatan…" required aria-label="Kata kunci">
					<button type="submit" class="m-btn m-btn-primary m-btn-sm">Cari</button>
				</form>
				@if(count($post) > 0)
				<div class="m-grid m-grid-2">
					@foreach($post as $p)
						<div class="reveal">@include('frontend.partials.post-card', ['p' => $p])</div>
					@endforeach
				</div>
				@else
					@include('frontend.partials.empty', ['icon' => 'fa-search', 'title' => 'Tidak ada hasil', 'text' => 'Coba gunakan kata kunci lain yang lebih umum.', 'action' => url('/berita'), 'actionLabel' => 'Lihat Semua Berita'])
				@endif
			</div>
			@include('frontend.partials._berita')
		</div>
	</div>
</section>
@endsection
