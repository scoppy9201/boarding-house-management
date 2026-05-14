@extends('layouts.dashboard')
@section('title')
   Trang chủ quản trị
@endsection
@section('content')
    <!-- Container-fluid start -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-header-left">
                        <h3>Trang quản lý
                            <small>Chào mừng bạn đến với trang quản lý</small>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid end -->

    <!-- Container-fluid start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 large-12">
                <div class="row">
                    <div class="large-6 col-lg-12 col-md-6">
                        <div class="card all-properties">
                            <div class="card-body">
                                <div class="media">
                                    <img src="{{asset('assets/images/svg/icon/1.svg')}}" class="img-fluid" alt="">
                                    <div class="media-body">
                                        <h4 class="mb-0">{{ $numberRoomInMonth }}</h4>
                                        <h6 class="light-font">Phòng được thêm trong tháng này</h6>
                                    </div>
                                    <a href="{{ route('ManagerRoom.index') }}" class="arrow-animated">
                                        Xem tất cả
                                        <i data-feather="chevron-right"></i>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="large-6 col-lg-12 col-md-6">
                        <div class="card invoice-card">
                            <div class="card-header pb-0">
                                <div>
                                    <h5>Thành viên tham gia trong tháng</h5>
                                </div>
                            </div>
                            <div class="card-body calculations">
                                <ul>
                                    <li>
                                        <h5 class="font-success">{{ $numberUserInMonth }}</h5>
                                        <h6 class="light-font mb-0">Tài khoản</h6>
                                    </li>
                                    <li>
                                        @if ($percentageUser < 0)
                                        <h5 class="font-danger">Giảm {{100- $percentageUser }}%</h5>
                                        @else
                                        <h5 class="font-success">Tăng {{ $percentageUser }}%</h5>
                                        @endif
                                        <h6 class="light-font mb-0">So với tháng trước</h6>
                                    </li>
                                </ul>
                                <div class="d-flex">
                                    <a href="{{ route('account.index') }}" class="arrow-animated">
                                        Xem danh sách tài khoản
                                        <i data-feather="chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 large-12">
                <div class="card sales-details">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="monthly-sales">
                                    <div class="sales-status">
                                        <h5 class="light-font">Số phòng trọ mới trong 7 ngày qua</h5>
                                    </div>
                                </div>
                                <div class="bar-sales"><div id="sale-chart"></div>
                                </div>
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
@include('js.chartDashboard')
@endsection
