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
    <link rel="stylesheet" href="{{asset('assets/backend/css/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backEnd/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backEnd/css/rowReorder.dataTables.min.css/')}}">
    <link rel="stylesheet" href="{{asset('assets/backEnd/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/dataTables.dateTime.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
    <link rel="shortcut icon" href="{{ asset($setting->favicon) }}"/>
    @stack('css')
</head>
<body>
@yield('base.content')

<script src="{{asset('assets/backend/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/backend/js/popper.js')}}"></script>
<script src="{{asset('assets/backend/js/tooltip.js')}}"></script>
<script src="{{asset('assets/backend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/backend/js/moment.min.js')}}"></script>
<script src="{{asset('assets/backend/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('assets/backend/js/datatables.min.js')}}"></script>
<script src="{{asset('assets/backEnd/js/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/backend/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/backend/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('assets/backend/js/dataTables.dateTime.min.js')}}"></script>
<script src="{{asset('assets/backEnd/js/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/backEnd/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/backEnd/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/backEnd/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/backEnd/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/backEnd/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/backEnd/js/dataTables.rowReorder.min.js')}}"></script>
<script src="{{asset('assets/backend/js/stisla.js')}}"></script>
<script src="{{asset('assets/backend/js/scripts.js')}}"></script>
<script src="{{asset('assets/backend/js/toastr.min.js')}}"></script>
<script src="{{asset('assets/backend/js/custom.js')}}"></script>
@stack('js')
{!! Toastr::message() !!}
</body>
</html>
