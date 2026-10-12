@extends('frontend.layouts.master')

@section('konten')

{{-- Hero BKK --}}
<section style="background:linear-gradient(135deg, #1a2e5a 0%, #1a73e8 100%); padding:80px 0; position:relative; overflow:hidden;">
    <div style="position:absolute; top:0; left:0; right:0; bottom:0; opacity:0.05; background-image:repeating-linear-gradient(45deg, #fff 0, #fff 1px, transparent 0, transparent 50%); background-size:20px 20px;"></div>
    <div class="container" style="position:relative; z-index:1;">
        <div class="row align-items-center">
            <div class="col-lg-8 col-12 mb-4 mb-lg-0">
                <div style="display:inline-flex; align-items:center; gap:8px; background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.3); border-radius:20px; padding:6px 16px; margin-bottom:20px;">
                    <div style="width:8px; height:8px; border-radius:50%; background:#4ade80;"></div>
                    <span style="color:#fff; font-size:12px; font-weight:600;">AKTIF SEJAK 2021</span>
                </div>
                <h1 style="color:#fff; font-size:36px; font-weight:700; line-height:1.3; margin-bottom:16px;">
                    Bursa Kerja Khusus <span style="color:#f0c040;">SMK Kosgoro Bogor</span>
                </h1>
                <p style="color:rgba(255,255,255,0.85); font-size:15px; line-height:1.8; margin-bottom:30px;">
                    BKK SMK Kosgoro Bogor hadir untuk membantu lulusan mendapatkan pekerjaan yang sesuai dengan kompetensi keahlian masing-masing melalui jaringan mitra perusahaan terpercaya.
                </p>
                <div style="display:flex; gap:12px; flex-wrap:wrap;">
                    <a href="https://wa.me/6285695888470" target="_blank"
                        style="background:#25d366; color:#fff; padding:14px 28px; border-radius:30px; font-size:14px; font-weight:700; text-decoration:none; display:inline-flex; align-items:center; gap:8px;">
                        <i class="fa fa-whatsapp"></i> Hubungi BKK
                    </a>
                    <a href="https://www.instagram.com/bkksmkkosgoro/" target="_blank"
                        style="background:rgba(255,255,255,0.15); color:#fff; padding:14px 28px; border-radius:30px; font-size:14px; font-weight:600; text-decoration:none; display:inline-flex; align-items:center; gap:8px; border:1px solid rgba(255,255,255,0.4);">
                        <i class="fa fa-instagram"></i> Follow Instagram
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div style="background:rgba(255,255,255,0.1); backdrop-filter:blur(10px); border:1px solid rgba(255,255,255,0.2); border-radius:16px; padding:24px;">
                    <h4 style="color:#f0c040; font-size:14px; font-weight:700; margin-bottom:16px; text-transform:uppercase; letter-spacing:1px;">
                        <i class="fa fa-info-circle" style="margin-right:6px;"></i>Info BKK
                    </h4>
                    <div style="display:flex; flex-direction:column; gap:14px;">
                        <div style="display:flex; align-items:center; gap:12px; padding-bottom:14px; border-bottom:1px solid rgba(255,255,255,0.1);">
                            <div style="width:36px; height:36px; border-radius:8px; background:rgba(255,255,255,0.15); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <i class="fa fa-user" style="color:#f0c040;"></i>
                            </div>
                            <div>
                                <p style="color:rgba(255,255,255,0.6); font-size:11px; margin:0 0 2px;">Penanggung Jawab</p>
                                <p style="color:#fff; font-size:13px; font-weight:600; margin:0;">Nunyk Laila, S.Pd.</p>
                            </div>
                        </div>
                        <div style="display:flex; align-items:center; gap:12px; padding-bottom:14px; border-bottom:1px solid rgba(255,255,255,0.1);">
                            <div style="width:36px; height:36px; border-radius:8px; background:rgba(255,255,255,0.15); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <i class="fa fa-envelope" style="color:#f0c040;"></i>
                            </div>
                            <div>
                                <p style="color:rgba(255,255,255,0.6); font-size:11px; margin:0 0 2px;">Email</p>
                                <p style="color:#fff; font-size:13px; font-weight:600; margin:0;">bkksmkkosgoro@gmail.com</p>
                            </div>
                        </div>
                        <div style="display:flex; align-items:center; gap:12px;">
                            <div style="width:36px; height:36px; border-radius:8px; background:rgba(255,255,255,0.15); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <i class="fa fa-calendar" style="color:#f0c040;"></i>
                            </div>
                            <div>
                                <p style="color:rgba(255,255,255,0.6); font-size:11px; margin:0 0 2px;">Tahun Berdiri</p>
                                <p style="color:#fff; font-size:13px; font-weight:600; margin:0;">2021</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Layanan BKK --}}
