<!DOCTYPE html>
<html class="no-js" lang="id">
	<head>
		@include('frontend.layouts.style')
		@yield('assets-header')
	</head>
	<body>
		<a href="#main" class="sr-only sr-only-focusable">Lewati ke konten</a>
		<div class="m-progress" aria-hidden="true"><span></span></div>
		@include('frontend.layouts.preloader')
		@include('frontend.layouts.header')
		<main id="main">
			@yield('konten')
		</main>
		@include('frontend.layouts.footer')

		{{-- Tombol melayang: WhatsApp + kembali ke atas --}}
		<div class="m-fab">
			<button type="button" class="top" aria-label="Kembali ke atas"><i class="fa fa-arrow-up"></i></button>
			@if($site->telepon)
			<a class="wa" href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $site->telepon)) }}" target="_blank" rel="noopener" aria-label="Chat WhatsApp">
				<i class="fa fa-whatsapp"></i><span class="wa-label">Ada pertanyaan? Chat kami</span>
			</a>
			@endif
		</div>

		@include('frontend.layouts.script')
		@yield('assets-bottom')
	</body>
</html>
