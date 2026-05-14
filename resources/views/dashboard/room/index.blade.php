@extends('layouts.dashboard')
@section('style')
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" />
    <style>
        .btn-to-right {
            float: right;
        }
    </style>
@endsection
@section('title')
    Danh sách phòng trọ
@endsection
@section('content')
    <!-- Container-fluid start -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-header-left">
                        <h3>Quản lý phòng trọ
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
    <div class="container-fluid">
        <div class="row report-summary">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Danh sách phòng trọ</h5>
                    </div>
                    <div class="card-body report-table">
                        <div class="table-responsive transactions-table">
                            <table class="table table-bordernone m-0" id="room">
                                <thead>
                                    <tr>
                                        <th class="light-font">#</th>
                                        <th class="light-font">Tên phòng</th>
                                        <th class="light-font">Số lượng</th>
                                        <th class="light-font">Giá</th>
                                        <th class="light-font">Ngày tạo</th>
                                        <th class="light-font">Trạng thái</th>
                                        <th class="light-font">Địa chỉ</th>
                                        <th class="light-font">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($room as $key => $item)
                                        <tr>
                                            <td>{{ $key }}</td>
                                            <td>
                                                <div class="media">
                                                    <img src="{{ asset('images/main_room/' . $item->main_img) }}"
                                                        class="img-fluid img-80" alt="">
                                                    <div class="media-body">
                                                        <h6>{{ $item->name }}</h6>
                                                        <span class="light-font">{{ $item->User->name }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ number_format($item->price) }}đ</td>
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                            @if ($item->status == 1)
                                                <td><span class="label label-light color-3">Hoạt động</span></td>
                                            @elseif($item->status == 0)
                                                <td><span class="label label-light color-2">Ẩn</span></td>
                                            @else
                                                <td><span class="label label-dark label-pill">Lỗi</span></td>
                                            @endif
                                            <td>{{ $item->getWard->name . '/' . $item->getWard->getDistrict->name }}</td>
                                            <td>
                                                <div class="d-flex flex-column py-3">
                                                    @if ($item->status != 0)
                                                        <a href="{{ route('hide_room', $item->id) }}" onclick="return confirm('Bạn có chắc chắn muốn ẩn phòng này?')" class="btn btn-warning mb-2"><i data-feather="eye-off"></i></a>
                                                    @elseif ($item->status == 0)
                                                        <a href="{{ route('show_room', $item->id) }}"
                                                        class="btn btn-warning mb-2"><i data-feather="eye"></i></a>
                                                    @endif
                                                    <a onclick="event.preventDefault();
                                                        if (confirm('Bạn có chắc chắn muốn xóa phòng này?')) {
                                                            document.getElementById('delete-form-{{ $item->id }}').submit();
                                                        }" class="btn btn-danger">
                                                        <i data-feather="trash"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('ManagerRoom.destroy', $item->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
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
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#room').DataTable();
        });
    </script>
@endsection
