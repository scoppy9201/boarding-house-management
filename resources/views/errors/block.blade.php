@extends('dashboard.auth')

@section('content')
    <div class="row container">
        <div class="col-lg-3 bg-light">
            <h1 class="page-header text-header">Tài khoản của bạn đã bị chặn</h1>
            <div class="mt-2 ">
                <strong>Tại sao tài khoản của tôi bị chặn ?</strong>
                <p>Tài khoản của bạn đã có những hành vi làm ảnh hưởng đến hoạt động và mục tiêu của website. Vì vậy quản trị viên đã chặn tài khoản của bạn</p>
            </div>
            <div>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">Đăng xuất<i data-feather="log-out"></i></a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          
        </div>
        <div class="col-lg-9">
            <div class="col-lg-12">
                <img class="img-fluid" src="{{ asset('images/errors/block.png') }}" alt="">
            </div>
        </div>
 
    </div>
   
@endsection
@section('js')
    <!--admin js -->
    <script src="{{ asset('assets/js/admin-script.js') }}"></script>

    <!-- login js -->
    <script src="{{ asset('assets/js/login.js') }}"></script>
@endsection
