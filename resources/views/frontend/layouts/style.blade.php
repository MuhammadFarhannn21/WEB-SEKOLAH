<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
@yield('meta')
<meta name='copyright' content='Arman Juliansyah'>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>{{ \App\Aplikasi::first()->nama}}</title>
<link rel="icon" type="image/png" href="{{ \App\Aplikasi::first()->logo_sub_be }}">
<link href="{{ asset('backend/plugins/fullcalendar/css/fullcalendar.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('frontend/cssd5a5.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/color/color1.css') }}">
<link rel="stylesheet" href="#" id="colors">	
<style type="text/css" media="screen">
	.slicknav_btn:hover {
	    background-color: #488dd8;
	}
</style>