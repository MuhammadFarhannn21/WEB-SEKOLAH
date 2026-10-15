@php
	$profil = \App\Post::where('jenis', 'Pages')->where('status', 1)->orderBy('id')->get(['title', 'slug']);
	$statistik = array_filter([
		['fa-users', 'Siswa Aktif', $site->jumlah_siswa],
		['fa-graduation-cap', 'Guru & Tenaga Pendidik', $site->jumlah_guru],
		['fa-trophy', 'Prestasi', $site->jumlah_prestasi],
		['fa-book', 'Program Keahlian', \App\Jurusan::count()],
	], fn ($s) => (int) preg_replace('/\D/', '', (string) $s[2]) > 0);
@endphp
<aside class="col-lg-4 col-12 mt-5 mt-lg-0">
	<div class="m-sidebar">
		<div class="m-widget">
			<h5><i class="fa fa-compass"></i> Tentang Sekolah</h5>
			<ul class="m-cat-list m-side-nav">
				@foreach($profil as $p)
				<li><a href="{{ url('page/'.$p->slug) }}" class="{{ request()->is('page/'.$p->slug) ? 'active' : '' }}"><span>{{ $p->title }}</span><i class="fa fa-angle-right"></i></a></li>
				@endforeach
				<li><a href="{{ url('/fasilitas') }}"><span>Fasilitas</span><i class="fa fa-angle-right"></i></a></li>
				<li><a href="{{ url('/jurusan') }}"><span>Program Keahlian</span><i class="fa fa-angle-right"></i></a></li>
			</ul>
		</div>

		<div class="m-widget">
			<h5><i class="fa fa-id-card-o"></i> Profil Singkat</h5>
			<ul class="m-info-list">
				<li><i class="fa fa-building-o"></i><span><small>Sekolah</small>{{ $site->nama }}</span></li>
				@if($site->alamat)<li><i class="fa fa-map-marker"></i><span><small>Alamat</small>{{ $site->alamat }}</span></li>@endif
				@if($site->telepon)<li><i class="fa fa-phone"></i><span><small>Telepon</small>{{ $site->telepon }}</span></li>@endif
				@if($site->email)<li><i class="fa fa-envelope-o"></i><span><small>Email</small>{{ $site->email }}</span></li>@endif
				@if($site->waktu_buka)<li><i class="fa fa-clock-o"></i><span><small>Jam Belajar</small>{{ $site->waktu_buka }}</span></li>@endif
			</ul>
		</div>

		@if(count($statistik))
		<div class="m-widget">
			<h5><i class="fa fa-bar-chart"></i> Statistik Sekolah</h5>
			<div class="m-mini-stats">
				@foreach($statistik as [$i, $label, $nilai])
				<div><i class="fa {{ $i }}"></i><b data-count="{{ $nilai }}">{{ $nilai }}</b><small>{{ $label }}</small></div>
				@endforeach
			</div>
		</div>
		@endif
	</div>
</aside>
