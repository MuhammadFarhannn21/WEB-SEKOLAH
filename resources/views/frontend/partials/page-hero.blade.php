{{--
	Header seragam untuk halaman dalam.
	Parameter: title (wajib), subtitle, eyebrow, icon (kelas font-awesome),
	crumbs (array [label => url|null]), image (path latar), aside (HTML kanan, opsional)
--}}
@php
	$heroImage = $image ?? ($site->gambar_total_siswa ?? null);
	$crumbs = $crumbs ?? [];
@endphp
<section class="m-page-hero {{ isset($aside) ? 'has-aside' : '' }}">
	@if($heroImage)
	<span class="m-page-hero-bg" style="background-image:url('{{ asset($heroImage) }}')"></span>
	@endif
	<span class="m-page-hero-shape s1"></span>
	<span class="m-page-hero-shape s2"></span>
	<div class="container">
		<div class="m-page-hero-inner">
			<div class="m-page-hero-text">
				<nav class="m-crumbs" aria-label="Breadcrumb">
					<a href="{{ url('/') }}"><i class="fa fa-home"></i> Beranda</a>
					@foreach($crumbs as $label => $href)
						<i class="fa fa-angle-right"></i>
						@if($href)<a href="{{ $href }}">{{ $label }}</a>@else<span>{{ $label }}</span>@endif
					@endforeach
				</nav>
				@if(!empty($eyebrow))
				<span class="m-page-hero-eyebrow">@if(!empty($icon))<i class="fa {{ $icon }}"></i>@endif {{ $eyebrow }}</span>
				@endif
				<h1>{{ $title }}</h1>
				@if(!empty($subtitle))<p>{{ $subtitle }}</p>@endif
				@if(!empty($meta))<div class="m-page-hero-meta">{!! $meta !!}</div>@endif
			</div>
			@isset($aside)
			<div class="m-page-hero-aside">{!! $aside !!}</div>
			@endisset
		</div>
	</div>
</section>
