<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>{{ \App\Aplikasi::first()->nama }}</title>
        <meta content="Admin Dashboard" name="{{ \App\Aplikasi::first()->nama }}" />
        <meta content="Themesbrand" name="Arman Juliansyah" />
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico')}}">
        <link href="{{ asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/assets/css/style.css')}}" rel="stylesheet" type="text/css">
    </head>
    <style type="text/css" media="screen">
         #gambar{
           background:url({{ asset(\App\Aplikasi::first()->gambar_total_siswa) }});
           background-repeat: no-repeat;
           background-position: center;
           background-attachment: fixed;
           background-size: cover;
         }
    </style>
    <body id="gambar">
        <div class="wrapper-page">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center m-0">
                        <a href="{{url('/login')}}" class="logo logo-admin"><img src="{{ asset(\App\Aplikasi::first()->gambar_login)}}" height="50" alt="logo"></a>
                    </h3>

                    <div class="p-3" style="margin-top: -10px">
                        <h4 class="text-muted font-18 m-b-5 text-center">Selamat Datang</h4>
                        <p class="text-muted text-center"> Di Portal Pendaftaran Peserta Didik Baru Silahkan Isi Data Dibawah Ini Dengan Benar.
                        <a href="{{ url('static/brosur.jpg') }}" target="_blank" class="text-primary">Silahkan lihat Brosur sekolah kami.</a>
                        </p>
                        <form  method="POST" action="#" id="formRegister" onsubmit="return false">
                            @csrf

                            <div class="row">
                              <div class="col-md-6"> 
                                <div class="form-group">
                                    <label>Username <span class="text-primary"> (Username Pribadi)</span></label>
                                    <input type="text" class="form-control" name="username" required placeholder="Masukan Username">
                                </div>
                                <div class="form-group">
                                    <label>Email <span class="text-primary"> (Email Pribadi)</span></label>
                                    <input type="text" class="form-control" name="email" required placeholder="Masukan Email Yang Akan Digunakan Login Ke PPDB">
                                </div>
                                <div class="form-group">
                                    <label>Password <span class="text-primary"> (Password Pribadi)</span></label>
                                    <input type="password" class="form-control" name="password" placeholder="Masukan password Yang Akan Digunakan Login Ke PPDB" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name" placeholder="Masukan Nama Lengkap Anda" required>
                                </div>
                                <div class="form-group">
                                    <label>No. HP</label>
                                    <input type="number" class="form-control" name="telepon" placeholder="Masukan No. HP anda" required>
                                </div>
                               
                              </div>
                              <div class="col-md-6"> 
                                <div class="form-group">
                                    <label>Tempat, Tanggal Lahir</label>
                                    <input type="text" class="form-control" name="tempat_tanggal_lahir" value="{{ old('tempat_tanggal_lahir') }}" required placeholder="Masukan Tempat Tanggal Lahir">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" required>
                                      <option value="L">Laki-laki</option>
                                      <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Agama</label>
                                    <input type="Agama" class="form-control" name="agama" placeholder="Masukan Agama" required>
                                </div>
                                <div class="form-group">
                                    <label>Asal Sekolah</label>
                                    <input type="text" class="form-control" name="asal_sekolah" placeholder="Masukan Asal Sekolah" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Rumah</label>
                                    <input type="text" class="form-control" name="alamat_rumah" placeholder="Masukan Alamat Rumah" required>
                                </div>
                               
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Daftar</button>
                                </div>
                              </div>
                               <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jika sudah mendaftar akun diatas silahkan login disini.</label>
                                    <a href="{{ url('login') }}" class="btn btn-primary w-md waves-effect waves-light" type="submit">Login</a>
                                </div>
                                
                              </div>
                            </div>
                            

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20">
                                </div>
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
  <script src="{{ asset('backend/assets/js/app.js') }}"></script>
  <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
  <script type="text/javascript">
      (function () {
          var options = {
              whatsapp: " {{ \App\Aplikasi::first()->telepon }}", // WhatsApp number
              email: "{{ \App\Aplikasi::first()->email }}", // Email
              button_color: "#129BF4", // Color of button
              position: "right", // Position may be 'right' or 'left'
              order: "whatsapp,email", // Order of buttons
          };
          var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
          var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
          s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
          var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
      })();
  </script>
  @include('sweetalert::alert')
  <script src="{{ asset('js/alert.js')}}"></script>
    <script type="text/javascript">
        // Bagian Login
        $('#formRegister').submit(function() {
            $.ajax({
                url         : '{{ url('ppdb') }}',
                type        : 'POST',
                dataType    : 'json',
                data        : new FormData(this),
                processData : false,
                contentType : false,
                beforeSend : function() {
                    $('button').attr('disabled', true);
                    $("[name='name']").attr('disabled', true);
                    $("[name='username']").attr('disabled', true);
                    $("[name='password']").attr('disabled', true);
                    $("[name='email']").attr('disabled', true);
                    $("[name='telepon']").attr('disabled', true);
                    $("[name='tempat_tanggal_lahir']").attr('disabled', true);
                    $("[name='jenis_kelamin']").attr('disabled', true);
                    $("[name='agama']").attr('disabled', true);
                    $("[name='asal_sekolah']").attr('disabled', true);
                    $("[name='alamat_rumah']").attr('disabled', true);
                },
                success : function(res) {
                    if(res.ErrorCode != 0)
                    {
                        toastAlert('error', res.Message);
                        $('button').prop('disabled', false);
                    }
                    else
                    {
                        toastAlert('success', res.Message);
                        setTimeout(function() {
                          window.location.replace('{{ url('/login') }}');
                        }, 1500)
                    }
                    $("[name='name']").attr('disabled', false);
                    $("[name='username']").attr('disabled', false);
                    $("[name='password']").attr('disabled', false);
                    $("[name='email']").attr('disabled', false);
                    $("[name='telepon']").attr('disabled', false);
                    $("[name='tempat_tanggal_lahir']").attr('disabled', false);
                    $("[name='jenis_kelamin']").attr('disabled', false);
                    $("[name='agama']").attr('disabled', false);
                    $("[name='asal_sekolah']").attr('disabled', false);
                    $("[name='alamat_rumah']").attr('disabled', false);
                },
                error : function(res) {
                    toastAlert('error', 'Server Sedang Error');
                    $('button').prop('disabled', false);
                    $("[name='name']").attr('disabled', false);
                    $("[name='username']").attr('disabled', false);
                    $("[name='password']").attr('disabled', false);
                    $("[name='email']").attr('disabled', false);
                    $("[name='telepon']").attr('disabled', false);
                    $("[name='tempat_tanggal_lahir']").attr('disabled', false);
                    $("[name='jenis_kelamin']").attr('disabled', false);
                    $("[name='agama']").attr('disabled', false);
                    $("[name='asal_sekolah']").attr('disabled', false);
                    $("[name='alamat_rumah']").attr('disabled', false);
                }
            })
        })
    </script>
</body>
</html>