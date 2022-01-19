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
           background-position: center center;
           background-attachment: fixed;
           background-size: cover;
         }
    </style>
    <body id="gambar">
        <div class="wrapper-page-login">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center m-0">
                        <a href="{{url('/login')}}" class="logo logo-admin"><img src="{{ asset(\App\Aplikasi::first()->gambar_login)}}" height="50" alt="logo"></a>
                    </h3>

                    <div class="p-3" style="margin-top: -10px">
                        <h4 class="text-muted font-18 m-b-5 text-center">Selamat Datang </h4>
                        <p class="text-muted text-center">Silahkan Login Dengan Data Yang Benar.</p>
                        {{-- mengarakan pada fungsi login di LoginController --}}
                        <form class="form-horizontal m-t-30" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username Or Email</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required placeholder="Masukan Username Or Email">
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" class="form-control" id="userpassword" name="password" placeholder="Masukan password">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
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
</body>
</html>