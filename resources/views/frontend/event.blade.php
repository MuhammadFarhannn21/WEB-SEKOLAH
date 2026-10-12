@extends('frontend.layouts.master')

@section('konten')

{{-- Breadcrumb --}}
<section style="background-image: url({{ asset(\App\Aplikasi::first()->gambar_total_siswa) }}); background-size:cover; background-position:center; padding:60px 0; position:relative;">
    <div style="position:absolute; top:0; left:0; right:0; bottom:0; background:rgba(26,46,90,0.75);"></div>
    <div class="container" style="position:relative; z-index:1; text-align:center;">
        <h2 style="color:#fff; font-size:32px; font-weight:700; margin-bottom:10px;">{!! \App\Aplikasi::first()->judul_event !!}</h2>
        <ul style="list-style:none; padding:0; margin:0; display:flex; justify-content:center; align-items:center; gap:8px;">
            <li><a href="{{ url('/') }}" style="color:rgba(255,255,255,0.8); text-decoration:none; font-size:14px;">Home</a></li>
            <li style="color:rgba(255,255,255,0.5);"><i class="fa fa-angle-right"></i></li>
            <li style="color:#fff; font-size:14px;">Event</li>
        </ul>
    </div>
</section>

{{-- Konten --}}
<section style="padding:60px 0; background:#f8f9fa;">
    <div class="container">
        <div class="row">

            {{-- Daftar Event --}}
            <div class="col-lg-8 col-12">
                <div class="row">
                    @foreach($post as $berita)
                    <div class="col-lg-6 col-12 mb-4">
                        <div style="background:#fff; border-radius:12px; overflow:hidden; box-shadow:0 3px 15px rgba(0,0,0,0.08); height:100%; transition:transform 0.3s;"
                            onmouseover="this.style.transform='translateY(-5px)'"
                            onmouseout="this.style.transform='translateY(0)'">
                            {{-- Gambar --}}
                            <div style="position:relative;">
                                <div style="background-image:url('{{ asset($berita->featured) }}'); width:100%; height:190px; background-size:cover; background-position:center;"></div>
                                <div style="position:absolute; top:12px; left:12px; background:#0F6E56; color:#fff; padding:3px 10px; border-radius:20px; font-size:11px; font-weight:600;">
                                    {{ $berita->category->title ?? 'Event' }}
                                </div>
                                <div style="position:absolute; bottom:0; right:0; background:#1a2e5a; color:#fff; padding:6px 10px; text-align:center; min-width:50px;">
                                    <?php $tanggal = date_create($berita->published_at); ?>
                                    <div style="font-size:16px; font-weight:700; line-height:1;">{{ date_format($tanggal,"d") }}</div>
                                    <div style="font-size:10px;">{{ date_format($tanggal,"M Y") }}</div>
                                </div>
                            </div>
                            {{-- Konten --}}
                            <div style="padding:18px;">
                                <h4 style="font-size:15px; font-weight:700; color:#1a2e5a; margin-bottom:8px; line-height:1.4;">
                                    <a href="{{ url('/event/'.$berita->slug) }}" style="color:#1a2e5a; text-decoration:none;"
                                        onmouseover="this.style.color='#0F6E56'" onmouseout="this.style.color='#1a2e5a'">
                                        {{ substr(strip_tags($berita->title), 0, 60) }}{{ strlen($berita->title) > 60 ? '...' : '' }}
                                    </a>
                                </h4>
                                <p style="color:#777; font-size:12px; line-height:1.6; margin-bottom:12px;">
                                    {{ substr(strip_tags($berita->body), 0, 90) }}...
                                </p>
                                <div style="display:flex; justify-content:space-between; align-items:center;">
                                    <small style="color:#999; font-size:11px;">
                                        <i class="fa fa-user" style="margin-right:4px; color:#0F6E56;"></i>
                                        {{ substr($berita->user->name ?? 'Admin', 0, 18) }}
                                    </small>
                                    <a href="{{ url('/event/'.$berita->slug) }}" style="background:#0F6E56; color:#fff; padding:5px 14px; border-radius:20px; font-size:11px; font-weight:600; text-decoration:none;">
                                        Lihat <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- Pagination --}}
                <div style="margin-top:20px;">
                    {{ $post->links() }}
                </div>
            </div>

            {{-- Sidebar --}}
            @include('frontend.partials._berita')
        </div>
    </div>
</section>

@endsection