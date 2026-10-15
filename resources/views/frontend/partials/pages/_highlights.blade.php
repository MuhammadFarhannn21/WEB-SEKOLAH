{{-- Tautan cepat ke halaman profil lain --}}
<div class="m-quick-links">
	<a href="{{ url('page/visi-dan-misi') }}" class="reveal reveal-d1"><i class="fa fa-eye bg-g1"></i><span><strong>Visi & Misi</strong><small>Arah dan tujuan sekolah</small></span></a>
	<a href="{{ url('page/struktur-organisasi') }}" class="reveal reveal-d2"><i class="fa fa-sitemap bg-g3"></i><span><strong>Struktur Organisasi</strong><small>Tim pengelola sekolah</small></span></a>
	<a href="{{ url('/jurusan') }}" class="reveal reveal-d3"><i class="fa fa-graduation-cap bg-g4"></i><span><strong>Program Keahlian</strong><small>{{ \App\Jurusan::count() }} jurusan pilihan</small></span></a>
	<a href="{{ url('/fasilitas') }}" class="reveal reveal-d4"><i class="fa fa-building-o bg-g2"></i><span><strong>Fasilitas</strong><small>Sarana belajar & praktik</small></span></a>
</div>
