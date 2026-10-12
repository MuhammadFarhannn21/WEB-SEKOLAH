@php
	// Ambil semua menu aktif sekali saja, lalu susun pohonnya di memori
	$allMenus  = \App\Menu::where('status', 'Aktif')->orderBy('posisi', 'ASC')->get();
	$topSingle = $allMenus->where('jenis', 'Menu')->where('isparent', 'No')->take(3);
	$topParent = $allMenus->where('jenis', 'Menu')->where('isparent', 'Yes')->take(5);
	$childrenOf = function ($parentId, $jenis) use ($allMenus) {
		return $allMenus->where('jenis', $jenis)->where('parent_id', $parentId);
	};
	$hasHome = $topSingle->contains(fn ($m) => in_array(trim((string) $m->link), ['/', '', url('/')], true));
	$extraMenus = [
		['Ekstrakurikuler', url('ekstrakurikuler')],
		['BKK', url('bkk')],
	];
@endphp

{{-- Topbar info kontak --}}
<div class="m-topbar">
	<div class="container">
		<ul>
			@if($site->telepon)<li><i class="fa fa-phone"></i><a href="tel:{{ $site->telepon }}">{{ $site->telepon }}</a></li>@endif
			@if($site->email)<li><i class="fa fa-envelope-o"></i><a href="mailto:{{ $site->email }}">{{ $site->email }}</a></li>@endif
			@if($site->waktu_buka)<li class="m-hide-sm"><i class="fa fa-clock-o"></i>{{ $site->waktu_buka }}</li>@endif
		</ul>
		<ul class="m-social">
			@if($site->link_facebook)<li><a href="{{ $site->link_facebook }}" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa fa-facebook"></i></a></li>@endif
			@if($site->link_instagram)<li><a href="{{ $site->link_instagram }}" target="_blank" rel="noopener" aria-label="Instagram"><i class="fa fa-instagram"></i></a></li>@endif
			@if($site->link_youtube)<li><a href="{{ $site->link_youtube }}" target="_blank" rel="noopener" aria-label="YouTube"><i class="fa fa-youtube-play"></i></a></li>@endif
		</ul>
	</div>
</div>

{{-- Header utama (sticky) --}}
<header class="m-header">
	<div class="container">
		<a href="{{ url('/') }}" class="m-brand" aria-label="Beranda {{ $site->nama }}">
			<img src="{{ asset('frontend/images/logo.png') }}" alt="{{ $site->nama }}">
		</a>

		<nav aria-label="Menu utama">
			<ul class="m-nav">
				@unless($hasHome)<li><a href="{{ url('/') }}">Beranda</a></li>@endunless
				@foreach($topSingle as $menu)
					<li><a href="{{ url($menu->link) }}">{{ $menu->nama }}</a></li>
				@endforeach
				@foreach($topParent as $parent)
					@php $subs = $childrenOf($parent->id, 'SubMenu'); @endphp
					<li>
						<a href="{{ url($parent->link) }}">{{ $parent->nama }} @if($subs->count())<i class="fa fa-angle-down"></i>@endif</a>
						@if($subs->count())
						<ul class="m-drop">
							@foreach($subs as $sub)
								@php $subsubs = $sub->isparent == 'Yes' ? $childrenOf($sub->id, 'SubSubMenu') : collect(); @endphp
								<li>
									<a href="{{ url($sub->link) }}">{{ $sub->nama }} @if($subsubs->count())<i class="fa fa-angle-right"></i>@endif</a>
									@if($subsubs->count())
									<ul class="m-drop">
										@foreach($subsubs as $ss)
											<li><a href="{{ url($ss->link) }}">{{ $ss->nama }}</a></li>
										@endforeach
									</ul>
									@endif
								</li>
							@endforeach
						</ul>
						@endif
					</li>
				@endforeach
				@foreach($extraMenus as [$label, $href])
					<li><a href="{{ $href }}">{{ $label }}</a></li>
				@endforeach
			</ul>
		</nav>

		<div class="m-header-actions">
			<button type="button" class="m-icon-btn" data-search-open aria-label="Cari (tekan /)" title="Cari (tekan /)"><i class="fa fa-search"></i></button>
			<a href="{{ url('login') }}" class="m-btn m-btn-outline m-btn-sm m-hide-md" title="Masuk akun"><i class="fa fa-user-circle-o"></i><span class="m-btn-text"> Masuk</span></a>
			<a href="{{ url('ppdb') }}" class="m-btn m-btn-primary m-btn-sm m-hide-md"><i class="fa fa-pencil-square-o"></i> Daftar PPDB</a>
			<button type="button" class="m-icon-btn m-burger" data-drawer-open aria-label="Buka menu"><i class="fa fa-bars"></i></button>
		</div>
	</div>
