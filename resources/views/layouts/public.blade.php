<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('plugins/images/favicon.png')}}">
    <title>@yield('title') - {{ config('app.name', 'Visitor Monitoring') }}</title>
    @include('layouts.parts.css-required')
    <!-- ===== Theme Color CSS ===== -->
    <link href="{{asset('bootstrap/css/colors/red.css')}}" id="theme" rel="stylesheet">
    @stack('css')
</head>
<body class="normal">
<!-- ===== Main-Wrapper ===== -->
<div id="wrapper">
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <!-- ===== Left-Sidebar-End ===== -->

    <!-- ===== Page-Content ===== -->
    <div class="page-wrapper" style="margin-left:0; padding: 60px 0;">
        @yield('content')
        <footer class="text-center">
            © 2019 {{ config('app.name', 'Visitor Monitoring') }}
        </footer>
    </div>
    <!-- ===== Page-Content-End ===== -->
</div>
<!-- ===== Main-Wrapper-End ===== -->
<!-- ==============================
    Required JS Files
=============================== -->
@include('layouts.parts.js-required')
<script>
    const API_URL = '{{ url("api") }}';
    const LOGIN_URL = '{{ url("login") }}';
</script>
@stack('js')
</body>

</html>
