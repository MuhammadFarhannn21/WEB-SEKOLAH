<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">
        <div id="sidebar-menu">
            @if(Auth::user()->role == "Admin")
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Utama</li>
                <li>
                    <a href="{{ url('/home') }}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i><span> Dashboard </span>
                    </a>
                </li>

                <li class="menu-title">Konten Website</li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-file-document-box"></i><span> Konten
                    <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="{{ url('/admin/posts') }}">Posts & Berita</a></li>
                        <li><a href="{{ url('/admin/kategori') }}">Kategori</a></li>
                        <li><a href="{{ url('/admin/agenda') }}">Agenda</a></li>
                        <li><a href="{{ url('/admin/forum') }}">Forum</a></li>
                        <li><a href="{{ url('/admin/komentar') }}">Komentar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-palette"></i><span> Tampilan
                    <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="{{ url('/admin/menu') }}">Menu Navigasi</a></li>
                        <li><a href="{{ url('/admin/banner') }}">Slider Beranda</a></li>
                        <li><a href="{{ url('/admin/timeline') }}">Video / Timeline</a></li>
                        <li><a href="{{ url('/admin/kalimat') }}">Quotes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-school"></i><span> Profil Sekolah
                    <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="{{ url('/admin/jurusan') }}">Jurusan</a></li>
                        <li><a href="{{ url('/admin/guruterbaik') }}">Guru & Staff</a></li>
                        <li><a href="{{ url('/admin/fasilitas') }}">Fasilitas</a></li>
                        <li><a href="{{ url('/admin/ekstrakurikuler') }}">Ekstrakurikuler</a></li>
                        <li><a href="{{ url('/admin/mitra') }}">Mitra BKK</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-folder-multiple-image"></i><span> Media
                    <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="{{ url('/admin/gallery') }}">Galeri Foto</a></li>
                        <li><a href="{{ url('/admin/dokumen') }}">Dokumen</a></li>
                        <li><a href="{{ url('/admin/sound') }}">Sound Cloud</a></li>
                    </ul>
                </li>

                <li class="menu-title">PPDB</li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-multiple-plus"></i><span> Pendaftaran
                    <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="{{ url('/admin/pendaftar') }}">Data Pendaftar</a></li>
                        <li><a href="{{ url('/admin/pembayaran-formulir') }}">Pembayaran Formulir</a></li>
                        <li><a href="{{ url('/admin/formulir/siswa') }}">Formulir Calon Siswa</a></li>
                        <li><a href="{{ url('/admin/pembayaran-uang-pangkal') }}">Pembayaran Uang Pangkal</a></li>
                        <li><a href="{{ url('/admin/berkas-calon-siswa') }}">Berkas Calon Siswa</a></li>
                        <li><a href="{{ url('/admin/jenis-formulir') }}">Gelombang / Jenis Formulir</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-chart-areaspline"></i><span> Laporan
                    <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="{{ url('/admin/pembayaran-formulir/laporan') }}">Pembayaran Formulir</a></li>
                        <li><a href="{{ url('/admin/pembayaran-uang-pangkal/laporan') }}">Pembayaran Uang Pangkal</a></li>
                    </ul>
                </li>

                <li class="menu-title">Interaksi</li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-open-page-variant"></i><span> Buku Tamu
                    <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="{{ url('/admin/acara') }}">Acara</a></li>
                        <li><a href="{{ url('/admin/tamu') }}">Daftar Tamu</a></li>
                    </ul>
                </li>

                <li class="menu-title">Sistem</li>
                <li>
                    <a href="{{ url('/admin/aplikasi') }}" class="waves-effect">
                        <i class="mdi mdi-settings"></i><span> Konfigurasi </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/users') }}" class="waves-effect">
                        <i class="mdi mdi-account-key"></i><span> Pengguna </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/logaktifitas') }}" class="waves-effect">
                        <i class="mdi mdi-history"></i><span> Log Aktivitas </span>
                    </a>
                </li>
            </ul>
            @endif

            @if(Auth::user()->role == "Pendaftar")
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Utama</li>
                <li>
                    <a href="{{ url('/home') }}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i><span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/pendaftar/biodata') }}" class="waves-effect">
                        <i class="mdi mdi-account-box-outline"></i><span> Biodata </span>
                    </a>
                </li>
                <li class="menu-title">Tahapan PPDB</li>
                <li>
                    <a href="{{ url('/pendaftar/pembayaran-formulir') }}" class="waves-effect">
                        <i class="mdi mdi-numeric-1-box-outline"></i><span> Pembayaran Formulir </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/pendaftar/formulir') }}" class="waves-effect">
                        <i class="mdi mdi-numeric-2-box-outline"></i><span> Formulir Calon Siswa </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/pendaftar/pembayaran-uang-pangkal') }}" class="waves-effect">
                        <i class="mdi mdi-numeric-3-box-outline"></i><span> Bayar Uang Pangkal </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/pendaftar/pemberkasan') }}" class="waves-effect">
                        <i class="mdi mdi-numeric-4-box-outline"></i><span> Pemberkasan </span>
                    </a>
                </li>
            </ul>
            <div class="a-side-card">
                <strong>Butuh bantuan?</strong>
                <p>Hubungi panitia PPDB jika mengalami kendala pendaftaran.</p>
                <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', (string) $site->telepon)) }}" target="_blank" rel="noopener"><i class="mdi mdi-whatsapp"></i> Chat Panitia</a>
            </div>
            @endif
        </div>
        <div class="clearfix"></div>
    </div>
</div>
