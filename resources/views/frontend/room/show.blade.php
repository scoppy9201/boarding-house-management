@extends('layouts.app')

@section('style')
@endsection

@section('content')
    <!-- single property start -->
    @php
        if (isset($data->video_link)) {
            if (Str::contains($data->video_link, 'www.youtube.com') && Str::contains($data->video_link, 'https://www.youtube.com/watch?v=')) {
                $data->video_link = str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $data->video_link);
            }
        }
        $data->list_img = json_decode($data->list_img);
        $data->latlng = json_decode($data->latlng);

    @endphp

    <section class="single-property mt-0 pt-0">
        <div class="container">
            <div class="row ratio_55">
                <div class="col-xl-9 col-lg-8">
                    <h2>{{ $data->name }}</h2>
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



                                        </div>
                                        <div class="gallery-nav">
                                            <div>
                                                <img src="{{ asset('images/main_room') . '/' . $data->main_img }}"
                                                    class="img-fluid" alt="">
                                            </div>
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
                                    @if (isset($data->video_link))
                                        <li class="nav-item"><a data-bs-toggle="tab" class="nav-link"
                                                href="#video">video</a>
                                    @endif
                                    </li>

                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#location-map">Bản
                                            đồ</a></li>
                                </ul>
                                <div class=" tab-content" id="top-tabContent">
                                    <div class="tab-pane fade show active about page-section" id="about">

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
                                                    @foreach (json_decode($data->add_ons) as $item)
                                                        <li>
                                                            <i class="fas fa-hands"></i>{{ $item }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade page-section ratio3_2" id="gallery">
                                        <h4 class="content-title">gallery</h4>
                                    </div>
                                    @if (isset($data->video_link))
                                        <div class="tab-pane fade page-section ratio_40" id="video">
                                            <h4 class="content-title">video</h4>
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
                                        </div>
                                    @endif
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
                                        @foreach ($data->CommentRoom as $comment)
                                            <div class="review-box">
                                                <div class="media">
                                                    <img src="{{ asset('images/user_avatar') . '/' . $comment->getUser->profile_photo_path }}"
                                                    style="border-radius: 50%;height: 55px;width: 55px" alt="">
                                                    <div class="media-body">
                                                        <h6>{{ $comment->getUser->name }}</h6>
                                                        <p>{{ $comment->updated_at->diffForHumans($current) }}</p>
                                                        <p class="mb-0">{{ $comment->content }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <hr />
                                    <h4 class="content-title">Viết bình luận</h4>
                                    @if (Auth::check())
                                        <form class="review-form" action="{{ route('commentRoom', ['id' => $data->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('put')
                                            <div class="form-group">
                                                <textarea class="form-control" name="content" placeholder="Comment"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-gradient color-2 btn-pill">Gửi</button>
                                        </form>
                                    @else
                                        <div>
                                            <p>Bạn cần <a href="{{ route('login') }}">đăng nhập</a> để bình luận</p>
                                        </div>
                                    @endif
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
                                    @foreach ($room_list as $item)
                                        <div class="col-md-6 wow fadeInUp ">
                                            <div class="property-box ">
                                                <div class="property-image">
                                                    <div class="property-slider">
                                                        <a href="javascript:void(0)">
                                                            <img src="{{ asset('images/main_room') . '/' . $item->main_img }}"
                                                                class="bg-img" alt="">
                                                        </a>
                                                        @php
                                                            $listImg = json_decode($item->list_img);
                                                        @endphp
                                                        @if ($listImg != null)
                                                            @foreach ($listImg as $image)
                                                                <a href="{{ route('Room_show', $item->id) }}">
                                                                    <img src="{{ asset('images/multi_room') . '/' . $image }}"
                                                                        class="bg-img" alt="">
                                                                </a>
                                                            @endforeach
                                                        @endif
                                                    </div>


                                                </div>

                                                <div
                                                    class="property-details {{ $item->status == 1 ? '' : 'hidden_room' }}">
                                                    <span
                                                        class="font-roboto">{{ $item->getWard->getDistrict->name }}</span>
                                                    <a href="{{ route('Room_show', $item->id) }}">
                                                        <h3>{{ $item->name }}</h3>
                                                    </a>
                                                    <h6>{{ number_format($item->price) . '/' . $item->unit }}</h6>
                                                    <p class="font-roboto">{{ Str::words($item->description, '25') }}</p>
                                                    <ul>
                                                        <li><img src="../assets/images/svg/icon/double-bed.svg"
                                                                class="img-fluid" alt="">Điện :
                                                            {{ number_format($item->electric) }}đ</li>
                                                        <li><img src="../assets/images/svg/icon/bathroom.svg"
                                                                class="img-fluid" alt="">Nước :
                                                            {{ number_format($item->water) }}đ</li>
                                                        <li><img src="../assets/images/svg/icon/square-ruler-tool.svg"
                                                                class="img-fluid ruler-tool" alt="">Diện tích:
                                                            {{ $item->area }}</li>
                                                    </ul>

                                                    <div class="property-btn d-flex">
                                                        <span>{{ date('d-m-Y', strtotime($item->created_at)) }}</span>
                                                        <div class="d-flex">
                                                            <a type="button" href="{{ route('Room_show', $item->id) }}"
                                                                class="btn btn-dashed btn-pill color-2">Chi tiết</a>
                                                        </div>

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
                <div class="col-xl-3 col-lg-4">
                    <div class="left-sidebar sticky-cls single-sidebar">
                        <div class="filter-cards">
                            <div class="advance-card">
                                <h6>Thông tin liên hệ</h6>
                                <div class="category-property">
                                    <div class="agent-info">
                                        <div class="media">
                                            <img src="{{ asset('images/user_avatar') . '/' . $data->User->profile_photo_path }}"
                                                alt="" style="border-radius: 50%;height: 55px;width: 55px">
                                            <div class="media-body ms-2">
                                                <a href="{{ route('user.show', $data->User->id) }}">
                                                    <h6>{{ $data->User->name }}</h6>
                                                </a>
                                                <p>{{ Str::limit(optional($data->User)->email, 20) }}</p>
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
                                        <li>
                                            <a class="me-2"
                                                href="{{ 'https://zalo.me/' . $data->User->Zalo }}">{{ 'Zalo:' . $data->User->Zalo }}</a>


                                        </li>
                                        <li>
                                            <a class="me-2" href="{{ $data->User->Facebook }}">Facebook:
                                                {{ $data->User->name }}</a>
                                            </i>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="advance-card">
                                <h6>Gửi thông tin liên hệ</h6>
                                <div class="category-property">
                                    <form method="post" action="{{ route('send_booking', $data->id) }}"
                                        id="form_message">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" required
                                                placeholder="Tên của bạn">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" required
                                                placeholder="Địa chỉ email">
                                        </div>
                                        <div class="form-group">
                                            <input placeholder="Số điện thoại" class="form-control" name="phone"
                                                id="tbNumbers" oninput="maxLengthCheck(this)" type="tel" required
                                                onkeypress="javascript:return isNumber(event)" maxlength="10">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Tin nhắn" class="form-control" required rows="3"></textarea>
                                        </div>
                                    </form>
                                    <button type="submit" class="btn btn-gradient color-2 btn-block btn-pill"
                                        onclick="submitform()">Gửi yêu
                                        cầu</button>
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

@section('modal')
    <!-- video modal start -->
    @if (isset($data->video_link))
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
    @endif

    <!-- video modal end -->
@endsection

@section('js')
    @error('name')
        <script>
            Toastify({
                text: "{{ $message }}",
                className: "info",
                style: {
                    background: "red",
                }
            }).showToast();
        </script>
    @enderror
    @error('email')
        <script>
            Toastify({
                text: "{{ $message }}",
                className: "info",
                style: {
                    background: "red",
                }
            }).showToast();
        </script>
    @enderror
    @error('phone')
        <script>
            Toastify({
                text: "{{ $message }}",
                className: "info",
                style: {
                    background: "red",
                }
            }).showToast();
        </script>
    @enderror
    @error('message')
        <script>
            Toastify({
                text: "{{ $message }}",
                className: "info",
                style: {
                    background: "red",
                }
            }).showToast();
        </script>
    @enderror
    <script>
        function submitform() {
            // Get first form element
            var $form = $('#form_message')[0];

            // Check if valid using HTML5 checkValidity() builtin function
            if ($form.checkValidity()) {
                console.log('valid');
                $form.submit();
            } else {
                makeToast('Bạn cần nhập các thông tin cần thiết', 'red')
            }

            return false
        }
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
