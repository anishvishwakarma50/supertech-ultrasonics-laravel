@props(['content' => 'No Content Provided','title' => 'No Title'])

<!doctype html>
<html lang={{ app()->getLocale() }}>
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ $title }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/meanmenu.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

        <!-- Slider Revolution CSS Files -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/rs/css/settings.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/rs/css/layers.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/rs/css/navigation.css')}}">
    </head>
    <body>

        <!-- header-start -->
		<x-includes.header />
        <!-- header-start -->

       
        {{-- @yield('content') --}}

        {{-- Main Content will be here --}}
        {{ $content }}

        <!-- footer-area-start -->
        <x-includes.footer />
        <!-- footer-area-end -->



		<!-- JS here -->
        <!-- JS here -->
        <script data-cfasync="false" src="{{asset('../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('assets/js/slick.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.meanmenu.min.js')}}"></script>
        <script src="{{asset('assets/js/ajax-form.js')}}"></script>
        <script src="{{asset('assets/js/wow.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
        <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>

         <!-- Slider Revolution core JavaScript files -->
         <script type="text/javascript" src="{{asset('assets/rs/js/jquery.themepunch.tools.min.js')}}"></script>
         <script type="text/javascript" src="{{asset('assets/rs/js/jquery.themepunch.revolution.min.js')}}"></script>
         <script src="{{ asset('assets/rs/js/revolution-active.js') }}"></script>

         <!-- Slider Revolution extension scripts. ONLY NEEDED FOR LOCAL TESTING -->
         <script type="text/javascript" src="{{asset('assets/rs/js/extensions/revolution.extension.actions.min.js')}}"></script>
         <script type="text/javascript" src="{{asset('assets/rs/js/extensions/revolution.extension.carousel.min.js')}}"></script>
         <script type="text/javascript" src="{{asset('assets/rs/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
         <script type="text/javascript" src="{{asset('assets/rs/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
         <script type="text/javascript" src="{{asset('assets/rs/js/extensions/revolution.extension.migration.min.js')}}"></script>
         <script type="text/javascript" src="{{asset('assets/rs/js/extensions/revolution.extension.navigation.min.js')}}"></script>
         <script type="text/javascript" src="{{asset('assets/rs/js/extensions/revolution.extension.parallax.min.js')}}"></script>
         <script type="text/javascript" src="{{asset('assets/rs/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
         <script type="text/javascript" src="{{asset('assets/rs/js/extensions/revolution.extension.video.min.js')}}"></script>
    </body>

<!-- Mirrored from www.devsnews.com/template/kingfact/kingfact/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Sep 2025 15:11:17 GMT -->
</html>