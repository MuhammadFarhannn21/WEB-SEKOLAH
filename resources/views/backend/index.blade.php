@extends('backend.layouts.master')

@section('konten')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Dashboard</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    Selamat Datang {{ Auth::user()->name}}
                </li>
            </ol>

             <div class="state-information d-none d-sm-block">
                <div class="state-graph">
                    <div id="header-chart-1"></div>
                    <div class="info"></div>
                </div>
                <div class="state-graph">
                    <div id="header-chart-2"></div>
                    <div class="info"></div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@if(Auth::user()->role == "Admin")
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary">
            <div class="card-body mini-stat-img">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-account-location float-right"></i>
                </div>
                <div class="text-white">
                    <h6 class="text-uppercase mb-3">Users</h6>
                    <h4 class="mb-4">{{\App\User::count()}}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary">
            <div class="card-body mini-stat-img">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-burst-mode float-right"></i>
                </div>
                <div class="text-white">
                    <h6 class="text-uppercase mb-3">Gallery</h6>
                    <h4 class="mb-4">{{\App\Gallery::count()}}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary">
            <div class="card-body mini-stat-img">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-animation float-right"></i>
                </div>
                <div class="text-white">
                    <h6 class="text-uppercase mb-3">Kategori</h6>
                    <h4 class="mb-4">{{\App\Category::count()}}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary">
            <div class="card-body mini-stat-img">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-file-multiple float-right"></i>
                </div>
                <div class="text-white">
                    <h6 class="text-uppercase mb-3">Posts</h6>
                    <h4 class="mb-4">{{\App\Post::count()}}</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card m-b-20">
            <div class="card-body">

                <h4 class="mt-0 header-title">Statistik Pengunjung</h4>

                <ul class="list-inline widget-chart m-t-20 m-b-15 text-center">
                    <li class="list-inline-item">
                        <h5 class="mb-0">{{ \App\Statistik::count()}}</h5>
                        <p class="text-muted">Jumlah</p>
                    </li>
                    <li class="list-inline-item">
                        <h5 class="mb-0">{{ \App\Statistik::where('tanggal',date('Y-m-d'))->count()}}</h5>
                        <p class="text-muted">Sekarang</p>
                    </li>
                    <li class="list-inline-item">
                        <h5 class="mb-0">{{ \App\Statistik::where('tanggal',date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d")))))->count()}}</h5>
                        <p class="text-muted">Kemarin</p>
                    </li>
                </ul>

                <canvas id="lineChart" height="300"></canvas>

            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-lg-6">
        <div class="card m-b-20">
            <div class="card-body">

                <h4 class="mt-0 header-title">Grafik Posts</h4>

                <ul class="list-inline widget-chart m-t-20 m-b-15 text-center">
                    <li class="list-inline-item">
                        <h5 class="mb-0">{{ \App\Category::count() }}</h5>
                        <p class="text-muted">Kategori</p>
                    </li>
                    <li class="list-inline-item">
                        <h5 class="mb-0">{{ \App\Post::count() }}</h5>
                        <p class="text-muted">Posts</p>
                    </li>
                    
                </ul>

                <canvas id="bar" height="300"></canvas>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@else
<div class="alert alert-warning bg-warning text-white" role="alert" style="margin-top: -10px">
    <strong>Di Portal Pendaftaran Peserta Didik Baru</strong> Silahkan Baca Petunjuk-Petunjuk Dibawah Ini
</div>
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <a class="btn btn-primary" href="{{ url('static/panduan_ppdb.pdf')}}" target="_blank">Download Panduan PPDB</a>
                <section id="cd-timeline" class="cd-container">
                    <div class="cd-timeline-block timeline-right">
                        <div class="cd-timeline-img bg-success">
                            <i class="mdi mdi-adjust"></i>
                        </div> <!-- cd-timeline-img -->

                        <div class="cd-timeline-content">
                            <h3>Langkah Pertama</h3>
                            <p class="mb-0 text-muted">
                                Anda Harus Melakukan Pembayaran Formulir Dengan Mengupload Struk Bukti Pembayaran Di Menu Yang Telah Di Siapkan
                                Dan Tunggu Admin Mengkonfirmasi Pembayaran Formulir Yg Anda Sudah Upload
                            </p>
                            <div class="py-2"></div>
                            <p><a href="{{ url('pendaftar/pembayaran-formulir') }}" class="btn btn-primary">Lihat</a></p>
                        </div> <!-- cd-timeline-content -->
                    </div> <!-- cd-timeline-block -->

                    <div class="cd-timeline-block timeline-left">
                        <div class="cd-timeline-img bg-danger">
                            <i class="mdi mdi-adjust"></i>
                        </div> <!-- cd-timeline-img -->

                        <div class="cd-timeline-content">
                            <h3>Langkah Kedua</h3>
                            <p class="mb-0 text-muted">
                                Setelah Admin Mengkonfirmasi Pembayaran Anda, Anda Bisa Mengisi Formulir
                                Calon Siswa, Pastikan Isi Dengan Benar Dan Teliti

                            </p>
                            <div class="py-2"></div>
                            <p><a href="{{ url('pendaftar/formulir') }}" class="btn btn-primary">Lihat</a></p>

                        </div> <!-- cd-timeline-content -->
                    </div> <!-- cd-timeline-block -->

                    <div class="cd-timeline-block timeline-right">
                        <div class="cd-timeline-img bg-info">
                            <i class="mdi mdi-adjust"></i>
                        </div> <!-- cd-timeline-img -->

                        <div class="cd-timeline-content">
                            <h3>Langkah Ketiga</h3>
                            <p class="mb-0 text-muted">
                                Setelah Sudah Mengisi Formulir Calon Siswa Anda Harus Membayar Uang Pangkal Dan Tunggu Admin
                                Mengkonfirmasi Pembayaran Uang Pangkal Yg Telah Anda Upload

                            </p>
                            <div class="py-2"></div>
                            <p><a href="{{ url('pendaftar/pembayaran-uang-pangkal') }}" class="btn btn-primary">Lihat</a></p>
                        </div> <!-- cd-timeline-content -->
                    </div> <!-- cd-timeline-block -->

                    <div class="cd-timeline-block">
                        <div class="cd-timeline-img bg-primary d-xl-none">
                            <i class="mdi mdi-adjust"></i>
                        </div> <!-- cd-timeline-img -->

                        <div class="cd-timeline-content">
                            <h3>Langkah Keempat</h3>
                            <p class="mb-0 text-muted">
                               Setelah Admin  Mengkonfirmasi Pembayaran Yang Telah Anda Upload.
                               Anda Dapat Mengupload Berkas-Berkas Yg Diperlukan Untuk Diupload.
                               Setelah Berkas-Berkas Sudah Anda Upload Anda Sudah Berhasil Melakukan
                               Pendaftaran PPDB

                            </p>
                            <div class="py-2"></div>
                            <p><a href="{{ url('pendaftar/pemberkasan') }}" class="btn btn-primary">Lihat</a></p>
                        </div> <!-- cd-timeline-content -->
                    </div> <!-- cd-timeline-block -->
                </section> <!-- cd-timeline -->

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->  
@endif

@endsection

@section('assets-footer')
<script src="{{ asset('backend/plugins/chart.js/chart.min.js')}}"></script>
<script type="text/javascript">
    !function($) {
    "use strict";

    var ChartJs = function() {};

    ChartJs.prototype.respChart = function(selector,type,data, options) {
        // get selector by context
        var ctx = selector.get(0).getContext("2d");
        // pointing parent container to make chart js inherit its width
        var container = $(selector).parent();

        // enable resizing matter
        // $(window).resize( generateChart );

        // this function produce the responsive Chart JS
        function generateChart(){
            // make chart width fit with its container
            var ww = selector.attr('width', $(container).width() );
            switch(type){
                case 'Line':
                    new Chart(ctx, {type: 'line', data: data, options: options});
                    break;
                case 'Doughnut':
                    new Chart(ctx, {type: 'doughnut', data: data, options: options});
                    break;
                case 'Pie':
                    new Chart(ctx, {type: 'pie', data: data, options: options});
                    break;
                case 'Bar':
                    new Chart(ctx, {type: 'bar', data: data, options: options});
                    break;
                case 'Radar':
                    new Chart(ctx, {type: 'radar', data: data, options: options});
                    break;
                case 'PolarArea':
                    new Chart(ctx, {data: data, type: 'polarArea', options: options});
                    break;
            }
            // Initiate new chart or Redraw

        };
        // run function - render chart at first load
        generateChart();
    },
    //init
    ChartJs.prototype.init = function() {
        //creating lineChart
        var lineChart = {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September","October","Desember"],
            datasets: [
                {
                    label: "Statistik Pengunjung",
                    fill: true,
                    lineTension: 0.5,
                    backgroundColor: "rgba(122, 111, 190, 0.2)",
                    borderColor: "#7a6fbe",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "#7a6fbe",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "#7a6fbe",
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: [
                        {{ \App\Statistik::whereMonth('tanggal','01')->count() }},
                        {{ \App\Statistik::whereMonth('tanggal','02')->count() }},
                        {{ \App\Statistik::whereMonth('tanggal','03')->count() }},
                        {{ \App\Statistik::whereMonth('tanggal','04')->count() }},
                        {{ \App\Statistik::whereMonth('tanggal','05')->count() }},
                        {{ \App\Statistik::whereMonth('tanggal','06')->count() }},
                        {{ \App\Statistik::whereMonth('tanggal','07')->count() }},
                        {{ \App\Statistik::whereMonth('tanggal','08')->count() }},
                        {{ \App\Statistik::whereMonth('tanggal','09')->count() }},
                        {{ \App\Statistik::whereMonth('tanggal','10')->count() }},
                        {{ \App\Statistik::whereMonth('tanggal','11')->count() }},
                        {{ \App\Statistik::whereMonth('tanggal','12')->count() }},
                    ]
                },
               
            ]
        };

        var lineOpts = {
            scales: {
                yAxes: [{
                    ticks: {
                        max: 500,
                        min: 1,
                        stepSize: 50
                    }
                }]
            }
        };

        this.respChart($("#lineChart"),'Line',lineChart, lineOpts);

        //donut chart
        var donutChart = {
            labels: [
                "Aktif",
                "NonAktif"
            ],
            datasets: [
                {
                    data: [{{ \App\Comment::where('status',1)->count()}}, {{ \App\Comment::where('status',0)->count()}}],
                    backgroundColor: [
                        "#7a6fbe",
                        "#ebeff2"
                    ],
                    hoverBackgroundColor: [
                        "#7a6fbe",
                        "#ebeff2"
                    ],
                    hoverBorderColor: "#fff"
                }]
        };
        this.respChart($("#doughnut"),'Doughnut',donutChart);




        
    },
    $.ChartJs = new ChartJs, $.ChartJs.Constructor = ChartJs

}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.ChartJs.init()
}(window.jQuery);

</script>
@endsection