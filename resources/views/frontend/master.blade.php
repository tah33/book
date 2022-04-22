<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Book Selling</title>
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font_awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/rateit.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    <link rel="shortcut icon" href="{{ asset($setting->favicon) }}"/>
</head>
<body>
@include('frontend.header')
@yield('section')
@include('frontend.footer')
<script src="{{asset('assets/backend/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/backend/js/popper.js')}}"></script>
<script src="{{asset('assets/backend/js/tooltip.js')}}"></script>
<script src="{{asset('assets/backend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.rateit.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script src="{{asset('assets/backend/js/toastr.min.js')}}"></script>
@stack('js')
{!! Toastr::message() !!}
</body>
</html>
