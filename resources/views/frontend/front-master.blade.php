<!DOCTYPE html>
<html lang="en" class="template-default template-all">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laptop World</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/styles.css')}}" media="all" />
</head> 

<body>
@include('frontend.header')

@yield('frontcontent')


<script type="text/javascript" src="{{ asset('assets/scripts/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/jquery.noconflict.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/bootstrap/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/jquery.bxslider.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/jquery.ddslick.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/jquery.easing.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/jquery.meanmenu.hack.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/jquery.fancybox.pack.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/jquery.animateNumber.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/jquery.flexslider-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/jquery.heapbox-0.9.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/isotope.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/packery-mode.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/video.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/jquery-ui.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/magiccart/magicproduct.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/magiccart/magicaccordion.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/magiccart/magicmenu.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/script.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@stack('front-script')

</body>
@include('frontend.footer')
</html>

