@extends('frontend.layouts.master')

@section('konten')

@php
$warna = ['#1a73e8','#0F6E56','#3C3489','#854F0B','#993556'];
$w = $warna[($jurusan->id - 1) % count($warna)];
@endphp

{{-- Hero --}}
<section style="position:relative; min-height:400px; background:linear-gradient(135deg, #1a2e5a 0%, {{ $w }} 100%); overflow:hidden;">
    @if($jurusan->gambar)
    <div style="position:absolute; inset:0; background-image:url('{{ asset($jurusan->gambar) }}'); background-size:cover; background-position:center; opacity:0.2;"></div>
    @endif
    <div style="position:absolute; inset:0; background:linear-gradient(135deg, rgba(26,46,90,0.9) 0%, rgba(26,46,90,0.6) 100%);"></div>
    <div class="container" style="position:relative; z-index:1; padding:80px 0 60px;">
        <div class="row align-items-center">
            <div class="col-lg-8 col-12">
                <div style="display:inline-block; background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.3); border-radius:20px; padding:6px 16px; margin-bottom:20px;">
                    <span style="color:#f0c040; font-size:12px; font-weight:700; letter-spacing:1px;">KOMPETENSI KEAHLIAN</span>
                </div>
                <h1 style="color:#fff; font-size:36px; font-weight:700; line-height:1.3; margin-bottom:16px;">{{ $jurusan->judul }}</h1>
                <p style="color:rgba(255,255,255,0.8); font-size:15px; line-height:1.8; margin-bottom:28px;">
                    {{ substr(strip_tags($jurusan->sub_judul), 0, 200) }}...
                </p>
                <ul style="list-style:none; padding:0; margin:0; display:flex; align-items:center; gap:8px;">
                    <li><a href="{{ url('/') }}" style="color:rgba(255,255,255,0.7); text-decoration:none; font-size:14px;">Home</a></li>
                    <li style="color:rgba(255,255,255,0.4);"><i class="fa fa-angle-right"></i></li>
                    <li><a href="{{ url('/jurusan') }}" style="color:rgba(255,255,255,0.7); text-decoration:none; font-size:14px;">Jurusan</a></li>
                    <li style="color:rgba(255,255,255,0.4);"><i class="fa fa-angle-right"></i></li>
                    <li style="color:#fff; font-size:14px;">{{ substr($jurusan->judul, 0, 25) }}...</li>
                </ul>
            </div>
            <div class="col-lg-4 col-12 mt-4 mt-lg-0">
                @if($jurusan->gambar)
                <div style="border-radius:16px; overflow:hidden; box-shadow:0 20px 50px rgba(0,0,0,0.3); border:3px solid rgba(255,255,255,0.2);">
                    <img src="{{ asset($jurusan->gambar) }}" style="width:100%; height:280px; object-fit:cover;">
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- Konten --}}
<section style="padding:70px 0; background:#f8f9fa;">
    <div class="container">
        <div class="row">
            {{-- Konten Utama --}}
            <div class="col-lg-8 col-12 mb-4">
                {{-- Deskripsi --}}
                <div style="background:#fff; border-radius:16px; padding:32px; box-shadow:0 4px 20px rgba(0,0,0,0.06); margin-bottom:24px;">
                    <h3 style="font-size:20px; font-weight:700; color:#1a2e5a; margin-bottom:16px; padding-bottom:12px; border-bottom:3px solid {{ $w }}; display:inline-block;">
                        <i class="fa fa-info-circle" style="color:{{ $w }}; margin-right:8px;"></i>Tentang Jurusan
                    </h3>
                    <div style="color:#555; font-size:15px; line-height:1.9;">
                        {!! $jurusan->keterangan !!}
                    </div>
                </div>

                {{-- Prospek Karir --}}
                <div style="background:#fff; border-radius:16px; padding:32px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <h3 style="font-size:20px; font-weight:700; color:#1a2e5a; margin-bottom:20px; padding-bottom:12px; border-bottom:3px solid {{ $w }}; display:inline-block;">
                        <i class="fa fa-briefcase" style="color:{{ $w }}; margin-right:8px;"></i>Mengapa Memilih Jurusan Ini?
                    </h3>
                    <div style="display:flex; flex-wrap:wrap; gap:12px;">
                        @php
                        $keunggulan = [
                            ['icon'=>'fa-users','text'=>'Tenaga pengajar berpengalaman & bersertifikat'],
                            ['icon'=>'fa-building','text'=>'Fasilitas praktik modern & lengkap'],
                            ['icon'=>'fa-handshake-o','text'=>'Kerjasama dengan industri terkemuka'],
                            ['icon'=>'fa-certificate','text'=>'Sertifikasi kompetensi nasional'],
                            ['icon'=>'fa-briefcase','text'=>'Peluang kerja & karir yang luas'],
                            ['icon'=>'fa-graduation-cap','text'=>'Siap melanjutkan ke perguruan tinggi'],
                        ];
                        @endphp
                        @foreach($keunggulan as $k)
                        <div style="display:flex; align-items:center; gap:10px; background:#f8f9fa; border-radius:10px; padding:12px 16px; width:calc(50% - 6px);">
                            <div style="width:36px; height:36px; border-radius:8px; background:{{ $w }}20; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <i class="fa {{ $k['icon'] }}" style="color:{{ $w }}; font-size:14px;"></i>
                            </div>
                            <p style="color:#555; font-size:13px; margin:0; line-height:1.4;">{{ $k['text'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4 col-12">
                {{-- CTA Daftar --}}
                <div style="background:linear-gradient(135deg, #1a2e5a 0%, {{ $w }} 100%); border-radius:16px; padding:28px; margin-bottom:24px; text-align:center;">
                    <i class="fa fa-pencil-square-o" style="font-size:36px; color:#f0c040; display:block; margin-bottom:12px;"></i>
                    <h4 style="color:#fff; font-size:18px; font-weight:700; margin-bottom:8px;">Tertarik Bergabung?</h4>
                    <p style="color:rgba(255,255,255,0.8); font-size:13px; margin-bottom:20px;">Daftarkan diri sekarang dan raih masa depan cerah!</p>
                    <a href="{{ url('/ppdb') }}" style="display:block; background:#f0c040; color:#1a2e5a; padding:12px; border-radius:25px; font-size:14px; font-weight:700; text-decoration:none;">
                        Daftar Sekarang <i class="fa fa-arrow-right"></i>
                    </a>
                    <a href="https://wa.me/6281221724926" target="_blank" style="display:block; background:rgba(255,255,255,0.15); color:#fff; padding:12px; border-radius:25px; font-size:14px; font-weight:600; text-decoration:none; margin-top:10px; border:1px solid rgba(255,255,255,0.3);">
                        <i class="fa fa-whatsapp" style="margin-right:6px;"></i>Hubungi Kami
                    </a>
                </div>

                {{-- Info Singkat --}}
                <div style="background:#fff; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.06); margin-bottom:24px;">
                    <h4 style="font-size:16px; font-weight:700; color:#1a2e5a; margin-bottom:16px;">Info Jurusan</h4>
                    <div style="display:flex; flex-direction:column; gap:12px;">
                        <div style="display:flex; align-items:center; gap:12px; padding-bottom:12px; border-bottom:1px solid #f0f0f0;">
                            <div style="width:36px; height:36px; border-radius:8px; background:{{ $w }}15; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <i class="fa fa-clock-o" style="color:{{ $w }};"></i>
                            </div>
                            <div>
                                <p style="color:#999; font-size:11px; margin:0 0 2px;">Durasi Pendidikan</p>
                                <p style="color:#1a2e5a; font-size:13px; font-weight:600; margin:0;">3 Tahun</p>
                            </div>
                        </div>
                        <div style="display:flex; align-items:center; gap:12px; padding-bottom:12px; border-bottom:1px solid #f0f0f0;">
                            <div style="width:36px; height:36px; border-radius:8px; background:{{ $w }}15; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <i class="fa fa-map-marker" style="color:{{ $w }};"></i>
                            </div>
                            <div>
                                <p style="color:#999; font-size:11px; margin:0 0 2px;">Lokasi</p>
                                <p style="color:#1a2e5a; font-size:13px; font-weight:600; margin:0;">{{ \App\Aplikasi::first()->alamat }}</p>
                            </div>
                        </div>
                        <div style="display:flex; align-items:center; gap:12px;">
                            <div style="width:36px; height:36px; border-radius:8px; background:{{ $w }}15; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <i class="fa fa-phone" style="color:{{ $w }};"></i>
                            </div>
                            <div>
                                <p style="color:#999; font-size:11px; margin:0 0 2px;">Kontak</p>
                                <p style="color:#1a2e5a; font-size:13px; font-weight:600; margin:0;">{{ \App\Aplikasi::first()->telepon }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Jurusan Lainnya --}}
                <div style="background:#fff; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <h4 style="font-size:16px; font-weight:700; color:#1a2e5a; margin-bottom:16px;">Jurusan Lainnya</h4>
                    @foreach(\App\Jurusan::where('id','!=',$jurusan->id)->get() as $l)
                    <a href="{{ url('jurusan/'.$l->id) }}" style="display:flex; gap:12px; align-items:center; padding:10px 0; border-bottom:1px solid #f0f0f0; text-decoration:none;"
                        onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1'">
                        @if($l->gambar)
                        <div style="width:55px; height:55px; border-radius:10px; background-image:url('{{ asset($l->gambar) }}'); background-size:cover; background-position:center; flex-shrink:0;"></div>
                        @else
                        <div style="width:55px; height:55px; border-radius:10px; background:#f0f4ff; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <i class="fa fa-graduation-cap" style="color:#1a73e8;"></i>
                        </div>
                        @endif
                        <p style="color:#1a2e5a; font-size:13px; font-weight:600; margin:0; line-height:1.4;">{{ $l->judul }}</p>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection