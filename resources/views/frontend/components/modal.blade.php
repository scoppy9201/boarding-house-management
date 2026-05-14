 {{-- <!--login & sign up modal start -->

 <div class="modal fade signup-modal" id="login-modal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body ratio_asos">
                <div class="row m-0">
                    <div class="col-lg-6 p-0">
                        <div class="login-img">
                            <img src="../assets/images/property/15.jpg" class="bg-img" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 p-0">
                        <div class="signup-tab theme-tab-4 log-in">
                            <ul id="tabs" class="nav nav-tabs">
                                <li class="nav-item"><a href="#" data-bs-target="#login" data-bs-toggle="tab"
                                        class="nav-link active">Đăng nhập</a></li>
                                <li class="nav-item"><a href="#" data-bs-target="#signup" data-bs-toggle="tab"
                                        class="nav-link">Đăng ký</a></li>
                            </ul>
                            <div id="tabsContent" class="tab-content">
                                <div id="login" class="tab-pane fade active show">
                                    <h4>Đăng nhập</h4>
                                    <form>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <i data-feather="user"></i>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Enter Email" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">                                            
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i data-feather="lock"></i></div>
                                                </div>
                                                <input type="password" id="pwd-input" class="form-control"
                                                    placeholder="Password" required>
                                                <div class="input-group-apend">
                                                    <div class="input-group-text">
                                                        <i id="pwd-icon" class="far fa-eye-slash"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <label class="d-block mb-0" for="chk-ani">
                                                <input class="checkbox_animated color-4" id="chk-ani"
                                                    type="checkbox"> Nhớ mật khẩu
                                            </label>
                                            <a href="forgot-password.html" class="font-rubik text-color-4">Bạn đã quên mật khẩu ?</a>
                                        </div>
                                        <button type="submit" class="btn btn-gradient btn-flat color-4">Đăng nhập</button>
                                    </form>
                                </div>
                                <div id="signup" class="tab-pane fade">
                                    <h4>Đăng ký tài khoản</h4>
                                    <form method="post" action="{{route('dang-ky')}}">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend ">
                                                    <div class="input-group-text">
                                                        <i data-feather="user"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                                    placeholder="Nhập tên của bạn" required>
                                                </div>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i data-feather="mail"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                                    placeholder="Nhập địa chỉ email" required>
                                                </div>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i data-feather="lock"></i>
                                                    </div>
                                                </div>
                                                <input type="password" id="pwd-input1" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus
                                                    placeholder="Nhập mật khẩu của bạn" required>
                                                <div class="input-group-apend">
                                                    <div class="input-group-text">
                                                        <i id="pwd-icon1" class="far fa-eye-slash"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i data-feather="lock"></i>
                                                    </div>
                                                </div>
                                                <input type="password" id="pwd-input1" class="form-control @error('confirm-password') is-invalid @enderror"  name="password_confirmation" required autocomplete="new-password"
                                                    placeholder="Nhập mật khẩu của bạn" required>
                                            </div>
                                            @error('confirm-password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-gradient color-4 btn-flat">Tạo tài khoản</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--login & sign up modal end --> --}}