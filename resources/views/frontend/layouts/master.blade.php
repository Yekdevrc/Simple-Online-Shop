<!doctype html>
<html lang="en">

<!-- Mirrored from quomodothemes.website/html/shopus/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Nov 2023 13:54:10 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="keywords"
          content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('frontend/assets/images/homepage-one/icon.png')}}">

    <title>Online Shop</title>

    <link rel="stylesheet" href="{{asset('frontend/css/swiper10-bundle.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-5.3.2.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/nouislider.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/aos-3.0.0.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">



</head>
<body>

@include('frontend.layouts.header')

@yield('content')

@include('frontend.layouts.footer')


<script src="{{asset('frontend/assets/js/jquery_3.7.1.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/bootstrap_5.3.2.bundle.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/nouislider.min.js')}}"></script>

<script src="{{asset('frontend/assets/js/aos-3.0.0.js')}}"></script>

<script src="{{asset('frontend/assets/js/swiper10-bundle.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


@stack('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script src="{{asset('frontend/assets/js/shopus.js')}}"></script>
</body>

<!-- Mirrored from quomodothemes.website/html/shopus/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Nov 2023 13:55:47 GMT -->
</html>
