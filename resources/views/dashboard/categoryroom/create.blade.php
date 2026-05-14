@extends('layouts.dashboard')
@section('style')
    <style>
        .btn-to-right {
            float: right;
        }
    </style>
@endsection
@section('title')
   Tạo loại phòng trọ
@endsection
@section('content')
    <!-- Container-fluid start -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-header-left">
                        <h3>Tạo loại phòng trọ
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

                    <a href="{{ route('loai_phong') }}" class="btn btn-outline-warning btn-to-right">Quay lại</a>

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
                        <h5>Điền thông tin loại phòng mới</h5>
                    </div>
                    <div class="card-body admin-form">
                        <form id="form_create" method="POST" action="{{ route('luu_loai_phong') }}" class="row gx-3">
                            @csrf
                            <div class="form-group col-md-12 col-sm-12">
                                <label>Tên loại phòng <span class="font-danger">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" id="name_room"
                                    class="form-control" required>

                            </div>

                            <div class="form-group col-sm-12">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="description" rows="4">{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 d-none">
                                <label>Tên loại phòng <span class="font-danger">*</span></label>
                                <input type="text" name="path_img" id="path_img" class="form-control" required>

                            </div>
                        </form>
                        <div class="dropzone-admin mb-0">
                            <label>Thumbnail</label>
                            <form class="dropzone" id="singleFileUpload" action="{{ route('upload_anh_loai_phong') }}">
                                @csrf
                                <div class="dz-message needsclick"><i class="fas fa-cloud-upload-alt"></i>
                                    <h6>Thả ảnh hoặc nhấn vào đây để upload.</h6>
                                </div>
                            </form>
                        </div>
                        <div class="form-btn">
                            <button type="submit" onclick="submitform()"
                                class="btn btn-pill btn-gradient color-4">Lưu</button>
                            <a href="{{ route('loai_phong') }}" class="btn btn-pill btn-dashed color-4">Quay lại</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid end -->
@endsection
@section('js')
    @error('name')
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
    @error('message')
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
    @error('phone')
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
    <script src="{{ asset('assets/js/dropzone/dropzone-script.js') }}"></script>

    <!-- datepicker js-->
    <script src="{{ asset('assets/js/date-picker.js') }}"></script>
@endsection
