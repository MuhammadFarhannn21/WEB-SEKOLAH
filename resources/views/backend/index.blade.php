@extends('backend.layouts.master')

@section('title', 'Dashboard')

@section('konten')
@php $hariIni = \Carbon\Carbon::now()->translatedFormat('l, d F Y'); @endphp

@if(Auth::user()->role == "Admin")
{{-- ===================== DASHBOARD ADMIN ===================== --}}
<div class="a-hero">
    <div>
        <span class="a-date"><i class="mdi mdi-calendar"></i> {{ $hariIni }}</span>
        <h2>Ringkasan {{ $site->nama }}</h2>
        <p>
            @if($menungguFormulir + $menungguPangkal > 0)
                Ada <b>{{ $menungguFormulir + $menungguPangkal }}</b> pembayaran PPDB yang menunggu konfirmasi Anda.
            @else
                Semua pembayaran PPDB sudah dikonfirmasi. Kerja bagus!
            @endif
        </p>
    </div>
    <div class="a-hero-actions">
        <a href="{{ url('admin/posts') }}" class="solid"><i class="mdi mdi-pencil"></i> Tulis Berita</a>
        <a href="{{ url('admin/pendaftar') }}"><i class="mdi mdi-account-multiple"></i> Data Pendaftar</a>
        <a href="{{ url('/') }}" target="_blank"><i class="mdi mdi-web"></i> Lihat Website</a>
    </div>
</div>

{{-- Kartu statistik --}}
<div class="row">
    <div class="col-xl-3 col-md-6 m-b-20">
        <a href="{{ url('admin/pendaftar') }}" class="a-stat">
            <div>
                <div class="lbl">Total Pendaftar PPDB</div>
                <div class="val">{{ number_format($stat['pendaftar'], 0, ',', '.') }}</div>
                <div class="sub"><b class="text-success">+{{ $stat['pendaftarBaru'] }}</b> dalam 7 hari terakhir</div>
            </div>
            <span class="ico ico-blue"><i class="mdi mdi-account-multiple-plus"></i></span>
        </a>
    </div>
    <div class="col-xl-3 col-md-6 m-b-20">
        <div class="a-stat">
            <div>
                <div class="lbl">Pengunjung Hari Ini</div>
                <div class="val">{{ number_format($visitToday, 0, ',', '.') }}</div>
                @php $selisih = $visitToday - $visitYesterday; @endphp
                <div class="sub">
                    <b class="{{ $selisih >= 0 ? 'text-success' : 'text-danger' }}"><i class="mdi mdi-trending-{{ $selisih >= 0 ? 'up' : 'down' }}"></i> {{ $selisih >= 0 ? '+' : '' }}{{ $selisih }}</b> dibanding kemarin
                </div>
            </div>
            <span class="ico ico-green"><i class="mdi mdi-eye"></i></span>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 m-b-20">
        <a href="{{ url('admin/posts') }}" class="a-stat">
            <div>
                <div class="lbl">Berita Terbit</div>
                <div class="val">{{ number_format($stat['berita'], 0, ',', '.') }}</div>
                <div class="sub">dari {{ $stat['posts'] }} total konten</div>
            </div>
            <span class="ico ico-violet"><i class="mdi mdi-newspaper"></i></span>
        </a>
    </div>
    <div class="col-xl-3 col-md-6 m-b-20">
        <a href="{{ url('admin/tamu') }}" class="a-stat">
            <div>
                <div class="lbl">Buku Tamu</div>
                <div class="val">{{ number_format($stat['tamu'], 0, ',', '.') }}</div>
                <div class="sub">{{ $stat['gallery'] }} foto di galeri</div>
            </div>
            <span class="ico ico-amber"><i class="mdi mdi-book-open-page-variant"></i></span>
        </a>
    </div>
</div>

