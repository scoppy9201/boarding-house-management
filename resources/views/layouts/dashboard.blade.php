<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sheltos - Admin dashboard page">
    <meta name="keywords" content="sheltos">
    <meta name="author" content="sheltos">
    <link rel="icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/x-icon" />
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Toast JS --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i"rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">
    <!-- latest jquery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <!-- Template css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/admin.css') }}">
    <!-- Styles -->
    @yield('style')
</head>

<body>
    @include('layouts.components.load')
    <div class="page-wrapper">
        @include('layouts.components.header')
        <div class="page-body-wrapper">
            @include('layouts.components.sidebar')
            <div class="page-body">
                @yield('content')
            </div>
            @include('layouts.components.footer')
        </div>
    </div>
    @include('layouts.components.taptotop')
    @include('layouts.components.customizer')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- customizer end -->
    <script>
        function makeToast(title, color = "green") {
            Toastify({
                text: title,
                className: "info",
                style: {
                    background: color,
                }
            }).showToast();
        }
    </script>
    <!-- apex chart js-->
    <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    @yield('js')


    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/feather-icon/feather-icon.js') }}"></script>
    <!-- sidebar js -->
    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    <!--admin js -->
    <script src="{{ asset('assets/js/admin-script.js') }}"></script>
    <!-- Customizer js-->
    <script src="{{ asset('assets/js/customizer.js') }}"></script>
    @if (isset($toast))
        <script>
            makeToast("{{ $toast[0] }}", "{{ $toast[1] }}")
        </script>
    @endif
    @if ($toast = session()->get('toast'))
        <script>
            makeToast("{{ $toast[0] }}", "{{ $toast[1] }}")
        </script>
    @endif
</body>
</html>
