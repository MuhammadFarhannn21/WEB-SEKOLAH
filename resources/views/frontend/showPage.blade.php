@extends('frontend.layouts.master')

@section('meta')
<meta name="keywords" content="{{ $post->slug }}">
<meta name="description" content="{{ substr($post->body, 0, 100) }}">
<meta property="og:url" content="{{ url($_SERVER['REQUEST_URI']) }}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:description" content="{{ substr($post->body, 0, 100) }}" />
<meta property="og:image" content="{{ asset($post->featured) }}" />
@endsection

@section('konten')
<section class="breadcrumbs overlay" style="background-image: url({{ asset(\App\Aplikasi::first()->gambar_total_siswa) }})">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{ $post->title }}</h2>
                <ul class="bread-list">
                    <li><a href="{{ url('/') }}">Home<i class="fa fa-angle-right"></i></a></li>
                    <li class="active"><a href="{{ url('/page', $post->slug) }}">{{ $post->slug }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

@if($post->slug == 'struktur-organisasi')

@php
$jabatan_so = [
    'Kepala Sekolah',
    'Waka. Bid. Kesiswaan',
    'Waka. Bid. Kurikulum',
    'Waka. Bid. Adm. Sarpras',
    'Ka. Program TKJ, MM, RPL',
    'Ka. Program KKR',
    'Ka. Hubinmas',
    'Bendahara Sekolah',
    'Komite Sekolah',
];
$guru_list = \App\GuruTerbaik::where('status','aktif')
    ->where('tipe','Guru')
    ->whereIn('nama', $jabatan_so)
    ->get()
    ->sortBy(function($g) use ($jabatan_so) {
        return array_search($g->nama, $jabatan_so);
    });
@endphp

<style>
.so-card { position:relative; overflow:hidden; border-radius:16px; background:#fff; box-shadow:0 4px 20px rgba(0,0,0,0.08); transition:transform 0.3s; cursor:pointer; }
.so-card:hover { transform:translateY(-8px); }
.so-card .foto-wrap { width:100%; height:280px; overflow:hidden; }
.so-card .foto-wrap img { width:100%; height:100%; object-fit:cover; object-position:top; transition:transform 0.5s; }
.so-card:hover .foto-wrap img { transform:scale(1.05); }
.so-card .garis-so { height:4px; background:linear-gradient(to right, #1a2e5a, #1a73e8); }
.so-card .info-so { padding:18px; }
.so-card .overlay-so {
    position:absolute; bottom:0; left:0; right:0;
    background:linear-gradient(to top, rgba(26,46,90,0.95) 0%, rgba(26,46,90,0.8) 60%, transparent 100%);
    padding:20px 18px;
    transform:translateY(100%);
    transition:transform 0.4s ease;
}
.so-card:hover .overlay-so { transform:translateY(0); }
.no-foto-so { width:100%; height:280px; background:linear-gradient(135deg, #1a2e5a 0%, #1a73e8 100%); display:flex; align-items:center; justify-content:center; }
</style>

<section style="padding:60px 0; background:#f8f9fa;">
    <div class="container">
        <div style="text-align:center; margin-bottom:50px;">
            <h2 style="font-size:28px; font-weight:700; color:#1a2e5a; margin-bottom:8px;">{{ $post->title }}</h2>
            <div style="width:60px; height:3px; background:#1a73e8; margin:0 auto 10px;"></div>
            <p style="color:#666; font-size:14px;">Kenali lebih dekat tim pengelola SMK Kosgoro</p>
        </div>

        <div class="row justify-content-center">
            @foreach($guru_list as $g)
            <div class="col-lg-3 col-md-4 col-6 mb-4">
                <div class="so-card">
                    {{-- Foto --}}
                    <div class="foto-wrap">
                        @if($g->gambar)
                        @php $fotoUrl = \Illuminate\Support\Str::startsWith($g->gambar, 'http') ? $g->gambar : asset($g->gambar); @endphp
                        <img src="{{ $fotoUrl }}" alt="{{ $g->nama }}">
                        @else
                        <div class="no-foto-so">
                            <i class="fa fa-user" style="font-size:70px; color:rgba(255,255,255,0.3);"></i>
                        </div>
                        @endif
                    </div>

                    {{-- Garis --}}
                    <div class="garis-so"></div>

                    {{-- Info --}}
                    <div class="info-so">
                        <p style="font-size:14px; font-weight:700; color:#1a2e5a; margin:0 0 4px; line-height:1.3;">{{ $g->nama }}</p>
                        <p style="font-size:12px; color:#888; margin:0 0 8px;">{{ $g->mata_pelajaran }}</p>
                        <span style="background:#1a73e8; color:#fff; padding:3px 12px; border-radius:20px; font-size:11px; font-weight:700;">
                            Struktur Organisasi
                        </span>
                    </div>

                    {{-- Overlay Hover --}}
                    <div class="overlay-so">
                        <p style="color:#fff; font-weight:700; font-size:14px; margin:0 0 4px;">{{ $g->nama }}</p>
                        <p style="color:rgba(255,255,255,0.8); font-size:12px; margin:0 0 8px;">{{ $g->mata_pelajaran }}</p>
                        @if($g->lulusan)
                        <p style="color:rgba(255,255,255,0.7); font-size:11px; margin:0 0 6px;">
                            <i class="fa fa-university" style="margin-right:4px;"></i>{{ $g->lulusan }}
                        </p>
                        @endif
                        @if($g->pesan)
                        <p style="color:rgba(255,255,255,0.7); font-size:11px; font-style:italic; margin:0;">
                            "{{ substr($g->pesan, 0, 70) }}{{ strlen($g->pesan) > 70 ? '...' : '' }}"
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

            @if($guru_list->count() == 0)
            <div class="col-12" style="text-align:center; padding:60px;">
                <i class="fa fa-users" style="font-size:60px; color:#e0e0e0;"></i>
                <p style="color:#999; margin-top:16px;">Belum ada data struktur organisasi</p>
            </div>
            @endif
        </div>

        <div style="margin-top:10px; text-align:center;">
            <p style="font-size:12px; color:#999;">
                <i class="fa fa-info-circle"></i>
                Arahkan kursor ke kartu untuk melihat informasi lengkap
            </p>
        </div>
    </div>
</section>

{{-- ===================== END STRUKTUR ORGANISASI ===================== --}}

{{-- ===================== VISI DAN MISI ===================== --}}
@elseif($post->slug == 'visi-dan-misi')
@php $app = \App\Aplikasi::first(); @endphp
<section style="padding:70px 0; background:#f8f9fa;">
    <div class="container">
        <div style="text-align:center; margin-bottom:50px;">
            <h2 style="font-size:32px; font-weight:700; color:#1a2e5a; margin-bottom:8px;">Visi & Misi</h2>
            <div style="width:60px; height:3px; background:#1a73e8; margin:0 auto 12px;"></div>
            <p style="color:#888; font-size:14px;">SMK Kosgoro Kota Bogor</p>
        </div>

        <div class="row justify-content-center">
            {{-- Visi --}}
            <div class="col-lg-5 col-12 mb-4">
                <div style="background:linear-gradient(135deg, #1a2e5a 0%, #1a73e8 100%); border-radius:20px; padding:36px; height:100%; box-shadow:0 10px 40px rgba(26,46,90,0.2);">
                    <div style="width:60px; height:60px; background:rgba(255,255,255,0.15); border-radius:15px; display:flex; align-items:center; justify-content:center; margin-bottom:20px;">
                        <i class="fa fa-eye" style="color:#f0c040; font-size:26px;"></i>
                    </div>
                    <h3 style="color:#f0c040; font-size:22px; font-weight:700; margin-bottom:20px; letter-spacing:1px;">VISI</h3>
                    @if($app->visi)
                    <div style="color:rgba(255,255,255,0.9); font-size:15px; line-height:1.9;">
                        {!! nl2br(e($app->visi)) !!}
                    </div>
                    @else
                    <p style="color:rgba(255,255,255,0.5); font-style:italic; font-size:14px;">Belum diisi. Silakan isi di menu Konfigurasi.</p>
                    @endif
                </div>
            </div>

            {{-- Misi --}}
            <div class="col-lg-5 col-12 mb-4">
                <div style="background:#fff; border-radius:20px; padding:36px; height:100%; box-shadow:0 10px 40px rgba(0,0,0,0.08); border:1px solid #f0f0f0;">
                    <div style="width:60px; height:60px; background:#e8f0fe; border-radius:15px; display:flex; align-items:center; justify-content:center; margin-bottom:20px;">
                        <i class="fa fa-rocket" style="color:#1a73e8; font-size:26px;"></i>
                    </div>
                    <h3 style="color:#1a2e5a; font-size:22px; font-weight:700; margin-bottom:20px; letter-spacing:1px;">MISI</h3>
                    @if($app->misi)
                    @php $misi_list = explode("\n", $app->misi); @endphp
                    <ol style="padding-left:20px; margin:0;">
                        @foreach($misi_list as $m)
                        @if(trim($m))
                        <li style="color:#555; font-size:14px; line-height:1.8; margin-bottom:10px;">
                            {{ trim($m) }}
                        </li>
                        @endif
                        @endforeach
                    </ol>
                    @else
                    <p style="color:#999; font-style:italic; font-size:14px;">Belum diisi. Silakan isi di menu Konfigurasi.</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Nilai --}}
        <div class="row justify-content-center mt-4">
            @php
            $nilai = [
                ['icon'=>'fa-star','label'=>'Unggul','warna'=>'#1a73e8'],
                ['icon'=>'fa-heart','label'=>'Integritas','warna'=>'#0F6E56'],
                ['icon'=>'fa-users','label'=>'Kolaborasi','warna'=>'#3C3489'],
                ['icon'=>'fa-lightbulb-o','label'=>'Inovatif','warna'=>'#854F0B'],
            ];
            @endphp
            @foreach($nilai as $n)
            <div class="col-lg-3 col-md-3 col-6 mb-3">
                <div style="background:#fff; border-radius:16px; padding:24px; text-align:center; box-shadow:0 4px 20px rgba(0,0,0,0.06); border-bottom:3px solid {{ $n['warna'] }};">
                    <i class="fa {{ $n['icon'] }}" style="font-size:28px; color:{{ $n['warna'] }}; margin-bottom:10px; display:block;"></i>
                    <p style="color:#1a2e5a; font-weight:700; font-size:14px; margin:0;">{{ $n['label'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===================== SK SEKOLAH ===================== --}}
@elseif($post->slug == 'sk-sekolah')
<section style="padding:70px 0; background:#f8f9fa;">
    <div class="container">
        <div style="text-align:center; margin-bottom:50px;">
            <h2 style="font-size:32px; font-weight:700; color:#1a2e5a; margin-bottom:8px;">SK Sekolah</h2>
            <div style="width:60px; height:3px; background:#1a73e8; margin:0 auto 12px;"></div>
            <p style="color:#888; font-size:14px;">Surat Keputusan & Legalitas SMK Kosgoro</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                {{-- Header Dokumen --}}
                <div style="background:linear-gradient(135deg, #1a2e5a 0%, #1a73e8 100%); border-radius:20px 20px 0 0; padding:28px; text-align:center;">
                    <i class="fa fa-file-text" style="font-size:40px; color:#f0c040; margin-bottom:12px; display:block;"></i>
                    <h3 style="color:#fff; font-size:20px; font-weight:700; margin:0 0 6px;">Surat Keputusan Sekolah</h3>
                    <p style="color:rgba(255,255,255,0.7); font-size:13px; margin:0;">SMK Kosgoro Kota Bogor</p>
                </div>
                {{-- Konten Dokumen --}}
                <div style="background:#fff; border-radius:0 0 20px 20px; padding:36px; box-shadow:0 10px 40px rgba(0,0,0,0.08);">
                    <div style="border:2px dashed #e0e0e0; border-radius:12px; padding:28px; margin-bottom:24px;">
                        <div style="color:#555; font-size:15px; line-height:2;">
                            {!! $post->body !!}
                        </div>
                    </div>
                    {{-- Info Sekolah --}}
                    @php $app = \App\Aplikasi::first(); @endphp
                    <div style="background:#f8f9fa; border-radius:12px; padding:20px;">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <p style="color:#999; font-size:11px; margin:0 0 2px; text-transform:uppercase; letter-spacing:1px;">Nama Sekolah</p>
                                <p style="color:#1a2e5a; font-size:14px; font-weight:700; margin:0;">{{ $app->nama }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <p style="color:#999; font-size:11px; margin:0 0 2px; text-transform:uppercase; letter-spacing:1px;">Telepon</p>
                                <p style="color:#1a2e5a; font-size:14px; font-weight:700; margin:0;">{{ $app->telepon }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <p style="color:#999; font-size:11px; margin:0 0 2px; text-transform:uppercase; letter-spacing:1px;">Email</p>
                                <p style="color:#1a2e5a; font-size:14px; font-weight:700; margin:0;">{{ $app->email }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <p style="color:#999; font-size:11px; margin:0 0 2px; text-transform:uppercase; letter-spacing:1px;">Alamat</p>
                                <p style="color:#1a2e5a; font-size:14px; font-weight:700; margin:0;">{{ $app->alamat }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===================== PRESTASI ===================== --}}
@elseif($post->slug == 'prestasi')
<section style="padding:70px 0; background:#f8f9fa;">
    <div class="container">
        <div style="text-align:center; margin-bottom:50px;">
            <h2 style="font-size:32px; font-weight:700; color:#1a2e5a; margin-bottom:8px;">Prestasi Sekolah</h2>
            <div style="width:60px; height:3px; background:#f0c040; margin:0 auto 12px;"></div>
            <p style="color:#888; font-size:14px;">Pencapaian dan penghargaan SMK Kosgoro Kota Bogor</p>
        </div>

        {{-- Counter Prestasi --}}
        <div class="row justify-content-center mb-5">
            @php
            $stats = [
                ['icon'=>'fa-trophy','nilai'=>\App\Aplikasi::first()->jumlah_prestasi ?? '0','label'=>'Total Prestasi','warna'=>'#f0c040','bg'=>'#1a2e5a'],
                ['icon'=>'fa-star','nilai'=>'Nasional','label'=>'Tingkat','warna'=>'#fff','bg'=>'#1a73e8'],
                ['icon'=>'fa-graduation-cap','nilai'=>\App\Aplikasi::first()->jumlah_guru ?? '0','label'=>'Tenaga Pengajar','warna'=>'#fff','bg'=>'#0F6E56'],
                ['icon'=>'fa-users','nilai'=>\App\Aplikasi::first()->jumlah_siswa ?? '0','label'=>'Total Siswa','warna'=>'#fff','bg'=>'#3C3489'],
            ];
            @endphp
            @foreach($stats as $s)
            <div class="col-lg-3 col-md-3 col-6 mb-3">
                <div style="background:{{ $s['bg'] }}; border-radius:16px; padding:24px; text-align:center; box-shadow:0 8px 25px rgba(0,0,0,0.12);">
                    <i class="fa {{ $s['icon'] }}" style="font-size:28px; color:{{ $s['warna'] }}; margin-bottom:10px; display:block;"></i>
                    <p style="color:{{ $s['warna'] }}; font-size:24px; font-weight:700; margin:0 0 4px;">{{ $s['nilai'] }}</p>
                    <p style="color:rgba(255,255,255,0.7); font-size:12px; margin:0;">{{ $s['label'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Konten Prestasi --}}
        <div class="row justify-content-center">
            <div class="col-lg-10 col-12">
                <div style="background:#fff; border-radius:20px; padding:36px; box-shadow:0 10px 40px rgba(0,0,0,0.08);">
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:24px; padding-bottom:16px; border-bottom:2px solid #f0f0f0;">
                        <i class="fa fa-trophy" style="font-size:24px; color:#f0c040;"></i>
                        <h3 style="color:#1a2e5a; font-size:20px; font-weight:700; margin:0;">Daftar Prestasi</h3>
                    </div>
                    <div style="color:#555; font-size:15px; line-height:2;">
                        {!! $post->body !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===================== SAMBUTAN KEPALA SEKOLAH ===================== --}}
@elseif($post->slug == 'sambutan-kepala-sekolah')
@php $kepsek = \App\GuruTerbaik::where('nama','Kepala Sekolah')->where('status','aktif')->first(); @endphp
<section style="padding:0; background:#f8f9fa;">

    {{-- Hero Banner --}}
    <div style="background:linear-gradient(135deg, #1a2e5a 0%, #1a73e8 100%); padding:80px 0; position:relative; overflow:hidden;">
        <div style="position:absolute; top:-50px; right:-50px; width:300px; height:300px; border-radius:50%; background:rgba(255,255,255,0.05);"></div>
        <div style="position:absolute; bottom:-80px; left:-30px; width:250px; height:250px; border-radius:50%; background:rgba(255,255,255,0.05);"></div>
        <div class="container" style="position:relative; z-index:1;">
            <div class="row align-items-center">
                {{-- Foto Kepala Sekolah --}}
                <div class="col-lg-4 col-12 text-center mb-4 mb-lg-0">
                    @if($kepsek && $kepsek->gambar)
                    @php $fotoUrl = \Illuminate\Support\Str::startsWith($kepsek->gambar,'http') ? $kepsek->gambar : asset($kepsek->gambar); @endphp
                    <div style="position:relative; display:inline-block;">
                        <div style="width:220px; height:260px; border-radius:20px; overflow:hidden; border:5px solid rgba(255,255,255,0.3); box-shadow:0 20px 60px rgba(0,0,0,0.3); margin:0 auto;">
                            <img src="{{ $fotoUrl }}" style="width:100%; height:100%; object-fit:cover; object-position:top;">
                        </div>
                        {{-- Badge --}}
                        <div style="position:absolute; bottom:-15px; left:50%; transform:translateX(-50%); background:#f0c040; color:#1a2e5a; padding:8px 20px; border-radius:20px; font-size:12px; font-weight:700; white-space:nowrap; box-shadow:0 4px 15px rgba(240,192,64,0.4);">
                            <i class="fa fa-star" style="margin-right:4px;"></i>Kepala Sekolah
                        </div>
                    </div>
                    @endif
                </div>
                {{-- Info Kepala Sekolah --}}
                <div class="col-lg-8 col-12" style="padding-left:30px;">
                    <span style="background:rgba(255,255,255,0.15); color:#f0c040; font-size:12px; font-weight:700; padding:6px 16px; border-radius:20px; letter-spacing:1px; display:inline-block; margin-bottom:16px;">
                        SAMBUTAN
                    </span>
                    <h2 style="color:#fff; font-size:32px; font-weight:700; margin-bottom:8px; line-height:1.3;">
                        {{ $kepsek ? $kepsek->mata_pelajaran : 'Kepala Sekolah' }}
                    </h2>
                    <p style="color:#f0c040; font-size:16px; font-weight:600; margin-bottom:20px;">
                        Kepala SMK Kosgoro Kota Bogor
                    </p>
                    @if($kepsek && $kepsek->pesan)
                    <div style="background:rgba(255,255,255,0.1); border-left:4px solid #f0c040; border-radius:0 12px 12px 0; padding:16px 20px;">
                        <i class="fa fa-quote-left" style="color:#f0c040; font-size:18px; margin-bottom:8px; display:block;"></i>
                        <p style="color:rgba(255,255,255,0.9); font-size:15px; font-style:italic; line-height:1.8; margin:0;">
                            {{ $kepsek->pesan }}
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Konten Sambutan --}}
    <div style="padding:70px 0; background:#f8f9fa;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12">

                    {{-- Card Sambutan --}}
                    <div style="background:#fff; border-radius:20px; overflow:hidden; box-shadow:0 10px 40px rgba(0,0,0,0.08);">
                        {{-- Header Card --}}
                        <div style="background:linear-gradient(to right, #1a2e5a, #1a73e8); padding:20px 30px; display:flex; align-items:center; gap:16px;">
                            <div style="width:44px; height:44px; background:rgba(255,255,255,0.15); border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <i class="fa fa-quote-left" style="color:#f0c040; font-size:18px;"></i>
                            </div>
                            <div>
                                <h4 style="color:#fff; font-size:16px; font-weight:700; margin:0 0 3px;">Assalamu'alaikum Wr. Wb.</h4>
                                <p style="color:rgba(255,255,255,0.7); font-size:12px; margin:0;">Sambutan Kepala Sekolah SMK Kosgoro</p>
                            </div>
                        </div>
                        {{-- Isi Sambutan --}}
                        <div style="padding:32px;">
                            <div style="color:#555; font-size:15px; line-height:2; text-align:justify;">
                                {!! $post->body !!}
                            </div>
                            {{-- Tanda Tangan --}}
                            <div style="margin-top:32px; padding-top:24px; border-top:2px solid #f0f0f0; display:flex; align-items:center; gap:20px;">
                                @if($kepsek && $kepsek->gambar)
                                @php $fotoUrl = \Illuminate\Support\Str::startsWith($kepsek->gambar,'http') ? $kepsek->gambar : asset($kepsek->gambar); @endphp
                                <div style="width:60px; height:60px; border-radius:50%; overflow:hidden; flex-shrink:0; border:3px solid #1a2e5a; box-shadow:0 3px 12px rgba(26,46,90,0.2);">
                                    <img src="{{ $fotoUrl }}" style="width:100%; height:100%; object-fit:cover; object-position:top;">
                                </div>
                                @endif
                                <div>
                                    <p style="color:#1a2e5a; font-size:15px; font-weight:700; margin:0 0 3px;">{{ $kepsek ? $kepsek->mata_pelajaran : 'Kepala Sekolah' }}</p>
                                    <p style="color:#1a73e8; font-size:13px; margin:0 0 3px; font-weight:600;">Kepala SMK Kosgoro Kota Bogor</p>
                                    @if($kepsek && $kepsek->pesan)
                                    <p style="color:#888; font-size:12px; font-style:italic; margin:0;">"{{ $kepsek->pesan }}"</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Sidebar --}}
                <div class="col-lg-4 col-12 mt-4 mt-lg-0">
                    {{-- Info Sekolah --}}
                    <div style="background:#fff; border-radius:16px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.06); margin-bottom:20px;">
                        <div style="background:linear-gradient(135deg, #1a2e5a, #1a73e8); padding:16px 20px;">
                            <h4 style="color:#fff; font-size:14px; font-weight:700; margin:0;">Profil Singkat</h4>
                        </div>
                        <div style="padding:20px;">
                            @php $app = \App\Aplikasi::first(); @endphp
                            @php
                            $infos = [
                                ['icon'=>'fa-building','label'=>'Sekolah','value'=>$app->nama],
                                ['icon'=>'fa-map-marker','label'=>'Alamat','value'=>$app->alamat],
                                ['icon'=>'fa-phone','label'=>'Telepon','value'=>$app->telepon],
                                ['icon'=>'fa-envelope','label'=>'Email','value'=>$app->email],
                                ['icon'=>'fa-clock-o','label'=>'Jam Belajar','value'=>$app->waktu_buka],
                            ];
                            @endphp
                            @foreach($infos as $info)
                            <div style="display:flex; gap:12px; padding:10px 0; border-bottom:1px solid #f5f5f5;">
                                <div style="width:32px; height:32px; background:#e8f0fe; border-radius:8px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                    <i class="fa {{ $info['icon'] }}" style="color:#1a73e8; font-size:13px;"></i>
                                </div>
                                <div>
                                    <p style="color:#999; font-size:10px; margin:0 0 2px; text-transform:uppercase; letter-spacing:0.5px;">{{ $info['label'] }}</p>
                                    <p style="color:#1a2e5a; font-size:12px; font-weight:600; margin:0;">{{ $info['value'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Statistik --}}
                    <div style="background:#fff; border-radius:16px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                        <div style="background:linear-gradient(135deg, #0F6E56, #1a73e8); padding:16px 20px;">
                            <h4 style="color:#fff; font-size:14px; font-weight:700; margin:0;">Statistik Sekolah</h4>
                        </div>
                        <div style="padding:20px;">
                            @php
                            $stats = [
                                ['icon'=>'fa-users','label'=>'Total Siswa','value'=>$app->jumlah_siswa,'warna'=>'#1a73e8'],
                                ['icon'=>'fa-graduation-cap','label'=>'Tenaga Pengajar','value'=>$app->jumlah_guru,'warna'=>'#0F6E56'],
                                ['icon'=>'fa-trophy','label'=>'Prestasi','value'=>$app->jumlah_prestasi,'warna'=>'#f0c040'],
                                ['icon'=>'fa-book','label'=>'Program Keahlian','value'=>\App\Jurusan::count(),'warna'=>'#3C3489'],
                            ];
                            @endphp
                            @foreach($stats as $s)
                            <div style="display:flex; align-items:center; gap:12px; padding:10px 0; border-bottom:1px solid #f5f5f5;">
                                <div style="width:36px; height:36px; border-radius:8px; background:{{ $s['warna'] }}20; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                    <i class="fa {{ $s['icon'] }}" style="color:{{ $s['warna'] }}; font-size:14px;"></i>
                                </div>
                                <div style="flex:1;">
                                    <p style="color:#999; font-size:11px; margin:0;">{{ $s['label'] }}</p>
                                </div>
                                <p style="color:#1a2e5a; font-size:18px; font-weight:700; margin:0;">{{ $s['value'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- ===================== SELAYANG PANDANG ===================== --}}
@elseif($post->slug == 'selayang-pandang')
<section style="padding:70px 0; background:#f8f9fa;">
    <div class="container">
        <div style="text-align:center; margin-bottom:50px;">
            <h2 style="font-size:32px; font-weight:700; color:#1a2e5a; margin-bottom:8px;">Selayang Pandang</h2>
            <div style="width:60px; height:3px; background:#1a73e8; margin:0 auto 12px;"></div>
            <p style="color:#888; font-size:14px;">Mengenal lebih dekat SMK Kosgoro Kota Bogor</p>
        </div>

        @php $app = \App\Aplikasi::first(); @endphp
        <div class="row">
            {{-- Konten Utama --}}
            <div class="col-lg-8 col-12 mb-4">
                {{-- Hero Image --}}
                @if($post->featured)
                <div style="width:100%; height:350px; border-radius:20px; overflow:hidden; margin-bottom:24px; box-shadow:0 10px 40px rgba(0,0,0,0.12);">
                    <div style="width:100%; height:100%; background-image:url('{{ asset($post->featured) }}'); background-size:cover; background-position:center;"></div>
                </div>
                @endif

                {{-- Konten --}}
                <div style="background:#fff; border-radius:20px; padding:36px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:24px; padding-bottom:16px; border-bottom:2px solid #f0f0f0;">
                        <div style="width:44px; height:44px; background:#e8f0fe; border-radius:12px; display:flex; align-items:center; justify-content:center;">
                            <i class="fa fa-info-circle" style="color:#1a73e8; font-size:20px;"></i>
                        </div>
                        <h3 style="color:#1a2e5a; font-size:20px; font-weight:700; margin:0;">Tentang Sekolah</h3>
                    </div>
                    <div style="color:#555; font-size:15px; line-height:2;">
                        {!! $post->body !!}
                    </div>
                </div>
            </div>

            {{-- Sidebar Info --}}
            <div class="col-lg-4 col-12">
                {{-- Info Sekolah --}}
                <div style="background:#fff; border-radius:20px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.06); margin-bottom:20px;">
                    <div style="background:linear-gradient(135deg, #1a2e5a, #1a73e8); padding:20px; text-align:center;">
                        <img src="{{ asset('frontend/images/logo.png') }}" style="height:60px; margin-bottom:10px;" onerror="this.style.display='none'">
                        <h4 style="color:#fff; font-size:16px; font-weight:700; margin:0;">{{ $app->nama }}</h4>
                    </div>
                    <div style="padding:20px;">
                        @php
                        $infos = [
                            ['icon'=>'fa-map-marker','label'=>'Alamat','value'=>$app->alamat],
                            ['icon'=>'fa-phone','label'=>'Telepon','value'=>$app->telepon],
                            ['icon'=>'fa-envelope','label'=>'Email','value'=>$app->email],
                            ['icon'=>'fa-clock-o','label'=>'Jam Belajar','value'=>$app->waktu_buka],
                        ];
                        @endphp
                        @foreach($infos as $info)
                        <div style="display:flex; gap:12px; padding:10px 0; border-bottom:1px solid #f5f5f5;">
                            <div style="width:32px; height:32px; background:#e8f0fe; border-radius:8px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <i class="fa {{ $info['icon'] }}" style="color:#1a73e8; font-size:13px;"></i>
                            </div>
                            <div>
                                <p style="color:#999; font-size:10px; margin:0 0 2px; text-transform:uppercase; letter-spacing:0.5px;">{{ $info['label'] }}</p>
                                <p style="color:#1a2e5a; font-size:13px; font-weight:600; margin:0;">{{ $info['value'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Statistik --}}
                <div style="background:#fff; border-radius:20px; padding:20px; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <h4 style="color:#1a2e5a; font-size:15px; font-weight:700; margin-bottom:16px; padding-bottom:10px; border-bottom:2px solid #1a73e8; display:inline-block;">Statistik Sekolah</h4>
                    @php
                    $stats = [
                        ['icon'=>'fa-users','label'=>'Total Siswa','value'=>$app->jumlah_siswa,'warna'=>'#1a73e8'],
                        ['icon'=>'fa-graduation-cap','label'=>'Tenaga Pengajar','value'=>$app->jumlah_guru,'warna'=>'#0F6E56'],
                        ['icon'=>'fa-trophy','label'=>'Prestasi','value'=>$app->jumlah_prestasi,'warna'=>'#f0c040'],
                        ['icon'=>'fa-book','label'=>'Program Keahlian','value'=>\App\Jurusan::count(),'warna'=>'#3C3489'],
                    ];
                    @endphp
                    @foreach($stats as $s)
                    <div style="display:flex; align-items:center; gap:12px; padding:10px 0; border-bottom:1px solid #f5f5f5;">
                        <div style="width:36px; height:36px; border-radius:8px; background:{{ $s['warna'] }}20; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <i class="fa {{ $s['icon'] }}" style="color:{{ $s['warna'] }}; font-size:14px;"></i>
                        </div>
                        <div style="flex:1;">
                            <p style="color:#999; font-size:11px; margin:0;">{{ $s['label'] }}</p>
                        </div>
                        <p style="color:#1a2e5a; font-size:18px; font-weight:700; margin:0;">{{ $s['value'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@else

{{-- ===================== HALAMAN BIASA ===================== --}}
<section class="blog b-archives single section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="blog-detail">
                    <div class="detail-content">
                        <div class="blog-info">
                            <a href="#"><i class="fa fa-user"></i>By: {{ $post->user->name ?? 'Admin' }}</a>
                            <a href="#"><i class="fa fa-calendar"></i>
                                <?php $tanggal = date_create($post->published_at); ?>
                                {{ date_format($tanggal, "d M Y") }}
                            </a>
                            <a href="#"><i class="fa fa-archive"></i>{{ $post->category->title }}</a>
                        </div>
                        <h2 class="blog-title" style="margin-top: 20px">
                            <a href="{{ url('/page', $post->slug) }}">{{ $post->title }}</a>
                        </h2>
                        {!! $post->body !!}
                    </div>
                    <div class="blog-bottom">
                        <ul class="share">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                        <ul class="prev-next">
                            <li class="prev"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                            <li class="next"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                    <div class="comment-main">
                        <div class="comment-title">
                            <h2 class="text-primary">Komentar</h2>
                        </div>
                        <div id="disqus_thread"></div>
                        <script>
                        (function() {
                            var d = document, s = d.createElement('script');
                            s.src = 'https://smk-kosgoro.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                        </script>
                        <noscript>Please enable JavaScript to view the comments powered by Disqus.</noscript>
                    </div>
                </div>
            </div>
            @include('frontend.partials._berita')
        </div>
    </div>
</section>

@endif

@endsection