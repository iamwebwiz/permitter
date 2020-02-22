<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">

    <style>
        * {
            font-size: medium;
        }
    </style>

    @yield('css')
    @yield('styles')
    <title>{{ config('app.name') }}</title>
</head>

<body>

<div class="dashboard-main-wrapper">
    @include('layouts.partials.navbar')

    @include('layouts.partials.sidebar')

    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            @yield('content')
        </div>

        @include('layouts.partials.footer')
    </div>
</div>

<!-- jquery 3.3.1  -->
<script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
<!-- bootstap bundle js -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
<!-- slimscroll js -->
<script src="{{ asset('assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
<!-- main js -->
<script src="{{ asset('assets/libs/js/main-js.js') }}"></script>

@yield('javascript')

</body>
</html>