<div class="row">
    {{-- Grafik pengunjung --}}
    <div class="col-xl-8 m-b-20">
        <div class="card h-100">
            <div class="card-body">
                <div class="a-card-head">
                    <h4>Statistik Pengunjung Website</h4>
                    <div class="btn-group btn-group-sm" role="group">
                        <button type="button" class="btn btn-primary" data-range="days">14 Hari</button>
                        <button type="button" class="btn btn-secondary" data-range="months">Tahun {{ date('Y') }}</button>
                    </div>
                </div>
                <div class="a-mini-stats">
                    <div><b>{{ number_format($stat['visitTotal'], 0, ',', '.') }}</b><span>Total kunjungan</span></div>
                    <div><b>{{ $visitToday }}</b><span>Hari ini</span></div>
                    <div><b>{{ $visitYesterday }}</b><span>Kemarin</span></div>
                </div>
                <div style="position:relative; height:280px;"><canvas id="visitorChart"></canvas></div>
            </div>
        </div>
    </div>

    {{-- Perlu tindakan --}}
    <div class="col-xl-4 m-b-20">
        <div class="card h-100">
            <div class="card-body">
                <div class="a-card-head"><h4>Perlu Tindakan</h4></div>
                <ul class="a-list">
                    <li>
                        <span class="avatar ico-amber"><i class="mdi mdi-cash"></i></span>
                        <span class="t"><strong>Pembayaran formulir</strong><small>menunggu konfirmasi</small></span>
                        <a href="{{ url('admin/pembayaran-formulir') }}" class="badge {{ $menungguFormulir ? 'badge-warning' : 'badge-success' }}">{{ $menungguFormulir }}</a>
                    </li>
                    <li>
                        <span class="avatar ico-red"><i class="mdi mdi-cash-multiple"></i></span>
                        <span class="t"><strong>Pembayaran uang pangkal</strong><small>menunggu konfirmasi</small></span>
                        <a href="{{ url('admin/pembayaran-uang-pangkal') }}" class="badge {{ $menungguPangkal ? 'badge-warning' : 'badge-success' }}">{{ $menungguPangkal }}</a>
                    </li>
                </ul>
                <hr>
                <div class="a-card-head" style="margin-bottom:12px;"><h4>Aksi Cepat</h4></div>
                <div class="a-quick">
                    <a href="{{ url('admin/posts') }}"><span class="ico ico-blue"><i class="mdi mdi-pencil"></i></span>Tulis Post</a>
                    <a href="{{ url('admin/gallery') }}"><span class="ico ico-green"><i class="mdi mdi-image-multiple"></i></span>Tambah Foto</a>
                    <a href="{{ url('admin/agenda') }}"><span class="ico ico-violet"><i class="mdi mdi-calendar-plus"></i></span>Agenda</a>
                    <a href="{{ url('admin/banner') }}"><span class="ico ico-amber"><i class="mdi mdi-palette"></i></span>Slider</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    {{-- Progres PPDB --}}
    <div class="col-xl-4 col-lg-6 m-b-20">
        <div class="card h-100">
            <div class="card-body">
                <div class="a-card-head">
                    <h4>Progres PPDB</h4>
                    <span class="badge badge-primary">{{ optional($jenisFormulir)->tahun_ajaran ?? optional($jenisFormulir)->nama ?? 'Tidak ada gelombang aktif' }}</span>
                </div>
                @php
                    $base = max($ppdb['pendaftar'], 1);
                    $funnel = [
                        ['Akun terdaftar', $ppdb['pendaftar'], '#1a73e8'],
                        ['Formulir dibayar', $ppdb['bayar'], '#0ea5e9'],
                        ['Formulir diisi', $ppdb['formulir'], '#8b5cf6'],
                        ['Uang pangkal diterima', $ppdb['uangPangkal'], '#f59e0b'],
                        ['Berkas lengkap', $ppdb['berkas'], '#12a37f'],
                    ];
                @endphp
                <div class="a-funnel">
                    @foreach($funnel as [$label, $jumlah, $warna])
                    <div class="row-f">
                        <div class="lbl"><span>{{ $label }}</span><b>{{ $jumlah }} <small class="text-muted">({{ round($jumlah / $base * 100) }}%)</small></b></div>
                        <div class="a-bar"><span data-w="{{ min(100, round($jumlah / $base * 100)) }}" style="background:{{ $warna }}"></span></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Pendaftar terbaru --}}
    <div class="col-xl-4 col-lg-6 m-b-20">
        <div class="card h-100">
            <div class="card-body">
                <div class="a-card-head"><h4>Pendaftar Terbaru</h4><a href="{{ url('admin/pendaftar') }}">Lihat semua <i class="mdi mdi-arrow-right"></i></a></div>
                @forelse($latestPendaftar as $p)
                    @if($loop->first)<ul class="a-list">@endif
                    <li>
                        <span class="avatar ico-{{ ['blue','green','violet','amber','sky','red'][$loop->index % 6] }}">{{ strtoupper(mb_substr($p->name, 0, 1)) }}</span>
                        <span class="t"><strong>{{ $p->name }}</strong><small>{{ $p->asal_sekolah ?: $p->email }}</small></span>
                        <small class="text-muted">{{ optional($p->created_at)->diffForHumans() }}</small>
                    </li>
                    @if($loop->last)</ul>@endif
                @empty
                    <div class="a-empty"><i class="mdi mdi-account-multiple"></i>Belum ada pendaftar.</div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Konten per kategori --}}
    <div class="col-xl-4 col-lg-12 m-b-20">
        <div class="card h-100">
            <div class="card-body">
                <div class="a-card-head"><h4>Konten per Kategori</h4><a href="{{ url('admin/kategori') }}">Kelola <i class="mdi mdi-arrow-right"></i></a></div>
                <div style="position:relative; height:260px;"><canvas id="categoryChart"></canvas></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    {{-- Konten terbaru --}}
    <div class="col-xl-5 m-b-20">
        <div class="card h-100">
            <div class="card-body">
                <div class="a-card-head"><h4>Konten Terbaru</h4><a href="{{ url('admin/posts') }}">Semua post <i class="mdi mdi-arrow-right"></i></a></div>
                @forelse($latestPosts as $post)
                    @if($loop->first)<ul class="a-list">@endif
                    <li>
                        <span class="thumb" style="background-image:url('{{ asset($post->featured) }}')"></span>
                        <span class="t">
                            <strong>{{ strip_tags($post->title) }}</strong>
                            <small>{{ $post->jenis }} · {{ $post->category->title ?? '-' }} · {{ \Carbon\Carbon::parse($post->published_at ?? $post->created_at)->translatedFormat('d M Y') }}</small>
                        </span>
                        <span class="badge {{ $post->status ? 'badge-success' : 'badge-warning' }}">{{ $post->status ? 'Terbit' : 'Draft' }}</span>
                    </li>
                    @if($loop->last)</ul>@endif
                @empty
                    <div class="a-empty"><i class="mdi mdi-newspaper"></i>Belum ada konten.</div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Agenda --}}
    <div class="col-xl-3 col-md-6 m-b-20">
        <div class="card h-100">
            <div class="card-body">
                <div class="a-card-head"><h4>Agenda Mendatang</h4><a href="{{ url('admin/agenda') }}">Kelola</a></div>
                @forelse($agendaMendatang as $ag)
                    @if($loop->first)<ul class="a-list">@endif
                    @php $tgl = \Carbon\Carbon::parse($ag->start); @endphp
                    <li>
                        <span class="avatar ico-blue" style="border-radius:12px; flex-direction:column; width:44px; height:44px; line-height:1;">
                            <b style="font-size:15px;">{{ $tgl->format('d') }}</b><small style="font-size:10px;">{{ $tgl->translatedFormat('M') }}</small>
                        </span>
                        <span class="t"><strong>{{ $ag->title }}</strong><small>{{ $tgl->translatedFormat('l') }}</small></span>
                    </li>
                    @if($loop->last)</ul>@endif
                @empty
                    <div class="a-empty"><i class="mdi mdi-calendar"></i>Tidak ada agenda mendatang.<br><a href="{{ url('admin/agenda') }}">Tambah agenda</a></div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Log aktivitas --}}
    <div class="col-xl-4 col-md-6 m-b-20">
        <div class="card h-100">
            <div class="card-body">
                <div class="a-card-head"><h4>Aktivitas Terakhir</h4><a href="{{ url('admin/logaktifitas') }}">Semua log</a></div>
                @forelse($latestLogs as $log)
                    @if($loop->first)<ul class="a-list">@endif
                    <li>
                        <span class="avatar ico-sky"><i class="mdi mdi-history"></i></span>
                        <span class="t"><strong>{{ $log->subject }}</strong><small>{{ $log->username }} · {{ optional($log->created_at)->diffForHumans() }}</small></span>
                    </li>
                    @if($loop->last)</ul>@endif
                @empty
                    <div class="a-empty"><i class="mdi mdi-history"></i>Belum ada aktivitas.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@else
{{-- ===================== DASHBOARD PENDAFTAR ===================== --}}
@php
    $labelState = [
        'done'   => ['Selesai', 'badge-success', 'mdi-check-circle'],
        'wait'   => ['Menunggu konfirmasi admin', 'badge-warning', 'mdi-timer-sand'],
        'reject' => ['Ditolak — silakan unggah ulang', 'badge-danger', 'mdi-close-circle'],
        'todo'   => ['Belum dikerjakan', 'badge-primary', 'mdi-arrow-right'],
        'locked' => ['Terkunci', 'badge-secondary', 'mdi-lock-outline'],
    ];
    $currentIdx = collect($steps)->search(fn ($s) => in_array($s[3], ['todo', 'reject', 'wait']));
