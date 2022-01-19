<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
	@include('frontend.layouts.style')	
</head>
<body>

	@include('frontend.layouts.preloader')	

	<!-- Error Page -->
	<section id="error-page" class="error-page overlay" style="background-image: url({{ asset(\App\Aplikasi::first()->gambar_total_siswa) }});width: 100%;background-size: cover;background-position: center center">
		<div id="particles-js"></div>
		<div class="table">
			<div class="table-cell">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
							<!-- Error Inner -->
							<div class="error-inner">
								<h2>4<span>0</span>4</h2>
								<p>Oops! Halaman Yang Anda Cari Tidak Di Temukan.</p>
								<form class="search-form" action="{{ url('/search')}}" method="get">
									<input name="q" placeholder="Cari Disini.." type="text" required>
									<button class="btn" type="submit"><i class="fa fa-search"></i></button>
								</form>
							</div>
							<!--/ End Error Inner -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ End Error Page -->
	
	<!-- Jquery JS-->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/colors.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
	<script src="{{ asset('frontend/js/particles.min.js') }}"></script>
	<script src="{{ asset('frontend/js/particle-app.js') }}"></script>
	<script src="{{ asset('frontend/js/facnybox.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('frontend/js/masonry.pkgd.min.js') }}"></script>
	<script src="{{ asset('frontend/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slicknav.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/easing.min.js') }}"></script>
	<script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>