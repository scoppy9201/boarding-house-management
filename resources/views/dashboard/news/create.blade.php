@extends('layouts.dashboard')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/inputKeyword.css') }}">

    <script src="https://cdn.tiny.cloud/1/bavaaeovtcjzdwp4vi1piljl226ox5dyf0r3js5wjieu2ysm/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <style>
        .btn-to-right {
            float: right;
        }

        .dropzone {
            min-height: 250px;
        }
    </style>
@endsection
@section('title')
   Tạo tin tức 
@endsection
@section('content')
    <!-- Container-fluid start -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-header-left">
                        <h3>   Tạo tin tức 
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

                    <a href="{{ route('news.index') }}" class="btn btn-outline-warning btn-to-right">Quay lại</a>

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
                        <h5>Điền thông tin tin tức </h5>
                    </div>
                    <div class="card-body admin-form">
                        <div id="form_create" class="row gx-3">

                            <div class="col-lg-8">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label>Tên tin tức  <span class="font-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" required>

                                </div>
                                <div class="form-group col-md-12 col-sm-12">
                                    <label>Loại tin tức <span class="font-danger">*</span></label>
                                    <select class="dropdown col-12 p-2" name="category_id" id="category_id">
                                        @foreach ($category as $item)
                                            <option value="">---</option>
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12 col-sm-12">
                                    <label>Tóm tắt <span class="font-danger">*</span></label>
                                    <textarea type="text" id="short_content" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="dropzone-admin mb-0">
                                    <label>Thumbnail</label>
                                    <form class="dropzone" id="UploadThumnailNews"
                                        action="{{ route('news.uploadThumnail') }}">
                                        @csrf
                                        <div class="dz-message needsclick"><i class="fas fa-cloud-upload-alt"></i>
                                            <h6>Thả ảnh hoặc nhấn vào đây để upload.</h6>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="content">Nội dung</label>
                                <textarea name="content" id="content" cols="30" class="form-control"></textarea>
                            </div>
                            <div class="col-12">
                                <label for="content">Từ khóa</label>
                                <div class="input-area" id="divKeywords">
                                    <input type="text" id="txtInput" class="form-control"
                                        placeholder="Enter keyword..." />
                                </div>
                            </div>
                            <div class="form-btn">
                                <button id="submit" class="btn btn-pill btn-gradient color-4">Lưu</button>
                                <a href="{{ route('news.index') }}" class="btn btn-pill btn-dashed color-4">Quay lại</a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid end -->
@endsection
@section('js')
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
        var Path_main_image = '';
        var DropzoneExample = function() {
            var DropzoneDemos = function() {
                // Upload ảnh chính phòng trọ
                Dropzone.options.UploadThumnailNews = {
                    paramName: "file",
                    maxFiles: 1,
                    maxFilesize: 5,
                    acceptedFiles: "image/*",
                    addRemoveLinks: true,
                    renameFile: function(file) {

                        const d = new Date();
                        return "anh_bai_viet_id" + d.getTime() + file.name;
                    },
                    removedfile: function(file) {
                        var name = file.upload.filename;
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'PUT',
                            url: `{{ route('delete_image', ':path') }}`.replace(":path",
                                'thumbnail_news'),
                            data: {
                                filename: name
                            },
                            success: function(data) {
                                Path_main_image = "";
                                console.log(data);
                            },
                            error: function(e) {
                                console.log(e);
                            }
                        });
                        var fileRef;
                        return (fileRef = file.previewElement) != null ?
                            fileRef.parentNode.removeChild(file.previewElement) : void 0;
                    },
                    success: function(file, response) {
                        Path_main_image = response.success;
                        console.log(response.success);
                    },
                    error: function(file, response) {
                        console.log(response);
                        return false;
                    },
                    init: function() {
                        this.on("addedfile", function() {
                            if (this.files[1] != null) {
                                this.removeFile(this.files[0]);
                            }
                        });
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
        var allKeywords = [];
    </script>
    @include('js.news.store')
    <!-- datepicker js-->
    <script src="{{ asset('assets/js/date-picker.js') }}"></script>
    <script src="{{ asset('assets/js/inputKeyword.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
@endsection
