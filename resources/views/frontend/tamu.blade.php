@extends('frontend.layouts.master')

@section('konten')

{{-- Breadcrumb --}}
<section style="background-image: url({{ asset(\App\Aplikasi::first()->gambar_total_siswa) }}); background-size:cover; background-position:center; padding:60px 0; position:relative;">
    <div style="position:absolute; top:0; left:0; right:0; bottom:0; background:rgba(26,46,90,0.75);"></div>
    <div class="container" style="position:relative; z-index:1; text-align:center;">
        <h2 style="color:#fff; font-size:32px; font-weight:700; margin-bottom:10px;">Buku Tamu</h2>
        <ul style="list-style:none; padding:0; margin:0; display:flex; justify-content:center; align-items:center; gap:8px;">
            <li><a href="{{ url('/') }}" style="color:rgba(255,255,255,0.8); text-decoration:none; font-size:14px;">Home</a></li>
            <li style="color:rgba(255,255,255,0.5);"><i class="fa fa-angle-right"></i></li>
            <li style="color:#fff; font-size:14px;">Buku Tamu</li>
        </ul>
    </div>
</section>

{{-- Form Buku Tamu --}}
<section style="padding:60px 0; background:#f8f9fa;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <div style="background:#fff; border-radius:12px; overflow:hidden; box-shadow:0 3px 20px rgba(0,0,0,0.08);">

                    {{-- Header Form --}}
                    <div style="background:linear-gradient(135deg, #1a2e5a 0%, #1a73e8 100%); padding:30px; text-align:center;">
                        <img src="{{ asset(\App\Aplikasi::first()->gambar_login) }}" style="height:60px; margin-bottom:12px; display:block; margin-left:auto; margin-right:auto;">
                        <h3 style="color:#fff; font-size:22px; font-weight:700; margin:0 0 5px;">Buku Tamu</h3>
                        <p style="color:rgba(255,255,255,0.8); font-size:13px; margin:0;">{{ \App\Aplikasi::first()->nama }}</p>
                    </div>

                    {{-- Body Form --}}
                    <div style="padding:30px;">
                        <form method="POST" action="{{ url('tamu') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                {{-- Acara --}}
                                <div class="col-12 mb-3">
                                    <label style="font-size:13px; font-weight:600; color:#1a2e5a; margin-bottom:6px; display:block;">
                                        <i class="fa fa-calendar" style="color:#1a73e8; margin-right:6px;"></i>Acara
                                    </label>
                                    <select name="acara_id" required style="width:100%; padding:10px 14px; border:1px solid #e0e0e0; border-radius:8px; font-size:13px; color:#333; outline:none; background:#fff;">
                                        @foreach(\App\Acara::orderBy('id','DESC')->get() as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Nama --}}
                                <div class="col-md-6 mb-3">
                                    <label style="font-size:13px; font-weight:600; color:#1a2e5a; margin-bottom:6px; display:block;">
                                        <i class="fa fa-user" style="color:#1a73e8; margin-right:6px;"></i>Nama Pengunjung
                                    </label>
                                    <input type="text" name="nama_pengunjung" required placeholder="Nama lengkap"
                                        style="width:100%; padding:10px 14px; border:1px solid #e0e0e0; border-radius:8px; font-size:13px; outline:none;">
                                </div>

                                {{-- Instansi --}}
                                <div class="col-md-6 mb-3">
                                    <label style="font-size:13px; font-weight:600; color:#1a2e5a; margin-bottom:6px; display:block;">
                                        <i class="fa fa-building" style="color:#1a73e8; margin-right:6px;"></i>Instansi
                                    </label>
                                    <input type="text" name="instansi" required placeholder="Nama instansi/perusahaan"
                                        style="width:100%; padding:10px 14px; border:1px solid #e0e0e0; border-radius:8px; font-size:13px; outline:none;">
                                </div>

                                {{-- Telepon --}}
                                <div class="col-md-6 mb-3">
                                    <label style="font-size:13px; font-weight:600; color:#1a2e5a; margin-bottom:6px; display:block;">
                                        <i class="fa fa-phone" style="color:#1a73e8; margin-right:6px;"></i>Telepon
                                    </label>
                                    <input type="number" name="telepon" required placeholder="Nomor telepon"
                                        style="width:100%; padding:10px 14px; border:1px solid #e0e0e0; border-radius:8px; font-size:13px; outline:none;">
                                </div>

                                {{-- Email --}}
                                <div class="col-md-6 mb-3">
                                    <label style="font-size:13px; font-weight:600; color:#1a2e5a; margin-bottom:6px; display:block;">
                                        <i class="fa fa-envelope" style="color:#1a73e8; margin-right:6px;"></i>Email
                                    </label>
                                    <input type="email" name="email" required placeholder="Alamat email"
                                        style="width:100%; padding:10px 14px; border:1px solid #e0e0e0; border-radius:8px; font-size:13px; outline:none;">
                                </div>

                                {{-- Alamat --}}
                                <div class="col-12 mb-3">
                                    <label style="font-size:13px; font-weight:600; color:#1a2e5a; margin-bottom:6px; display:block;">
                                        <i class="fa fa-map-marker" style="color:#1a73e8; margin-right:6px;"></i>Alamat
                                    </label>
                                    <textarea name="alamat" required placeholder="Alamat lengkap" rows="3"
                                        style="width:100%; padding:10px 14px; border:1px solid #e0e0e0; border-radius:8px; font-size:13px; outline:none; resize:none;"></textarea>
                                </div>

                                {{-- Keterangan --}}
                                <div class="col-12 mb-3">
                                    <label style="font-size:13px; font-weight:600; color:#1a2e5a; margin-bottom:6px; display:block;">
                                        <i class="fa fa-comment" style="color:#1a73e8; margin-right:6px;"></i>Keterangan
                                        <span style="color:#999; font-weight:400;">(opsional)</span>
                                    </label>
                                    <input type="text" name="keterangan" placeholder="Keperluan kunjungan"
                                        style="width:100%; padding:10px 14px; border:1px solid #e0e0e0; border-radius:8px; font-size:13px; outline:none;">
                                </div>

                                {{-- Foto --}}
                                <div class="col-12 mb-4">
                                    <label style="font-size:13px; font-weight:600; color:#1a2e5a; margin-bottom:6px; display:block;">
                                        <i class="fa fa-camera" style="color:#1a73e8; margin-right:6px;"></i>Foto
                                    </label>
                                    <input type="file" name="photo" required accept="image/*"
                                        style="width:100%; padding:10px 14px; border:1px solid #e0e0e0; border-radius:8px; font-size:13px; background:#fff;">
                                    <small style="color:#999; font-size:11px; margin-top:4px; display:block;">Format: JPG, PNG, GIF, SVG. Maksimal 2MB.</small>
                                </div>

                                {{-- Tombol Submit --}}
                                <div class="col-12">
                                    <button type="submit" style="width:100%; background:linear-gradient(135deg, #1a2e5a 0%, #1a73e8 100%); color:#fff; border:none; padding:14px; border-radius:8px; font-size:15px; font-weight:600; cursor:pointer; transition:opacity 0.3s;"
                                        onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                                        <i class="fa fa-paper-plane" style="margin-right:8px;"></i>Kirim Buku Tamu
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection