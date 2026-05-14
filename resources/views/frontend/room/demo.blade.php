@extends('layouts.app')

@section('style')
@endsection

@section('content')
    <!-- single property start -->
    @php
        if (Str::contains($data->video_link, 'www.youtube.com') && Str::contains($data->video_link, 'https://www.youtube.com/watch?v=')) {
            $data->video_link = str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $data->video_link);
        }
        $data->list_img = json_decode($data->list_img);
        $data->latlng = json_decode($data->latlng);

    @endphp

    <section class="single-property mt-0 pt-0">
        <div class="container">
            <div class="row ratio_55">
                <div class="col-xl-9 col-lg-8">
                    <div class="description-section tab-description">
                        <div class="description-details">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="single-gallery mb-4">
                                        <div class="gallery-for">
                                            <div class="bg-size">
                                                <img src="{{ asset('images/main_room') . '/' . $data->main_img }}"
                                                    class="bg-img" alt="">
                                            </div>
                                            {{-- @if (is_array($data->list_img) && count($data->list_img) > 0) --}}
                                            @if ($data->list_img != null)

                                                @foreach ($data->list_img as $item)
                                                    <div>
                                                        <div class="bg-size">
                                                            <img src="{{ asset('images/multi_room') . '/' . $item }}"
                                                                class="bg-img" alt="">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif

                                            {{-- @endif --}}



                                        </div>
                                        <div class="gallery-nav">
                                            <div>
                                                <img src="{{ asset('images/main_room') . '/' . $data->main_img }}"
                                                    class="img-fluid" alt="">
                                            </div>
                                            @if (is_array($data->list_img) && count($data->list_img) > 0)
                                                @foreach ($data->list_img as $item)
                                                    <div>
                                                        <div class="bg-size">
                                                            <img src="{{ asset('images/multi_room') . '/' . $item }}"
                                                                class="bg-img" alt="">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="desc-box">
                                <ul class="nav nav-tabs line-tab" id="top-tab" role="tablist">
                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link active"
                                            href="#about">Thông tin</a></li>
                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#feature">tiện ích
                                            bổ sung</a></li>
                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#video">video</a>
                                    </li>

                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#location-map">Bản
                                            đồ</a></li>
                                </ul>
                                <div class=" tab-content" id="top-tabContent">
                                    <div class="tab-pane fade show active about page-section" id="about">
                                        <h4 class="content-title">{{ $data->name }}
                                            <a href="https://www.google.com/maps/place/New+York,+NY,+USA/@40.697488,-73.979681,8z/data=!4m5!3m4!1s0x89c24fa5d33f083b:0xc80b8f06e177fe62!8m2!3d40.7127753!4d-74.0059728?hl=en"
                                                target="_blank">
                                                <i class="fa fa-map-marker-alt"></i> view on map</a>
                                        </h4>
                                        <div class="row">

                                            <div class="col-md-6 col-xl-4">
                                                <ul class="property-list-details">
                                                    <li><span>Loại phòng :</span> {{ $data->CategoryRoom->name }}</li>
                                                    <li><span>Địa chỉ :</span> {{ $data->detail_address }}</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 col-xl-4">
                                                <ul class="property-list-details">
                                                    <li><span>Giá cả :</span>
                                                        {{ number_format($data->price, 0, '', ',') . 'đ/' . $data->unit }}
                                                    </li>
                                                    <li><span>Giá điện :</span>
                                                        {{ number_format($data->electric, 0, '', ',') }}đ/ kW </li>
                                                    <li><span>Nước sinh hoạt :</span>
                                                        {{ number_format($data->water, 0, '', ',') }}đ/ Khối</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 col-xl-4">
                                                <ul class="property-list-details">

                                                    <li><span>Diện tích phòng :</span>{{ $data->area }} mét vuông</li>
                                                    <li><span>Số lượng phòng :</span>{{ $data->quantity }}</li>

                                                </ul>
                                            </div>
                                        </div>

                                        <h4 class="mt-4">Mô tả</h4>
                                        <div class="row">
                                            {!! $data->describe_room !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade page-section" id="feature">
                                        <h4 class="content-title">Tiện ích</h4>
                                        <div class="single-feature row">
                                            <div class="col-xl-3 col-6">
                                                <ul>
                                                    @if ($data->add_ons)
                                                        @foreach (json_decode($data->add_ons) as $item)
                                                            <li>
                                                                <i class="fas fa-hands"></i>{{ $item }}
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <p>Không chưa tiện ích nào</p>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade page-section ratio3_2" id="gallery">
                                        <h4 class="content-title">gallery</h4>
                                    </div>
                                    <div class="tab-pane fade page-section ratio_40" id="video">
                                        <h4 class="content-title">video</h4>
                                        @if ($data->video_link)
                                            <div class="play-bg-image">
                                                <div class="bg-size">
                                                    <img src="{{ asset('images/main_room') . '/' . $data->main_img }}"
                                                        class="bg-img" alt="">
                                                </div>
                                                <div class="icon-video">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#videomodal">
                                                        <i class="fas fa-play"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @else
                                            <p>Không chưa video mô tả</p>
                                        @endif

                                    </div>
                                    <div class="tab-pane fade page-section" id="location-map">
                                        <h4 class="content-title">Vị trí</h4>
                                        <div class="col-12 layout-map ">
                                            <div class="map" id="myMap"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="desc-box">
                                <div class="page-section">
                                    <h4 class="content-title">Bình luận</h4>
                                    <div class="review">
                                        <div class="review-box">
                                            <div class="media">
                                                <img src="../assets/images/avatar/2.jpg" class="img-70" alt="">
                                                <div class="media-body">
                                                    <h6>Người bình luận</h6>
                                                    <p>Thời gian</p>
                                                    <p class="mb-0">Nội dung bình luận</p>
                                                </div>
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <h4 class="content-title">Viết bình luận</h4>
                                    <form class="review-form">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Comment"></textarea>
                                        </div>
                                        <button type="submit" onclick="document.location='#'"
                                            class="btn btn-gradient color-2 btn-pill">Gửi</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="property-section p-t-40">
                        <div class="title-3 text-start inner-title">
                            <h2>Những phòng trọ khác</h2>
                        </div>
                        <div class="row ratio_65">
                            <div class="col-12 property-grid-2">
                                <div class="property-2 row column-sm zoom-gallery property-label property-grid">
                                    <div class="col-md-6">
                                        <div class="property-box">
                                            <div class="property-image">
                                                <div class="property-slider">
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/10.jpg" class="bg-img"
                                                            alt="">
                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/5.jpg" class="bg-img"
                                                            alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/3.jpg" class="bg-img"
                                                            alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/4.jpg" class="bg-img"
                                                            alt="">

                                                    </a>
                                                </div>
                                                <div class="labels-left">
                                                    <div>
                                                        <span class="label label-shadow">sale</span>
                                                    </div>
                                                </div>
                                                <div class="seen-data">
                                                    <i data-feather="camera"></i>
                                                    <span>25</span>
                                                </div>
                                                <div class="overlay-property-box">
                                                    <a href="compare.html" class="effect-round" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Compare">
                                                        <i data-feather="shuffle"></i>
                                                    </a>
                                                    <a href="user-favourites.html" class="effect-round like"
                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="wishlist">
                                                        <i data-feather="heart"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="property-details">
                                                <span class="font-roboto">France</span>
                                                <a href="single-property-8.html">
                                                    <h3>Little Acorn Farm</h3>
                                                </a>
                                                <h6>$6558.00*</h6>
                                                <p class="font-roboto">Real estate is divided into several categories,
                                                    including residential property, commercial property and industrial
                                                    property.</p>
                                                <ul>
                                                    <li><img src="../assets/images/svg/icon/double-bed.svg"
                                                            class="img-fluid" alt="">Bed : 4</li>
                                                    <li><img src="../assets/images/svg/icon/bathroom.svg"
                                                            class="img-fluid" alt="">Baths : 4</li>
                                                    <li><img src="../assets/images/svg/icon/square-ruler-tool.svg"
                                                            class="img-fluid ruler-tool" alt="">Sq Ft : 5000
                                                    </li>
                                                </ul>
                                                <div class="property-btn d-flex">
                                                    <span>August 4, 2022</span>
                                                    <button type="button"
                                                        onclick="document.location='single-property-8.html'"
                                                        class="btn btn-dashed btn-pill color-2">Details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="property-box">
                                            <div class="property-image">
                                                <div class="property-slider">
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/14.jpg" class="bg-img"
                                                            alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/6.jpg" class="bg-img"
                                                            alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/10.jpg" class="bg-img"
                                                            alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/9.jpg" class="bg-img"
                                                            alt="">

                                                    </a>
                                                </div>
                                                <div class="labels-left">
                                                    <div>
                                                        <span class="label label-dark">no fees</span>
                                                    </div>
                                                    <span class="label label-success">open house</span>
                                                </div>
                                                <div class="seen-data">
                                                    <i data-feather="camera"></i>
                                                    <span>42</span>
                                                </div>
                                                <div class="overlay-property-box">
                                                    <a href="compare.html" class="effect-round" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Compare">
                                                        <i data-feather="shuffle"></i>
                                                    </a>
                                                    <a href="user-favourites.html" class="effect-round like"
                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="wishlist">
                                                        <i data-feather="heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="property-details">
                                                <span class="font-roboto">brazil</span>
                                                <a href="single-property-8.html">
                                                    <h3>Hidden Spring Hideway</h3>
                                                </a>
                                                <h6>$9554.00*</h6>
                                                <p class="font-roboto">An interior designer is someone who
                                                    plans,researches,coordinates,management and manages such enhancement
                                                    projects.</p>
                                                <ul>
                                                    <li><img src="../assets/images/svg/icon/double-bed.svg"
                                                            class="img-fluid" alt="">Bed : 4</li>
                                                    <li><img src="../assets/images/svg/icon/bathroom.svg"
                                                            class="img-fluid" alt="">Baths : 4</li>
                                                    <li><img src="../assets/images/svg/icon/square-ruler-tool.svg"
                                                            class="img-fluid ruler-tool" alt="">Sq Ft : 5000
                                                    </li>
                                                </ul>
                                                <div class="property-btn d-flex">
                                                    <span>July 18, 2022</span>
                                                    <button type="button"
                                                        onclick="document.location='single-property-8.html'"
                                                        class="btn btn-dashed btn-pill color-2">Details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="property-box">
                                            <div class="property-image">
                                                <div class="property-slider">
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/12.jpg" class="bg-img"
                                                            alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/10.jpg" class="bg-img"
                                                            alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/6.jpg" class="bg-img"
                                                            alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/9.jpg" class="bg-img"
                                                            alt="">

                                                    </a>
                                                </div>
                                                <div class="labels-left">
                                                    <div>
                                                        <span class="label label-shadow">sale</span>
                                                    </div>
                                                </div>
                                                <div class="seen-data">
                                                    <i data-feather="camera"></i>
                                                    <span>10</span>
                                                </div>
                                                <div class="overlay-property-box">
                                                    <a href="compare.html" class="effect-round" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Compare">
                                                        <i data-feather="shuffle"></i>
                                                    </a>
                                                    <a href="user-favourites.html" class="effect-round like"
                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="wishlist">
                                                        <i data-feather="heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="property-details">
                                                <span class="font-roboto">usa</span>
                                                <a href="single-property-8.html">
                                                    <h3>Home in Merrick Way</h3>
                                                </a>
                                                <h6>$4513.00*</h6>
                                                <p class="font-roboto">The most common and most absolute type of
                                                    estate,
                                                    the tenant enjoys the greatest discretion over the disposal of the
                                                    property.</p>
                                                <ul>
                                                    <li><img src="../assets/images/svg/icon/double-bed.svg"
                                                            class="img-fluid" alt="">Bed : 4</li>
                                                    <li><img src="../assets/images/svg/icon/bathroom.svg"
                                                            class="img-fluid" alt="">Baths : 4</li>
                                                    <li><img src="../assets/images/svg/icon/square-ruler-tool.svg"
                                                            class="img-fluid ruler-tool" alt="">Sq Ft : 5000
                                                    </li>
                                                </ul>
                                                <div class="property-btn d-flex">
                                                    <span>January 6, 2022</span>
                                                    <button type="button"
                                                        onclick="document.location='single-property-8.html'"
                                                        class="btn btn-dashed btn-pill color-2">Details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="property-box">
                                            <div class="property-image">
                                                <div class="property-slider">
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/16.jpg" class="bg-img"
                                                            alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/5.jpg" class="bg-img"
                                                            alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/4.jpg" class="bg-img"
                                                            alt="">

                                                    </a>
                                                    <a href="javascript:void(0)">
                                                        <img src="../assets/images/property/3.jpg" class="bg-img"
                                                            alt="">

                                                    </a>
                                                </div>
                                                <div class="labels-left">
                                                    <div>
                                                        <span class="label label-dark">no fees</span>
                                                    </div>
                                                    <span class="label label-success">open house</span>
                                                </div>
                                                <div class="seen-data">
                                                    <i data-feather="camera"></i>
                                                    <span>25</span>
                                                </div>
                                                <div class="overlay-property-box">
                                                    <a href="compare.html" class="effect-round" data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Compare">
                                                        <i data-feather="shuffle"></i>
                                                    </a>
                                                    <a href="user-favourites.html" class="effect-round like"
                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="wishlist">
                                                        <i data-feather="heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="property-details">
                                                <span class="font-roboto">brazil</span>
                                                <a href="single-property-8.html">
                                                    <h3>Magnolia Ranch</h3>
                                                </a>
                                                <h6>$9554.00*</h6>
                                                <p class="font-roboto">Elegant retreat in a quiet Coral Gables setting.
                                                    This home provides wonderful entertaining spaces with a chef
                                                    kitchen opening…</p>
                                                <ul>
                                                    <li><img src="../assets/images/svg/icon/double-bed.svg"
                                                            class="img-fluid" alt="">Bed : 4</li>
                                                    <li><img src="../assets/images/svg/icon/bathroom.svg"
                                                            class="img-fluid" alt="">Baths : 4</li>
                                                    <li><img src="../assets/images/svg/icon/square-ruler-tool.svg"
                                                            class="img-fluid ruler-tool" alt="">Sq Ft : 5000
                                                    </li>
                                                </ul>
                                                <div class="property-btn d-flex">
                                                    <span>May 14, 2022</span>
                                                    <button type="button"
                                                        onclick="document.location='single-property-8.html'"
                                                        class="btn btn-dashed btn-pill color-2">Details</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="left-sidebar sticky-cls single-sidebar">
                        <div class="filter-cards">
                            <div class="advance-card">
                                <h6>Thông tin liên hệ</h6>
                                <div class="category-property">
                                    <div class="agent-info">
                                        <div class="media">
                                            <img src="../assets/images/testimonial/3.png" class="img-50" alt="">
                                            <div class="media-body ms-2">
                                                <h6>{{ $data->User->name }}</h6>
                                                <p>{{ $data->User->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <ul>

                                        <li>
                                            <i data-feather="map-pin"
                                                class="me-2"></i>{{ $data->User->address != null ? json_decode($data->User->address)->address : ' ' }}
                                        </li>
                                        <li>
                                            <i data-feather="phone-call"
                                                class="me-2"></i>{{ $data->User->PhoneNumber != null ? $data->User->PhoneNumber : ' ' }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="advance-card">
                                <h6>Gửi thông tin liên hệ</h6>
                                <div class="category-property">
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Tên của bạn"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Địa chỉ email"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <input placeholder="Số điện thoại" class="form-control" name="mobnumber"
                                                id="tbNumbers" oninput="maxLengthCheck(this)" type="tel"
                                                onkeypress="javascript:return isNumber(event)" maxlength="9"
                                                required="">
                                        </div>
                                        <div class="form-group">
                                            <textarea placeholder="Tin nhắn" class="form-control" rows="3"></textarea>
                                        </div>
                                        <button type="submit" onclick="document.location='#'"
                                            class="btn btn-gradient color-2 btn-block btn-pill">Gửi yêu cầu</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- single property end -->
@endsection

@section('customiez')
    <div class="customizer-wrap open">
        <div class="customizer-links">
            <i data-feather="settings"></i>
        </div>
        <div class="customizer-contain custom-scrollbar">
            <div class="setting-back">
                <i data-feather="x"></i>
            </div>
            <div class="layouts-settings">
                <div class="customizer-title">
                    <h6 class="color-2">Đăng bài</h6>
                </div>

                <a class="btn btn-primary mt-2" style="color:white" role="button"
                    href="{{ route('xuat_ban_phong', $data->id) }}">Đăng ngay</a>
            </div>
            <div class="layouts-settings">
                <div class="customizer-title">
                    <h6 class="color-2">Quay lại chỉnh sửa</h6>
                </div>
                <a class="btn btn-primary mt-2" style="color:white" role="button"
                    href="{{ route('Room.edit', $data->id) }}">Quay lại</a>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    <!-- video modal start -->
    <div class="modal fade video-modal" id="videomodal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <iframe title="realestate" src="{{ $data->video_link }}" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- video modal end -->
@endsection

@section('js')
    <script src="{{ 'assets/js/color/single-property.js' }}"></script>
    </script>
    <script
        src='https://www.bing.com/maps/sdk/mapcontrol?key=AgyOfVqVPxgShQQEECEUy5EnGPDHdv1uhGW-RCJbf9EdrKA0YKLDv12JNYflT8gq&amp;callback=loadMapScenario'
        async defer></script>
    <script>
        function loadMapScenario() {
            console.log("chạy");
            var map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
                center: new Microsoft.Maps.Location({{ $data->latlng->lat }}, {{ $data->latlng->long }}),
                zoom: 16,
                mapTypeId: Microsoft.Maps.MapTypeId.aerial,

            });
            var icon = new Microsoft.Maps.Pushpin(map.getCenter(), {
                icon: 'https://www.bingmapsportal.com/Content/images/poi_custom.png'
            });
            var location = {
                latitude: '{{ $data->latlng->lat }}',
                longitude: '{{ $data->latlng->long }}'
            }
            icon.setLocation(location);
            map.entities.push(icon);

        }
    </script>
@endsection
