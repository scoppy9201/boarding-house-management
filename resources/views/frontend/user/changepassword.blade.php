@extends('layouts.app')

@section('style')
@endsection

@section('content')
 <!-- section start -->
 <section class="login-wrap">
    <div class="container">
        <div class="row log-in">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 col-12">
                <div class="theme-card">
                <div class="title-3 text-start">
                    <h2>Đổi mật khẩu</h2>
                </div>
                <form action="{{ route('profile.doiMatKhau') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                            <input type="password" class="form-control" value="{{ old('OldPassword') }}" placeholder="Mật khẩu cũ" name="OldPassword" id="passwordOld" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                            <input type="password" class="form-control" value="{{ old('NewPassword') }}" placeholder="Mật khẩu mới"  name="NewPassword" id="pwd-input" required>
                            
                            <div class="input-group-apend">
                                <div class="input-group-text">
                                    <i id="pwd-icon" class="far fa-eye-slash"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                            <input type="password" class="form-control" value="{{ old('NewPassword_confirmation') }}" placeholder="Nhập lại mật khẩu mới" name="NewPassword_confirmation" id="passwordConfirm" required>

                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-gradient btn-pill color-2 me-sm-3 me-2">Đổi mật khẩu</button>
                    </div>
                    
                </form>
            </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->
@endsection

@section('modal')
@endsection

@section('js')

@error('NewPassword')
<script>
    Toastify({
     text: "{{$message}}",
     className: "info",
     style: {
         background: "red",
         }
 }).showToast();
 </script>   
@enderror

@error('OldPassword')
<script>
    Toastify({
     text: "{{$message}}",
     className: "info",
     style: {
         background: "red",
         }
 }).showToast();
 </script>   
@enderror

@endsection
