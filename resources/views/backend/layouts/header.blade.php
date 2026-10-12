@php
    $jam = (int) now()->format('H');
    $sapaan = $jam < 11 ? 'Selamat pagi' : ($jam < 15 ? 'Selamat siang' : ($jam < 18 ? 'Selamat sore' : 'Selamat malam'));
@endphp
<div class="topbar">
    <div class="topbar-left">
        <a href="{{ url('/home') }}" class="logo" title="Dashboard">
            <span>
                <img src="{{ asset($site->logo_be) }}" alt="{{ $site->nama }}" height="18">
            </span>
            <i>
                <img src="{{ asset($site->logo_sub_be) }}" alt="" height="40">
            </i>
        </a>
    </div>
    <nav class="navbar-custom">
        <ul class="navbar-right d-flex list-inline float-right mb-0">
            <li class="list-inline-item">
                <a href="{{ url('/') }}" target="_blank" class="a-top-btn" title="Buka website sekolah">
                    <i class="mdi mdi-web"></i><span class="lbl">Lihat Website</span>
                </a>
            </li>
            <li class="dropdown notification-list list-inline-item">
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset(Auth::user()->photo) }}" alt="" class="rounded-circle" onerror="this.src='{{ asset($site->logo_sub_be) }}'">
                        <span class="a-user-meta">
                            <strong>{{ \Illuminate\Support\Str::limit(Auth::user()->name, 18) }}</strong>
                            <small>{{ Auth::user()->role == 'Admin' ? 'Administrator' : 'Calon Peserta Didik' }}</small>
                        </span>
                        <i class="mdi mdi-chevron-down text-muted"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                        <a class="dropdown-item" href="{{ url('/home') }}"><i class="mdi mdi-view-dashboard m-r-5"></i> Dashboard</a>
                        @if(Auth::user()->role == "Pendaftar")
                        <a class="dropdown-item" href="{{ url('pendaftar/biodata') }}"><i class="mdi mdi-account-circle m-r-5"></i> Biodata Saya</a>
                        @else
                        <a class="dropdown-item" href="{{ url('admin/aplikasi') }}"><i class="mdi mdi-settings m-r-5"></i> Konfigurasi</a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-power text-danger"></i> Keluar
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>
        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left" aria-label="Tampilkan/sembunyikan menu">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            <li class="float-left a-greet">
                <small>{{ $sapaan }},</small>
                <strong>{{ \Illuminate\Support\Str::limit(Auth::user()->name, 28) }} 👋</strong>
            </li>
        </ul>
    </nav>
</div>
