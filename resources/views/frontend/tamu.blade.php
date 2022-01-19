<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>{{ \App\Aplikasi::first()->nama }}</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Arman Julansyah" name="Arman Juliansyah" />
        <link href="{{ asset('backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet"> 
        <style type="text/css" media="screen">
            .wrapper-page {
                    margin: 5.5% auto;
                    max-width: 760px;
                    position: relative;
                }

            @media (max-width: 600px) {
                .wrapper-page {
                    margin: 5.5% auto;
                    max-width: 440px;
                    position: relative;
                }
            }
             #gambar{
             background:url({{ asset(\App\Aplikasi::first()->gambar_total_siswa) }});
             background-repeat: no-repeat;
             background-position: center;
             background-attachment: fixed;
             background-size: cover;
           }
        </style>
    </head>

    <body id="gambar">
        <div class="wrapper-page">
         
            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="{{ url('/') }}" class="logo logo-admin"><img src="{{ asset(\App\Aplikasi::first()->gambar_login)}}" height="30" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Buku Tamu {{ \App\Aplikasi::first()->nama }}</h4>

                        <form class="form-horizontal m-t-20" method="POST" action="{{ url('tamu') }}" enctype="multipart/form-data">
                            {{ csrf_field()}}
                            <div class="form-group">
                                <label class="control-label">Acara</label>
                                <select class="form-control select2" name="acara_id" required>
                                    @foreach(\App\Acara::orderBy('id','DESC')->get() as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nama Pengunjung</label>
                                <input type="text" class="form-control" name="nama_pengunjung" required>
                            </div>

                            <div class="form-group">
                                <label>Instansi</label>
                                <input type="text" class="form-control" name="instansi" required>
                            </div>

                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="number" class="form-control" name="telepon" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Alamat</label>
                                <textarea class="form-control" name="alamat" required style="color: black;margin-top: 5px" rows="5"></textarea>
                            </div>  

                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" placeholder="optional" >
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Photo</label>
                                <input type="file" id="input-file-now" class="dropify" name="photo" required /> 
                            </div>  
                            <div class="form-group">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Kirim</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>


        </div>

    <!-- jQuery  -->
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('backend/assets/js/waves.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('backend/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>

    <!-- Plugins Init js -->
    <script src="{{ asset('backend/plugins/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('backend/pages/upload-init.js') }}"></script>
    <script src="{{ asset('backend/assets/pages/form-advanced.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
    <script src="{{ asset('backend/plugins/sweetalert/sweetalert.all.js') }}"></script>
    @include('sweetalert::alert')

</body>
</html>