@endphp

<div class="a-hero">
    <div>
        <span class="a-date"><i class="mdi mdi-calendar"></i> {{ $hariIni }}</span>
        <h2>Halo, {{ \Illuminate\Support\Str::words(Auth::user()->name, 2, '') }}!</h2>
        <p>
            @if(!$jenisFormulir)
                Saat ini belum ada gelombang PPDB yang dibuka.
            @elseif($selesai == count($steps))
                Selamat! Semua tahapan pendaftaran Anda telah selesai.
            @elseif($currentIdx !== false)
                Langkah berikutnya: <b>{{ $steps[$currentIdx][0] }}</b>.
            @endif
        </p>
        <div class="a-hero-actions" style="margin-top:16px;">
            @if($currentIdx !== false)
            <a href="{{ $steps[$currentIdx][2] }}" class="solid"><i class="mdi mdi-arrow-right"></i> Lanjutkan Pendaftaran</a>
            @endif
            <a href="{{ url('static/panduan_ppdb.pdf') }}" target="_blank"><i class="mdi mdi-download"></i> Panduan PPDB</a>
        </div>
    </div>
    <div class="a-progress-ring" style="--p: {{ $persen }};">
        <div><span><b>{{ $persen }}%</b><small>{{ $selesai }}/{{ count($steps) }} tahap</small></span></div>
    </div>
