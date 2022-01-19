<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">
        <div id="sidebar-menu">
            @if(Auth::user()->role == "Admin")
            <ul class="metismenu" id="side-menu">
                <li>
                    <a href="{{ url('/home') }}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i><span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-outline"></i><span> Master Data 
                    <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="{{ url('/admin/aplikasi') }}">Konfigurasi</a></li>
                        <li><a href="{{ url('/admin/users') }}">Pengguna</a></li>
                        <li><a href="{{ url('/admin/gallery') }}">Galery</a></li>
                        <li><a href="{{ url('/admin/jurusan') }}">Jurusan</a></li>
                        <li><a href="{{ url('/admin/guruterbaik') }}">Guru</a></li>
                        <li><a href="{{ url('/admin/sound') }}">Sound Cloud</a></li>
                        <li><a href="{{ url('/admin/dokumen') }}">Dokumen</a></li>
                        <li><a href="{{ url('/admin/kalimat') }}">Quotes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-buffer"></i><span> Manage Konten
                    <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="{{ url('/admin/menu') }}">Menu</a></li>
                        <li><a href="{{ url('/admin/banner') }}">Slider</a></li>
                        <li><a href="{{ url('/admin/timeline') }}">Timeline</a></li>
                        <li><a href="{{ url('/admin/kategori') }}">Kategori</a></li>
                        <li><a href="{{ url('/admin/posts') }}">Posts</a></li>
                        <li><a href="{{ url('/admin/forum') }}">Forum</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-calendar-check"></i><span> Buku Tamu
                    <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="{{ url('/admin/acara') }}">Acara</a></li>
                        <li><a href="{{ url('/admin/tamu') }}">Tamu</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-google-pages"></i><span> PPDB Data
                    <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="{{ url('/admin/jenis-formulir') }}">Jenis Formulir</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted-type"></i><span> PPDB Pendaftar
                    <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="{{ url('/admin/pendaftar') }}">Pendaftar</a></li>
                        <li><a href="{{ url('/admin/pembayaran-formulir') }}">Pembayaran Formulir</a></li>
                        <li><a href="{{ url('/admin/formulir/siswa') }}">Formulir Calon Siswa</a></li>
                        <li><a href="{{ url('/admin/pembayaran-uang-pangkal') }}">Pembayaran Uang Pangkal</a></li>
                        <li><a href="{{ url('/admin/berkas-calon-siswa') }}">Berkas Calon Siswa</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-chart-line"></i><span> Laporan PPDB
                    <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="{{ url('/admin/pembayaran-formulir/laporan') }}">Pembayaran Formulir</a></li>
                        <li><a href="{{ url('/admin/pembayaran-uang-pangkal/laporan') }}">Pembayaran Uang Pangkal</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/admin/logaktifitas') }}" class="waves-effect">
                        <i class="mdi mdi-email-outline"></i><span> Log Aktifitas </span>
                    </a>
                </li>
            </ul>
            @endif
            @if(Auth::user()->role == "Pendaftar")
            <ul class="metismenu" id="side-menu">
                <li>
                    <a href="{{ url('/home') }}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i><span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/pendaftar/biodata') }}" class="waves-effect">
                        <i class="mdi mdi-account-box"></i><span> Biodata </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/pendaftar/pembayaran-formulir') }}" class="waves-effect">
                        <i class="mdi mdi-calendar-check"></i><span> Pembayaran Formulir </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/pendaftar/formulir') }}" class="waves-effect">
                        <i class="mdi mdi-clipboard-outline"></i><span> Formulir Calon Siswa </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/pendaftar/pembayaran-uang-pangkal') }}" class="waves-effect">
                        <i class="mdi mdi-calendar-multiple"></i><span> Bayar Uang Pangkal </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/pendaftar/pemberkasan') }}" class="waves-effect">
                        <i class="mdi mdi-archive"></i><span> Pemberkasan </span>
                    </a>
                </li>
            </ul>
           
            @endif
        </div>
        <div class="clearfix"></div>
    </div>
</div>