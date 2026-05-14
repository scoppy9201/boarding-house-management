@extends('layouts.app')
@section('style')
    <style>
        .layout-maps {
            height: 45vh;
            width: 100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            position: relative;
        }

        .layout-maps .H_ui,
        .layout-maps .leaflet-pane {
            z-index: 1;
        }

        .layout-maps .map {
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        .layout-maps .map>div {
            opacity: 0.7;
        }

        .layout-maps .map:before {
            content: "";
            position: absolute;
            height: 100%;
            width: 100%;
            background-color: #313131;
            top: 0;
            bottom: 0;
        }

        .layout-maps.vertical-map {
            min-height: 775px;
        }

        .layout-maps .withmap-horizontal .search-panel {
            background-color: transparent;
            position: relative;
            margin: 0 auto;
        }

        .layout-maps .withmap-horizontal .search-panel .width-fit {
            margin: 0;
        }

        .layout-maps .withmap-horizontal .search-panel .width-fit>div+div {
            border-left: 1px solid #e4daf5;
        }

        .layout-maps .withmap-horizontal .search-panel .width-fit>div:nth-child(2) {
            max-width: 25%;
        }

        .layout-maps .withmap-horizontal .search-panel .width-fit>div:first-child {
            max-width: 28%;
        }

        .layout-maps .withmap-horizontal .search-panel .width-fit>div:first-child .filter {
            padding-left: 50px;
        }

        .layout-maps .withmap-horizontal .search-panel .filter {
            padding: 50px 30px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .layout-maps .withmap-horizontal .search-panel .filter .btn {
            padding-top: 12px;
            padding-bottom: 10px;
        }

        .layout-maps .withmap-horizontal .search-panel .filter .media {
            width: 100%;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .layout-maps .withmap-horizontal .search-panel .filter .media .icon-square {
            width: 45px;
            height: 45px;
            position: relative;
        }

        .layout-maps .withmap-horizontal .search-panel .filter .media .icon-square::after {
            position: absolute;
            content: "";
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            opacity: 0.1;
            background-color: var(--theme-default7);
        }

        .layout-maps .withmap-horizontal .search-panel .filter .media .icon-square i {
            color: var(--theme-default7);
            font-size: 22px;
        }

        .layout-maps .withmap-horizontal .search-panel .filter .media .media-body {
            margin-left: 15px;
            margin-right: 30px;
            max-width: -webkit-fit-content;
            max-width: -moz-fit-content;
            max-width: fit-content;
            position: relative;
        }

        .layout-maps .withmap-horizontal .search-panel .filter .media .media-body h4 {
            color: var(--theme-default7);
            line-height: 1;
            margin-bottom: 10px;
        }

        .layout-maps .withmap-horizontal .search-panel .filter .media .media-body h4 {
            font-weight: 700;
        }

        .layout-maps .withmap-horizontal .search-panel .filter .media .media-body h6 {
            font-weight: 500;
            font-size: 12px;
            margin-bottom: 0;
            line-height: 1.4;
            letter-spacing: 0.5px;
            margin-bottom: -1px;
        }

        .layout-maps .withmap-horizontal .search-panel .filter .media .dropdown-icon {
            margin-top: 5px;
        }

        .layout-maps .withmap-horizontal .search-panel .filter .media .dropdown-icon span {
            line-height: 0.4;
        }

        .layout-maps .withmap-horizontal .search-panel .filter .media .dropdown-icon span i {
            font-size: 12px;
        }

        .layout-maps .withmap-horizontal .search-panel .filter .media .dropdown-icon span.d-block {
            margin-bottom: -4px;
        }

        .layout-maps .withmap-horizontal .search-panel .filter .media .dropdown-icon span+span {
            color: rgba(149, 149, 149, 0.5);
        }

        .layout-maps .withmap-horizontal .search-panel .filter .dropdown .dropdown-menu {
            width: 210px;
        }

        .layout-maps .feature-section .feature-content {
            z-index: 1;
            background: #ffffff;
            height: auto;
        }

        .layout-maps.layout-home2 {
            min-height: 540px;
        }

        .layout-maps.header-map {
            height: 500px;
        }

        .layout-maps .leaflet-container::before {
            display: none;
        }
    </style>
@endsection
@section('content')
    <!-- submit property section start -->
    <section class="property-wizard">
        <div class="container">
            <div class="row wizard-box">
                <div class="col-sm-12">
                    <div class="wizard-step-container row">
                        <div class="col-xxl-3 col-lg-4">
                            <div class="theme-card">
                                <ul class="wizard-steps">
                                    <li class="step-container step-1 active">
                                        <div class="media">
                                            <div class="step-icon">
                                                <i data-feather="check"></i>
                                                <span>1</span>
                                            </div>
                                            <div class="media-body">
                                                <h5>Tổng quan</h5>
                                                <h6>Thông tin cơ bản</h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step-container step-2">
                                        <div class="media">
                                            <div class="step-icon">
                                                <i data-feather="check"></i>
                                                <span>2</span>
                                            </div>
                                            <div class="media-body">
                                                <h5>Địa chỉ</h5>
                                                <h6>địa chỉ của bạn</h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step-container step-3">
                                        <div class="media">
                                            <div class="step-icon">
                                                <i data-feather="check"></i>
                                                <span>3</span>
                                            </div>
                                            <div class="media-body">
                                                <h5>Ảnh đại diện</h5>
                                                <h6>Thêm ảnh từ thư viện</h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step-container step-4">
                                        <div class="media">
                                            <div class="step-icon">
                                                <i data-feather="check"></i>
                                                <span>4</span>
                                            </div>
                                            <div class="media-body">
                                                <h5>Hoàn thành</h5>
                                                <h6>Complete details</h6>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="wizard-form-details col-xxl-9 col-lg-8">
                            <div class="theme-card my-3">
                                <div class="wizard-step-1 d-block">
                                    <h2>Tổng quan</h2>
                                    <p class="font-roboto">Hãy điền những thông tin cơ bản của bạn vào đây</p>
                                    <form id="form_1" class="row gx-3">
                                        <div class="form-group col-sm-6">
                                            <label>Họ tên</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $user->name }}" placeholder="" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Số điện thoại</label>
                                            <input type="text" class="form-control" value="{{ $user->PhoneNumber }}"
                                                name="PhoneNumber" placeholder="" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Số điện thoại Zalo</label>
                                            <input type="text" class="form-control" value="{{ $user->Zalo }}"
                                                name="Zalo" placeholder="" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Facebook Link</label>
                                            <input type="text" class="form-control" value="{{ $user->Facebook }}"
                                                name="Facebook" placeholder="" required>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Giới thiệu ngắn</label>
                                            <textarea class="form-control " id="description" name="description" rows="4">{{ $user->description }}</textarea>
                                        </div>
                                    </form>
                                    <div class="next-btn text-end">
                                        <button type="button" id="complete_1"
                                            class="btn btn-gradient color-2 next1 btn-pill">Tiếp theo <i
                                                class="fas fa-arrow-right ms-2"></i></button>
                                    </div>
                                </div>
                                <div class="wizard-step-2 d-none">
                                    @php
                                        $address = json_decode($user->address);
                                        
                                    @endphp
                                    <h2>Địa chỉ</h2>
                                    <p class="font-roboto">Chọn địa chỉ của bạn trên bản đồ</p>
                                    <form class="row gx-3" id="form_2">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-12 layout-maps ">
                                            <div class="map" id="myMap"></div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Tỉnh</label>
                                            <input type="text" class="form-control" id="province"
                                                value="{{ isset($address->province) ? $address->province : '' }}"
                                                name="province" placeholder="Chọn vị trí trên bản đồ">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Huyện</label>
                                            <input type="text" class="form-control" id="wards"
                                                value="{{ isset($address->wards) ? $address->wards : '' }}" name="wards"
                                                placeholder="Chọn vị trí trên bản đồ">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Địa chỉ</label>
                                            <input type="text" class="form-control" id="address"
                                                value="{{ isset($address->address) ? $address->address : '' }}"
                                                name="address" placeholder="Nhập địa chỉ chi tiết">
                                        </div>
                                        <input type="text" id="lat"
                                            value="{{ isset($address->lat) ? $address->lat : '' }}" name="lat"
                                            class="d-none">
                                        <input type="text" id="long" name="long"
                                            value="{{ isset($address->long) ? $address->long : '' }}" class="d-none">

                                    </form>
                                    <div class="next-btn d-flex">
                                        <button type="button" class="btn btn-dashed color-2 prev1 btn-pill"><i
                                                class="fas fa-arrow-left me-2"></i> Previous</button>
                                        <button type="button" id="complete_2"
                                            class="btn btn-gradient color-2 next2 btn-pill">Tiếp tục <i
                                                class="fas fa-arrow-right ms-2"></i></button>
                                    </div>
                                </div>
                                <div class="wizard-step-3 d-none">
                                    <h2>Ảnh đại diện</h2>
                                    <label>Media</label>
                                    <form id="form_3" class="d-none">
                                        <input type="text" id="path_img" name="imgPath" class="d-none">
                                    </form>

                                    <form class="dropzone" id="singleFileUploadAvatar"
                                        action="{{ route('upload_avatar') }}">
                                        <div class="dz-message needsclick"><i class="fas fa-cloud-upload-alt"></i>
                                            <h5>Kéo ảnh của bạn hoặc nhấn vào để chọn ảnh</h5>
                                        </div>
                                    </form>
                                    <div class="next-btn d-flex">
                                        <button type="button" class="btn btn-dashed color-2 prev2 btn-pill"><i
                                                class="fas fa-arrow-left me-2"></i> Quay lại</button>
                                        <button type="button" id="complete_3"
                                            class="btn btn-gradient color-2 next3 btn-pill">Tiếp tục <i
                                                class="fas fa-arrow-right ms-2"></i></button>
                                    </div>
                                </div>
                                <div class="wizard-step-4 d-none">
                                    <div class="complete-details">
                                        <div>
                                            <img src="../assets/images/inner-pages/4.svg" class="img-fluid"
                                                alt="">
                                            <h3>Xong rồi!!</h3>
                                            <h6>Cảm ơn bạn đã cập nhật thông tin</h6>
                                            <p class="font-roboto">Nhấn phím hoàn thành để vào trang quản lý tài khoản của
                                                bạn nhé</p>
                                            <a href="{{ route('user.index') }}"
                                                class="btn btn-gradient color-2 step-again btn-pill">Hoàn thành</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- submit property section end -->
@endsection
@section('modal')
@endsection
@section('js')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('description');
    </script>
    <!-- Dropzone js -->
    <script src="{{ asset('assets/js/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone/dropzone-script.js') }}"></script>
    <!-- property wizard js -->
    <script src="{{ asset('assets/js/property-wizard.js') }}"></script>
    <script>
        var vitri;

        function loadMapScenario() {
            var map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
                center: new Microsoft.Maps.Location(21.586973, 105.806987),
                zoom: 16,
                mapTypeId: Microsoft.Maps.MapTypeId.aerial,

            });
            Microsoft.Maps.Events.addHandler(map, 'click', function(e) {
                var location = e.location;
                console.log(location);
                var iconUrl = 'https://www.bingmapsportal.com/Content/images/poi_custom.png';
                var icon = new Microsoft.Maps.Pushpin(map.getCenter(), {
                    icon: iconUrl,
                    anchor: new Microsoft.Maps.Point(16, 32) // Tọa độ anchor của biểu tượng
                });

                // Khi người dùng chọn vị trí trên bản đồ
                Microsoft.Maps.Events.addHandler(map, 'click', function(e) {
                    var location = e.location;
                    $('#lat').val(location.latitude);
                    $('#long').val(location.longitude);
                    // Thêm biểu tượng vào bản đồ
                    icon.setLocation(location);
                    map.entities.push(icon);
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        data: {
                            name: name
                        },
                        url: `https://dev.virtualearth.net/REST/v1/Locations/${location.latitude}, ${location.longitude}?key=AhJkSEdXLFcChv2vJNdVpNKbyRg4D9gIJSfhqiO-Zfpn4zTm5Ei9k6h4QoryaLln`,
                        success: function(data) {
                            vitri = data;
                            console.log(vitri.resourceSets[0].resources[0].address);
                            $('#province').val(vitri.resourceSets[0].resources[0].address
                                .adminDistrict);
                            $('#wards').val(vitri.resourceSets[0].resources[0].address
                                .adminDistrict2);
                            $('#address').val(vitri.resourceSets[0].resources[0].address
                                .formattedAddress);
                        }
                    });
                });
            });
        }
    </script>

    {{-- Lưu thông tin --}}
    <script>
        // Lưu bước tổng quan
        $('#complete_1').on('click', function(ev) {
            let formdata = $('#form_1').serialize();
            var description = CKEDITOR.instances['description'].getData();

            $.ajax({
                type: "PUT",
                dataType: "json",
                data: formdata,
                url: `{{ route('upload_step_1', $user->id) }}`,
                success: function(data) {
                    $.ajax({
                        type: "PUT",
                        dataType: "json",
                        data: {
                            description: description
                        },
                        url: `{{ route('save_description', $user->id) }}`,
                        success: function(data) {
                            console.log(data);
                        },
                        error: function(e) {
                            if (typeof e.responseJSON.errors !== 'undefined') {
                                for (const [key, value] of Object.entries(e.responseJSON
                                        .errors)) {
                                    makeToast(value, "red");
                                }
                                makeToast(e.responseJSON.error, "red");
                                console.log(e.responseJSON.error);
                            }

                        }
                    });
                    $('.step-1').removeClass('active').addClass('disabled');
                    $('.step-2').addClass('active');
                    $('.wizard-step-2').addClass('d-block').removeClass('d-none');
                    $('.wizard-step-1').removeClass('d-block').addClass('d-none');
                },
                error: function(e) {
                    if (typeof e.responseJSON.errors !== 'undefined') {
                        for (const [key, value] of Object.entries(e.responseJSON.errors)) {
                            makeToast(value, "red");
                        }
                        makeToast(e.responseJSON.error, "red");
                        console.log(e.responseJSON.error);
                    }

                }
            });

        });
        // Lưu địa chỉ
        $('#complete_2').on('click', function(ev) {
            let formdata = $('#form_2').serialize();
            $.ajax({
                type: "PUT",
                dataType: "json",
                data: formdata,
                url: `{{ route('upload_step_2', $user->id) }}`,
                success: function(data) {

                    console.log('data');
                    $('.step-2').removeClass('active').addClass('disabled');
                    $('.step-3').addClass('active');
                    $('.wizard-step-3').addClass('d-block').removeClass('d-none');
                    $('.wizard-step-2').removeClass('d-block').addClass('d-none');
                },
                error: function(e) {
                    if (typeof e.responseJSON.errors !== 'undefined') {
                        for (const [key, value] of Object.entries(e.responseJSON.errors)) {
                            makeToast(value, "red");
                        }
                        if (e.responseJSON.error) {
                            makeToast(e.responseJSON.error, "red");
                        }
                        console.log(e);
                    }
                }
            });
        });
        // Lưu ảnh đại diện 
        // Lưu địa chỉ
        $('#complete_3').on('click', function(ev) {
            let formdata = $('#form_3').serialize();
            $.ajax({
                type: "PUT",
                dataType: "json",
                data: formdata,
                url: `{{ route('upload_step_3', $user->id) }}`,
                success: function(data) {

                    console.log('data');
                    $('.step-3').removeClass('active').addClass('disabled');
                    $('.step-4').addClass('active');
                    $('.wizard-step-4').addClass('d-block').removeClass('d-none');
                    $('.wizard-step-3').removeClass('d-block').addClass('d-none');
                },
                error: function(e) {
                    if (typeof e.responseJSON.errors !== 'undefined') {
                        for (const [key, value] of Object.entries(e.responseJSON.errors)) {
                            makeToast(value, "red");
                        }
                        if (e.responseJSON.error) {
                            makeToast(e.responseJSON.error, "red");
                        }
                        console.log(e);
                    }
                }
            });
        });
    </script>
    <script
        src='https://www.bing.com/maps/sdk/mapcontrol?key=AhJkSEdXLFcChv2vJNdVpNKbyRg4D9gIJSfhqiO-Zfpn4zTm5Ei9k6h4QoryaLln&amp;callback=loadMapScenario'
        async defer></script>
@endsection
