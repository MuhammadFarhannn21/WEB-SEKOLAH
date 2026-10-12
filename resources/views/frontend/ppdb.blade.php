@extends('frontend.layouts.master')

@section('konten')

{{-- Hero PPDB --}}
<section style="background: linear-gradient(135deg, #1a2e5a 0%, #1a73e8 100%); padding: 80px 0; position: relative; overflow: hidden;">
    {{-- Background Pattern --}}
    <div style="position:absolute; top:0; left:0; right:0; bottom:0; opacity:0.05; background-image: repeating-linear-gradient(45deg, #fff 0, #fff 1px, transparent 0, transparent 50%); background-size: 20px 20px;"></div>

    <div class="container" style="position:relative; z-index:1;">
        <div class="row align-items-center">
            <div class="col-lg-7 col-12 mb-4 mb-lg-0">
                {{-- Badge Status --}}
                <div style="display:inline-flex; align-items:center; gap:8px; background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.3); border-radius:20px; padding:6px 16px; margin-bottom:20px;">
                    <div style="width:8px; height:8px; border-radius:50%; background:#4ade80; animation: pulse 1.5s infinite;"></div>
                    <span style="color:#fff; font-size:12px; font-weight:600;">PPDB SEDANG BERLANGSUNG</span>
                </div>
                <style>
                @keyframes pulse {
                    0%, 100% { opacity: 1; transform: scale(1); }
                    50% { opacity: 0.5; transform: scale(1.2); }
                }
                </style>

                <h1 style="color:#fff; font-size:36px; font-weight:700; line-height:1.3; margin-bottom:16px;">
                    Penerimaan Peserta Didik Baru
                    <span style="color:#f0c040;">2026/2027</span>
                </h1>
                <p style="color:rgba(255,255,255,0.85); font-size:15px; line-height:1.8; margin-bottom:30px;">
                    SMK Kosgoro Kota Bogor membuka pendaftaran peserta didik baru tahun ajaran 2026/2027.
                    Pendaftaran dibuka mulai September 2025 hingga Juni/Juli 2026.
                </p>

                {{-- Tombol CTA --}}
                <div style="display:flex; gap:12px; flex-wrap:wrap;">
                    <a href="https://ppdb.ydsk.org/login" target="_blank"
                        style="background:#f0c040; color:#1a2e5a; padding:14px 32px; border-radius:30px; font-size:15px; font-weight:700; text-decoration:none; display:inline-flex; align-items:center; gap:8px; transition:transform 0.3s;"
                        onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'">
                        <i class="fa fa-pencil-square-o"></i> Daftar Sekarang
                    </a>
                    <a href="https://wa.me/6281221724926" target="_blank"
                        style="background:rgba(255,255,255,0.15); color:#fff; padding:14px 32px; border-radius:30px; font-size:15px; font-weight:600; text-decoration:none; display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(255,255,255,0.4); transition:transform 0.3s;"
                        onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'">
                        <i class="fa fa-whatsapp"></i> Tanya Admin
                    </a>
                </div>
            </div>

            <div class="col-lg-5 col-12">
                {{-- Info Card --}}
                <div style="background:rgba(255,255,255,0.1); backdrop-filter:blur(10px); border:1px solid rgba(255,255,255,0.2); border-radius:16px; padding:24px;">
                    <h4 style="color:#f0c040; font-size:14px; font-weight:700; margin-bottom:16px; text-transform:uppercase; letter-spacing:1px;">
                        <i class="fa fa-info-circle" style="margin-right:6px;"></i>Info PPDB
                    </h4>
                    <div style="display:flex; flex-direction:column; gap:12px;">
                        <div style="display:flex; align-items:center; gap:12px; padding-bottom:12px; border-bottom:1px solid rgba(255,255,255,0.1);">
                            <div style="width:36px; height:36px; border-radius:8px; background:rgba(255,255,255,0.15); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <i class="fa fa-calendar" style="color:#f0c040; font-size:14px;"></i>
                            </div>
                            <div>
                                <p style="color:rgba(255,255,255,0.6); font-size:11px; margin:0 0 2px;">Periode Pendaftaran</p>
                                <p style="color:#fff; font-size:13px; font-weight:600; margin:0;">September 2025 — Juli 2026</p>
                            </div>
                        </div>
                        <div style="display:flex; align-items:center; gap:12px; padding-bottom:12px; border-bottom:1px solid rgba(255,255,255,0.1);">
                            <div style="width:36px; height:36px; border-radius:8px; background:rgba(255,255,255,0.15); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <i class="fa fa-graduation-cap" style="color:#f0c040; font-size:14px;"></i>
                            </div>
                            <div>
                                <p style="color:rgba(255,255,255,0.6); font-size:11px; margin:0 0 2px;">Jumlah Jurusan</p>
                                <p style="color:#fff; font-size:13px; font-weight:600; margin:0;">5 Kompetensi Keahlian</p>
                            </div>
                        </div>
                        <div style="display:flex; align-items:center; gap:12px;">
                            <div style="width:36px; height:36px; border-radius:8px; background:rgba(255,255,255,0.15); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <i class="fa fa-money" style="color:#f0c040; font-size:14px;"></i>
                            </div>
                            <div>
                                <p style="color:rgba(255,255,255,0.6); font-size:11px; margin:0 0 2px;">Biaya Pendaftaran</p>
                                <p style="color:#fff; font-size:13px; font-weight:600; margin:0;">Hubungi Admin PPDB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Jurusan yang Dibuka --}}