</div>

<div class="row">
    <div class="col-xl-8 m-b-20">
        <div class="a-steps">
            @foreach($steps as $i => [$judul, $desk, $link, $state])
            @php [$lbl, $badge, $ikon] = $labelState[$state]; @endphp
            <div class="a-step {{ $state === 'done' ? 'done' : ($state === 'wait' ? 'wait' : ($state === 'reject' ? 'reject' : ($state === 'locked' ? 'locked' : ''))) }} {{ $i === $currentIdx ? 'current' : '' }}">
                <div class="num">
                    @if($state === 'done')<i class="mdi mdi-check"></i>@else{{ $i + 1 }}@endif
                </div>
                <div class="body">
                    <h5>{{ $judul }}</h5>
                    <p>{{ $desk }}</p>
                    <div class="foot">
                        <span class="badge {{ $badge }}"><i class="mdi {{ $ikon }}"></i> {{ $lbl }}</span>
                        @if($state !== 'locked')
                        <a href="{{ $link }}" class="btn btn-sm {{ $i === $currentIdx ? 'btn-primary' : 'btn-secondary' }}">
                            {{ $state === 'done' ? 'Lihat' : 'Buka' }} <i class="mdi mdi-arrow-right"></i>
                        </a>
                        @else
                        <small class="text-muted">Selesaikan tahap sebelumnya terlebih dahulu</small>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="col-xl-4 m-b-20">
        <div class="card m-b-20">
            <div class="card-body">
                <div class="a-card-head"><h4>Informasi Gelombang</h4></div>
                @if($jenisFormulir)
                <ul class="a-list">
                    <li><span class="t"><small>Gelombang</small><strong>{{ $jenisFormulir->nama }}</strong></span></li>
                    <li><span class="t"><small>Biaya formulir</small><strong>Rp {{ number_format((float) $jenisFormulir->biaya_formulir, 0, ',', '.') }}</strong></span></li>
                    <li><span class="t"><small>Transfer ke</small><strong>{{ $jenisFormulir->nama_bank_rekening }} — {{ $jenisFormulir->no_rekening }}</strong></span></li>
                </ul>
                @else
                <div class="a-empty"><i class="mdi mdi-alert-circle"></i>Belum ada gelombang aktif.</div>
                @endif
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="a-card-head"><h4>Agenda Sekolah</h4></div>
                @forelse($agendaMendatang as $ag)
                    @if($loop->first)<ul class="a-list">@endif
                    @php $tgl = \Carbon\Carbon::parse($ag->start); @endphp
                    <li>
                        <span class="avatar ico-blue" style="border-radius:12px; flex-direction:column; width:44px; height:44px; line-height:1;">
                            <b style="font-size:15px;">{{ $tgl->format('d') }}</b><small style="font-size:10px;">{{ $tgl->translatedFormat('M') }}</small>
                        </span>
                        <span class="t"><strong>{{ $ag->title }}</strong><small>{{ $tgl->translatedFormat('l') }}</small></span>
                    </li>
                    @if($loop->last)</ul>@endif
                @empty
                    <div class="a-empty"><i class="mdi mdi-calendar"></i>Belum ada agenda terdekat.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@section('assets-footer')
