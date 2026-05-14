@extends('layouts.app')

@section('style')
@endsection

@section('content')
    <!-- breadcrumb start -->
    <section class="breadcrumb-section p-0">
        <img src="{{ asset('assets/images/inner-background.jpg') }}" class="bg-img img-fluid" alt="">
        <div class="container">
            <div class="breadcrumb-content">
                <div>
                    <h2>Kết quả tìm kiếm: {{ $search }}</h2>
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('trang_chu') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tìm kiếm bài viết</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->

    <!-- blog section start-->
    <section class="ratio_landscape blog-list-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="sticky-cls blog-sidebar">
                        <div class="filter-cards">
                            <div class="advance-card">
                                <form class="search-bar" method="post" action="{{ route('frontend.news.search') }}">
                                    @csrf
                                    <input type="text" name="title"  placeholder="tìm kiếm bài viết">
                                    <i class="fas fa-search"></i>
                                </form>
                            </div>
                            <div class="advance-card">
                                <h6>Loại bài viết</h6>
                                <div class="category-property">
                                    <ul>
                                        @foreach ($category as $item)
                                            @php
                                                $count = 0;
                                                foreach ($item->getNews as $key => $value) {
                                                    if ($value->status == 1) {
                                                        $count++;
                                                    }
                                                }
                                            @endphp
                                            @if ($count != 0)
                                                <li><a href="{{ route('frontend.news.filter', $item->id) }}"><i
                                                            class="fas fa-arrow-right me-2"></i>{{ $item->name }}<span
                                                            class="float-end">({{ $count }})</span></a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="advance-card">
                                <h6>Phòng trọ mới nhất</h6>
                                <div class="recent-property">
                                    <ul>
                                        @foreach ($rooms as $room)
                                        <li>
                                            <div class="media">
                                                <img src="{{ asset('images/main_room/') . '/' . $room->main_img }}" class="img-fluid" alt="">
                                                <div class="media-body">
                                                    <a href="{{ route('Room_show', $room->id) }}"><h5>{{ $room->name }}</h5></a>
                                                    <span>{{ number_format($room->price, 0, '', ',') }}đ/ <span>{{ $room->unit }}</span></span>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="blog-list row">
                        @foreach ($news as $item)
                            <div class="col-md-12">
                                <div class="blog-wrap wow fadeInUp">
                                    <div class="blog-image">
                                        <div>
                                            <img src="{{ asset('images/thumbnail_news/' . $item->thumbnail) }}"
                                                class="bg-img img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="blog-details">
                                        <div>
                                            <span><i data-feather="user"></i> {{ $item->getUser->name }}</span>
                                            <h3><a href="{{ route('frontend.news.show', $item->slug) }}">{{ $item->title }}</a></h3>
                                            <p class="font-roboto">{{ Str::words($item->short_content, '50') }}
                                            </p>
                                            <div class="row col-12">
                                                <p class="col-4">{{ $item->view }} lượt xem</p>
                                                <p class="col-4">{{ $item->created_at->diffForHumans($current) }}</p>
                                                <a class="col-4" href="{{ route('frontend.news.show', $item->slug) }}">Xem ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <nav class="theme-pagination">
                            {{ $news->appends(request()->except('page'))->render('frontend.components.pagination') }}
                        </nav>
                    </div>
                </div>
            </div>
    </section>
    <!-- blog section end-->
@endsection

@section('modal')
@endsection

@section('js')
@endsection
