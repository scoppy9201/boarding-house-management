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
    Danh sách tin tức
@endsection
@section('content')
    <!-- Container-fluid start -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-header-left">
                        <h3>Danh sách tin tức
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

                    <a href="{{ route('news.add') }}" class="btn btn-outline-success btn-to-right">Đăng bài</a>

                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid end -->
    <div class="container-fluid">
        <div class="row agent-section property-section user-lists">
            <div class="col-lg-12">
                <div class="property-grid-3 agent-grids ratio2_3">
                    <div class="property-2 row column-sm property-label property-grid list-view">
                        @foreach ($news as $item)
                            <div class="col-md-12 col-xl-6">
                                <div class="property-box">
                                    <div class="agent-image">
                                        <div>
                                            <img src="{{ asset('images/thumbnail_news/' . $item->thumbnail) }}"
                                                class="bg-img" alt="">
                                            @if ($item->status != 1)
                                                <span class="label label-dark">{{ 'Không công khai' }}</span>
                                            @else
                                                <span class="label label-shadow">{{ 'Công khai' }}</span>
                                            @endif

                                            <div class="agent-overlay"></div>
                                            <div class="overlay-content">
                                                <ul>
                                                    <li><a href="{{ route('news.edit', ['slug' => $item->slug]) }}"
                                                            title="Sửa"> <i data-feather="edit"></i></a>
                                                    </li>
                                                    <li><a href="{{ route('news.delete', ['slug' => $item->slug]) }}"
                                                            title="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i data-feather="trash"></i></a>
                                                    </li>
                                                    @if ($item->status == 1)
                                                        <li><a href="{{ route('news.status', ['slug' => $item->slug]) }}"
                                                                title="Ẩn bài viết" onclick="return confirm('Bạn có chắc chắn muốn ẩn bài viết?')"><i data-feather="eye-off"></i></a></li>
                                                    @else
                                                        <li><a href="{{ route('news.status', ['slug' => $item->slug]) }}"
                                                                title="Hiển thị bài viết"><i data-feather="eye"></i></a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="agent-content">
                                        <h4>{{ Str::words($item->title, '7') }}</h4>
                                        <p class="">{{ Str::words($item->short_content, '20') }}</p>
                                        <div class="row col-12">

                                            <h8 class="col-6">{{ $item->view }} Lượt xem</h8>
                                            <h8 class="col-6">{{ $item->created_at->diffForHumans($current) }}</h8>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

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
