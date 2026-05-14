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
    Quản lý tài khoản
@endsection
@section('content')
    <!-- Container-fluid start -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-header-left">
                        <h3>Quản lý tài khoản
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
                        <h5>Danh sách các tài khoản</h5>
                    </div>
                    <div class="card-body report-table">
                        <div class="table-responsive transactions-table">
                            <table class="table table-bordernone m-0" id="room">
                                <thead>
                                    <tr>

                                        <th class="light-font">Ảnh đại diện</th>
                                        <th class="light-font">Tên tài khoản</th>
                                        {{-- <th class="light-font">Email</th> --}}
                                        {{-- <th class="light-font">Số điện thoại</th> --}}
                                        <th class="light-font">Ngày tạo</th>
                                        <th class="light-font">Trạng thái</th>
                                        <th class="light-font">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($user as $key => $item)
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <img src="{{ asset('images/user_avatar/' . $item->profile_photo_path) }}"
                                                            class="img-fluid img-80" alt="">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <a href="{{ route('user.show', $item->id) }}">
                                                            <h6>{{ $item->name }}</h6>
                                                        </a>
                                                        <span
                                                            class="light-font">{{ $item->role == 1 ? 'Admin' : ($item->role == 2 ? 'Chủ trọ' : 'Người dùng') }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- <td>{{ $item->email }}</td> --}}
                                            {{-- <td>{{ $item->PhoneNumber }}</td> --}}
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                            @if ($item->status == 1)
                                                <td><span class="label label-light color-3">Hoạt động</span></td>
                                            @elseif($item->status == 0)
                                                <td><span class="label label-light color-2">Chặn</span></td>
                                            @else
                                                <td><span class="label label-dark label-pill">Lỗi</span></td>
                                            @endif
                                            <td>
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false"></button>
                                                <ul class="dropdown-menu p-1 " aria-labelledby="dropdownMenuButton1">
                                                    <ul class="d-flex flex-column gap-1">
                                                        <li><a class="text-light  btn btn-warning w-100"
                                                                href="{{ route('account.edit', $item->id) }}">Chỉnh sửa</a>
                                                        </li>
                                                        <li><a class="text-light btn btn-danger w-100"
                                                                href="{{ route('account.block', $item->id) }}">{{ $item->status == 1 ? 'Chặn' : 'Bỏ chặn' }}</a>
                                                        </li>
                                                        <li><a class="btn btn-info text-light w-100"
                                                                href="{{ route('account.sendNotification', $item->id) }}">Gửi
                                                                thông báo</a></li>
                                                    </ul>
                                                </ul>
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
