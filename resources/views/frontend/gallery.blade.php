@extends('frontend.layouts.master')

@section('konten')

{{-- Breadcrumb --}}
<section style="background-image: url({{ asset(\App\Aplikasi::first()->gambar_total_siswa) }}); background-size:cover; background-position:center; padding:60px 0; position:relative;">
    <div style="position:absolute; top:0; left:0; right:0; bottom:0; background:rgba(26,46,90,0.75);"></div>
    <div class="container" style="position:relative; z-index:1; text-align:center;">
        <h2 style="color:#fff; font-size:32px; font-weight:700; margin-bottom:10px;">{!! \App\Aplikasi::first()->judul_gallery !!}</h2>
        <ul style="list-style:none; padding:0; margin:0; display:flex; justify-content:center; align-items:center; gap:8px;">
            <li><a href="{{ url('/') }}" style="color:rgba(255,255,255,0.8); text-decoration:none; font-size:14px;">Home</a></li>
            <li style="color:rgba(255,255,255,0.5);"><i class="fa fa-angle-right"></i></li>
            <li style="color:#fff; font-size:14px;">Gallery</li>
        </ul>
    </div>
</section>

{{-- Gallery Content --}}
<section style="padding:60px 0; background:#f8f9fa;">
    <div class="container">
        <div style="text-align:center; margin-bottom:40px;">
            <h2 style="font-size:28px; font-weight:700; color:#1a2e5a; margin-bottom:8px;">{!! \App\Aplikasi::first()->judul_gallery !!}</h2>
            <div style="width:60px; height:3px; background:#1a73e8; margin:0 auto 10px;"></div>
            <p style="color:#666; font-size:14px;">{!! \App\Aplikasi::first()->judul_sub_gallery !!}</p>
        </div>

        <div class="row">
            @foreach($gallery as $data)
            <div class="col-lg-3 col-md-4 col-6 mb-4">
                <div style="border-radius:10px; overflow:hidden; box-shadow:0 3px 15px rgba(0,0,0,0.1); position:relative; transition:transform 0.3s;"
                    onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    {{-- Gambar --}}
                    <div style="width:100%; height:200px; background-image:url('{{ asset($data->gambar) }}'); background-size:cover; background-position:center; position:relative;">
                        {{-- Overlay --}}
                        <div style="position:absolute; top:0; left:0; right:0; bottom:0; background:rgba(26,46,90,0); transition:background 0.3s;"
                            onmouseover="this.style.background='rgba(26,46,90,0.6)'; this.querySelector('.gallery-btn').style.opacity='1';"
                            onmouseout="this.style.background='rgba(26,46,90,0)'; this.querySelector('.gallery-btn').style.opacity='0';">
                            <a href="{{ asset($data->gambar) }}" data-fancybox="gallery"
                                class="gallery-btn"
                                style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:44px; height:44px; background:#fff; border-radius:50%; display:flex; align-items:center; justify-content:center; opacity:0; transition:opacity 0.3s; text-decoration:none;">
                                <i class="fa fa-search-plus" style="color:#1a73e8; font-size:16px;"></i>
                            </a>
                        </div>
                    </div>
                    {{-- Nama --}}
                    <div style="background:#fff; padding:12px 15px; display:flex; align-items:center; gap:8px;">
                        <i class="fa fa-image" style="color:#1a73e8; font-size:14px;"></i>
                        <p style="font-size:13px; font-weight:600; color:#1a2e5a; margin:0; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $data->nama }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div style="text-align:center; margin-top:20px;">
            {{ $gallery->links() }}
        </div>
    </div>
</section>

@endsection