</header>

{{-- Drawer menu mobile --}}
<div class="m-drawer-backdrop" data-drawer-close></div>
<aside class="m-drawer" aria-label="Menu mobile">
	<div class="m-drawer-head">
		<img src="{{ asset('frontend/images/logo.png') }}" alt="{{ $site->nama }}">
		<button type="button" class="m-icon-btn" data-drawer-close aria-label="Tutup menu"><i class="fa fa-times"></i></button>
	</div>
	<div class="m-drawer-body">
		<ul>
			@unless($hasHome)<li><a href="{{ url('/') }}">Beranda</a></li>@endunless
			@foreach($topSingle as $menu)
				<li><a href="{{ url($menu->link) }}">{{ $menu->nama }}</a></li>
			@endforeach
			@foreach($topParent as $parent)
				@php $subs = $childrenOf($parent->id, 'SubMenu'); @endphp
				<li>
					@if($subs->count())
						<a href="{{ url($parent->link) }}" data-sub>{{ $parent->nama }} <i class="fa fa-angle-down"></i></a>
						<ul>
							@if($parent->link && $parent->link !== '#')<li><a href="{{ url($parent->link) }}">{{ $parent->nama }}</a></li>@endif
							@foreach($subs as $sub)
								@php $subsubs = $sub->isparent == 'Yes' ? $childrenOf($sub->id, 'SubSubMenu') : collect(); @endphp
								<li>
									@if($subsubs->count())
										<a href="{{ url($sub->link) }}" data-sub>{{ $sub->nama }} <i class="fa fa-angle-down"></i></a>
										<ul>
											@foreach($subsubs as $ss)
												<li><a href="{{ url($ss->link) }}">{{ $ss->nama }}</a></li>
											@endforeach
										</ul>
									@else
										<a href="{{ url($sub->link) }}">{{ $sub->nama }}</a>
									@endif
								</li>
							@endforeach
						</ul>
					@else
						<a href="{{ url($parent->link) }}">{{ $parent->nama }}</a>
					@endif
				</li>
			@endforeach
			@foreach($extraMenus as [$label, $href])
				<li><a href="{{ $href }}">{{ $label }}</a></li>
			@endforeach
			<li><a href="{{ url('agenda') }}">Agenda</a></li>
			<li><a href="{{ url('tamu') }}">Buku Tamu</a></li>
		</ul>
	</div>
	<div class="m-drawer-foot">
		<a href="{{ url('ppdb') }}" class="m-btn m-btn-primary"><i class="fa fa-pencil-square-o"></i> Daftar PPDB</a>
		<a href="{{ url('login') }}" class="m-btn m-btn-outline"><i class="fa fa-user-circle-o"></i> Masuk Akun</a>
	</div>
</aside>

{{-- Overlay pencarian --}}
<div class="m-search" role="dialog" aria-label="Pencarian">
	<button type="button" class="m-search-close" data-search-close aria-label="Tutup pencarian"><i class="fa fa-times"></i></button>
	<form action="{{ url('search') }}" method="GET">
		<input type="search" name="q" placeholder="Cari berita, pengumuman, kegiatan…" required>
		<button type="submit" class="m-btn m-btn-primary"><i class="fa fa-search"></i> Cari</button>
	</form>
</div>
