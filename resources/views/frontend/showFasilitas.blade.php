@extends('frontend.layouts.master')

@section('konten')

{{-- Breadcrumb --}}
<section style="background-image: url({{ asset(\App\Aplikasi::first()->gambar_total_siswa) }}); background-size:cover; background-position:center; padding:60px 0; position:relative;">
    <div style="position:absolute; top:0; left:0; right:0; bottom:0; background:rgba(26,46,90,0.75);"></div>
    <div class="container" style="position:relative; z-index:1; text-align:center;">
        <h2 style="color:#fff; font-size:28px; font-weight:700; margin-bottom:10px;">{{ $fasilitas->nama }}</h2>
        <ul style="list-style:none; padding:0; margin:0; display:flex; justify-content:center; align-items:center; gap:8px;">
            <li><a href="{{ url('/') }}" style="color:rgba(255,255,255,0.8); text-decoration:none; font-size:14px;">Home</a></li>
            <li style="color:rgba(255,255,255,0.5);"><i class="fa fa-angle-right"></i></li>
            <li><a href="{{ url('/fasilitas') }}" style="color:rgba(255,255,255,0.8); text-decoration:none; font-size:14px;">Fasilitas</a></li>
            <li style="color:rgba(255,255,255,0.5);"><i class="fa fa-angle-right"></i></li>
            <li style="color:#fff; font-size:14px;">{{ substr($fasilitas->nama, 0, 30) }}</li>
        </ul>
    </div>
</section>

{{-- Konten Detail --}}
<section style="padding:70px 0; background:#f8f9fa;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <div style="background:#fff; border-radius:16px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.08);">
                    {{-- Foto --}}
                    @if($fasilitas->foto)
                    <div style="width:100%; height:400px; background-image:url('{{ asset($fasilitas->foto) }}'); background-size:cover; background-position:center;"></div>
                    @else
                    <div style="width:100%; height:300px; background:linear-gradient(135deg, #1a2e5a, #1a73e8); display:flex; align-items:center; justify-content:center;">
                        <i class="fa fa-building" style="font-size:80px; color:rgba(255,255,255,0.3);"></i>
                    </div>
                    @endif

                    <div style="padding:32px;">
                        {{-- Badge --}}
                        <span style="background:#1a73e8; color:#fff; padding:4px 14px; border-radius:20px; font-size:12px; font-weight:600; display:inline-block; margin-bottom:16px;">
                            Fasilitas Sekolah
                        </span>

                        <h2 style="font-size:26px; font-weight:700; color:#1a2e5a; margin-bottom:16px;">{{ $fasilitas->nama }}</h2>

                        @if($fasilitas->deskripsi)
                        <div style="color:#555; font-size:15px; line-height:1.9;">
                            {!! nl2br(e($fasilitas->deskripsi)) !!}
                        </div>
                        @else
                        <p style="color:#999; font-style:italic;">Tidak ada deskripsi tersedia.</p>
                        @endif

                        <div style="margin-top:28px; padding-top:20px; border-top:1px solid #f0f0f0;">
                            <a href="{{ url('/fasilitas') }}" style="display:inline-flex; align-items:center; gap:6px; background:#1a2e5a; color:#fff; padding:10px 24px; border-radius:25px; font-size:14px; font-weight:600; text-decoration:none;">
                                <i class="fa fa-arrow-left"></i> Kembali ke Fasilitas
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Fasilitas Lainnya --}}
            <div class="col-lg-4 col-12 mt-4 mt-lg-0">
                <div style="background:#fff; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08);">
                    <h4 style="font-size:16px; font-weight:700; color:#1a2e5a; margin-bottom:20px; padding-bottom:12px; border-bottom:3px solid #1a73e8;">
                        Fasilitas Lainnya
                    </h4>
                    @forelse(\App\Fasilitas::where('status','aktif')->where('id','!=',$fasilitas->id)->limit(5)->get() as $lain)
                    <a href="{{ url('fasilitas/'.$lain->id) }}" style="display:flex; gap:12px; align-items:center; padding:12px 0; border-bottom:1px solid #f0f0f0; text-decoration:none; transition:opacity 0.2s;"
                        onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1'">
                        @if($lain->foto)
                        <div style="width:65px; height:65px; border-radius:10px; background-image:url('{{ asset($lain->foto) }}'); background-size:cover; background-position:center; flex-shrink:0;"></div>
                        @else
                        <div style="width:65px; height:65px; border-radius:10px; background:#f0f4ff; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <i class="fa fa-building" style="color:#1a73e8; font-size:20px;"></i>
                        </div>
                        @endif
                        <div>
                            <p style="color:#1a2e5a; font-size:13px; font-weight:600; margin:0 0 4px;">{{ $lain->nama }}</p>
                            @if($lain->deskripsi)
                            <p style="color:#999; font-size:11px; margin:0;">{{ substr($lain->deskripsi, 0, 40) }}...</p>
                            @endif
                        </div>
                    </a>
                    @empty
                    <p style="color:#999; font-size:13px; text-align:center; padding:20px 0;">Tidak ada fasilitas lainnya</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</section>

@endsection