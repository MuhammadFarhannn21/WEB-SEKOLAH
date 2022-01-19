<div class="fun-facts overlay" data-stellar-background-ratio="0.5" style="background-image: url({{ asset(\App\Aplikasi::first()->gambar_total_siswa) }});width: 100%;background-size: cover;background-position: center center">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-6 wow zoomIn" data-wow-delay="0.4s">
				<!-- Single Fact -->
				<div class="single-fact">
					<i class="fa fa-user"></i>
					<div class="number"><span class="counter">{{ \App\Aplikasi::first()->jumlah_siswa}}</div>
					<p>Siswa</p>
				</div>
				<!--/ End Single Fact -->
			</div>
			<div class="col-lg-3 col-md-6 col-6 wow zoomIn" data-wow-delay="0.6s">
				<!-- Single Fact -->
				<div class="single-fact">
					<i class="fa fa-users"></i>
					<div class="number"><span class="counter">{{ \App\Aplikasi::first()->jumlah_guru}}</div>
					<p>Guru</p>
				</div>
				<!--/ End Single Fact -->
			</div>
			<div class="col-lg-3 col-md-6 col-6 wow zoomIn" data-wow-delay="0.8s">
				<!-- Single Fact -->
				<div class="single-fact">
					<i class="fa fa-graduation-cap"></i>
					<div class="number"><span class="counter">{{ \App\Aplikasi::first()->jumlah_jurusan}}</div>
					<p>Jurusan</p>
				</div>
				<!--/ End Single Fact -->
			</div>
			<div class="col-lg-3 col-md-6 col-6 wow zoomIn" data-wow-delay="1s">
				<!-- Single Fact -->
				<div class="single-fact">
					<i class="fa fa-trophy"></i>
					<div class="number"><span class="counter">{{ \App\Aplikasi::first()->jumlah_prestasi}}</div>
					<p>Prestasi</p>
				</div>
				<!--/ End Single Fact -->
			</div>
		</div>
	</div>
</div>