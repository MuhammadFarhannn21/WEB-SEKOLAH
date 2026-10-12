@extends('frontend.layouts.master')

@section('konten')

{{-- Breadcrumb --}}
<section style="background-image: url({{ asset(\App\Aplikasi::first()->gambar_total_siswa) }}); background-size:cover; background-position:center; padding:60px 0; position:relative;">
    <div style="position:absolute; top:0; left:0; right:0; bottom:0; background:rgba(26,46,90,0.75);"></div>
    <div class="container" style="position:relative; z-index:1; text-align:center;">
        <h2 style="color:#fff; font-size:32px; font-weight:700; margin-bottom:10px;">Berita Terkini</h2>
        <ul style="list-style:none; padding:0; margin:0; display:flex; justify-content:center; align-items:center; gap:8px;">
            <li><a href="{{ url('/') }}" style="color:rgba(255,255,255,0.8); text-decoration:none; font-size:14px;">Home</a></li>
            <li style="color:rgba(255,255,255,0.5);"><i class="fa fa-angle-right"></i></li>
            <li style="color:#fff; font-size:14px;">Berita</li>
        </ul>
    </div>
</section>

{{-- Konten --}}
<section style="padding:60px 0; background:#f8f9fa;">
    <div class="container">
        <div class="row">

            {{-- Daftar Berita --}}
            <div class="col-lg-9 col-12">
                <div class="row">
                    @foreach($post as $berita)
                    @php $tanggal = date_create($berita->published_at); @endphp
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div style="background:#fff; border-radius:14px; overflow:hidden; box-shadow:0 3px 15px rgba(0,0,0,0.07); height:100%; transition:transform 0.3s;"
                            onmouseover="this.style.transform='translateY(-5px)'"
                            onmouseout="this.style.transform='translateY(0)'">
                            {{-- Gambar --}}
                            <div style="position:relative; overflow:hidden; height:180px;">
                                @if($berita->featured)
                                <div style="width:100%; height:100%; background-image:url('{{ asset($berita->featured) }}'); background-size:cover; background-position:center; transition:transform 0.5s;"
                                    onmouseover="this.style.transform='scale(1.05)'"
                                    onmouseout="this.style.transform='scale(1)'"></div>
                                @else
                                <div style="width:100%; height:100%; background:linear-gradient(135deg, #1a2e5a, #1a73e8);"></div>
                                @endif
                                <div style="position:absolute; top:10px; left:10px; background:#1a73e8; color:#fff; padding:3px 10px; border-radius:20px; font-size:10px; font-weight:600;">
                                    {{ $berita->category->title ?? 'Berita' }}
                                </div>
                                <div style="position:absolute; bottom:0; right:0; background:#1a2e5a; color:#fff; padding:5px 10px; text-align:center;">
                                    <div style="font-size:15px; font-weight:700; line-height:1;">{{ date_format($tanggal,"d") }}</div>
                                    <div style="font-size:10px;">{{ date_format($tanggal,"M Y") }}</div>
                                </div>
                            </div>
                            {{-- Konten --}}
                            <div style="padding:16px;">
                                <h4 style="font-size:14px; font-weight:700; color:#1a2e5a; margin-bottom:8px; line-height:1.5;">
                                    <a href="{{ url('/berita/'.$berita->slug) }}" style="color:#1a2e5a; text-decoration:none;"
                                        onmouseover="this.style.color='#1a73e8'" onmouseout="this.style.color='#1a2e5a'">
                                        {{ substr(strip_tags($berita->title), 0, 65) }}{{ strlen($berita->title) > 65 ? '...' : '' }}
                                    </a>
                                </h4>
                                <p style="color:#888; font-size:12px; line-height:1.6; margin-bottom:12px;">
                                    {{ substr(strip_tags($berita->body), 0, 80) }}...
                                </p>
                                <div style="display:flex; justify-content:space-between; align-items:center; padding-top:10px; border-top:1px solid #f5f5f5;">
                                    <small style="color:#999; font-size:11px;">
                                        <i class="fa fa-clock-o" style="margin-right:3px; color:#1a73e8;"></i>
                                        {{ date_format($tanggal,"d M Y") }}
                                    </small>
                                    <a href="{{ url('/berita/'.$berita->slug) }}" style="background:#1a73e8; color:#fff; padding:4px 12px; border-radius:20px; font-size:11px; font-weight:600; text-decoration:none;">
                                        Baca <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div style="margin-top:20px;">
                    {{ $post->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>

            {{-- Sidebar --}}
            @include('frontend.partials._berita')
        </div>
    </div>
</section>

@endsection