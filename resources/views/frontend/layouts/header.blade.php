<header class="header">
	<!-- Topbar -->
	<div class="topbar">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-12">
					<!-- Contact -->
					<ul class="content">
						<li><i class="fa fa-phone" style="color:white"></i>{{ \App\Aplikasi::first()->telepon}}</li>
						<li><a href="mailto:{{ \App\Aplikasi::first()->email}}"><i class="fa fa-envelope-o" style="color:white"></i>{{ \App\Aplikasi::first()->email}}</a></li>
						<li><i class="fa fa-clock-o" style="color:white"></i>Waktu Belajar: {{ \App\Aplikasi::first()->waktu_buka}}</li>
					</ul>
					<!-- End Contact -->
				</div>
				<div class="col-lg-4 col-12">
					<!-- Social -->
					<ul class="social">
						<li><a href="{{ \App\Aplikasi::first()->link_facebook}}"><i class="fa fa-facebook"></i></a></li>
						<li><a href="{{ \App\Aplikasi::first()->link_google}}"><i class="fa fa-google-plus "></i></a></li>
						<li><a href="{{ \App\Aplikasi::first()->link_instagram}}"><i class="fa fa-instagram"></i></a></li>
						<li><a href="{{ \App\Aplikasi::first()->link_youtube}}"><i class="fa fa-youtube"></i></a></li>
					</ul>
					<!-- End Social -->
				</div>
			</div>
		</div>
	</div>
	<!-- End Topbar -->
	<!-- Header Inner -->
	<div class="header-inner">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-12">
					<div class="logo">
						<a href="{{ url('/')}}"><img src="{{ asset('frontend/images/logo.png') }}" alt="#"></a>
					</div>
					<div class="mobile-menu"></div>
				</div>
				<div class="col-lg-9 col-md-9 col-12">
					<!-- Header Widget -->
					<div class="header-widget">
						<div class="single-widget">
							<i class="fa fa-phone"></i>
							<h4>No. WA<span>{{ \App\Aplikasi::first()->telepon}}</span></h4>
						</div>
						<div class="single-widget">
							<i class="fa fa-envelope-o"></i>
							<h4>Email<a href="mailto:{{ \App\Aplikasi::first()->email}}"><span>{{ \App\Aplikasi::first()->email}}</span></a></h4>
						</div>
						<div class="single-widget">
							<i class="fa fa-map-marker"></i>
							<h4>Alamat<span>{{ \App\Aplikasi::first()->alamat}}</span></h4>
						</div>
					</div>
					<!--/ End Header Widget -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Header Inner -->
	<!-- Header Menu -->
	<div class="header-menu">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="navbar navbar-default">
						<div class="navbar-collapse">
							<!-- Main Menu -->
							<ul id="nav" class="nav menu navbar-nav">
								@if(\App\Menu::where('jenis','Menu')->where('status','Aktif')->where('isparent','No')->count() > 0)
									@foreach(\App\Menu::where('jenis','Menu')->where('status','Aktif')->where('isparent','No')->limit(3)->orderBy('posisi','ASC')->get() as $menu)
										<li><a href="{{ url($menu->link) }}">{{$menu->nama}}</a></li>
									@endforeach
								@endif
								@if(\App\Menu::where('jenis','Menu')->where('status','Aktif')->where('isparent','Yes')->count() > 0)
									@foreach(\App\Menu::where('jenis','Menu')->where('status','Aktif')->where('isparent','Yes')->limit(5)->orderBy('posisi','ASC')->get() as $menuparent)
									<li><a href="{{ url($menuparent->link)}}">{{$menuparent->nama}}<i class="fa fa-angle-down"></i></a>
										<ul class="dropdown">
											@if(\App\Menu::where('jenis','SubMenu')->where('status','Aktif')->where('isparent','No')->where('parent_id',$menuparent->id)->count() > 0)
												@foreach(\App\Menu::where('jenis','SubMenu')->where('status','Aktif')->where('isparent','No')->where('parent_id',$menuparent->id)->orderBy('posisi','ASC')->get() as $menusub)
												<li><a href="{{url($menusub->link)}}">{{$menusub->nama}}</a></li>
												@endforeach
											@endif

											@if(\App\Menu::where('jenis','SubMenu')->where('status','Aktif')->where('isparent','Yes')->where('parent_id',$menuparent->id)->count() > 0)
												@foreach(\App\Menu::where('jenis','SubMenu')->where('status','Aktif')->where('isparent','Yes')->where('parent_id',$menuparent->id)->orderBy('posisi','ASC')->get() as $menusub)
												<li><a href="{{url($menusub->link)}}">{{$menusub->nama}}<i class="fa fa-angle-right"></i></a>
													<ul class="dropdown submenu">
														@if(\App\Menu::where('jenis','SubSubMenu')->where('status','Aktif')->where('isparent','No')->where('parent_id',$menusub->id)->count() > 0)
															@foreach(\App\Menu::where('jenis','SubSubMenu')->where('status','Aktif')->where('isparent','No')->where('parent_id',$menusub->id)->orderBy('posisi','ASC')->get() as $menusubsub)
																<li><a href="{{ url($menusubsub->link)}}">{{$menusubsub->nama}}</a></li>
															@endforeach
														@endif
													</ul>
												</li>
												@endforeach
											@endif
										</ul>
									</li>
									@endforeach
								@endif
								<li><a href="{{ url('ppdb') }}">PPDB</a></li>
							</ul>
							<!-- End Main Menu -->
							<!-- button -->
							@guest
							<div class="button">
								<a href="{{ url('/login')}}" class="btn">Log In</a>
							</div>
							@else
							<div class="button">
								<a href="{{ url('/home')}}" class="btn">Dashboard</a>
							</div>
							@endguest
							<!--/ End Button -->
						</div> 
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!--/ End Header Menu -->
</header>