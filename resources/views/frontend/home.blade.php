@extends('layouts.app')
@section('content')
@section('style')
    <style>
        .dropdown-menu {
            overflow: auto;
            max-height: 200px;
        }
    </style>
@endsection

<!-- home section start -->
<section class="layout-map vertical-map">
    <div class="map" id="myMap"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 search-withmap">
                <div class="vertical-search">
                    <div class="left-sidebar">
                        <form class="row gx-2" action="{{ route('filter_room') }}" method="GET">
                            @csrf
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">Huyện, Thành phố</label>
                                        <div class="dropdown">
                                            <span class="dropdown-toggle font-rubik" data-bs-toggle="dropdown"><span
                                                    id="district">Tất cả</span> <i
                                                    class="fas fa-angle-down"></i></span>
                                            <div class="dropdown-menu text-start" id="districts">
                                                <input type="text" name="district_input" class="d-none"
                                                    value="Tất cả">
                                                <a class="dropdown-item district" code="000" code_name="all"
                                                    href="javascript:void(0)">Tất cả</a>
                                                @foreach ($districts as $district)
                                                    <a class="dropdown-item district" code="{{ $district->code }}"
                                                        code_name="{{ $district->code_name }}"
                                                        href="javascript:void(0)">{{ $district->full_name }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" name="ward_id" id="wards_input" class="d-none" value="Tất cả">
                                    <div class=" col-sm-6">
                                        <label>Xã, Phường</label>
                                        <div class="dropdown">
                                            <span class="dropdown-toggle font-rubik" data-bs-toggle="dropdown"><span
                                                    id="wards">Tất cả</span> <i
                                                    class="fas fa-angle-down"></i></span>
                                            <div class="dropdown-menu text-start " id="ward_list">
                                                <a class="dropdown-item" href="javascript:void(0)">Tất cả</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-12">
                                <label>Loại Phòng</label>
                                <div class="dropdown">
                                    <input type="text" name="category_id" id="category_input" class="d-none"
                                        value="Tất cả">
                                    <span class="dropdown-toggle font-rubik" data-bs-toggle="dropdown"><span>Tất
                                            cả</span> <i class="fas fa-angle-down"></i></span>
                                    <div class="dropdown-menu text-start" id="category_list">
                                        <a class="dropdown-item" href="javascript:void(0)">Tất cả</a>
                                        @foreach ($categoryRoom as $item)
                                            <a class="dropdown-item " code="{{ $item->id }}"
                                                href="javascript:void(0)">{{ $item->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="price-range">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="amount">Giá cả : </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" name="price[]" id="price_from" class="d-none"
                                                readonly="">
                                            <input type="text" name="price[]" id="price_to" class="d-none"
                                                readonly="">
                                            <div type="text" id="amount" readonly="">
                                            </div>


                                        </div>

                                        <div id="slider-range"
                                            class="theme-range-4 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                            <div class="ui-slider-range ui-corner-all ui-widget-header"></div><span
                                                tabindex="0"
                                                class="ui-slider-handle ui-corner-all ui-state-default"></span><span
                                                tabindex="0"
                                                class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="price-range">
                                        <label for="amount">Diện tích : </label>
                                        <input type="text" name="area[]" id="area_from" class="d-none"
                                            readonly="">
                                        <input type="text" name="area[]" id="area_to" class="d-none"
                                            readonly="">
                                        <input type="text" id="amount1" readonly="">
                                        <div id="slider-range1"
                                            class="theme-range-4 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                            <div class="ui-slider-range ui-corner-all ui-widget-header"></div><span
                                                tabindex="0"
                                                class="ui-slider-handle ui-corner-all ui-state-default"></span><span
                                                tabindex="0"
                                                class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Tùy chọn</label>
                                    <div class="feature-checkbox">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="chk-ani">
                                                    <input class="checkbox_animated color-2 add_ons" name="add_ons[]"
                                                        value="Nơi để xe" type="checkbox"> Nơi để xe
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="chk-ani1">
                                                    <input class="checkbox_animated color-2 add_ons" name="add_ons[]"
                                                        value="Camera an ninh" type="checkbox"> Camera an ninh
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="chk-ani2">
                                                    <input class="checkbox_animated color-2 add_ons" name="add_ons[]"
                                                        value="Wifi miễn phí" type="checkbox"> Wifi miễn phí
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="chk-ani3">
                                                    <input class="checkbox_animated color-2 add_ons" name="add_ons[]"
                                                        value="Điều hòa" type="checkbox"> Điều hòa
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="chk-ani4">
                                                    <input class="checkbox_animated color-2 add_ons" name="add_ons[]"
                                                        value="Bình nóng lạnh" type="checkbox"> Bình nóng lạnh
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-gradient color-4 mt-2">Tìm kiếm</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- home section end -->

<!-- property section start -->
<section class="property-section">
    <div class="container">
        <div class="row ratio_55">
            <div class="col">
                <div class="title-2">
                    <h2>Phòng trọ mới nhất</h2>
                    <p>Khám phá những phòng trọ mới nhất tại Thái Nguyên trong hôm nay</p>
                </div>
                <div class="property-2 row column-space zoom-gallery">
                    @foreach ($rooms as $item)
                        <div class="col-md-4 wow fadeInUp ">
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

                                        </div>
                                    </div>
                                </div>

                                <div class="property-details {{ $item->status == 1 ? '' : 'hidden_room' }}">
                                    <span class="font-roboto">{{ $item->getWard->getDistrict->name }}</span>
                                    <a href="{{ route('Room_show', $item->id) }}">
                                        <h3>{{ $item->name }}</h3>
                                    </a>
                                    <h6>{{ number_format($item->price) . '/' . $item->unit }}</h6>
                                    <p class="font-roboto">{{ Str::words($item->description, '25') }}</p>
                                    <ul>
                                        <li><img class="img-fluid" alt="">Điện :
                                            {{ number_format($item->electric) }}đ</li>
                                        <li><img class="img-fluid" alt="">Nước :
                                            {{ number_format($item->water) }}đ</li>
                                        <li><img src="../assets/images/svg/icon/square-ruler-tool.svg"
                                                class="img-fluid ruler-tool" alt="">Diện tích:
                                            {{ $item->area }}</li>
                                    </ul>

                                    <div class="property-btn d-flex">
                                        <span>{{ $item->created_at->diffForHumans($current) }}</span>
                                        <span>{{ $item->CategoryRoom->name }}</span>
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
</section>
<!-- property section end -->

<!-- property section tab start -->
<section class="property-section bg-comman-2">
    <div class="container">
        <div class="row ratio_55">
            <div class="col">
                <div class="title-2 text-white">
                    <h2>Bạn muốn tìm loại phòng như nào ?</h2>
                    <p>Có nhiều loại phòng khác nhau, bạn có thể tìm loại phòng phù hợp cho bản thân tại đây</p>
                </div>
                <ul id="tabs" class="nav nav-tabs">
                    @foreach ($categoryRoom as $key => $item)
                        <li class="nav-item "><a href="#" data-bs-target="#category{{ $item->id }}"
                                data-bs-toggle="tab"
                                class="nav-link @if ($key == 1) active @endif">{{ $item->name }}</a>
                        </li>
                    @endforeach
                </ul>
                <div id="tabsContent" class="tab-content">
                    @foreach ($categoryRoom as $key => $category)
                        <div id="category{{ $category->id }}"
                            class="tab-pane @if ($key == 1) active show @endif fade">
                            <div class="property-2 row column-space zoom-gallery">
                                @foreach ($category->getRoom as $k => $item)
                                    @if ($k == 3)
                                        @break($k == 3)
                                    @endif
                                    <div class="col-xl-4 col-md-6">
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
                                                    <li><img class="img-fluid" alt="">Điện :
                                                        {{ number_format($item->electric) }}đ</li>
                                                    <li><img class="img-fluid" alt="">Nước :
                                                        {{ number_format($item->water) }}đ</li>
                                                    <li><img src="../assets/images/svg/icon/square-ruler-tool.svg"
                                                            class="img-fluid ruler-tool" alt="">Diện tích:
                                                        {{ $item->area }}</li>
                                                </ul>

                                                <div class="property-btn d-flex">
                                                    <span>{{ $item->created_at->diffForHumans($current) }}</span>
                                                    <span>{{ $item->CategoryRoom->name }}</span>
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
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- property section tab end -->






<!-- blog section start -->
<section class="blog-section bg-comman-2">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="title-2 text-white">
                    <h2>bài viết nổi bật</h2>
                </div>
                <div class="blog-1">
                    @foreach ($news as $item)
                    <div>
                        <div class="blog-box">
                            <div class="img-box">
                                <img src="{{ asset('images/thumbnail_news/' . $item->thumbnail) }}" alt="" class="img-fluid">
                            </div>
                            <div class="blog-content row">
                                <span class="col-6">{{ $item->created_at->diffForHumans($current) }}</span>
                                <span class="col-6">{{ $item->view }} lượt xem</span>
                                <h3>
                                    <a href="{{ route('frontend.news.show', $item->slug) }}">
                                        {{ $item->title }}
                                    </a>
                                </h3>
                                <p class="font-roboto">{{ Str::words($item->short_content, '30') }}</p>
                                <a  href="{{ route('frontend.news.show', $item->slug) }}"
                                    class="btn btn-gradient btn-pill color-2 btn-lg">Đọc tiếp</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog section end -->

<!-- brand section start -->
{{-- <section class="small-section bg-light brand-wrap">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="title-2">
                    <h2>Các công nghệ sử dụng</h2>
                </div>
                <div class="slide-2 brand-slider">
                    <div>
                        <a href="javascript:void(0)" class="logo-box">
                            <img src="../assets/images/brand/6.png" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="logo-box">
                            <img src="../assets/images/brand/7.png" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="logo-box">
                            <img src="../assets/images/brand/8.png" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="logo-box">
                            <img src="../assets/images/brand/9.png" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="logo-box">
                            <img src="../assets/images/brand/10.png" alt="" class="img-fluid">
                        </a>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</section> --}}

<!-- brand section end -->
@endsection

@section('js')
<script src="{{ asset('assets/js/range-slider.js') }}"></script>
<!-- Lấy thông tin xã, tỉnh -->
@include('js.getward')
<script>
    function loadMapScenario() {
        //map center load location Hà Nội
        var map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
            center: new Microsoft.Maps.Location(21.028511, 105.854444),
            zoom: 15,
            mapTypeId: Microsoft.Maps.MapTypeId.aerial,
        });
        //mảng markersData được tạo ra trên dữ liệu từ biến $room của laravel (đoạn php chỉ chạy khi trang web đã được render ra)
        markersData = [
            @foreach ($rooms as $room)
                @php
                    $latlng = json_decode($room->latlng);
                @endphp {
                    name: '{{ $room->name }}',
                    location_latitude: {{ $latlng->lat }},
                    location_longitude: {{ $latlng->long }},
                    map_image_url: "{{ asset('images/main_room/') . '/' . $room->main_img }}",
                    name_point: '{{ $room->name }}',
                    price: '{{ number_format($room->price) }}đ',
                    label: 'for sale',
                    electric: '{{ number_format($room->electric) }}đ',
                    water: '{{ number_format($room->water) }}đ',
                    sqft: '{{ $room->area }}',
                    url_point: '{{ route('Room_show', $room->id) }}'
                },
            @endforeach
        ];
        //tạo các pushpin (điểm đánh dấu) từ mảng dữ liệu phòng trọ markersData 
        var pushpins = Microsoft.Maps.TestDataGenerator.getPushpins(markersData.length, map.getBounds(), {
            icon: 'https://www.bingmapsportal.com/Content/images/poi_custom.png'
        });
        //tạo ra các box khi click vào một điểm đánh dấu
        var infobox = new Microsoft.Maps.Infobox(pushpins[0].getLocation(), {
            visible: false,
            autoAlignment: true
        });
        console.log(markersData);
        //gán infobox vào bản đồ
        infobox.setMap(map);
        //vòng lặp qua mỗi pushpin tạo HTML cho infobox dựa trên dữ liệu từ markersData
        for (var i = 0; i < pushpins.length; i++) {
            //Store some metadata with the pushpin
            var pushpin = [];
            var htmldata = "";
            if (markersData[i]) {
                // Tạo HTML cho Infobox dựa trên dữ liệu từ markersData.
                htmldata = '<div class="infoBox">' +
                    '<div class="marker-detail">' +
                    '<img src="' + markersData[i].map_image_url + '" alt="Image"/>' +
                    '<div class="label label-shadow">' + markersData[i].label + '</div>' +
                    '<div class="detail-part">' +
                    '<h6>' + markersData[i].name_point + '</h6>' +
                    '<ul>' +
                    '<li>Điện : ' + markersData[i].electric + '</li>' +
                    '<li>Nước :' + markersData[i].water + '</li>' +
                    '<li>Diện tích :' + markersData[i].sqft + ' m2</li>' +
                    '</ul>' +
                    '<span>' + markersData[i].price + '</span>' +
                    '<a href="' + markersData[i].url_point + '">Chi tiết</a>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                // Tạo Pushpin và metadata tương ứng (chi tiết từng pushpin gán với từng infobox)
                var loc = new Microsoft.Maps.Pushpin(new Microsoft.Maps.Location(markersData[i].location_latitude,
                    markersData[i].location_longitude));
                pushpin = loc;
                pushpin.metadata = {
                    title: "",
                    description: htmldata
                };
                // Gán Pushpin vào mảng pushpins.
                pushpins[i] = loc;
                // Xử lý sự kiện click cho Pushpin để hiển thị Infobox.
                Microsoft.Maps.Events.addHandler(pushpin, 'click', function(args) {
                    infobox.setOptions({
                        location: args.target.getLocation(),
                        title: args.target.metadata.title,
                        description: args.target.metadata.description,
                        visible: true
                    });
                });
            }
        }
        //hiển thị các pushpin trên đối tượng bản đồ (hiển thị trên bản đồ)
        map.entities.push(pushpins);
    }
</script>

{{-- script nhúng bản đồ Bing Maps --}}
<script
    src='https://www.bing.com/maps/sdk/mapcontrol?key=AhJkSEdXLFcChv2vJNdVpNKbyRg4D9gIJSfhqiO-Zfpn4zTm5Ei9k6h4QoryaLln&amp;callback=loadMapScenario'
    async defer></script>
@endsection
