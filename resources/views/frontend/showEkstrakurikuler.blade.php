@extends('frontend.layouts.master')

@section('konten')

{{-- Breadcrumb --}}
<section style="background-image: url({{ asset(\App\Aplikasi::first()->gambar_total_siswa) }}); background-size:cover; background-position:center; padding:60px 0; position:relative;">
    <div style="position:absolute; top:0; left:0; right:0; bottom:0; background:rgba(26,46,90,0.75);"></div>
    <div class="container" style="position:relative; z-index:1; text-align:center;">
        <h2 style="color:#fff; font-size:28px; font-weight:700; margin-bottom:10px;">{{ $ekskul->nama }}</h2>
        <ul style="list-style:none; padding:0; margin:0; display:flex; justify-content:center; align-items:center; gap:8px;">
            <li><a href="{{ url('/') }}" style="color:rgba(255,255,255,0.8); text-decoration:none; font-size:14px;">Home</a></li>
            <li style="color:rgba(255,255,255,0.5);"><i class="fa fa-angle-right"></i></li>
            <li><a href="{{ url('/ekstrakurikuler') }}" style="color:rgba(255,255,255,0.8); text-decoration:none; font-size:14px;">Ekstrakurikuler</a></li>
            <li style="color:rgba(255,255,255,0.5);"><i class="fa fa-angle-right"></i></li>
            <li style="color:#fff; font-size:14px;">{{ substr($ekskul->nama, 0, 30) }}</li>
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
                    @if($ekskul->foto)
                    <div style="width:100%; height:400px; background-image:url('{{ asset($ekskul->foto) }}'); background-size:cover; background-position:center;"></div>
                    @endif
                    <div style="padding:32px;">
                        <h2 style="font-size:26px; font-weight:700; color:#1a2e5a; margin-bottom:8px;">{{ $ekskul->nama }}</h2>
                        @if($ekskul->pembina)
                        <div style="display:inline-flex; align-items:center; gap:8px; background:#f0f9f5; border:1px solid #0F6E56; border-radius:20px; padding:6px 16px; margin-bottom:16px;">
                            <i class="fa fa-user" style="color:#0F6E56;"></i>
                            <span style="color:#0F6E56; font-size:13px; font-weight:600;">Pembina: {{ $ekskul->pembina }}</span>
                        </div>
                        @endif
                        @if($ekskul->deskripsi)
                        <div style="color:#555; font-size:15px; line-height:1.9; margin-top:16px;">
                            {!! nl2br(e($ekskul->deskripsi)) !!}
                        </div>
                        @endif
                        <div style="margin-top:24px;">
                            <a href="{{ url('/ekstrakurikuler') }}" style="display:inline-flex; align-items:center; gap:6px; background:#0F6E56; color:#fff; padding:10px 24px; border-radius:25px; font-size:14px; font-weight:600; text-decoration:none;">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Ekskul Lainnya --}}
            <div class="col-lg-4 col-12 mt-4 mt-lg-0">
                <div style="background:#fff; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08);">
                    <h4 style="font-size:16px; font-weight:700; color:#1a2e5a; margin-bottom:16px; padding-bottom:12px; border-bottom:2px solid #0F6E56; display:inline-block;">
                        Ekskul Lainnya
                    </h4>
                    @foreach(\App\Ekstrakurikuler::where('status','aktif')->where('id','!=',$ekskul->id)->limit(5)->get() as $lain)
                    <a href="{{ url('ekstrakurikuler/'.$lain->id) }}" style="display:flex; gap:12px; align-items:center; padding:10px 0; border-bottom:1px solid #f0f0f0; text-decoration:none;">
                        @if($lain->foto)
                        <div style="width:60px; height:60px; border-radius:8px; background-image:url('{{ asset($lain->foto) }}'); background-size:cover; background-position:center; flex-shrink:0;"></div>
                        @else
                        <div style="width:60px; height:60px; border-radius:8px; background:#f0f9f5; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <i class="fa fa-star" style="color:#0F6E56;"></i>
                        </div>
                        @endif
                        <div>
                            <p style="color:#1a2e5a; font-size:13px; font-weight:600; margin:0 0 3px;">{{ $lain->nama }}</p>
                            @if($lain->pembina)
                            <p style="color:#888; font-size:11px; margin:0;">{{ $lain->pembina }}</p>
                            @endif
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection