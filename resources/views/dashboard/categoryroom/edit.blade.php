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
    Chỉnh sửa loại phòng ({{ $data->name }})
@endsection
@section('content')
    <!-- Container-fluid start -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-header-left">
                        <h3>Sửa loại phòng trọ
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
                        <h5>Điền thông tin loại phòng</h5>
                    </div>
                    <div class="card-body admin-form">
                        <form id="form_create" method="POST" action="{{ route('cap_nhat_loai_phong') }}" class="row gx-3">
                            @csrf
                            <input type="text" name="id" value="{{ $data->id }}" class="form-control d-none">
                            <div class="form-group col-md-12 col-sm-12">
                                <label>Tên loại phòng <span class="font-danger">*</span></label>
                                <input type="text" name="name" value="{{ old('name') ? old('name') : $data->name }}"
                                    id="name_room" class="form-control" required>

                            </div>

                            <div class="form-group col-sm-12">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="description" rows="4">{{ old('description') ? old('description') : $data->description }}</textarea>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 d-none">
                                <input type="text" name="path_img" id="path_img" value="{{ $data->image }}"
                                    class="form-control">
                            </div>
                        </form>
                        <div class="dropzone-admin mb-0">
                            <div>
                                <label>Thumbnail</label>
                                <img class="rounded mx-auto d-block image_edit mb-3" id="preview_img"
                                    src="{{ asset('images/categoryroom/' . $data->image) }}" alt="">
                            </div>
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
    @error('description')
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
    <script>
        function ChangeToSlug(title) {
            var slug;

            //Lấy text từ thẻ input title 

            //Đổi chữ hoa thành chữ thường
            slug = title.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            return slug;
        }
        var DropzoneExample = function() {
            var DropzoneDemos = function() {
                Dropzone.options.singleFileUpload = {
                    paramName: "file",
                    maxFiles: 1,
                    maxFilesize: 5,
                    acceptedFiles: "image/*",
                    addRemoveLinks: true,
                    renameFile: function(file) {
                        var name = ChangeToSlug(document.getElementById('name_room').value);
                        return name + "___" + file.name;
                    },
                    removedfile: function(file) {
                        var name = file.upload.filename;
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'POST',
                            url: "{{ route('xoa_anh_loai_phong') }}",
                            data: {
                                filename: name
                            },
                            success: function(data) {
                                $('#path_img').val('{{ $data->image }}');
                                $('#preview_img')[0].src =
                                    "{{ asset('images/categoryroom/' . $data->image) }}";
                                console.log(data);
                            },
                            error: function(e) {
                                $('#path_img').val("{{ $data->image }}");
                                $('#preview_img')[0].src =
                                    "{{ asset('images/categoryroom/' . $data->image) }}";
                                console.log(e);
                            }
                        });
                        var fileRef;
                        return (fileRef = file.previewElement) != null ?
                            fileRef.parentNode.removeChild(file.previewElement) : void 0;
                    },
                    success: function(file, response) {
                        $('#path_img').val(response.success);
                        $('#preview_img')[0].src = "{{ asset('images/categoryroom/') }}/" + response
                            .success;
                        console.log(response.success);
                        console.log($('#preview_img')[0].src);
                    },
                    error: function(file, response) {
                        console.log(response);
                        return false;
                    }
                };

            }
            return {
                init: function() {
                    DropzoneDemos();
                }
            };
        }();
        DropzoneExample.init();
    </script>
@endsection
