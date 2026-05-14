@extends('layouts.app')

@section('style')
    <style>
        .comment-button {
            padding-left: 10px;
        }

        .comment-button a {
            font-weight: 600;
            text-transform: capitalize;
            padding: 6px 15px 5px;
            border-radius: 8px;
            font-size: 14px;
            position: relative;
            color: red;
        }

        .comment-button a:hover {
            color: white;
            background-color: red
        }
    </style>
@endsection

@section('content')
    <!-- blog details section start-->
    <section class="ratio_40">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="blog-single-detail theme-card">
                        <div class="blog-detail-image">
                            <img src="{{ asset('images/thumbnail_news/' . $news->thumbnail) }}" class="bg-img img-fluid"
                                alt="">
                        </div>
                        <div class="blog-title">
                            <ul class="post-detail">
                                <li>{{ $news->created_at->format('d-m-Y') }}</li>
                                <li>Đăng bởi : {{ $news->getUser->name }}</li>
                                <li><i class="fa fa-eye"></i> {{ $news->view }} lượt xem</li>
                            </ul>
                            <h1>{{ $news->title }}</h1>
                        </div>
                        <div class="my-3">
                            <p class="display-4 blockquote">"{{ $news->short_content }}"</p>
                        </div>
                        <div class="details-property">
                            {!! $news->content !!}
                        </div>

                        <div class="comment-section">
                            <h4>Bình luận:</h4>
                            @foreach ($news->getComment as $comment)
                                <div class="comment-box">
                                    <div class="media">
                                        <img src="{{ asset('images/user_avatar') . '/' . $comment->getUser->profile_photo_path }}"
                                            class="img-fluid" alt="">
                                        <div class="media-body">
                                            <div class="comment-title">
                                                <div class="comment-user">
                                                    <i class="fa fa-user"></i>
                                                    <h6>{{ $comment->getUser->name }}</h6>
                                                </div>
                                                <div class="comment-date">
                                                    <i class="fas fa-clock"></i>
                                                    <h6>{{ $comment->created_at->diffForHumans($current) }}</h6>
                                                </div>
                                                @if (Auth::check())
                                                    @if ($comment->getUser->id == Auth::user()->id || $news->author_id == Auth::user()->id)
                                                        <div class="comment-button">
                                                            <a href="{{ route('news.comment.delete', $comment->id) }}" class="">Xóa</a>
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="comment-detail">
                                                <p class="font-roboto">{{ $comment->content }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="leave-comment comment-section">
                            @if (Auth::check())
                                <div class="comment-box">
                                    <div class="media">
                                        <img src="{{ asset('images/user_avatar') . '/' . Auth::user()->profile_photo_path }}"
                                            class="img-fluid" alt="">
                                        <form class="media-body" action="{{ route('frontend.news.comment', $news->id) }}"
                                            method="post">
                                            @csrf
                                            @method('put')
                                            <div class="comment-detail">
                                                <textarea class="form-control" name="content" placeholder="Bình luận"></textarea>
                                            </div>
                                            <div class="text-end mt-5">
                                                <button type="submit"
                                                    class="btn btn-gradient color-2 btn-pill">Gửi</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <div>
                                    <p>Bạn cần <a href="{{ route('login') }}">đăng nhập</a> để bình luận</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="sticky-cls blog-sidebar blog-right">
                        <div class="filter-cards">
                            <div class="advance-card">
                                <form class="search-bar" method="post" action="{{ route('frontend.news.search') }}">
                                    @csrf
                                    <input type="text" name="title" placeholder="tìm kiếm bài viết">
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
                                                    <img src="{{ asset('images/main_room/') . '/' . $room->main_img }}"
                                                        class="img-fluid" alt="">
                                                    <div class="media-body">
                                                        <a href="{{ route('Room_show', $room->id) }}">
                                                            <h5>{{ $room->name }}</h5>
                                                        </a>
                                                        <span>{{ number_format($room->price, 0, '', ',') }}đ/
                                                            <span>{{ $room->unit }}</span></span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="advance-card">
                                @if ($news->key_words != 'null')
                                    <h6>Từ khóa cho bài viết</h6>
                                    <div class="tags">
                                        <ul>


                                            @foreach (json_decode($news->key_words) as $item)
                                                <li>
                                                    <a href="javascript:void(0)">{{ $item }}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog details section end-->
@endsection

@section('modal')
@endsection

@section('js')
@endsection
