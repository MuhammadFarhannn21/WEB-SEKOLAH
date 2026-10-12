@php
$videos = \App\Timeline::where('status','aktif')->orderBy('posisi','ASC')->get();

$youtube   = $videos->filter(fn($v) => str_contains($v->link_youtube,'youtube') || str_contains($v->link_youtube,'youtu.be'));
$instagram = $videos->filter(fn($v) => str_contains($v->link_youtube,'instagram'));
$tiktok    = $videos->filter(fn($v) => str_contains($v->link_youtube,'tiktok'));
@endphp

@if($videos->count() > 0)
<section class="m-section m-section-dark">
    <div class="container">

        {{-- Title --}}
        <div class="m-head center reveal">
            <span class="m-eyebrow"><i class="fa fa-play-circle"></i> Video</span>
            <h2 class="m-title">Video & Konten Kegiatan</h2>
            <p class="m-sub">Dokumentasi kegiatan sekolah di YouTube, Instagram, dan TikTok.</p>
        </div>

        {{-- Tab Platform --}}
        <div style="display:flex; justify-content:center; gap:10px; margin-bottom:40px; flex-wrap:wrap;">
            @if($youtube->count() > 0)
            <button onclick="showPlatform('youtube')" id="tab-youtube"
                style="padding:10px 24px; border-radius:25px; border:2px solid #FF0000; background:#fff; color:#FF0000; font-size:13px; font-weight:600; cursor:pointer; display:flex; align-items:center; gap:8px;">
                <i class="fa fa-youtube-play"></i> YouTube ({{ $youtube->count() }})
            </button>
            @endif
            @if($instagram->count() > 0)
            <button onclick="showPlatform('instagram')" id="tab-instagram"
                style="padding:10px 24px; border-radius:25px; border:none; background:linear-gradient(135deg, #f09433, #dc2743, #bc1888); color:#fff; font-size:13px; font-weight:600; cursor:pointer; display:flex; align-items:center; gap:8px; box-shadow:0 4px 15px rgba(225,48,108,0.3);">
                <i class="fa fa-instagram"></i> Instagram ({{ $instagram->count() }})
            </button>
            @endif
            @if($tiktok->count() > 0)
            <button onclick="showPlatform('tiktok')" id="tab-tiktok"
                style="padding:10px 24px; border-radius:25px; border:2px solid #000; background:#fff; color:#000; font-size:13px; font-weight:600; cursor:pointer; display:flex; align-items:center; gap:8px;">
                <i class="fa fa-music"></i> TikTok ({{ $tiktok->count() }})
            </button>
            @endif
        </div>

        {{-- Section YouTube --}}
        @if($youtube->count() > 0)
        <div id="section-youtube" style="display:none;">
            <div class="row">
                @foreach($youtube->take(3) as $video)
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div style="background:#fff; border-radius:14px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.08); transition:transform 0.3s;"
                        onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <div style="position:relative; height:190px;">
                            @if($video->featured)
                            <div style="width:100%; height:100%; background-image:url('{{ asset($video->featured) }}'); background-size:cover; background-position:center;"></div>
                            @else
                            <div style="width:100%; height:100%; background:#FF0000; display:flex; align-items:center; justify-content:center;">
                                <i class="fa fa-youtube-play" style="color:rgba(255,255,255,0.4); font-size:50px;"></i>
                            </div>
                            @endif
                            <div style="position:absolute; inset:0; background:rgba(0,0,0,0.3);"></div>
                            <a href="{{ $video->link_youtube }}" target="_blank"
                                style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:52px; height:52px; background:#FF0000; border-radius:50%; display:flex; align-items:center; justify-content:center; text-decoration:none; box-shadow:0 4px 15px rgba(255,0,0,0.4); transition:transform 0.3s;"
                                onmouseover="this.style.transform='translate(-50%,-50%) scale(1.1)'"
                                onmouseout="this.style.transform='translate(-50%,-50%) scale(1)'">
                                <i class="fa fa-play" style="color:#fff; font-size:18px; margin-left:3px;"></i>
                            </a>
                        </div>
                        <div style="padding:16px;">
                            <h4 style="font-size:14px; font-weight:700; color:#1a2e5a; margin-bottom:6px;">{{ $video->judul }}</h4>
                            @if($video->body && $video->body != '-')
                            <p style="color:#888; font-size:12px; line-height:1.6; margin-bottom:12px;">{{ substr(strip_tags($video->body), 0, 80) }}...</p>
                            @endif
                            <a href="{{ $video->link_youtube }}" target="_blank"
                                style="display:inline-flex; align-items:center; gap:6px; background:#FF0000; color:#fff; padding:7px 16px; border-radius:20px; font-size:12px; font-weight:600; text-decoration:none;">
                                <i class="fa fa-youtube-play"></i> Tonton di YouTube
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Section Instagram --}}
        @if($instagram->count() > 0)
        <div id="section-instagram">
            <div class="row">
                @foreach($instagram->take(3) as $video)
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div style="background:#fff; border-radius:14px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.08); transition:transform 0.3s;"
                        onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <div style="position:relative; height:190px;">
                            @if($video->featured)
                            <div style="width:100%; height:100%; background-image:url('{{ asset($video->featured) }}'); background-size:cover; background-position:center;"></div>
                            @else
                            <div style="width:100%; height:100%; background:linear-gradient(135deg, #f09433, #dc2743, #bc1888); display:flex; align-items:center; justify-content:center;">
                                <i class="fa fa-instagram" style="color:rgba(255,255,255,0.4); font-size:50px;"></i>
                            </div>
                            @endif
                            <div style="position:absolute; inset:0; background:rgba(0,0,0,0.25);"></div>
                            <div style="position:absolute; top:12px; left:12px; background:linear-gradient(135deg, #f09433, #dc2743); color:#fff; padding:3px 10px; border-radius:20px; font-size:11px; font-weight:700;">
                                <i class="fa fa-instagram" style="margin-right:3px;"></i>Instagram
                            </div>
                            <a href="{{ $video->link_youtube }}" target="_blank"
                                style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:52px; height:52px; background:linear-gradient(135deg, #f09433, #dc2743); border-radius:50%; display:flex; align-items:center; justify-content:center; text-decoration:none; box-shadow:0 4px 15px rgba(225,48,108,0.4); transition:transform 0.3s;"
                                onmouseover="this.style.transform='translate(-50%,-50%) scale(1.1)'"
                                onmouseout="this.style.transform='translate(-50%,-50%) scale(1)'">
                                <i class="fa fa-instagram" style="color:#fff; font-size:20px;"></i>
                            </a>
                        </div>
                        <div style="padding:16px;">
                            <h4 style="font-size:14px; font-weight:700; color:#1a2e5a; margin-bottom:6px;">{{ $video->judul }}</h4>
                            @if($video->body && $video->body != '-')
                            <p style="color:#888; font-size:12px; line-height:1.6; margin-bottom:12px;">{{ substr(strip_tags($video->body), 0, 80) }}...</p>
                            @endif
                            <a href="{{ $video->link_youtube }}" target="_blank"
                                style="display:inline-flex; align-items:center; gap:6px; background:linear-gradient(135deg, #f09433, #dc2743, #bc1888); color:#fff; padding:7px 16px; border-radius:20px; font-size:12px; font-weight:600; text-decoration:none;">
                                <i class="fa fa-instagram"></i> Lihat di Instagram
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Section TikTok --}}
        @if($tiktok->count() > 0)
        <div id="section-tiktok" style="display:none;">
            <div class="row">
                @foreach($tiktok->take(3) as $video)
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div style="background:#fff; border-radius:14px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.08); transition:transform 0.3s;"
                        onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <div style="position:relative; height:190px;">
                            @if($video->featured)
                            <div style="width:100%; height:100%; background-image:url('{{ asset($video->featured) }}'); background-size:cover; background-position:center;"></div>
                            @else
                            <div style="width:100%; height:100%; background:#000; display:flex; align-items:center; justify-content:center;">
                                <i class="fa fa-music" style="color:rgba(255,255,255,0.4); font-size:50px;"></i>
                            </div>
                            @endif
                            <div style="position:absolute; inset:0; background:rgba(0,0,0,0.25);"></div>
                            <div style="position:absolute; top:12px; left:12px; background:#000; color:#69C9D0; padding:3px 10px; border-radius:20px; font-size:11px; font-weight:700;">
                                <i class="fa fa-music" style="margin-right:3px;"></i>TikTok
                            </div>
                            <a href="{{ $video->link_youtube }}" target="_blank"
                                style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:52px; height:52px; background:#000; border-radius:50%; display:flex; align-items:center; justify-content:center; text-decoration:none; box-shadow:0 4px 15px rgba(0,0,0,0.4); transition:transform 0.3s;"
                                onmouseover="this.style.transform='translate(-50%,-50%) scale(1.1)'"
                                onmouseout="this.style.transform='translate(-50%,-50%) scale(1)'">
                                <i class="fa fa-music" style="color:#69C9D0; font-size:18px;"></i>
                            </a>
                        </div>
                        <div style="padding:16px;">
                            <h4 style="font-size:14px; font-weight:700; color:#1a2e5a; margin-bottom:6px;">{{ $video->judul }}</h4>
                            @if($video->body && $video->body != '-')
                            <p style="color:#888; font-size:12px; line-height:1.6; margin-bottom:12px;">{{ substr(strip_tags($video->body), 0, 80) }}...</p>
                            @endif
                            <a href="{{ $video->link_youtube }}" target="_blank"
                                style="display:inline-flex; align-items:center; gap:6px; background:#000; color:#69C9D0; padding:7px 16px; border-radius:20px; font-size:12px; font-weight:600; text-decoration:none;">
                                <i class="fa fa-music"></i> Lihat di TikTok
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</section>

