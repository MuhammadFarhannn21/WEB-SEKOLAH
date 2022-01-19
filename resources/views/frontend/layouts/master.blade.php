<!DOCTYPE html>
<html class="no-js" lang="zxx">
 	<head>
		@include('frontend.layouts.style')	
		@yield('assets-header')
    </head>
    <body>
		@include('frontend.layouts.preloader')		
		@include('frontend.layouts.header')		
		@yield('konten')
		@include('frontend.layouts.footer')
        @include('frontend.layouts.script')	
        @yield('assets-bottom')
    </body>
</html>