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
    Chỉnh sửa tin tức {{ Str::words($data->title, 2) }}
@endsection
@section('content')
    <!-- Container-fluid start -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-header-left">
                        <h3>   Chỉnh sửa tin tức {{ Str::words($data->title, 5) }}
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
                        <h5>Cập nhật thông tin tin tức</h5>
                    </div>
                    <div class="card-body admin-form">
                        <div id="form_create" class="row gx-3">

                            <div class="col-lg-8">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label>Tên tin tức <span class="font-danger">*</span></label>
                                    <input type="text" value="{{ $data->title }}" id="name" class="form-control"
                                        required>

                                </div>
                                <div class="form-group col-md-12 col-sm-12">
                                    <label>Loại tin tức <span class="font-danger">*</span></label>
                                    <select class="dropdown col-12 p-2" name="category_id" id="category_id">
                                        @foreach ($category as $item)
                                            <option value="">---</option>
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $data->category_id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12 col-sm-12">
                                    <label>Tóm tắt <span class="font-danger">*</span></label>
                                    <textarea type="text" id="short_content" class="form-control">{{ $data->short_content }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="dropzone-admin mb-0">
                                    <label>Thumbnail</label>
                                    <form class="dropzone" id="UploadThumnailNews"
                                        action="{{ route('news.uploadThumnail') }}">
                                        <img src="{{ asset('images/thumbnail_news/' . $data->thumbnail) }}" id="bg-img"
                                            class="bg-img" alt="">
                                        @csrf
                                        <div class="dz-message needsclick"><i class="fas fa-cloud-upload-alt"></i>
                                            <h6>Thả ảnh hoặc nhấn vào đây để upload.</h6>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="content">Nội dung</label>
                                <textarea name="content" id="content" cols="30" class="form-control">{{ $data->content }}</textarea>
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
        var allKeywords = [];
        @if ($data->key_words !== 'null')
            @foreach (json_decode($data->key_words, true) as $item)
                allKeywords.push('{{ $item }}');
            @endforeach
            allKeywords.forEach(function(e) {
                $('#divKeywords > input[type=text]').before($('<p class="keyword">' + e +
                    '<a class="delete" onclick="deleteWord(this)"><i class="fa fa-times" aria-hidden="true"></i></a></p>'
                ));
            });
        @endif
    </script>
    @include('js.news.edit')
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
