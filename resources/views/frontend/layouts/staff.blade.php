@php
$guru = \App\GuruTerbaik::where('status','aktif')->where('tipe','Guru')->get();
$staff = \App\GuruTerbaik::where('status','aktif')->where('tipe','Staff')->get();
@endphp

@if($guru->count() > 0 || $staff->count() > 0)
<section class="m-section m-section-soft">
    <div class="container">

        {{-- Title --}}
        <div class="m-head center reveal">
            <span class="m-eyebrow"><i class="fa fa-users"></i> Tim Kami</span>
            <h2 class="m-title">Tenaga Pendidik & Kependidikan</h2>
            <p class="m-sub">Kenali guru dan staff yang mendampingi putra-putri Anda setiap hari.</p>
        </div>

        {{-- Tab --}}
        <div style="display:flex; justify-content:center; gap:12px; margin-bottom:40px;">
            <button onclick="showTab('guru')" id="tab-guru"
                style="padding:10px 30px; border-radius:25px; border:none; background:#1a2e5a; color:#fff; font-size:14px; font-weight:600; cursor:pointer;">
                <i class="fa fa-graduation-cap" style="margin-right:6px;"></i>
                Tenaga Pengajar ({{ $guru->count() }})
            </button>
            <button onclick="showTab('staff')" id="tab-staff"
                style="padding:10px 30px; border-radius:25px; border:2px solid #1a2e5a; background:#fff; color:#1a2e5a; font-size:14px; font-weight:600; cursor:pointer;">
                <i class="fa fa-users" style="margin-right:6px;"></i>
                Tenaga Kependidikan ({{ $staff->count() }})
            </button>
        </div>

        <style>
        .staff-card { position:relative; overflow:hidden; border-radius:16px; background:#fff; box-shadow:0 4px 20px rgba(0,0,0,0.08); transition:transform 0.3s; cursor:pointer; }
        .staff-card:hover { transform:translateY(-8px); }
        .staff-card .foto-wrap { width:100%; height:340px; overflow:hidden; }
       .staff-card .foto-wrap img { width:100%; height:100%; object-fit:cover; object-position:top; transition:transform 0.5s; }
        .staff-card:hover .foto-wrap img { transform:scale(1.05); }
        .staff-card .info { padding:18px; }
        .staff-card .garis-guru { height:4px; background:linear-gradient(to right, #1a2e5a, #1a73e8); }
        .staff-card .garis-staff { height:4px; background:linear-gradient(to right, #0F6E56, #1a73e8); }
        .staff-card .overlay-info {
            position:absolute; bottom:0; left:0; right:0;
            background:linear-gradient(to top, rgba(26,46,90,0.95) 0%, rgba(26,46,90,0.8) 60%, transparent 100%);
            padding:20px 18px;
            transform:translateY(100%);
            transition:transform 0.4s ease;
        }
        .staff-card:hover .overlay-info { transform:translateY(0); }
        .badge-guru { background:#1a73e8; color:#fff; padding:3px 12px; border-radius:20px; font-size:11px; font-weight:700; }
        .badge-staff { background:#0F6E56; color:#fff; padding:3px 12px; border-radius:20px; font-size:11px; font-weight:700; }
        .no-foto-guru { width:100%; height:280px; background:linear-gradient(135deg, #1a2e5a 0%, #1a73e8 100%); display:flex; align-items:center; justify-content:center; }
        .no-foto-staff { width:100%; height:280px; background:linear-gradient(135deg, #0F6E56 0%, #1a73e8 100%); display:flex; align-items:center; justify-content:center; }
        .staff-track-wrap { overflow:hidden; padding:10px 4px; }
        .staff-track { display:flex; gap:24px; transition:transform 0.4s ease; }
        .staff-track { display:flex; gap:15px; transition:transform 0.4s ease; }
        .staff-slide { min-width:calc(25% - 12px); flex-shrink:0; width:calc(25% - 12px); padding:0 5px; }
        @media(max-width:1200px) { .staff-slide { min-width:calc(33.333% - 10px); width:calc(33.333% - 10px); } }
        @media(max-width:768px) { .staff-slide { min-width:calc(50% - 8px); width:calc(50% - 8px); } }
        @media(max-width:480px) { .staff-slide { min-width:calc(100%); width:calc(100%); } }
        .staff-track-wrap { overflow:hidden; padding:10px 0; width:100%; }
        </style>

        {{-- Slider Guru --}}
        <div id="grid-guru">
            <div style="position:relative;">
                <div class="staff-track-wrap" id="wrapGuru">
                    <div class="staff-track" id="trackGuru">
                        @foreach($guru as $g)
                        <div class="staff-slide">
                            <div class="staff-card">
                                <div class="foto-wrap">
                                    @if($g->gambar)
                                    @php $fotoUrl = \Illuminate\Support\Str::startsWith($g->gambar, 'http') ? $g->gambar : asset($g->gambar); @endphp
                                    <img src="{{ $fotoUrl }}" alt="{{ $g->nama }}">
                                    @else
                                    <div class="no-foto-guru">
                                        <i class="fa fa-user" style="font-size:70px; color:rgba(255,255,255,0.3);"></i>
                                    </div>
                                    @endif
                                </div>
                                <div class="garis-guru"></div>
                                <div class="info">
                                    <p style="font-size:14px; font-weight:700; color:#1a2e5a; margin:0 0 4px; line-height:1.3;">{{ $g->nama }}</p>
                                    <p style="font-size:12px; color:#888; margin:0 0 8px;">{{ $g->mata_pelajaran }}</p>
                                    <span class="badge-guru">Tenaga Pengajar</span>
                                </div>
                                <div class="overlay-info">
                                    <p style="color:#fff; font-weight:700; font-size:14px; margin:0 0 4px;">{{ $g->nama }}</p>
                                    <p style="color:rgba(255,255,255,0.8); font-size:12px; margin:0 0 8px;">{{ $g->mata_pelajaran }}</p>
                                    @if($g->lulusan)
                                    <p style="color:rgba(255,255,255,0.7); font-size:11px; margin:0 0 6px;">
                                        <i class="fa fa-university" style="margin-right:4px;"></i>{{ $g->lulusan }}
                                    </p>
                                    @endif
                                    @if($g->pesan)
                                    <p style="color:rgba(255,255,255,0.7); font-size:11px; font-style:italic; margin:0;">
                                        "{{ substr($g->pesan, 0, 60) }}{{ strlen($g->pesan) > 60 ? '...' : '' }}"
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Tombol Prev --}}
                <button onclick="staffPrev('trackGuru', 'dotsGuru', {{ $guru->count() }})"
                    style="position:absolute; top:45%; left:-20px; transform:translateY(-50%); width:44px; height:44px; border-radius:50%; background:#fff; border:none; box-shadow:0 4px 15px rgba(0,0,0,0.15); cursor:pointer; display:flex; align-items:center; justify-content:center; z-index:10; transition:background 0.3s;"
                    onmouseover="this.style.background='#1a2e5a'; this.querySelector('i').style.color='#fff'"
                    onmouseout="this.style.background='#fff'; this.querySelector('i').style.color='#1a2e5a'">
                    <i class="fa fa-angle-left" style="color:#1a2e5a; font-size:18px;"></i>
                </button>
                {{-- Tombol Next --}}
                <button onclick="staffNext('trackGuru', 'dotsGuru', {{ $guru->count() }})"
                    style="position:absolute; top:45%; right:-20px; transform:translateY(-50%); width:44px; height:44px; border-radius:50%; background:#fff; border:none; box-shadow:0 4px 15px rgba(0,0,0,0.15); cursor:pointer; display:flex; align-items:center; justify-content:center; z-index:10; transition:background 0.3s;"
                    onmouseover="this.style.background='#1a2e5a'; this.querySelector('i').style.color='#fff'"
                    onmouseout="this.style.background='#fff'; this.querySelector('i').style.color='#1a2e5a'">
                    <i class="fa fa-angle-right" style="color:#1a2e5a; font-size:18px;"></i>
                </button>
            </div>

            {{-- Dots Guru --}}
            <div style="display:flex; justify-content:center; gap:6px; margin-top:20px;" id="dotsGuru">
                @for($i = 0; $i < $guru->count(); $i++)
                <div onclick="staffGoTo('trackGuru', 'dotsGuru', {{ $i }}, {{ $guru->count() }})"
                    style="width:{{ $i == 0 ? '24px' : '8px' }}; height:8px; border-radius:20px; background:{{ $i == 0 ? '#1a2e5a' : '#ddd' }}; cursor:pointer; transition:all 0.3s;"></div>
                @endfor
            </div>
        </div>

        {{-- Slider Staff --}}
        <div id="grid-staff" style="display:none;">
            <div style="position:relative;">
                <div class="staff-track-wrap" id="wrapStaff">
                    <div class="staff-track" id="trackStaff">
                        @foreach($staff as $s)
                        <div class="staff-slide">
                            <div class="staff-card">
                                <div class="foto-wrap">
                                    @if($s->gambar)
                                    @php $fotoUrl = \Illuminate\Support\Str::startsWith($s->gambar, 'http') ? $s->gambar : asset($s->gambar); @endphp
                                    <img src="{{ $fotoUrl }}" alt="{{ $s->nama }}">
                                    @else
                                    <div class="no-foto-staff">
                                        <i class="fa fa-user" style="font-size:70px; color:rgba(255,255,255,0.3);"></i>
                                    </div>
                                    @endif
                                </div>
                                <div class="garis-staff"></div>
                                <div class="info">
                                    <p style="font-size:14px; font-weight:700; color:#1a2e5a; margin:0 0 4px; line-height:1.3;">{{ $s->nama }}</p>
                                    <p style="font-size:12px; color:#888; margin:0 0 8px;">{{ $s->mata_pelajaran }}</p>
                                    <span class="badge-staff">Tenaga Kependidikan</span>
                                </div>
                                <div class="overlay-info">
                                    <p style="color:#fff; font-weight:700; font-size:14px; margin:0 0 4px;">{{ $s->nama }}</p>
                                    <p style="color:rgba(255,255,255,0.8); font-size:12px; margin:0 0 8px;">{{ $s->mata_pelajaran }}</p>
                                    @if($s->lulusan)
                                    <p style="color:rgba(255,255,255,0.7); font-size:11px; margin:0 0 6px;">
                                        <i class="fa fa-university" style="margin-right:4px;"></i>{{ $s->lulusan }}
                                    </p>
                                    @endif
                                    @if($s->pesan)
                                    <p style="color:rgba(255,255,255,0.7); font-size:11px; font-style:italic; margin:0;">
                                        "{{ substr($s->pesan, 0, 60) }}{{ strlen($s->pesan) > 60 ? '...' : '' }}"
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @if($staff->count() == 0)
                        <div style="text-align:center; padding:40px; width:100%;">
                            <i class="fa fa-users" style="font-size:50px; color:#e0e0e0;"></i>
                            <p style="color:#999; margin-top:16px;">Belum ada data tenaga kependidikan</p>
                        </div>
                        @endif
                    </div>
                </div>

                @if($staff->count() > 0)
                <button onclick="staffPrev('trackStaff', 'dotsStaff', {{ $staff->count() }})"
                    style="position:absolute; top:45%; left:-20px; transform:translateY(-50%); width:44px; height:44px; border-radius:50%; background:#fff; border:none; box-shadow:0 4px 15px rgba(0,0,0,0.15); cursor:pointer; display:flex; align-items:center; justify-content:center; z-index:10; transition:background 0.3s;"
                    onmouseover="this.style.background='#0F6E56'; this.querySelector('i').style.color='#fff'"
                    onmouseout="this.style.background='#fff'; this.querySelector('i').style.color='#1a2e5a'">
                    <i class="fa fa-angle-left" style="color:#1a2e5a; font-size:18px;"></i>
                </button>
                <button onclick="staffNext('trackStaff', 'dotsStaff', {{ $staff->count() }})"
                    style="position:absolute; top:45%; right:-20px; transform:translateY(-50%); width:44px; height:44px; border-radius:50%; background:#fff; border:none; box-shadow:0 4px 15px rgba(0,0,0,0.15); cursor:pointer; display:flex; align-items:center; justify-content:center; z-index:10; transition:background 0.3s;"
                    onmouseover="this.style.background='#0F6E56'; this.querySelector('i').style.color='#fff'"
                    onmouseout="this.style.background='#fff'; this.querySelector('i').style.color='#1a2e5a'">
                    <i class="fa fa-angle-right" style="color:#1a2e5a; font-size:18px;"></i>
                </button>
                @endif
            </div>

            @if($staff->count() > 0)
            <div style="display:flex; justify-content:center; gap:6px; margin-top:20px;" id="dotsStaff">
                @for($i = 0; $i < $staff->count(); $i++)
                <div onclick="staffGoTo('trackStaff', 'dotsStaff', {{ $i }}, {{ $staff->count() }})"
                    style="width:{{ $i == 0 ? '24px' : '8px' }}; height:8px; border-radius:20px; background:{{ $i == 0 ? '#0F6E56' : '#ddd' }}; cursor:pointer; transition:all 0.3s;"></div>
                @endfor
            </div>
            @endif
        </div>

    </div>
</section>

<script>
// State index per slider
var staffIndex = { trackGuru: 0, trackStaff: 0 };

function getCardWidth(trackId) {
    var track = document.getElementById(trackId);
    var slide = track.querySelector('.staff-slide');
    if (!slide) return 0;
    return slide.offsetWidth + 24;
}

function getVisible() {
    var w = window.innerWidth;
    if (w <= 480) return 1;
    if (w <= 768) return 2;
    if (w <= 1200) return 3;
    return 4;
}

function staffNext(trackId, dotsId, total) {
    var visible = getVisible();
    var maxIndex = total - visible;
    staffIndex[trackId]++;
    if (staffIndex[trackId] > maxIndex) {
        staffIndex[trackId] = 0; // Balik ke awal
    }
    applySlide(trackId, dotsId, total);
}

function staffPrev(trackId, dotsId, total) {
    var visible = getVisible();
    var maxIndex = total - visible;
    staffIndex[trackId]--;
    if (staffIndex[trackId] < 0) {
        staffIndex[trackId] = maxIndex; // Ke akhir
    }
    applySlide(trackId, dotsId, total);
}

function staffGoTo(trackId, dotsId, index, total) {
    staffIndex[trackId] = index;
    applySlide(trackId, dotsId, total);
}

function applySlide(trackId, dotsId, total) {
    var track = document.getElementById(trackId);
    var cardWidth = getCardWidth(trackId);
    var offset = staffIndex[trackId] * cardWidth;
    track.style.transform = 'translateX(-' + offset + 'px)';
    updateStaffDots(dotsId, staffIndex[trackId], trackId);
}

function updateStaffDots(dotsId, activeIndex, trackId) {
    var dotsContainer = document.getElementById(dotsId);
    if (!dotsContainer) return;
    var dots = dotsContainer.querySelectorAll('div');
    var color = trackId === 'trackGuru' ? '#1a2e5a' : '#0F6E56';
    dots.forEach(function(dot, i) {
        dot.style.width = i === activeIndex ? '24px' : '8px';
        dot.style.background = i === activeIndex ? color : '#ddd';
    });
}

function showTab(tab) {
    document.getElementById('grid-guru').style.display = tab === 'guru' ? 'block' : 'none';
    document.getElementById('grid-staff').style.display = tab === 'staff' ? 'block' : 'none';
    document.getElementById('tab-guru').style.background = tab === 'guru' ? '#1a2e5a' : '#fff';
    document.getElementById('tab-guru').style.color = tab === 'guru' ? '#fff' : '#1a2e5a';
    document.getElementById('tab-guru').style.border = tab === 'guru' ? 'none' : '2px solid #1a2e5a';
    document.getElementById('tab-staff').style.background = tab === 'staff' ? '#1a2e5a' : '#fff';
    document.getElementById('tab-staff').style.color = tab === 'staff' ? '#fff' : '#1a2e5a';
    document.getElementById('tab-staff').style.border = tab === 'staff' ? 'none' : '2px solid #1a2e5a';
}
</script>
@endif