@extends('layouts.dashboard')
@section('style')
    <style>
        .btn-to-right {
            float: right;
        }

        .image_edit {
            max-height: 300px;
        }
    </style>
@endsection
@section('title')
    Chỉnh sửa thông tin tài khoản ({{ $user->name }})
@endsection
@section('content')
    <!-- Container-fluid start -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-header-left">
                        <h3>Chỉnh sửa thông tin tài khoản ({{ $user->name }})
                            <small>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">
                                            <i class="fa fa-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item ">- Trang chủ</li>
                                </ol>
                            </small>
                        </h3>
                    </div>
                </div>
                <div class="col-sm-6">

                    <a href="{{ route('account.index') }}" class="btn btn-outline-warning btn-to-right">Quay lại</a>

                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid end -->

    <!-- Container-fluid start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Thông tin người dùng</h5>
                    </div>
                    <div class="card-body admin-form">
                        <form id="form_create" method="POST" action="{{ route('account.edit', $user->id) }}"
                            class="row gx-3">
                            @csrf
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Tên Người dùng <span class="font-danger">*</span></label>
                                <input type="text" name="name" value="{{ old('name') ? old('name') : $user->name }}" readonly
                                    id="name_room" class="form-control">

                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Email <span class="font-danger">*</span></label>
                                <input type="text" readonly name="email"
                                    value="{{ old('email') ? old('email') : $user->email }}" id="name_room"
                                    class="form-control">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Facebook <span class="font-danger">*</span></label>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <input type="text" name="Facebook"
                                            value="{{ old('Facebook') ? old('Facebook') : $user->Facebook }}" id="name_room"
                                            class="form-control" readonly>
                                    </div>
                                    <a href="{{ $user->Facebook }}" class="btn btn-info col-sm-4">Kiểm tra</a>

                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Zalo <span class="font-danger">*</span></label>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <input type="text" name="Zalo"
                                            value="{{ old('Zalo') ? old('Zalo') : $user->Zalo }}" id="name_room"
                                            class="form-control" readonly>
                                    </div>
                                    <a href="https://zalo.me/{{ $user->Zalo }}" class="btn btn-info col-sm-4">Kiểm
                                        tra</a>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>vai trò <span class="font-danger">*</span></label>
                                <select class="dropdown col-12 p-2" name="role" id="">
                                    <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Người dùng</option>
                                    <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Chủ trọ</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Lý do cập nhật <span class="font-danger">*</span></label>
                                <input type="text" name="ly_do" value="" placeholder="nhập lý do" id="name_room"
                                    class="form-control">
                            </div>
                            <div class="col-sm-12 d-flex flex-end">

                                <button type="submit" class="btn btn-primary">Cập nhật</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid end -->
@endsection
@section('js')
    
    
    @error('ly_do')
        <script>
            Toastify({
                text: "{{ $message }}",
                className: "info",
                style: {
                    background: "red",
                }
            }).showToast();
        </script>
    @enderror
    @error('role')
        <script>
            Toastify({
                text: "{{ $message }}",
                className: "info",
                style: {
                    background: "red",
                }
            }).showToast();
        </script>
    @enderror
    <script>
        function submitform() {
            // Get first form element
            var $form = $('#form_create')[0];

            // Check if valid using HTML5 checkValidity() builtin function
            if ($form.checkValidity()) {
                console.log('valid');
                $form.submit();
            } else {
                makeToast('Bạn cần nhập đầy đủ các trường', 'red')
            }

            return false
        }
    </script>
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
    <!-- Dropzone js -->


    <script src="{{ asset('assets/js/dropzone/dropzone.js') }}"></script>
@endsection
