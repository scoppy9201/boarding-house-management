@extends('dashboard.auth')

@section('content')
    <div class="row log-in">
        <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-6 col-sm-8 form-login">
            <div class="card">
                <div class="card-body">
                    <div class="title-3 text-start">
                        <h2>Quên mật khẩu</h2>
                    </div>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i data-feather="user"></i>
                                    </div>
                                </div>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Nhập email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-gradient btn-pill color-2 me-sm-3 me-2">Gửi yêu cầu</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
        {{-- <form method="POST" action="{{ route('password.email') }}">
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

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </div>
    </form>
</div> --}}
    @endsection
    @section('js')
        <!--admin js -->
        <script src="{{ asset('assets/js/admin-script.js') }}"></script>

        <!-- login js -->
        <script src="{{ asset('assets/js/login.js') }}"></script>
    @endsection
