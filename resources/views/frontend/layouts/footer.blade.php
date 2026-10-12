@php $footerNews = \App\Post::where('jenis', 'Berita')->where('status', 1)->orderBy('id', 'DESC')->limit(3)->get(); @endphp
<footer class="m-footer">
    <div class="container">
        <div class="row">
            {{-- Profil singkat --}}
            <div class="col-lg-4 col-md-6 col-12 mb-5">
                <img src="{{ asset('frontend/images/logo.png') }}" alt="{{ $site->nama }}" style="height:58px; margin-bottom:18px;">
                <p style="line-height:1.85; margin-bottom:0;">{{ \Illuminate\Support\Str::limit(strip_tags($site->keterangan), 220) }}</p>
                <div class="m-footer-social">
                    @if($site->link_facebook)<a href="{{ $site->link_facebook }}" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa fa-facebook"></i></a>@endif
                    @if($site->link_instagram)<a href="{{ $site->link_instagram }}" target="_blank" rel="noopener" aria-label="Instagram"><i class="fa fa-instagram"></i></a>@endif
                    @if($site->link_youtube)<a href="{{ $site->link_youtube }}" target="_blank" rel="noopener" aria-label="YouTube"><i class="fa fa-youtube-play"></i></a>@endif
                    @if($site->link_google)<a href="{{ $site->link_google }}" target="_blank" rel="noopener" aria-label="Google"><i class="fa fa-google"></i></a>@endif
                </div>
            </div>

            {{-- Tautan --}}
            <div class="col-lg-2 col-md-6 col-6 mb-5">
                <h5>Jelajahi</h5>
                <ul class="m-links">
                    <li><a href="{{ url('/') }}"><i class="fa fa-angle-right"></i>Beranda</a></li>
                    <li><a href="{{ url('/berita') }}"><i class="fa fa-angle-right"></i>Berita</a></li>
                    <li><a href="{{ url('/agenda') }}"><i class="fa fa-angle-right"></i>Agenda</a></li>
                    <li><a href="{{ url('/gallery') }}"><i class="fa fa-angle-right"></i>Galeri</a></li>
                    <li><a href="{{ url('/fasilitas') }}"><i class="fa fa-angle-right"></i>Fasilitas</a></li>
                    <li><a href="{{ url('/ekstrakurikuler') }}"><i class="fa fa-angle-right"></i>Ekstrakurikuler</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-6 col-6 mb-5">
                <h5>Layanan</h5>
                <ul class="m-links">
                    <li><a href="{{ url('/ppdb') }}"><i class="fa fa-angle-right"></i>PPDB Online</a></li>
                    <li><a href="{{ url('/login') }}"><i class="fa fa-angle-right"></i>Cek Status PPDB</a></li>
                    <li><a href="{{ url('/bkk') }}"><i class="fa fa-angle-right"></i>Bursa Kerja (BKK)</a></li>
                    <li><a href="{{ url('/forum') }}"><i class="fa fa-angle-right"></i>Forum</a></li>
                    <li><a href="{{ url('/tamu') }}"><i class="fa fa-angle-right"></i>Buku Tamu</a></li>
                </ul>
            </div>

            {{-- Kontak --}}
            <div class="col-lg-4 col-md-6 col-12 mb-5">
                <h5>Hubungi Kami</h5>
                <ul class="m-contact">
                    @if($site->alamat)<li><i class="fa fa-map-marker"></i><span>{{ $site->alamat }}</span></li>@endif
                    @if($site->telepon)<li><i class="fa fa-phone"></i><a href="tel:{{ $site->telepon }}">{{ $site->telepon }}</a></li>@endif
                    @if($site->email)<li><i class="fa fa-envelope"></i><a href="mailto:{{ $site->email }}">{{ $site->email }}</a></li>@endif
                    @if($site->waktu_buka)<li><i class="fa fa-clock-o"></i><span>{{ $site->waktu_buka }}</span></li>@endif
                </ul>
                @if($footerNews->count())
                <div class="m-footer-news" style="margin-top:22px;">
                    @foreach($footerNews as $berita)
                    <a href="{{ url('/berita/'.$berita->slug) }}">
                        <span class="thumb" style="background-image:url('{{ asset($berita->featured) }}')"></span>
                        <span>
                            <strong>{{ \Illuminate\Support\Str::limit(strip_tags($berita->title), 60) }}</strong>
                            <small><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($berita->published_at)->translatedFormat('d M Y') }}</small>
                        </span>
                    </a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="m-footer-bottom">
        <div class="container">
            <span>{{ $site->copyright }}</span>
            <nav>
                <a href="{{ url('/') }}">Beranda</a>
                <a href="{{ url('/ppdb') }}">PPDB</a>
                <a href="{{ url('/tamu') }}">Buku Tamu</a>
                <a href="{{ url('/login') }}">Login</a>
            </nav>
        </div>
    </div>
</footer>
