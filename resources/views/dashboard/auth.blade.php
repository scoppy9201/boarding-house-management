<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">

    <!-- Template css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/admin.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    {{-- @include('layouts.components.load') --}}
    <div class="page-wrapper">
        <div class="authentication-box">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    
    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- feather icon js-->
    <script src="{{ asset('assets/js/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/feather-icon/feather-icon.js') }}"></script>

    @yield('js')
</body>

</html>
