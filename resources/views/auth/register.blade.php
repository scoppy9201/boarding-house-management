@extends('dashboard.auth')

@section('content')
<div class="row log-in">
    <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-6 col-sm-8 form-login">
        <div class="card">
            <div class="card-body">
                <div class="title-3 text-start">
                    <h2>Đăng ký</h2>
                </div>
                <form  method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                            <input id="name" type="text"  placeholder="Nhập họ tên" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                           
                        </div>
                        @error('name')
                        <div class="important-note">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i data-feather="mail"></i>
                                </div>
                            </div>
                            <input id="email" type="email" placeholder="Nhập địa chỉ email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        </div>
                        @error('email')
                        <div class="important-note">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                            <input id="pwd-input" type="password"  placeholder="Nhập mật khẩu" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <div class="input-group-apend">
                                <div class="input-group-text">
                                    <i id="pwd-icon" class="far fa-eye-slash"></i>
                                </div>
                            </div>
                        </div>
                        @error('password')
                        <div class="important-note">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                            <input id="password-confirm" type="password" placeholder="Nhập lại mật khẩu" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            <div class="input-group-apend">
                            </div>
                        </div>
                    </div>
                    <div class="important-note">
                        Mật khẩu phải có tối thiểu 8 ký tự và phải chứa các chữ cái và số
                    </div>
                    <div>
                        <button type="submit" class="btn btn-gradient btn-pill color-2 me-sm-3 me-2">Tạo tài khoản</button>
                        <a href="{{ route('login') }}" class="btn btn-dashed btn-pill color-2">Đăng nhập</a>
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
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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