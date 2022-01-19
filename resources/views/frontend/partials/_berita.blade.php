<div class="col-lg-4 col-12">
	<div class="learnedu-sidebar">
		<div class="search">
			<form action="{{ url('/search')}}" method="get">
				<div class="form">
					<input type="text" name="q" placeholder="Cari.." required>
					<button class="button"><i class="fa fa-search"></i></button>
				</div>
			</form>
		</div>
		<!-- Categories -->
		<div class="single-widget categories">
            <h3 class="title">Kategori</h3>
            <ul>
            	@foreach(\App\Category::orderBy('id','DESC')->get() as $kategori)
                <li><a href="{{ url('/kategori/' . $kategori->slug) }}"><i class="fa fa-angle-right"></i>{{$kategori->title}}<span>{{count($kategori->posts->where('jenis','Berita'))}}</span></a></li>
                @endforeach
            </ul>
        </div>
		<!--/ End Categories -->
		<!-- Posts -->
		<div class="single-widget posts">
			<h3>Berita <span>Terbaru</span></h3>
			@foreach(\App\Post::where('status',1)->where('jenis','berita')->orderBy('id','DESC')->limit(4)->get() as $berita)
			<div class="single-post">
				<div class="post-img">
					<img style="background-image: url({{ asset($berita->featured) }});width: 90%;height: 65px;background-size: cover;background-position: center center">
				</div>
				<div class="post-info">
					<h4><a href="{{ url('/berita/' . $berita->slug) }}">{!! substr($berita->title, 0, 20) !!}..</a></h4>
					<span><i class="fa fa-calendar"></i><?php $tanggal=date_create($berita->published_at); ?> 
					{{ date_format($tanggal,"d M Y")}}</span>
				</div>
			</div>

			@endforeach
		</div>
		<!--/ End Posts -->
		<div class="single-widget course">
			<h3>Acara  <span>Terbaru</span></h3>
			@foreach(\App\Post::where('status',1)->where('jenis','acara')->orderBy('id','DESC')->limit(4)->get() as $berita)

			<div class="single-post">
				<div class="post-img">
					<img style="background-image: url({{ asset($berita->featured) }});width: 90%;height: 65px;background-size: cover;background-position: center center">
				</div>
				<div class="post-info">
					<h4><a href="{{ url('/event/' . $berita->slug) }}">{!! substr($berita->title, 0, 20) !!}..</a></h4>
					<span><i class="fa fa-calendar"></i><?php $tanggal=date_create($berita->published_at); ?> 
					{{ date_format($tanggal,"d M Y")}}</span>
				</div>
			</div>

			@endforeach
		</div>
		
	</div>
</div>