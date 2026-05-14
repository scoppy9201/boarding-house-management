@extends('layouts.app')
@section('style')
    <style>
        .hidden_room {
            background-color: #00000073;
        }

        .customizer-wrap .customizer-contain h6::before {
            transition: all 0.5s;
        }

        .customizer-wrap .customizer-contain h6:hover::before {
            width: 100px;
            height: 5px;
        }

        .customizer-wrap .customizer-contain h6:hover a {
            color: #f31313;
        }
    </style>
@endsection
@section('content')
    <!-- breadcrumb start -->
    <section class="breadcrumb-section p-0">
        <img src="../assets/images/inner-background.jpg" class="bg-img img-fluid" alt="">
        <div class="container">
            <div class="breadcrumb-content">
                <div>
                    <h2>Thông tin tài khoản</h2>
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('trang_chu') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thông tin tài khoản</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->

    <!-- agent profile section start -->
    <section class="agent-section property-section agent-profile-wrap">
        <div class="container">
            <div class="row ratio_55">
                <div class="col-xl-12 col-lg-12 property-grid-2">
                    <div class="our-agent theme-card">
                        <div class="row">
                            <div class="col-sm-6 ratio_landscape">
                                <div class="agent-image">
                                    @if ($user->profile_photo_path)
                                        <img src="{{ asset('images/user_avatar') . '/' . $user->profile_photo_path }}"
                                            class="img-fluid bg-img" alt="">
                                    @else
                                        <img src="{{ asset('assets/images/blank-profile-picture-973460_1280.png') }}"
                                            class="img-fluid bg-img" alt="">
                                    @endif
                                    {{-- <span class="label label-shadow">4 Properties</span> --}}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="our-agent-details">
                                    <h3 class="f-w-600">{{ $user->name }}</h3>
                                    {{-- <h6>Real estate Property Agent</h6> --}}
                                    <ul>
                                        <li>
                                            <div class="media">
                                                <div class="icons-square">
                                                    <i data-feather="map-pin"></i>
                                                </div>
                                                <div class="media-body">

                                                    @if ($user->address)
                                                        @php
                                                            $address = json_decode($user->address);
                                                        @endphp
                                                        <h6>{{ $address->address }}</h6>
                                                    @else
                                                        <h6>Chưa cập nhật</h6>
                                                    @endif

                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <div class="icons-square">
                                                    <i data-feather="phone-call"></i>
                                                </div>
                                                <div class="media-body">
                                                    @if ($user->PhoneNumber)
                                                        <h6>{{ $user->PhoneNumber }}</h6>
                                                    @else
                                                        <h6>Chưa cập nhật</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <div class="icons-square">
                                                    <i data-feather="mail"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6>{{ $user->email }}</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="with-link">
                                            <div class="media">
                                                <div class="icons-square">
                                                    <i data-feather="link"></i>
                                                </div>
                                                <div class="media-body">
                                                    @if ($user->Zalo)
                                                        <h6><a
                                                                href="{{ 'https://zalo.me/' . $user->Zalo }}">{{ 'https://zalo.me/' . $user->Zalo }}</a>
                                                        </h6>
                                                    @else
                                                        <h6>Chưa cập nhật</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <div class="icons-square">
                                                    <i class="fab fa-facebook-f"></i>
                                                </div>
                                                <div class="media-body">
                                                    @if ($user->Facebook)
                                                        <h6><a href="{{ $user->Facebook }}">{{ $user->Facebook }}</a></h6>
                                                    @else
                                                        <h6>Chưa cập nhật</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    </ul>


                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="about-agent theme-card">
                        <h3>Mô tả</h3>
                        <div class="row">
                            <div class="col-sm-12">
                                @if ($user->description)
                                    <p class="font-roboto">{!! $user->description !!}</p>
                                @else
                                    <p class="font-roboto">Chưa cập nhật</p>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="agent-property">
                        @if (count($Room) > 0)
                            <div class="filter-panel">
                                <div class="top-panel">
                                    <div>
                                        <h3>Danh sách phòng của bạn</h3>
                                        {{ $Room->links() }}
                                    </div>

                                </div>
                            </div>
                            <div class="property-2 row column-sm zoom-gallery property-label property-grid">
                                @foreach ($Room as $item)
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
                                                <div class="labels-left">
                                                    <div>
                                                        <span class="label label-shadow" id="{{ $item->id }}"
                                                            class="status">{{ $item->status == 1 ? 'Công khai' : 'Ẩn' }}</span>
                                                    </div>
                                                </div>
                                                @if ($authUser->id == $user->id)
                                                    <a href="{{ route('change_status_room', $item->id) }}"
                                                        class="seen-data">
                                                        <i data-feather="{{ $item->status == 1 ? 'eye-off' : 'eye' }}"></i>
                                                        <span>{{ $item->status == 1 ? 'Ẩn' : 'Hiển thị' }}</span>
                                                    </a>
                                                @endif
                                            </div>

                                            <div class="property-details {{ $item->status == 1 ? '' : 'hidden_room' }}">
                                                <span class="font-roboto">{{ $item->getWard->getDistrict->name }}</span>
                                                <a href="{{ route('Room.show', $item->id) }}">
                                                    <h3>{{ $item->name }}</h3>
                                                </a>
                                                <h6>{{ number_format($item->price) . '/' . $item->unit }}</h6>
                                                <p class="font-roboto">{{ Str::words($item->description, '25') }}</p>
                                                <ul>
                                                    <li><img src="../assets/images/svg/icon/double-bed.svg"
                                                            class="img-fluid" alt="">Điện :
                                                        {{ number_format($item->electric) }}đ</li>
                                                    <li><img src="../assets/images/svg/icon/bathroom.svg" class="img-fluid"
                                                            alt="">Nước : {{ number_format($item->water) }}đ</li>
                                                    <li><img src="../assets/images/svg/icon/square-ruler-tool.svg"
                                                            class="img-fluid ruler-tool" alt="">Diện tích:
                                                        {{ $item->area }}</li>
                                                </ul>

                                                <div class="property-btn d-flex">
                                                    <span>{{ date('d-m-Y', strtotime($item->created_at)) }}</span>
                                                    @if ($authUser->id == $user->id)
                                                        <div class="d-flex gap-1">
                                                            <a type="button" href="{{ route('Room_destroy', $item->id) }}"
                                                                class="btn btn-dashed btn-pill color-1">Xóa</a>
                                                            <a type="button" href="{{ route('Room.edit', $item->id) }}"
                                                                class="btn btn-dashed btn-pill color-2">Sửa</a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="filter-panel">
                                <div class="top-panel">
                                    <div>
                                        <h3>Danh sách phòng trọ</h3>
                                        <p>Chưa có phòng trọ nào.</p>
                                    </div>

                                </div>
                            </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- agent profile section end -->
@endsection
@if ($authUser->id == $user->id)
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
                        <h6 class="color-2"><a href="{{ route('user.edit', $user->id) }}">Sửa thông tin</a></h6>
                    </div>
                </div>
                <div class="layouts-settings">
                    <div class="customizer-title">
                        <h6 class="color-2"><a href="{{ route('user.change_password') }}">Đổi mật khẩu</a></h6>
                    </div>
                </div>
                <div class="layouts-settings">
                    <div class="customizer-title">
                        <h6 class="color-2"><a href="{{ route('booking.index') }}">Danh sách đặt phòng</a></h6>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
@section('modal')
@endsection
@section('js')
    <script
        src='https://www.bing.com/maps/sdk/mapcontrol?key=AhJkSEdXLFcChv2vJNdVpNKbyRg4D9gIJSfhqiO-Zfpn4zTm5Ei9k6h4QoryaLln&amp;callback=loadMapScenario'
        async defer></script>
@endsection
