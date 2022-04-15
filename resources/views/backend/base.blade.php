<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="{{ asset('assets/backend/fonts/css2.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font_awesome/css/all.min.css')}}">
{{--    <link rel="stylesheet" href="{{asset('assets/backend/css/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/components.css')}}">--}}
    <link rel="stylesheet" href="{{ asset('assets/backend/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
    @stack('css')
</head>
<body>
@yield('base.content')

<script src="{{asset('assets/backend/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/backend/js/popper.js')}}"></script>
<script src="{{asset('assets/backend/js/tooltip.js')}}"></script>
<script src="{{asset('assets/backend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/backend/js/jquery.nicescroll.min.js')}}"></script>
{{--
<script src="{{asset('assets/backend/js/moment.min.js')}}"></script>
<script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>--}}
<script src="{{asset('assets/backend/js/stisla.js')}}"></script>
<script src="{{asset('assets/backend/js/scripts.js')}}"></script>
<script src="{{asset('assets/backend/js/toastr.min.js')}}"></script>
<script src="{{asset('assets/backend/js/custom.js')}}"></script>
@stack('js')
{!! Toastr::message() !!}
</body>
</html>