<section style="padding:70px 0; background:#f8f9fa;">
    <div class="container">
        <div style="text-align:center; margin-bottom:50px;">
            <h2 style="font-size:28px; font-weight:700; color:#1a2e5a; margin-bottom:8px;">Layanan BKK</h2>
            <div style="width:60px; height:3px; background:#1a73e8; margin:0 auto 10px;"></div>
            <p style="color:#666; font-size:14px;">Kami siap membantu lulusan SMK Kosgoro dalam memasuki dunia kerja</p>
        </div>

        <div class="row justify-content-center">
            @php
            $layanan = [
                ['icon' => 'fa-briefcase', 'warna' => '#1a73e8', 'judul' => 'Penyaluran Tenaga Kerja', 'desc' => 'Menghubungkan lulusan SMK Kosgoro dengan perusahaan mitra yang membutuhkan tenaga kerja terampil dan berkualitas.'],
                ['icon' => 'fa-newspaper-o', 'warna' => '#0F6E56', 'judul' => 'Informasi Lowongan Kerja', 'desc' => 'Menyediakan informasi lowongan kerja terkini dari berbagai perusahaan dan industri yang relevan dengan kompetensi keahlian.'],
                ['icon' => 'fa-graduation-cap', 'warna' => '#3C3489', 'judul' => 'Pelatihan Kerja', 'desc' => 'Memfasilitasi pelatihan dan pembekalan kerja untuk meningkatkan kompetensi dan kesiapan lulusan memasuki dunia industri.'],
            ];
            @endphp

            @foreach($layanan as $l)
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div style="background:#fff; border-radius:16px; padding:32px 24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); height:100%; text-align:center; transition:transform 0.3s; border-top:4px solid {{ $l['warna'] }};"
                    onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div style="width:70px; height:70px; border-radius:50%; background:{{ $l['warna'] }}15; display:flex; align-items:center; justify-content:center; margin:0 auto 20px;">
                        <i class="fa {{ $l['icon'] }}" style="font-size:28px; color:{{ $l['warna'] }};"></i>
                    </div>
                    <h4 style="font-size:17px; font-weight:700; color:#1a2e5a; margin-bottom:12px;">{{ $l['judul'] }}</h4>
                    <p style="color:#777; font-size:13px; line-height:1.8; margin:0;">{{ $l['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Mitra Perusahaan --}}
@php $mitras = \App\MitraPerusahaan::where('status','aktif')->get(); @endphp
<section style="padding:70px 0; background:#fff;">
    <div class="container">
        <div style="text-align:center; margin-bottom:50px;">
            <h2 style="font-size:28px; font-weight:700; color:#1a2e5a; margin-bottom:8px;">Mitra Perusahaan</h2>
            <div style="width:60px; height:3px; background:#1a73e8; margin:0 auto 10px;"></div>
            <p style="color:#666; font-size:14px;">Perusahaan yang telah bekerjasama dengan BKK SMK Kosgoro Bogor</p>
        </div>

        @if($mitras->count() > 0)
        <div class="row">
            @foreach($mitras as $mitra)
            <div class="col-lg-3 col-md-4 col-6 mb-4">
                <div style="background:#fff; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.07); text-align:center; transition:transform 0.3s; border:1px solid #f0f0f0; height:100%;"
                    onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 30px rgba(26,46,90,0.12)'; this.style.borderColor='#1a73e8'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.07)'; this.style.borderColor='#f0f0f0'">
                    {{-- Logo --}}
                    @if($mitra->logo)
                    <div style="width:80px; height:80px; margin:0 auto 16px; border-radius:12px; overflow:hidden; background:#f8f9fa; padding:8px; display:flex; align-items:center; justify-content:center;">
                        <img src="{{ asset($mitra->logo) }}" style="max-width:100%; max-height:100%; object-fit:contain;">
                    </div>
                    @else
                    <div style="width:80px; height:80px; margin:0 auto 16px; border-radius:12px; background:#e8f0fe; display:flex; align-items:center; justify-content:center;">
                        <i class="fa fa-building" style="font-size:32px; color:#1a73e8;"></i>
                    </div>
                    @endif
                    {{-- Info --}}
                    <h4 style="font-size:14px; font-weight:700; color:#1a2e5a; margin-bottom:6px;">{{ $mitra->nama }}</h4>
                    @if($mitra->bidang)
                    <span style="background:#e8f0fe; color:#1a73e8; font-size:11px; padding:3px 10px; border-radius:20px; font-weight:600; display:inline-block; margin-bottom:10px;">
                        {{ $mitra->bidang }}
                    </span>
                    @endif
                    @if($mitra->deskripsi)
                    <p style="color:#888; font-size:12px; line-height:1.6; margin-bottom:12px;">
                        {{ substr($mitra->deskripsi, 0, 70) }}{{ strlen($mitra->deskripsi) > 70 ? '...' : '' }}
                    </p>
                    @endif
                    @if($mitra->website)
                    <a href="{{ $mitra->website }}" target="_blank"
                        style="display:inline-flex; align-items:center; gap:5px; color:#1a73e8; font-size:12px; font-weight:600; text-decoration:none;">
                        <i class="fa fa-globe"></i> Kunjungi Website
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div style="background:#f8f9fa; border-radius:16px; padding:50px; text-align:center; border:2px dashed #e0e0e0;">
            <i class="fa fa-building" style="font-size:50px; color:#e0e0e0; display:block; margin-bottom:16px;"></i>
            <p style="color:#999; font-size:15px; margin:0 0 8px;">Data mitra perusahaan akan segera ditampilkan</p>
            <p style="color:#bbb; font-size:13px; margin:0;">Hubungi BKK untuk informasi kerjasama</p>
        </div>
        @endif
    </div>
</section>

{{-- CTA Kontak --}}
<section style="padding:70px 0; background:linear-gradient(135deg, #1a2e5a 0%, #1a73e8 100%);">
    <div class="container">
        <div style="text-align:center; margin-bottom:40px;">
            <h2 style="color:#fff; font-size:28px; font-weight:700; margin-bottom:8px;">Hubungi BKK SMK Kosgoro</h2>
            <div style="width:60px; height:3px; background:#f0c040; margin:0 auto 10px;"></div>
            <p style="color:rgba(255,255,255,0.8); font-size:14px;">Siap membantu lulusan mendapatkan pekerjaan terbaik</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-12 mb-4 text-center">
                <div style="background:rgba(255,255,255,0.1); border-radius:12px; padding:24px;">
                    <i class="fa fa-whatsapp" style="font-size:32px; color:#f0c040; margin-bottom:12px; display:block;"></i>
                    <p style="color:rgba(255,255,255,0.7); font-size:12px; margin:0 0 6px;">WhatsApp</p>
                    <a href="https://wa.me/6285695888470" target="_blank"
                        style="color:#fff; font-size:14px; font-weight:700; text-decoration:none;">
                        +62 856-9588-8470
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mb-4 text-center">
                <div style="background:rgba(255,255,255,0.1); border-radius:12px; padding:24px;">
                    <i class="fa fa-envelope" style="font-size:32px; color:#f0c040; margin-bottom:12px; display:block;"></i>
                    <p style="color:rgba(255,255,255,0.7); font-size:12px; margin:0 0 6px;">Email</p>
                    <a href="mailto:bkksmkkosgoro@gmail.com"
                        style="color:#fff; font-size:13px; font-weight:700; text-decoration:none;">
                        bkksmkkosgoro@gmail.com
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mb-4 text-center">
                <div style="background:rgba(255,255,255,0.1); border-radius:12px; padding:24px;">
                    <i class="fa fa-instagram" style="font-size:32px; color:#f0c040; margin-bottom:12px; display:block;"></i>
                    <p style="color:rgba(255,255,255,0.7); font-size:12px; margin:0 0 6px;">Instagram</p>
                    <a href="https://www.instagram.com/bkksmkkosgoro/" target="_blank"
                        style="color:#fff; font-size:14px; font-weight:700; text-decoration:none;">
                        @bkksmkkosgoro
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mb-4 text-center">
                <div style="background:rgba(255,255,255,0.1); border-radius:12px; padding:24px;">
                    <i class="fa fa-map-marker" style="font-size:32px; color:#f0c040; margin-bottom:12px; display:block;"></i>
                    <p style="color:rgba(255,255,255,0.7); font-size:12px; margin:0 0 6px;">Alamat</p>
                    <p style="color:#fff; font-size:13px; font-weight:700; margin:0;">
                        {{ \App\Aplikasi::first()->alamat }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection