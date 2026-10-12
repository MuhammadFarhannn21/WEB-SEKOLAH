@php
$warna = [
    ['header' => '#1a2e5a', 'avatar' => '#0d1f3c', 'back' => '#1a2e5a'],
    ['header' => '#1a73e8', 'avatar' => '#1558b0', 'back' => '#1a73e8'],
    ['header' => '#0F6E56', 'avatar' => '#085041', 'back' => '#0F6E56'],
    ['header' => '#3C3489', 'avatar' => '#26215C', 'back' => '#3C3489'],
    ['header' => '#854F0B', 'avatar' => '#633806', 'back' => '#854F0B'],
    ['header' => '#993556', 'avatar' => '#72243E', 'back' => '#993556'],
    ['header' => '#185FA5', 'avatar' => '#0C447C', 'back' => '#185FA5'],
    ['header' => '#3B6D11', 'avatar' => '#27500A', 'back' => '#3B6D11'],
];
$guru_list = \App\GuruTerbaik::where('status','aktif')->limit(8)->get();
@endphp

<style>
.guru-section { padding: 70px 0; background: #f8f9fa; }
.guru-title { text-align: center; margin-bottom: 40px; }
.guru-title h2 { font-size: 28px; font-weight: 700; color: #1a2e5a; margin-bottom: 8px; }
.guru-title .garis { width: 60px; height: 3px; background: #1a73e8; margin: 0 auto 10px; }
.guru-title p { color: #666; font-size: 14px; }
.flip-wrap { perspective: 900px; height: 240px; cursor: pointer; }
.flip-inner { position: relative; width: 100%; height: 100%; transition: transform 0.6s cubic-bezier(.4,0,.2,1); transform-style: preserve-3d; }
.flip-wrap:hover .flip-inner { transform: rotateY(180deg); }
.flip-front, .flip-back { position: absolute; width: 100%; height: 100%; backface-visibility: hidden; border-radius: 12px; overflow: hidden; border: 1px solid rgba(0,0,0,0.08); box-shadow: 0 4px 15px rgba(0,0,0,0.08); }
.flip-back { transform: rotateY(180deg); display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 20px; text-align: center; }
.guru-nama { font-size: 13px; font-weight: 700; color: #1a2e5a; margin: 0 0 2px; }
.guru-mapel-text { font-size: 11px; color: #666; margin: 0 0 8px; }
.mapel-badge { display: inline-block; font-size: 10px; padding: 3px 10px; border-radius: 20px; font-weight: 600; max-width: 90%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
.hover-hint { font-size: 10px; color: #999; margin: 6px 0 0; }
</style>

<section class="guru-section">
    <div class="container">
        <div class="guru-title">
            <h2>{!! \App\Aplikasi::first()->judul_guru !!}</h2>
            <div class="garis"></div>
            <p>{!! \App\Aplikasi::first()->judul_sub_guru !!}</p>
        </div>

        <div class="row justify-content-center">
            @foreach($guru_list as $index => $guru)
            @php $w = $warna[$index % count($warna)]; @endphp
            <div class="col-lg-3 col-md-4 col-6 mb-4">
                <div class="flip-wrap">
                    <div class="flip-inner">
                        {{-- DEPAN --}}
                        <div class="flip-front" style="background:#fff;">
                            <div style="height:85px; background:{{ $w['header'] }};"></div>
                            <div style="transform:translateY(-28px); text-align:center; margin-bottom:-16px;">
                                @if($guru->gambar)
                                <div style="width:56px; height:56px; border-radius:50%; background-image:url('{{ asset($guru->gambar) }}'); background-size:cover; background-position:center top; margin:0 auto; border:3px solid #fff; box-shadow:0 2px 8px rgba(0,0,0,0.15);"></div>
                                @else
                                <div style="width:56px; height:56px; border-radius:50%; background:{{ $w['avatar'] }}; margin:0 auto; border:3px solid #fff; display:flex; align-items:center; justify-content:center; color:#fff; font-size:14px; font-weight:700;">
                                    {{ strtoupper(substr($guru->nama, 0, 1)) }}{{ strtoupper(substr(explode(' ', $guru->nama)[1] ?? '', 0, 1)) }}
                                </div>
                                @endif
                            </div>
                            <div style="text-align:center; padding:0 12px 12px;">
                                <p class="guru-nama">{{ $guru->nama }}</p>
                                <p class="guru-mapel-text">{{ $guru->mata_pelajaran }}</p>
                                <span class="mapel-badge" style="background:{{ $w['header'] }}22; color:{{ $w['header'] }};">
                                    {{ substr($guru->mata_pelajaran, 0, 22) }}
                                </span>
                                <p class="hover-hint"><i class="fa fa-hand-o-up"></i> Hover untuk info</p>
                            </div>
                        </div>
                        {{-- BELAKANG --}}
                        <div class="flip-back" style="background:{{ $w['back'] }};">
                            {{-- Logo SMK --}}
                            <div style="width:34px; height:34px; border-radius:50%; background:rgba(255,255,255,0.9); padding:3px; display:flex; align-items:center; justify-content:center; box-shadow:0 2px 6px rgba(0,0,0,0.2); margin-bottom:10px;">
                                <img src="{{ asset('frontend/images/logo.png') }}" style="width:100%; height:100%; object-fit:contain; border-radius:50%;">
                            </div>
                            <p style="color:#fff; font-weight:700; font-size:13px; margin:0 0 3px;">{{ $guru->nama }}</p>
                            <p style="color:rgba(255,255,255,0.8); font-size:11px; margin:0 0 10px;">{{ $guru->mata_pelajaran }}</p>
                            <div style="width:35px; height:1px; background:rgba(255,255,255,0.4); margin-bottom:10px;"></div>
                            @if($guru->pesan)
                            <p style="color:rgba(255,255,255,0.9); font-size:11px; font-style:italic; margin:0; line-height:1.6;">
                                "{{ substr($guru->pesan, 0, 80) }}{{ strlen($guru->pesan) > 80 ? '...' : '' }}"
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div style="text-align:center; margin-top:10px;">
            <p style="font-size:12px; color:#999;">
                <i class="fa fa-info-circle"></i> Arahkan kursor ke kartu untuk melihat informasi lengkap
            </p>
        </div>
    </div>
</section>