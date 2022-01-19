<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>{{ \App\Aplikasi::first()->nama }}</title>
        <meta content="Arman Juliansyah" name="author" />
        @yield('meta')
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <link href="{{ asset('backend/plugins/fullcalendar/css/fullcalendar.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('backend/plugins/morris/morris.css') }}">
        <link href="{{ asset('backend/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" type="text/css">  
        <link href="{{ asset('backend/plugins/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css">
        <script src="{{ asset('js/currency.js')}}"></script>

        <style type="text/css">
          div.dataTables_wrapper div.dataTables_processing {
              position: absolute;
              top: 50%;
              left: 50%;
              width: 200px;
              margin-left: -100px;
              margin-top: -26px;
              text-align: center;
              padding: 1em 0;
              background-color: #58da82;
              color: white;
          }
        </style> 
        @yield('assets-header')
    </head>
    <body>
      <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" data-modal="scroll">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            </div>
        </div>
      </div>
      <div id="wrapper">
            @include('backend.layouts.header')
            @include('backend.layouts.sidebar')
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        @yield('konten')
                    </div> 
                </div>       
            </div>    
            @include('backend.layouts.footer')      
      </div>
      <script src="{{ asset('backend/assets/js/jquery.min.js')}}"></script>
      <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{ asset('backend/assets/js/metisMenu.min.js')}}"></script>
      <script src="{{ asset('backend/assets/js/jquery.slimscroll.js')}}"></script>
      <script src="{{ asset('backend/assets/js/waves.min.js')}}"></script>
      <script src="{{ asset('backend/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
      <button data-toggle="modal" data-target="#mediumModal" class="modal-trigger" style="display:none"></button>
      <script>
          function triggerFormModal(url, selector = "#content") {
              $(".modal-content").load(url + " " + selector, function (response, status) {
                  $('.ui_select').select2();
              });
              $(".modal-trigger").click();
          }
      </script>
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
      @yield('assets-footer')
      <script src="{{ asset('backend/assets/js/app.js')}}"></script>
      <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
      <script src="{{ asset('backend/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
      <script src="{{ asset('backend/assets/pages/lightbox.js')}}"></script>
      @include('sweetalert::alert')
    </body>
</html>
