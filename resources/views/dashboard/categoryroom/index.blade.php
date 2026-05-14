@extends('layouts.dashboard')
@section('style')
    <style>
        .btn-to-right {
            float: right;
        }

    </style>
@endsection
@section('title')
   Quản lý loại phòng
@endsection
@section('content')
    <!-- Container-fluid start -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-header-left">
                        <h3>Quản lý loại phòng trọ
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
                    <a href="{{ route('them_loai_phong') }}" class="btn btn-outline-success btn-to-right">Thêm loại phòng</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid end -->

    <!-- Container-fluid start -->
    <div class="container-fluid">
        <div class="row agent-section property-section user-lists">
            <div class="col-lg-12">
                <div class="property-grid-3 agent-grids ratio2_3">
                    <div class="property-2 row column-sm property-label property-grid list-view">
                        @foreach ($data as $item)
                            @php
                                $diff = time() - strtotime($item->created_at);
                                $day = round($diff / (60 * 60 * 24));
                            @endphp
                            <div class="col-md-12 col-xl-6">
                                <div class="property-box">
                                    <div class="agent-image">
                                        <div>
                                            <img src="{{ asset('images/categoryroom/' . $item->image) }}" class="bg-img"
                                                alt="">
                                            @if ($day < 1)
                                                <span class="label label-shadow">{{ 'Loại phòng mới' }}</span>
                                            @endif

                                            <div class="agent-overlay"></div>
                                            <div class="overlay-content">
                                                <ul>
                                                    <li><a href="{{ route('sua_loai_phong', ['id' => $item->id]) }}"> <i
                                                                data-feather="edit"></i></a>
                                                    </li>
                                                    <li><a href="{{ route('xoa_loai_phong', ['id' => $item->id]) }}"  onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i data-feather="trash"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="agent-content">
                                        <h4>{{ $item->name }}</h4>
                                        <p class=""> {{ Str::limit($item->description, 50) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid end -->
@endsection
