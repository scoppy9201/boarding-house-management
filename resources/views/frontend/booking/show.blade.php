@extends('layouts.app')

@section('style')
@endsection

@section('content')
    <!-- agent grid section start -->
    <section class="agent-section property-section">
        <div class="container">
            <div class="row ratio2_3">
                <div class="col-xl-12 col-lg-12 property-grid-3 agent-grids">
                    <div class="filter-panel">
                        <div class="top-panel">
                            <div>
                                <h2>Danh sách đặt phòng</h2>
                            </div>

                        </div>

                    </div>
                    <div class="property-wrapper-grid list-view">

                        <div class="property-2 row column-sm property-label property-grid list-view">
                            @if (count($BookingList) > 0)
                                @foreach ($BookingList as $item)
                                    <div class="col-md-12 col-xl-6 wow fadeInUp">
                                        <div class="property-box">

                                            <div class="agent-content">
                                                <h3>{{ $item->name }}</h3>
                                                <ul class="agent-contact">
                                                    <li>
                                                        <i class="fas fa-phone-alt"></i>
                                                        <span class="phone-number">{{ $item->phone }}</span>
                                                        <span class="character">*********</span>
                                                        <span class="label label-light label-flat color-2">
                                                            hiện
                                                            <span>ẩn</span>
                                                        </span>
                                                    </li>
                                                    <li><i class="fas fa-envelope"></i>{{ $item->email }}</li>
                                                    <li> </li>
                                                    <li>
                                                        <span>Nội dung tin nhắn:</span>
                                                        <p>{{ $item->message }}</p>
                                                    </li>
                                                    <li>
                                                        {{ $item->updated_at->diffForHumans($current) }}
                                                    </li>
                                                </ul>
                                                <a href="{{ route('Room.show', $item->getRoom->id) }}">Xem thông tin phòng<i
                                                        class="fas fa-arrow-right"></i></a>
                                            </div>
                                            <div class="agent-image ">
                                                <div>
                                                    <img src="{{ asset('images/main_room') . '/' . $item->getRoom->main_img }}"
                                                        class="bg-img" alt="">

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @else
                            <div class="col-md-12 col-xl-6 wow fadeInUp vh-100">
                               
                                        <div class="agent-content">
                                            <p>Chưa có phòng nào.</p>
                                        </div>
                                   
                            </div>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- agent grid section end -->
@endsection