@if(Auth::user()->role == "Admin")
<script src="{{ asset('backend/plugins/chart.js/chart.min.js') }}"></script>
<script>
(function () {
    var series = {
        days:   @json($visitorDays),
        months: @json($visitorMonths)
    };

    var ctx = document.getElementById('visitorChart').getContext('2d');
    var grad = ctx.createLinearGradient(0, 0, 0, 280);
    grad.addColorStop(0, 'rgba(26,115,232,.28)');
    grad.addColorStop(1, 'rgba(26,115,232,0)');

    var visitorChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: series.days.map(function (d) { return d.label; }),
            datasets: [{
                label: 'Pengunjung',
                data: series.days.map(function (d) { return d.total; }),
                backgroundColor: grad,
                borderColor: '#1a73e8',
                borderWidth: 2.5,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#1a73e8',
                pointBorderWidth: 2,
                pointRadius: 3,
                pointHoverRadius: 6,
                lineTension: 0.35,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: { display: false },
            scales: {
                xAxes: [{ gridLines: { display: false } }],
                yAxes: [{ ticks: { beginAtZero: true, maxTicksLimit: 6 }, gridLines: { color: 'rgba(19,35,74,.06)' } }]
            }
        }
    });

    // Tombol ganti rentang 14 hari / tahunan
    document.querySelectorAll('[data-range]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var data = series[btn.getAttribute('data-range')];
            visitorChart.data.labels = data.map(function (d) { return d.label; });
            visitorChart.data.datasets[0].data = data.map(function (d) { return d.total; });
            visitorChart.update();
            document.querySelectorAll('[data-range]').forEach(function (b) {
                b.classList.toggle('btn-primary', b === btn);
                b.classList.toggle('btn-secondary', b !== btn);
            });
        });
    });

    var kategori = @json($postPerKategori->map(fn ($c) => ['label' => $c->title, 'total' => $c->posts_count]));
    new Chart(document.getElementById('categoryChart'), {
        type: 'doughnut',
        data: {
            labels: kategori.map(function (k) { return k.label; }),
            datasets: [{
                data: kategori.map(function (k) { return k.total; }),
                backgroundColor: ['#1a73e8', '#12a37f', '#f59e0b', '#8b5cf6', '#0ea5e9', '#e5484d'],
                borderColor: '#fff',
                borderWidth: 3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 62,
            legend: { position: 'bottom', labels: { boxWidth: 10, padding: 14 } }
        }
    });

    // Animasi progress bar PPDB
    setTimeout(function () {
        document.querySelectorAll('.a-bar span[data-w]').forEach(function (b) { b.style.width = b.getAttribute('data-w') + '%'; });
    }, 200);
})();
</script>
@endif
@endsection
