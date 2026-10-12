@extends('frontend.layouts.master')

@section('konten')

{{-- Breadcrumb --}}
<section style="background-image: url({{ asset(\App\Aplikasi::first()->gambar_total_siswa) }}); background-size:cover; background-position:center; padding:60px 0; position:relative;">
    <div style="position:absolute; top:0; left:0; right:0; bottom:0; background:rgba(26,46,90,0.75);"></div>
    <div class="container" style="position:relative; z-index:1; text-align:center;">
        <h2 style="color:#fff; font-size:32px; font-weight:700; margin-bottom:10px;">Agenda Sekolah</h2>
        <ul style="list-style:none; padding:0; margin:0; display:flex; justify-content:center; align-items:center; gap:8px;">
            <li><a href="{{ url('/') }}" style="color:rgba(255,255,255,0.8); text-decoration:none; font-size:14px;">Home</a></li>
            <li style="color:rgba(255,255,255,0.5);"><i class="fa fa-angle-right"></i></li>
            <li style="color:#fff; font-size:14px;">Agenda</li>
        </ul>
    </div>
</section>

{{-- Konten Agenda --}}
<section style="padding:60px 0; background:#f8f9fa;">
    <div class="container">
        <div style="text-align:center; margin-bottom:40px;">
            <h2 style="font-size:28px; font-weight:700; color:#1a2e5a; margin-bottom:8px;">Agenda Kegiatan</h2>
            <div style="width:60px; height:3px; background:#1a73e8; margin:0 auto 10px;"></div>
            <p style="color:#666; font-size:14px;">Jadwal kegiatan dan agenda SMK Kosgoro</p>
        </div>

        <div style="background:#fff; border-radius:12px; padding:30px; box-shadow:0 3px 20px rgba(0,0,0,0.08);">
            <div id='calendar'></div>
        </div>

        {{-- Daftar Agenda --}}
        <div style="margin-top:30px;">
            <h4 style="font-size:18px; font-weight:700; color:#1a2e5a; margin-bottom:20px;">
                <i class="fa fa-list" style="color:#1a73e8; margin-right:8px;"></i>Daftar Agenda
            </h4>
            <div class="row">
                @foreach(\App\Agenda::orderBy('start','ASC')->get() as $agenda)
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div style="background:#fff; border-radius:10px; padding:16px; box-shadow:0 2px 10px rgba(0,0,0,0.06); display:flex; gap:14px; align-items:flex-start; border-left:4px solid #1a73e8;">
                        <div style="background:#f0f4ff; border-radius:8px; padding:10px 12px; text-align:center; flex-shrink:0; min-width:50px;">
                            @php $tgl = date_create($agenda->start); @endphp
                            <div style="font-size:20px; font-weight:700; color:#1a73e8; line-height:1;">{{ date_format($tgl,"d") }}</div>
                            <div style="font-size:10px; color:#888; font-weight:600;">{{ date_format($tgl,"M") }}</div>
                        </div>
                        <div>
                            <p style="font-size:14px; font-weight:600; color:#1a2e5a; margin:0 0 4px;">{{ $agenda->title }}</p>
                            <p style="font-size:11px; color:#999; margin:0;">
                                <i class="fa fa-clock-o" style="margin-right:3px;"></i>
                                {{ date_format($tgl,"d M Y") }}
                                @if($agenda->end)
                                - {{ date_format(date_create($agenda->end),"d M Y") }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection

@section('assets-bottom')
<script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('backend/plugins/moment/moment.js') }}"></script>
<script src="{{ asset('backend/plugins/fullcalendar/js/fullcalendar.min.js') }}"></script>
<style>
.fc-header-toolbar { margin-bottom: 16px !important; }
.fc-button { background: #1a73e8 !important; border-color: #1a73e8 !important; border-radius: 6px !important; }
.fc-button:hover { background: #1a2e5a !important; border-color: #1a2e5a !important; }
.fc today { background: #f0f4ff !important; }
.fc-event { background: #1a73e8 !important; border-color: #1a73e8 !important; border-radius: 4px !important; font-size: 11px !important; }
</style>
<script>
$(document).ready(function() {
    $('#calendar').fullCalendar({
        header: {
            left: 'title',
            center: '',
            right: 'prev,next today'
        },
        editable: false,
        firstDay: 1,
        selectable: false,
        defaultView: 'month',
        titleFormat: { month: 'MMMM YYYY' },
        columnFormat: { month: 'ddd' },
        events: [
            @foreach(\App\Agenda::all() as $agenda)
            {
                title: '{{ $agenda->title }}',
                start: '{{ $agenda->start }}',
                end: '{{ $agenda->end }}',
                url: '#',
            },
            @endforeach
        ],
    });
});
</script>
@endsection