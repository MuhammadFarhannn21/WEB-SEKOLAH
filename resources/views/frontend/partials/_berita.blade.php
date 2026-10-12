<div class="col-lg-3 col-12 mt-4 mt-lg-0">

    {{-- Search --}}
    <div style="background:#fff; border-radius:12px; padding:20px; box-shadow:0 3px 20px rgba(0,0,0,0.08); margin-bottom:24px;">
        <h5 style="font-size:16px; font-weight:700; color:#1a2e5a; margin-bottom:16px; padding-bottom:10px; border-bottom:2px solid #1a73e8; display:inline-block;">
            <i class="fa fa-search" style="margin-right:8px; color:#1a73e8;"></i>Cari Berita
        </h5>
        <form action="{{ url('/search') }}" method="get">
            <div style="display:flex; border:1px solid #e0e0e0; border-radius:8px; overflow:hidden;">
                <input type="text" name="q" placeholder="Kata kunci..." required
                    style="flex:1; padding:10px 14px; border:none; outline:none; font-size:13px; color:#333;">
                <button type="submit" style="background:#1a73e8; color:#fff; border:none; padding:10px 16px; cursor:pointer;">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
    </div>

    {{-- Kategori --}}
    <div style="background:#fff; border-radius:12px; padding:20px; box-shadow:0 3px 20px rgba(0,0,0,0.08); margin-bottom:24px;">
        <h5 style="font-size:16px; font-weight:700; color:#1a2e5a; margin-bottom:16px; padding-bottom:10px; border-bottom:2px solid #1a73e8; display:inline-block;">
            <i class="fa fa-list" style="margin-right:8px; color:#1a73e8;"></i>Kategori
        </h5>
        <ul style="list-style:none; padding:0; margin:0;">
            @foreach(\App\Category::orderBy('id','DESC')->get() as $kategori)
            <li style="border-bottom:1px solid #f5f5f5; padding:8px 0;">
                <a href="{{ url('/kategori/'.$kategori->slug) }}"
                    style="color:#555; text-decoration:none; font-size:13px; display:flex; justify-content:space-between; align-items:center; transition:color 0.2s;"
                    onmouseover="this.style.color='#1a73e8'" onmouseout="this.style.color='#555'">
                    <span><i class="fa fa-angle-right" style="color:#1a73e8; margin-right:8px;"></i>{{ $kategori->title }}</span>
                    <span style="background:#f0f4ff; color:#1a73e8; font-size:11px; padding:2px 8px; border-radius:10px; font-weight:600;">
                        {{ count($kategori->posts->where('jenis','Berita')) }}
                    </span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>

    {{-- Berita Terbaru --}}
    <div style="background:#fff; border-radius:12px; padding:20px; box-shadow:0 3px 20px rgba(0,0,0,0.08); margin-bottom:24px;">
        <h5 style="font-size:16px; font-weight:700; color:#1a2e5a; margin-bottom:16px; padding-bottom:10px; border-bottom:2px solid #1a73e8; display:inline-block;">
            <i class="fa fa-newspaper-o" style="margin-right:8px; color:#1a73e8;"></i>Berita Terbaru
        </h5>
        @foreach(\App\Post::where('status',1)->where('jenis','Berita')->orderBy('id','DESC')->limit(4)->get() as $berita)
        <a href="{{ url('/berita/'.$berita->slug) }}" style="display:flex; gap:12px; align-items:center; margin-bottom:14px; padding-bottom:14px; border-bottom:1px solid #f5f5f5; text-decoration:none;"
            onmouseover="this.querySelector('.bnews-title').style.color='#1a73e8'" onmouseout="this.querySelector('.bnews-title').style.color='#1a2e5a'">
            <div style="width:65px; height:55px; border-radius:8px; background-image:url('{{ asset($berita->featured) }}'); background-size:cover; background-position:center; flex-shrink:0;"></div>
            <div>
                <p class="bnews-title" style="font-size:12px; font-weight:600; color:#1a2e5a; margin:0 0 4px; line-height:1.4; transition:color 0.2s;">
                    {{ substr(strip_tags($berita->title), 0, 45) }}...
                </p>
                <span style="font-size:11px; color:#999;">
                    <i class="fa fa-calendar" style="margin-right:3px;"></i>
                    <?php $t = date_create($berita->published_at); ?>
                    {{ date_format($t, "d M Y") }}
                </span>
            </div>
        </a>
        @endforeach
    </div>

    {{-- Acara Terbaru --}}
    <div style="background:#fff; border-radius:12px; padding:20px; box-shadow:0 3px 20px rgba(0,0,0,0.08);">
        <h5 style="font-size:16px; font-weight:700; color:#1a2e5a; margin-bottom:16px; padding-bottom:10px; border-bottom:2px solid #0F6E56; display:inline-block;">
            <i class="fa fa-calendar" style="margin-right:8px; color:#0F6E56;"></i>Acara Terbaru
        </h5>
        @foreach(\App\Post::where('status',1)->where('jenis','Acara')->orderBy('id','DESC')->limit(4)->get() as $acara)
        <a href="{{ url('/event/'.$acara->slug) }}" style="display:flex; gap:12px; align-items:center; margin-bottom:14px; padding-bottom:14px; border-bottom:1px solid #f5f5f5; text-decoration:none;"
            onmouseover="this.querySelector('.acara-title').style.color='#0F6E56'" onmouseout="this.querySelector('.acara-title').style.color='#1a2e5a'">
            <div style="width:65px; height:55px; border-radius:8px; background-image:url('{{ asset($acara->featured) }}'); background-size:cover; background-position:center; flex-shrink:0;"></div>
            <div>
                <p class="acara-title" style="font-size:12px; font-weight:600; color:#1a2e5a; margin:0 0 4px; line-height:1.4; transition:color 0.2s;">
                    {{ substr(strip_tags($acara->title), 0, 45) }}...
                </p>
                <span style="font-size:11px; color:#999;">
                    <i class="fa fa-calendar" style="margin-right:3px;"></i>
                    <?php $t = date_create($acara->published_at); ?>
                    {{ date_format($t, "d M Y") }}
                </span>
            </div>
        </a>
        @endforeach
    </div>

</div>