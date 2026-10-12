@extends('frontend.layouts.master')

@section('konten')

{{-- Breadcrumb --}}
<section style="background-image: url({{ asset(\App\Aplikasi::first()->gambar_total_siswa) }}); background-size:cover; background-position:center; padding:60px 0; position:relative;">
    <div style="position:absolute; top:0; left:0; right:0; bottom:0; background:rgba(26,46,90,0.75);"></div>
    <div class="container" style="position:relative; z-index:1; text-align:center;">
        <h2 style="color:#fff; font-size:32px; font-weight:700; margin-bottom:10px;">Ekstrakurikuler</h2>
        <ul style="list-style:none; padding:0; margin:0; display:flex; justify-content:center; align-items:center; gap:8px;">
            <li><a href="{{ url('/') }}" style="color:rgba(255,255,255,0.8); text-decoration:none; font-size:14px;">Home</a></li>
            <li style="color:rgba(255,255,255,0.5);"><i class="fa fa-angle-right"></i></li>
            <li style="color:#fff; font-size:14px;">Ekstrakurikuler</li>
        </ul>
    </div>
</section>

{{-- Konten --}}
<section style="padding:70px 0; background:#f8f9fa;">
    <div class="container">
        <div style="text-align:center; margin-bottom:50px;">
            <h2 style="font-size:28px; font-weight:700; color:#1a2e5a; margin-bottom:8px;">Kegiatan Ekstrakurikuler</h2>
            <div style="width:60px; height:3px; background:#1a73e8; margin:0 auto 10px;"></div>
            <p style="color:#666; font-size:14px;">Pengembangan bakat dan minat siswa SMK Kosgoro</p>
        </div>

        <div class="row">
            @forelse($ekskul as $item)
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div style="background:#fff; border-radius:16px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.08); transition:transform 0.3s;"
                    onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform='translateY(0)'">
                    {{-- Foto --}}
                    <div style="position:relative; overflow:hidden; height:220px;">
                        @if($item->foto)
                        <div style="width:100%; height:100%; background-image:url('{{ asset($item->foto) }}'); background-size:cover; background-position:center; transition:transform 0.5s;"
                            onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'"></div>
                        @else
                        <div style="width:100%; height:100%; background:linear-gradient(135deg, #0F6E56, #1a73e8); display:flex; align-items:center; justify-content:center;">
                            <i class="fa fa-star" style="font-size:50px; color:rgba(255,255,255,0.5);"></i>
                        </div>
                        @endif
                        <div style="position:absolute; top:0; left:0; right:0; bottom:0; background:linear-gradient(to top, rgba(26,46,90,0.7) 0%, transparent 60%);"></div>
                        {{-- Badge --}}
                        <div style="position:absolute; top:12px; right:12px; background:#0F6E56; color:#fff; padding:4px 12px; border-radius:20px; font-size:11px; font-weight:600;">
                            Ekstrakurikuler
                        </div>
                    </div>
                    {{-- Info --}}
                    <div style="padding:20px;">
                        <h4 style="font-size:17px; font-weight:700; color:#1a2e5a; margin-bottom:6px;">{{ $item->nama }}</h4>
                        @if($item->pembina)
                        <p style="color:#888; font-size:12px; margin-bottom:8px;">
                            <i class="fa fa-user" style="color:#1a73e8; margin-right:4px;"></i>
                            Pembina: {{ $item->pembina }}
                        </p>
                        @endif
                        @if($item->deskripsi)
                        <p style="color:#777; font-size:13px; line-height:1.7; margin-bottom:14px;">
                            {{ substr($item->deskripsi, 0, 90) }}{{ strlen($item->deskripsi) > 90 ? '...' : '' }}
                        </p>
                        @endif
                        <a href="{{ url('ekstrakurikuler/'.$item->id) }}"
                            style="display:inline-flex; align-items:center; gap:6px; background:#0F6E56; color:#fff; padding:8px 18px; border-radius:20px; font-size:13px; font-weight:600; text-decoration:none;">
                            Lihat Detail <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12" style="text-align:center; padding:60px;">
                <i class="fa fa-star" style="font-size:60px; color:#e0e0e0;"></i>
                <p style="color:#999; margin-top:16px; font-size:16px;">Belum ada data ekstrakurikuler</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection