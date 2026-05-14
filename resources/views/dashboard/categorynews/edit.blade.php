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
    Chỉnh sửa thể loại ({{ $data->name }})
@endsection
@section('content')
    <!-- Container-fluid start -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-header-left">
                        <h3> Chỉnh sửa thể loại {{ $data->name }}
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

                    <a href="{{ route('categorynew.index') }}" class="btn btn-outline-warning btn-to-right">Quay lại</a>

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
                        <h5>Điền thông tin thể loại</h5>
                    </div>
                    <div class="card-body admin-form">
                        <form id="form_create" method="POST" action="{{ route('categorynews.update', $data->id) }}"
                            class="row gx-3">
                            @csrf
                            @method('put')
                            <input type="text" name="id" value="{{ $data->id }}" class="form-control d-none">
                            <div class="form-group col-md-12 col-sm-12">
                                <label>Tên thể loại <span class="font-danger">*</span></label>
                                <input type="text" name="name" value="{{ old('name') ? old('name') : $data->name }}"
                                    id="name_room" class="form-control" required>
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="description" rows="4">{{ old('description') ? old('description') : $data->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
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
@endsection
