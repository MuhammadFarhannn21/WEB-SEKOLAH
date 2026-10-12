@extends('frontend.layouts.master')

@section('konten')

{{-- Breadcrumb --}}
<section style="background-image: url({{ asset(\App\Aplikasi::first()->gambar_total_siswa) }}); background-size:cover; background-position:center; padding:80px 0; position:relative;">
    <div style="position:absolute; top:0; left:0; right:0; bottom:0; background:rgba(26,46,90,0.8);"></div>
    <div class="container" style="position:relative; z-index:1; text-align:center;">
        <h2 style="color:#fff; font-size:36px; font-weight:700; margin-bottom:12px;">Kompetensi Keahlian</h2>
        <div style="width:60px; height:3px; background:#f0c040; margin:0 auto 16px;"></div>
        <p style="color:rgba(255,255,255,0.8); font-size:15px; margin-bottom:20px;">5 Program Keahlian Unggulan SMK Kosgoro Kota Bogor</p>
        <ul style="list-style:none; padding:0; margin:0; display:flex; justify-content:center; align-items:center; gap:8px;">
            <li><a href="{{ url('/') }}" style="color:rgba(255,255,255,0.7); text-decoration:none; font-size:14px;">Home</a></li>
            <li style="color:rgba(255,255,255,0.4);"><i class="fa fa-angle-right"></i></li>
            <li style="color:#fff; font-size:14px;">Jurusan</li>
        </ul>
    </div>
</section>

{{-- Jurusan Grid --}}
@php
$warna = [
    ['bg' => '#1a73e8', 'light' => '#e8f0fe'],
    ['bg' => '#0F6E56', 'light' => '#e8f5f0'],
    ['bg' => '#3C3489', 'light' => '#ede8f5'],
    ['bg' => '#854F0B', 'light' => '#f5ede8'],
    ['bg' => '#993556', 'light' => '#f5e8ed'],
];
@endphp

<section style="padding:80px 0; background:#f8f9fa;">
    <div class="container">
        <div class="row justify-content-center">
            @foreach($jurusan as $index => $j)
            @php $w = $warna[$index % count($warna)]; @endphp
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <a href="{{ url('jurusan/'.$j->id) }}" style="text-decoration:none;">
                    <div style="background:#fff; border-radius:20px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.08); transition:all 0.4s; height:100%;"
                        onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.15)';"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.08)';">

                        {{-- Foto --}}
                        <div style="position:relative; height:220px; overflow:hidden;">
                            @if($j->gambar)
                            <div style="width:100%; height:100%; background-image:url('{{ asset($j->gambar) }}'); background-size:cover; background-position:center; transition:transform 0.5s;"
                                onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='scale(1)'"></div>
                            @else
                            <div style="width:100%; height:100%; background:linear-gradient(135deg, {{ $w['bg'] }}, #1a2e5a); display:flex; align-items:center; justify-content:center;">
                                <i class="fa fa-graduation-cap" style="font-size:60px; color:rgba(255,255,255,0.3);"></i>
                            </div>
                            @endif
                            <div style="position:absolute; top:0; left:0; right:0; bottom:0; background:linear-gradient(to top, rgba(0,0,0,0.6) 0%, transparent 60%);"></div>
                            {{-- Nomor --}}
                            <div style="position:absolute; top:16px; left:16px; width:36px; height:36px; border-radius:50%; background:{{ $w['bg'] }}; display:flex; align-items:center; justify-content:center; color:#fff; font-size:14px; font-weight:700; box-shadow:0 2px 8px rgba(0,0,0,0.2);">
                                {{ str_pad($index+1, 2, '0', STR_PAD_LEFT) }}
                            </div>
                        </div>

                        {{-- Garis Warna --}}
                        <div style="height:4px; background:{{ $w['bg'] }};"></div>

                        {{-- Info --}}
                        <div style="padding:22px;">
                            <h3 style="font-size:17px; font-weight:700; color:#1a2e5a; margin-bottom:10px; line-height:1.4;">{{ $j->judul }}</h3>
                            <p style="color:#888; font-size:13px; line-height:1.7; margin-bottom:16px;">
                                {{ substr(strip_tags($j->sub_judul), 0, 100) }}...
                            </p>
                            <div style="display:flex; justify-content:space-between; align-items:center;">
                                <span style="background:{{ $w['light'] }}; color:{{ $w['bg'] }}; font-size:11px; font-weight:700; padding:4px 12px; border-radius:20px;">
                                    Kompetensi Keahlian
                                </span>
                                <span style="color:{{ $w['bg'] }}; font-size:13px; font-weight:600;">
                                    Selengkapnya <i class="fa fa-arrow-right" style="font-size:11px;"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection