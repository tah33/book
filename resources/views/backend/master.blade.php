@extends('backend.base')
@section('base.content')
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('backend.partials.header')
            @include('backend.partials.sidebar')
            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div>
            @include('backend.partials.footer')
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.trash_btn', function () {
                if (confirm("Are You Sure?")) {
                    let selector = $(this).closest('td').find('.trash_form');
                    selector.submit();
                }
            });
        });
    </script>
@endpush
