@extends('layouts.dashboard')
@section('style')
    <style>
        .btn-to-right {
            float: right;
        }

        .btn-table {
            max-width: 80px;

        }
    </style>
@endsection
@section('title')
   Thể loại tin tức
@endsection
@section('content')
    <!-- Container-fluid start -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-header-left">
                        <h3>Thể loại tin tức
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
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid end -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h5 class="mb-4 text-center bg-success text-white rounded-2 p-10">Thêm thể loại mới</h5>
                <form action="{{ route('categorynew.store') }}" method="post">
                    @csrf
                    <div class="">
                        <label for="nameInput">Tên thể loại</label>
                        <input type="text" id="nameInput" class="form-control" name="name"  placeholder=""
                            value="{{ old('name') ? old('name') : '' }}">

                    </div>
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
            <div class="col-md-6">
                <h5 class="text-center mb-4 bg-info text-white rounded-2 p-10">Danh sách các thể loại</h5>
                <div class="card-body report-table">
                    <div class="table-responsive transactions-table">
                        <table class="table table-bordernone m-0" id="room">
                            <thead>
                                <tr>
                                    <th class="light-font">#</th>
                                    <th class="light-font">Tên phòng</th>
                                    <th class="light-font">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoryNews as $key => $item)
                                    <tr>
                                        <td class="col-1">{{ $key + 1 }}</td>
                                        <td class="col-7">{{ $item->name }}</td>
                                        <td class="col-4">
                                            <div class="d-flex justify-content-around ">
                                                <a href="{{ route('categorynew.edit', $item->id) }}"
                                                    class="btn btn-warning col-6 btn-table"><i data-feather="edit"></i></a>

                                                <a href="{{ route('categorynew.delete', $item->id) }}"
                                                    class="btn btn-danger col-6 btn-table" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" ><i data-feather="trash"></i></a>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @error('slug')
        <script>
            makeToast("{{ $message }}", "red")
        </script>
    @enderror
    @error('name')
        <script>
            makeToast("{{ $message }}", "red")
        </script>
    @enderror
    @error('description')
        <script>
            makeToast("{{ $message }}", "red")
        </script>
    @enderror
@endsection
