<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
@yield('meta')
<meta name='copyright' content='Arman Juliansyah'>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="theme-color" content="#13234a">
<title>@hasSection('title')@yield('title') — @endif{{ $site->nama }}</title>
<meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($site->keterangan), 155) }}">
<link rel="icon" type="image/png" href="{{ asset($site->logo_sub_be) }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
<style type="text/css">
/* Slicknav */
.slicknav_btn:hover {
    background-color: #488dd8;
}

/* ===== FULLSCREEN FIX ===== */
*, *::before, *::after {
    box-sizing: border-box;
}

html {
    overflow-x: hidden;
    width: 100%;
}

body {
    overflow-x: hidden;
    width: 100%;
    max-width: 100%;
    margin: 0 !important;
    padding: 0 !important;
    padding-right: 0 !important;
}

/* Fix Bootstrap modal padding compensation */
body.modal-open {
    padding-right: 0 !important;
}

/* Header full width */
.header,
.header .topbar,
.header .header-inner,
.header .header-menu {
    width: 100%;
    max-width: 100%;
    margin: 0;
    left: 0;
    right: 0;
}

/* Slider full width - ini yang paling penting */
.home-slider {
    width: 100vw !important;
    max-width: 100vw !important;
    margin-left: 0 !important;
    margin-right: 0 !important;
    overflow: hidden;
    position: relative;
    left: 50%;
    right: 50%;
    margin-left: -50vw !important;
    margin-right: -50vw !important;
}

.home-slider .single-slider {
    width: 100% !important;
}

.slider-active {
    width: 100% !important;
    overflow: hidden;
}

/* Section full width */
section,
.section {
    width: 100%;
    max-width: 100%;
    overflow-x: hidden;
}

/* Fun facts full width */
.fun-facts {
    width: 100% !important;
    max-width: 100% !important;
    margin: 0 !important;
    overflow: hidden;
}

/* Footer full width */
footer,
.footer {
    width: 100% !important;
    max-width: 100% !important;
    margin: 0 !important;
    overflow: hidden;
}

/* Breadcrumbs full width */
.breadcrumbs {
    width: 100% !important;
    max-width: 100% !important;
    margin: 0 !important;
}

/* Fix row default margin */
.row {
    margin-right: 0 !important;
    margin-left: 0 !important;
}

/* Container tetap centered */
.container {
    padding-right: 15px;
    padding-left: 15px;
}
/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 6px;
}
::-webkit-scrollbar-track {
    background: #f1f1f1;
}
::-webkit-scrollbar-thumb {
    background: #1a73e8;
    border-radius: 3px;
}
::-webkit-scrollbar-thumb:hover {
    background: #1a2e5a;
}
/* Navbar */
.navbar,
.navbar-default,
.navbar-collapse {
    width: 100% !important;
    padding: 0 !important;
    margin: 0 !important;
}

/* Owl carousel overflow fix */
.owl-carousel,
.owl-stage-outer,
.owl-stage {
    overflow: hidden !important;
}
/* ===== END FULLSCREEN FIX ===== */
</style>
<link rel="stylesheet" href="{{ asset('frontend/css/modern.css') }}?v=5">