<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sheltos - Modern home page">
    <meta name="keywords" content="sheltos">
    <meta name="author" content="sheltos">
    <link rel="icon" href="{{asset('assets/images/logo/favicon.png')}}" type="image/x-icon" />
    <title>PHONGTRO20 - Tìm phòng đơn giản, thuê phòng giản đơn</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Roboto+Slab:wght@400;800&display=swap" rel="stylesheet">

    <!-- range slider css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery-ui.css')}}">

    <!-- magnific css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/magnific-popup.css')}}">

    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">

    <!-- Template css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/color1.css')}}">
    @yield('style')
</head>

<body class="layout-bg">
    {{-- @include('frontend.components.load') --}}
    @include('frontend.components.header')
    @yield('content')
    @include('frontend.components.footer')
    @include('frontend.components.modal')
    @yield('modal')
    @include('frontend.components.taptotop')
    @yield('customiez')
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
     <!-- latest jquery-->
     <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

     <!-- popper js-->
     <script src="{{asset('assets/js/popper.min.js')}}"></script>
     @yield('js')
     <!-- magnific js -->
     <script src="{{asset('assets/js/jquery.magnific-popup.js')}}"></script>
     <script src="{{asset('assets/js/zoom-gallery.js')}}"></script>
 
 
         <!-- range slider js -->
     <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
     <script src="{{asset('assets/js/jquery.ui.touch-punch.min.js')}}"></script>
    
 
     <!-- Bootstrap js-->
     <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
 
 
     <!-- feather icon js-->
     <script src="{{asset('assets/js/feather-icon/feather.min.js')}}"></script>
     <script src="{{asset('assets/js/feather-icon/feather-icon.js')}}"></script>
 
     <!-- video js-->
     <script src="{{asset('assets/js/jquery.vide.min.js')}}"></script>
 
     <!-- wow js-->
     <script src="{{asset('assets/js/wow.min.js')}}" ></script>
 
     <!-- slick js -->
     <script src="{{asset('assets/js/slick.js')}}"></script>
     <script src="{{asset('assets/js/slick-animation.min.js')}}"></script>
     <script src="{{asset('assets/js/custom-slick.js')}}"></script>
 
     <!-- Template js-->
     <script src="{{asset('assets/js/script.js')}}"></script>

     <script src="{{asset('assets/js/login.js')}}"></script>
 
     <!-- Customizer js-->
     <script src="{{asset('assets/js/customizer.js')}}"></script>
 
     <!-- Color-picker js-->
     <script src="{{asset('assets/js/color/template-color.js')}}"></script>
     <script src="{{asset('assets/js/color/layout10.js')}}"></script>
    

    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div> --}}
    <!-- latest jquery-->
    <script>
        function makeToast(title,color = "green") {
            Toastify({
        text: title,
        className: "info",
        style: {
            background: color,
            }
}).showToast();
        }
    </script>
   @php 
   if(Session::get('toast') !== null) {
    $toast = Session::get('toast');
    
   }
    
   @endphp
    @if (isset($toast))
    <script>
        makeToast("{{ $toast[0] }}","{{ $toast[1] }}")
    </script>
    @endif
 
</body>

</html>
