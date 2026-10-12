<section style="background: linear-gradient(135deg, #1a2e5a 0%, #1a73e8 100%); padding: 40px 0;">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-3 col-md-6 col-12 text-center mb-3 mb-lg-0">
                <div style="color:#fff; border-right: 1px solid rgba(255,255,255,0.3); padding: 10px 20px;">
                    <i class="fa fa-users" style="font-size:35px; color:#f0c040; margin-bottom:10px; display:block;"></i>
                    <h3 style="font-size:32px; font-weight:700; margin:0;">{{ \App\Statistik::count() }}</h3>
                    <p style="margin:0; font-size:14px; opacity:0.9;">Total Pengunjung</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 text-center mb-3 mb-lg-0">
                <div style="color:#fff; border-right: 1px solid rgba(255,255,255,0.3); padding: 10px 20px;">
                    <i class="fa fa-eye" style="font-size:35px; color:#f0c040; margin-bottom:10px; display:block;"></i>
                    <h3 style="font-size:32px; font-weight:700; margin:0;">{{ \App\Statistik::where('tanggal', date('Y-m-d'))->count() }}</h3>
                    <p style="margin:0; font-size:14px; opacity:0.9;">Pengunjung Hari Ini</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 text-center mb-3 mb-lg-0">
                <div style="color:#fff; border-right: 1px solid rgba(255,255,255,0.3); padding: 10px 20px;">
                    <i class="fa fa-graduation-cap" style="font-size:35px; color:#f0c040; margin-bottom:10px; display:block;"></i>
                    <h3 style="font-size:32px; font-weight:700; margin:0;">{{ \App\Post::where('jenis','Berita')->where('status',1)->count() }}</h3>
                    <p style="margin:0; font-size:14px; opacity:0.9;">Total Berita</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 text-center">
                <div style="color:#fff; padding: 10px 20px;">
                    <i class="fa fa-image" style="font-size:35px; color:#f0c040; margin-bottom:10px; display:block;"></i>
                    <h3 style="font-size:32px; font-weight:700; margin:0;">{{ \App\Gallery::where('status','aktif')->count() }}</h3>
                    <p style="margin:0; font-size:14px; opacity:0.9;">Total Gallery</p>
                </div>
            </div>
        </div>
    </div>
</section>