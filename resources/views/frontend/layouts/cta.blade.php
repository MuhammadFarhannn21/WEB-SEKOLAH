{{-- Ajakan PPDB --}}
<section class="m-section" style="padding:80px 0;">
	<div class="container">
		<div class="m-cta reveal">
			<div>
				<h2>Siap bergabung bersama {{ $site->nama }}?</h2>
				<p>Pendaftaran peserta didik baru dilakukan sepenuhnya secara online. Orang tua dapat memantau setiap tahap pendaftaran melalui akun pendaftar.</p>
				<div class="m-steps">
					<span><b>1</b> Buat akun</span>
					<span><b>2</b> Bayar formulir</span>
					<span><b>3</b> Isi formulir</span>
					<span><b>4</b> Unggah berkas</span>
				</div>
			</div>
			<div style="display:flex; gap:12px; flex-wrap:wrap;">
				<a href="{{ url('ppdb') }}" class="m-btn m-btn-accent"><i class="fa fa-pencil-square-o"></i> Daftar Sekarang</a>
				<a href="{{ url('login') }}" class="m-btn m-btn-ghost"><i class="fa fa-sign-in"></i> Sudah punya akun</a>
			</div>
		</div>
	</div>
</section>