<section style="padding:60px 0; background:#f8f9fa;">
    <div class="container">
        <div style="text-align:center; margin-bottom:40px;">
            <h2 style="font-size:28px; font-weight:700; color:#1a2e5a; margin-bottom:8px;">Jurusan yang Dibuka</h2>
            <div style="width:60px; height:3px; background:#1a73e8; margin:0 auto 10px;"></div>
            <p style="color:#666; font-size:14px;">5 Kompetensi keahlian tersedia untuk tahun ajaran 2026/2027</p>
        </div>

        @php
        $jurusan = [
            ['nama' => 'Teknik Komputer & Jaringan', 'singkat' => 'TKJ', 'desc' => 'Mempelajari jaringan komputer, troubleshooting, dan administrasi sistem.', 'warna' => '#1a73e8', 'logo' => \App\Jurusan::where('judul','like','%Teknik Komputer%')->first()],
            ['nama' => 'Rekayasa Perangkat Lunak', 'singkat' => 'RPL', 'desc' => 'Mempelajari pemrograman, pengembangan aplikasi web dan mobile.', 'warna' => '#0F6E56', 'logo' => \App\Jurusan::where('judul','like','%Rekayasa%')->first()],
            ['nama' => 'Desain Komunikasi Visual', 'singkat' => 'DKV', 'desc' => 'Mempelajari desain grafis, animasi, dan komunikasi visual.', 'warna' => '#3C3489', 'logo' => \App\Jurusan::where('judul','like','%Multimedia%')->orWhere('judul','like','%DKV%')->orWhere('judul','like','%Desain%')->first()],
            ['nama' => 'Produksi Siaran Program Televisi', 'singkat' => 'PSPT', 'desc' => 'Mempelajari produksi video, broadcasting, dan pertelevisian.', 'warna' => '#854F0B', 'logo' => \App\Jurusan::where('judul','like','%Televisi%')->orWhere('judul','like','%PSPT%')->first()],
            ['nama' => 'Kecantikan Kulit & Rambut', 'singkat' => 'KKR', 'desc' => 'Mempelajari tata kecantikan, perawatan kulit dan rambut profesional.', 'warna' => '#993556', 'logo' => \App\Jurusan::where('judul','like','%Kecantikan%')->first()],
        ];
        @endphp

        <div class="row justify-content-center">
            @foreach($jurusan as $j)
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div style="background:#fff; border-radius:12px; padding:24px; box-shadow:0 3px 15px rgba(0,0,0,0.08); height:100%; transition:transform 0.3s; border-top:4px solid {{ $j['warna'] }};"
                    onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div style="display:flex; align-items:center; gap:14px; margin-bottom:14px;">
                        {{-- Logo dari Database --}}
                        <div style="width:56px; height:56px; border-radius:12px; background:{{ $j['warna'] }}15; display:flex; align-items:center; justify-content:center; flex-shrink:0; overflow:hidden; padding:5px;">
                            @if($j['logo'] && $j['logo']->gambar)
                            <img src="{{ asset($j['logo']->gambar) }}" style="width:100%; height:100%; object-fit:contain;">
                            @else
                            <i class="fa fa-graduation-cap" style="color:{{ $j['warna'] }}; font-size:22px;"></i>
                            @endif
                        </div>
                        <div>
                            <span style="background:{{ $j['warna'] }}; color:#fff; font-size:11px; font-weight:700; padding:2px 10px; border-radius:20px;">{{ $j['singkat'] }}</span>
                            <h5 style="font-size:14px; font-weight:700; color:#1a2e5a; margin:4px 0 0;">{{ $j['nama'] }}</h5>
                        </div>
                    </div>
                    <p style="color:#777; font-size:13px; line-height:1.7; margin:0;">{{ $j['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Persyaratan & Alur Pendaftaran --}}
<section style="padding:60px 0; background:#fff;">
    <div class="container">
        <div class="row">

            {{-- Persyaratan --}}
            <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                <div style="background:#f8f9fa; border-radius:12px; padding:30px; height:100%;">
                    <h3 style="font-size:20px; font-weight:700; color:#1a2e5a; margin-bottom:20px; display:flex; align-items:center; gap:10px;">
                        <div style="width:40px; height:40px; border-radius:10px; background:#1a73e8; display:flex; align-items:center; justify-content:center;">
                            <i class="fa fa-file-text-o" style="color:#fff; font-size:16px;"></i>
                        </div>
                        Persyaratan Pendaftaran
                    </h3>
                    @php
                    $syarat = [
                        ['icon' => 'fa-id-card', 'text' => 'Fotokopi Ijazah / SKL (Surat Keterangan Lulus)'],
                        ['icon' => 'fa-home', 'text' => 'Fotokopi Kartu Keluarga (KK)'],
                        ['icon' => 'fa-credit-card', 'text' => 'Kartu NISN (Nomor Induk Siswa Nasional)'],
                        ['icon' => 'fa-image', 'text' => 'Pas Foto terbaru ukuran 3x4 '],
                        ['icon' => 'fa-certificate', 'text' => 'Fotokopi Akte Kelahiran'],
                    ];
                    @endphp
                    <div style="display:flex; flex-direction:column; gap:10px;">
                        @foreach($syarat as $s)
                        <div style="display:flex; align-items:center; gap:12px; background:#fff; padding:14px 16px; border-radius:10px; box-shadow:0 1px 5px rgba(0,0,0,0.05);">
                            <div style="width:36px; height:36px; border-radius:10px; background:#e8f0fe; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <i class="fa {{ $s['icon'] }}" style="color:#1a73e8; font-size:14px;"></i>
                            </div>
                            <p style="color:#555; font-size:13px; margin:0; line-height:1.4;">{{ $s['text'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Alur Pendaftaran --}}
            <div class="col-lg-6 col-12">
                <div style="background:#f8f9fa; border-radius:12px; padding:30px; height:100%;">
                    <h3 style="font-size:20px; font-weight:700; color:#1a2e5a; margin-bottom:20px; display:flex; align-items:center; gap:10px;">
                        <div style="width:40px; height:40px; border-radius:10px; background:#0F6E56; display:flex; align-items:center; justify-content:center;">
                            <i class="fa fa-list-ol" style="color:#fff; font-size:16px;"></i>
                        </div>
                        Alur Pendaftaran
                    </h3>
                    @php
                    $alur = [
                        ['no' => '1', 'judul' => 'Kunjungi Website PPDB', 'desc' => 'Buka ppdb.ydsk.org dan klik tombol Daftar', 'warna' => '#1a73e8'],
                        ['no' => '2', 'judul' => 'Buat Akun', 'desc' => 'Daftarkan diri dengan data yang valid dan lengkap', 'warna' => '#0F6E56'],
                        ['no' => '3', 'judul' => 'Isi Formulir', 'desc' => 'Lengkapi formulir pendaftaran dan pilih jurusan', 'warna' => '#3C3489'],
                        ['no' => '4', 'judul' => 'Upload Dokumen', 'desc' => 'Upload semua dokumen persyaratan yang diminta', 'warna' => '#854F0B'],
                        ['no' => '5', 'judul' => 'Selesai', 'desc' => 'Tunggu konfirmasi dari panitia PPDB via WA/Email', 'warna' => '#993556'],
                    ];
                    @endphp
                    <div style="display:flex; flex-direction:column; gap:12px;">
                        @foreach($alur as $a)
                        <div style="display:flex; align-items:flex-start; gap:12px;">
                            <div style="width:32px; height:32px; border-radius:50%; background:{{ $a['warna'] }}; display:flex; align-items:center; justify-content:center; flex-shrink:0; color:#fff; font-size:13px; font-weight:700;">
                                {{ $a['no'] }}
                            </div>
                            <div style="background:#fff; padding:12px 16px; border-radius:8px; box-shadow:0 1px 5px rgba(0,0,0,0.05); flex:1;">
                                <p style="color:#1a2e5a; font-size:13px; font-weight:700; margin:0 0 3px;">{{ $a['judul'] }}</p>
                                <p style="color:#777; font-size:12px; margin:0; line-height:1.4;">{{ $a['desc'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- CTA & Kontak --}}
<section style="padding:60px 0; background:linear-gradient(135deg, #1a2e5a 0%, #1a73e8 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-12 mb-4 mb-lg-0" style="text-align:center; text-align:left;">
                <h2 style="color:#fff; font-size:28px; font-weight:700; margin-bottom:8px;">Siap Bergabung dengan SMK Kosgoro?</h2>
                <p style="color:rgba(255,255,255,0.8); font-size:14px; margin:0;">Daftarkan diri sekarang dan raih masa depan cerah bersama kami!</p>
            </div>
            <div class="col-lg-4 col-12" style="text-align:center;">
                <a href="https://ppdb.ydsk.org/login" target="_blank"
                    style="background:#f0c040; color:#1a2e5a; padding:16px 40px; border-radius:30px; font-size:16px; font-weight:700; text-decoration:none; display:inline-flex; align-items:center; gap:10px; transition:transform 0.3s;"
                    onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <i class="fa fa-pencil-square-o"></i> Daftar Sekarang
                </a>
            </div>
        </div>

        {{-- Kontak --}}
        <div style="margin-top:40px; padding-top:30px; border-top:1px solid rgba(255,255,255,0.2);">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-12 mb-3 text-center">
                    <div style="background:rgba(255,255,255,0.1); border-radius:10px; padding:20px;">
                        <i class="fa fa-whatsapp" style="font-size:28px; color:#f0c040; margin-bottom:8px; display:block;"></i>
                        <p style="color:rgba(255,255,255,0.7); font-size:12px; margin:0 0 4px;">WhatsApp Admin PPDB</p>
                        <a href="https://wa.me/6281221724926" target="_blank"
                            style="color:#fff; font-size:15px; font-weight:700; text-decoration:none;">
                            +62 812-2172-4926
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-3 text-center">
                    <div style="background:rgba(255,255,255,0.1); border-radius:10px; padding:20px;">
                        <i class="fa fa-globe" style="font-size:28px; color:#f0c040; margin-bottom:8px; display:block;"></i>
                        <p style="color:rgba(255,255,255,0.7); font-size:12px; margin:0 0 4px;">Website PPDB</p>
                        <a href="https://ppdb.ydsk.org/login" target="_blank"
                            style="color:#fff; font-size:15px; font-weight:700; text-decoration:none;">
                            ppdb.ydsk.org
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-3 text-center">
                    <div style="background:rgba(255,255,255,0.1); border-radius:10px; padding:20px;">
                        <i class="fa fa-map-marker" style="font-size:28px; color:#f0c040; margin-bottom:8px; display:block;"></i>
                        <p style="color:rgba(255,255,255,0.7); font-size:12px; margin:0 0 4px;">Alamat Sekolah</p>
                        <p style="color:#fff; font-size:13px; font-weight:600; margin:0;">
                            {{ \App\Aplikasi::first()->alamat }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection