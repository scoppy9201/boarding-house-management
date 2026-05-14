@extends('dashboard.auth')

@section('content')
    <div class="row log-in">
        <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-6 col-sm-8 form-login">
            <div class="card">
                <div class="card-body">
                    <div class="title-3 text-start">
                        <h2>Đăng nhập</h2>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i data-feather="user"></i>
                                    </div>
                                </div>
                                <input id="email" type="email" placeholder="Nhập Email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i data-feather="lock"></i>
                                    </div>
                                </div>
                                <input id="pwd-input" type="password" placeholder="Mật khẩu"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">
                                <div class="input-group-apend">
                                    <div class="input-group-text">
                                        <i id="pwd-icon" class="far fa-eye-slash"></i>
                                    </div>
                                </div>
                            </div>
                            @error('email')
                            
                    
                                    <strong style="color:red">Tên tài khoản hoặc mật khẩu không chính xác</strong>
                            
                            @enderror
                        </div>
                        <div class="d-flex">

                            <label class="d-block mb-0" for="remember">
                                <input class="checkbox_animated color-2t" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}> Nhớ mật khẩu
                            </label>
                            <a href="{{ route('password.request') }}" class="font-rubik text-color-2">Bạn đã quên mật khẩu
                                ?</a>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-gradient btn-pill color-2 me-sm-3 me-2">Đăng nhập</button>
                            <a href="{{ route('register') }}" class="btn btn-dashed btn-pill color-2">Đăng ký</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
@section('js')
    <!--admin js -->
    <script src="{{ asset('assets/js/admin-script.js') }}"></script>

    <!-- login js -->
    <script src="{{ asset('assets/js/login.js') }}"></script>
@endsection