<script>
function showPlatform(platform) {
    var sections = ['youtube', 'instagram', 'tiktok'];
    sections.forEach(function(p) {
        var el = document.getElementById('section-' + p);
        var tab = document.getElementById('tab-' + p);
        if (el) el.style.display = 'none';
        if (tab) {
            if (p === 'youtube') { tab.style.background = '#fff'; tab.style.color = '#FF0000'; tab.style.border = '2px solid #FF0000'; tab.style.boxShadow = 'none'; }
            if (p === 'instagram') { tab.style.background = '#fff'; tab.style.color = '#E1306C'; tab.style.border = '2px solid #E1306C'; tab.style.boxShadow = 'none'; }
            if (p === 'tiktok') { tab.style.background = '#fff'; tab.style.color = '#000'; tab.style.border = '2px solid #000'; tab.style.boxShadow = 'none'; }
        }
    });

    var active = document.getElementById('section-' + platform);
    var activeTab = document.getElementById('tab-' + platform);
    if (active) active.style.display = 'block';
    if (activeTab) {
        if (platform === 'youtube') { activeTab.style.background = '#FF0000'; activeTab.style.color = '#fff'; activeTab.style.border = 'none'; activeTab.style.boxShadow = '0 4px 15px rgba(255,0,0,0.3)'; }
        if (platform === 'instagram') { activeTab.style.background = 'linear-gradient(135deg, #f09433, #dc2743, #bc1888)'; activeTab.style.color = '#fff'; activeTab.style.border = 'none'; activeTab.style.boxShadow = '0 4px 15px rgba(225,48,108,0.3)'; }
        if (platform === 'tiktok') { activeTab.style.background = '#000'; activeTab.style.color = '#fff'; activeTab.style.border = 'none'; activeTab.style.boxShadow = '0 4px 15px rgba(0,0,0,0.3)'; }
    }
}
// Buka tab platform pertama yang tersedia saat halaman dimuat
showPlatform('{{ $youtube->count() ? 'youtube' : ($instagram->count() ? 'instagram' : 'tiktok') }}');
</script>
@endif