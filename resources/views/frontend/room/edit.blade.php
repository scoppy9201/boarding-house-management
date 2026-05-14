@extends('layouts.app')
@section('style')
    @php

        $latlng = json_decode($room->latlng);
        $add_ons = json_decode($room->add_ons) == null ? [] : json_decode($room->add_ons);
    @endphp
    <script
        src='https://www.bing.com/maps/sdk/mapcontrol?key=AgyOfVqVPxgShQQEECEUy5EnGPDHdv1uhGW-RCJbf9EdrKA0YKLDv12JNYflT8gq&amp;callback=loadMapScenario'
        async defer></script>
    <script>
        var vitri, map;

        function loadMapScenario() {

            map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
                center: new Microsoft.Maps.Location({{ $latlng->lat . ',' . $latlng->long }}),
                zoom: 13,
                mapTypeId: Microsoft.Maps.MapTypeId.aerial,

            });
            // Cap nhat vi tri cu
            var location = {
                'latitude': {{ $latlng->lat }},
                'longitude': {{ $latlng->long }},
            };
            // cap nhat icon
            var iconUrl = 'https://www.bingmapsportal.com/Content/images/poi_custom.png';
            var icon = new Microsoft.Maps.Pushpin(map.getCenter(), {
                icon: iconUrl,
                anchor: new Microsoft.Maps.Point(16, 32) // Tọa độ anchor của biểu tượng
            });
            icon.setLocation(location);
            map.entities.push(icon);
            // cap nhat ban do
            Microsoft.Maps.Events.addHandler(map, 'click', function(e) {
                location = e.location;
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
                        $('#diaChi').val(vitri.resourceSets[0].resources[0].address
                            .formattedAddress);
                    },
                });
            });
        }
    </script>


    <style>
        .item_list_img {
            position: relative;
            width: 20%;
        }

        .item_img {
            width: 100%;
        }

        .delete_image_button {
            padding: 5px 15px;
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 22px;
            color: red;
            background-color: #f8f8f873;
            /* font-style: revert; */
            border-radius: 50%;
            cursor: pointer;
        }

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
                                                <h6>Thông tin cơ bản của phòng trọ</h6>
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
                                                <h6>Điền địa chỉ của khu trọ</h6>
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
                                                <h5>Hình ảnh</h5>
                                                <h6>Thêm hình ảnh, video về phòng trọ</h6>
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
                                                <h6>Đăng thông tin phòng thành công</h6>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="wizard-form-details col-xxl-9 col-lg-8">
                            <div class="theme-card my-3">
                                <div class="wizard-step-1 d-block">
                                    <h2>Sửa thông tin phòng trọ</h2>
                                    <p class="font-roboto">Thông tin cơ bản của phòng trọ</p>
                                    <form class="row gx-3">
                                        <div class="form-group col-sm-4">
                                            <label>Tên khu trọ</label>
                                            <input type="text" id="Name_room" class="form-control"
                                                placeholder="Khu trọ ông A, bà B" value="{{ $room->name }}"
                                                required="">
                                        </div>
                                        <div class="form-group col-sm-4">

                                            <label>Loại phòng</label>
                                            <div class="dropdown">
                                                <span class="dropdown-toggle font-rubik" data-bs-toggle="dropdown"><span
                                                        id="category_room">{{ $room->CategoryRoom->name }}</span><i
                                                        class="fas fa-angle-down"></i></span>
                                                <div class="dropdown-menu text-start">
                                                    @foreach ($category as $item)
                                                        <a class="dropdown-item"
                                                            href="javascript:void(0)">{{ $item->name }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Số lượng phòng cho thuê</label>
                                            <input type="number" id="number_room" class="form-control" placeholder="2"
                                                required="" value="{{ $room->quantity }}">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Diện tích</label>
                                            <input type="number" id="area" class="form-control"
                                                placeholder="12 mét vuông" value="{{ $room->area }}">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Giá thuê</label>
                                            <input type="number" id="price" class="form-control"
                                                placeholder="1.000.000đ" value="{{ $room->price }}">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Đóng trọ theo</label>
                                            <div class="dropdown">
                                                <span class="dropdown-toggle font-rubik" data-bs-toggle="dropdown"><span
                                                        id="unit_room">{{ $room->unit }}</span> <i
                                                        class="fas fa-angle-down"></i></span>
                                                <div class="dropdown-menu text-start">
                                                    <a class="dropdown-item" href="javascript:void(0)">1 tháng</a>
                                                    <a class="dropdown-item" href="javascript:void(0)">3 tháng</a>
                                                    <a class="dropdown-item" href="javascript:void(0)">6 tháng</a>
                                                    <a class="dropdown-item" href="javascript:void(0)">1 năm</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Giá điện</label>
                                            <input type="number" id="electric" class="form-control"
                                                value="{{ $room->electric }}" placeholder="2000đ">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Giá nước sinh hoạt</label>
                                            <input type="number" id="water" class="form-control"
                                                value="{{ $room->water }}" placeholder="10.000đ">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Mô tả phòng</label>
                                            <textarea class="form-control" id="description" rows="4">{!! $room->describe_room !!}</textarea>
                                        </div>
                                    </form>
                                    <div class="next-btn text-end">
                                        <button type="button" id="complete_1"
                                            class="btn btn-gradient color-2 next1 btn-pill">Tiếp tục <i
                                                class="fas fa-arrow-right ms-2"></i></button>
                                    </div>
                                </div>
                                <div class="wizard-step-2 d-none">

                                    <h2>Địa chỉ</h2>
                                    <p class="font-roboto">Chọn địa chỉ của bạn trên bản đồ</p>
                                    <form class="row gx-3" id="form_2">
                                        <div class="form-group col-sm-4">
                                            <label>Chọn Quận, Huyện, Thành phố</label>
                                            <div class="dropdown">
                                                <span class="dropdown-toggle font-rubik"
                                                    data-bs-toggle="dropdown"><span>{{ $room->getWard->getDistrict->full_name }}</span>
                                                    <i class="fas fa-angle-down"></i></span>
                                                <div class="dropdown-menu text-start" id="districts">
                                                    @foreach ($districts as $district)
                                                        <a class="dropdown-item district" code="{{ $district->code }}"
                                                            code_name="{{ $district->code_name }}"
                                                            href="javascript:void(0)">{{ $district->full_name }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Xã,Phường,Thị Trấn</label>
                                            <select id="wards" name="ward_id" class="form-select dropdown"
                                                id="wards" aria-label="Default select example">
                                                <option selected>Chọn xã, phường...</option>
                                            </select>



                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Địa chỉ</label>
                                            <input type="text" class="form-control" id="diaChi"
                                                value="{{ $room->detail_address }}" name="detail_address"
                                                placeholder="Nhập địa chỉ chi tiết">
                                        </div>

                                        <input type="text" id="lat" name="lat" value="{{ $latlng->lat }}"
                                            name="lat" class="d-none">
                                        <input type="text" id="long" name="long" name="long"
                                            value="{{ $latlng->long }}" class="d-none">

                                        <div class="col-12 layout-maps ">
                                            <div class="map" id="myMap"></div>
                                        </div>

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
                                    <h2>Ảnh,video,</h2>
                                    <p class="font-roboto">Thay đổi ảnh video của bạn</p>
                                    <label>Media</label>
                                    <div class="row justify-content-around">
                                        <div class="d-flex flex-column align-items-center">
                                            <img id="main_img"
                                                src="{{ asset('images/main_room') . '/' . $room->main_img }}"
                                                width="400" height="250" alt="">
                                            <form class="dropzone col-sm-4 " id="singleFileUploadRoom"
                                                action="{{ route('upload_main_image_room') }}">
                                                <div class="dz-message needsclick"><i class="fas fa-cloud-upload-alt"></i>
                                                    <h6>Thả ảnh ở đây hoặc nhấp để tải lên ảnh chính.</h6><span
                                                        class="note needsclick"></span>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                    <form class="dropzone col-sm-12" id="multiFileUploadRoom"
                                        action="{{ route('upload_multi_image_room') }}">
                                        <div class="dz-message needsclick"><i class="fas fa-cloud-upload-alt"></i>
                                            <h6>Thả ảnh ở đây hoặc nhấp để tải lên ảnh phụ ( tối đa 5 ảnh ).</h6><span
                                                class="note needsclick"></span>
                                        </div>
                                    </form>
                                    <div class="row justify-content-around" id="list_img">
                                        @if ($room->list_img)
                                            @foreach (json_decode($room->list_img) as $image)
                                                <div class="item_list_img">
                                                    <img src="{{ asset('images/multi_room') . '/' . $image }}"
                                                        class="item_img" alt="">
                                                    <span class="delete_image_button"
                                                        name_img="{{ $image }}">X</span>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    <form class="row gx-3">
                                        <div class="form-group col-sm-12">
                                            <label>Video (mp4)</label>
                                            <input type="text" class="form-control" value="{{ $room->video_link }}"
                                                id="video_link" placeholder="Ưu tiên link youtube">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Thêm các tùy chọn khác</label>
                                            <div class="feature-checkbox">

                                                <label for="chk-ani">
                                                    <input class="checkbox_animated color-2 add_ons" value="Nơi để xe"
                                                        {{ array_search('Nơi để xe', $add_ons) !== false ? 'checked' : '' }}
                                                        type="checkbox"> Nơi để xe
                                                </label>
                                                <label for="chk-ani1">
                                                    <input class="checkbox_animated color-2 add_ons"
                                                        {{ array_search('Camera an ninh', $add_ons) !== false ? 'checked' : '' }}
                                                        value="Camera an ninh" type="checkbox"> Camera an ninh
                                                </label>
                                                <label for="chk-ani2">
                                                    <input class="checkbox_animated color-2 add_ons" value="Wifi miễn phí"
                                                        {{ array_search('Wifi miễn phí', $add_ons) !== false ? 'checked' : '' }}
                                                        type="checkbox"> Wifi miễn phí
                                                </label>
                                                <label for="chk-ani3">
                                                    <input class="checkbox_animated color-2 add_ons" value="Điều hòa"
                                                        {{ array_search('Điều hòa', $add_ons) !== false ? 'checked' : '' }}
                                                        type="checkbox"> Điều hòa
                                                </label>
                                                <label for="chk-ani4">
                                                    <input class="checkbox_animated color-2 add_ons"
                                                        {{ array_search('Bình nóng lạnh', $add_ons) !== false ? 'checked' : '' }}
                                                        value="Bình nóng lạnh" type="checkbox"> Bình nóng lạnh
                                                </label>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="next-btn d-flex">
                                        <button type="button" class="btn btn-dashed color-2 prev2 btn-pill"><i
                                                class="fas fa-arrow-left me-2"></i> Previous</button>
                                        <button type="button" id="complete_3"
                                            class="btn btn-gradient color-2 next3 btn-pill">Next <i
                                                class="fas fa-arrow-right ms-2"></i></button>
                                    </div>
                                </div>
                                <div class="wizard-step-4 d-none">
                                    <div class="complete-details">
                                        <div>
                                            <img src="{{ asset('assets/images/inner-pages/4.svg') }}" class="img-fluid"
                                                alt="">
                                            <h3>Cập nhật thành công</h3>

                                            @if ($room->status == null)
                                                <h6>Bạn đã điền đầy đủ thông tin, Hãy nhấn đăng bài để bài đăng phòng của
                                                    bạn
                                                    lên website</h6>
                                                <button type="submit" class="btn btn-dashed btn-pill color-1 prev3">Quay
                                                    lại</button>
                                                <a type="submit" href="{{ route('xuat_ban_phong', $room->id) }}"
                                                    class="btn btn-gradient color-2 step-again btn-pill">Đăng bài</a>
                                                <a type="submit" id="demo_room"
                                                    class="btn btn-gradient color-1 step-again btn-pill"
                                                    href="">Xem
                                                    trang mẫu</a>
                                            @else
                                                <a type="submit" id=""
                                                    class="btn btn-gradient color-1 step-again btn-pill"
                                                    href="{{ route('user.index') }}">Trang cá nhân</a>
                                            @endif
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

    <script>
        var DropzoneExample = function() {
            var DropzoneDemos = function() {

                // Upload ảnh chính phòng trọ
                Dropzone.options.singleFileUploadRoom = {
                    paramName: "file",
                    maxFiles: 1,
                    maxFilesize: 5,
                    acceptedFiles: "image/*",
                    addRemoveLinks: true,
                    renameFile: function(file) {

                        const d = new Date();
                        return "anh_phong_id_" + id + d.getTime() + file.name;
                    },
                    removedfile: function(file) {
                        var name = file.upload.filename;
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'PUT',
                            url: `{{ route('delete_image', ':path') }}`.replace(":path",
                                'main_room'),
                            data: {
                                filename: name
                            },
                            success: function(data) {
                                Path_main_image = Path_main_image_old;
                                $('#main_img').attr("src",
                                    `{{ url('/') }}/images/main_room/${Path_main_image}`
                                    );
                                console.log(data);
                            },
                            error: function(e) {
                                console.log(e);
                            }
                        });
                        var fileRef;
                        return (fileRef = file.previewElement) != null ?
                            fileRef.parentNode.removeChild(file.previewElement) : void 0;
                    },
                    success: function(file, response) {
                        Path_main_image = response.success;
                        $('#main_img').attr("src",
                            `{{ url('/') }}/images/main_room/${response.success}`);
                        console.log(response.success);
                    },
                    error: function(file, response) {
                        console.log(response);
                        return false;
                    },
                    init: function() {
                        this.on("addedfile", function() {
                            if (this.files[1] != null) {
                                this.removeFile(this.files[0]);
                            }
                        });
                    }
                };
                Dropzone.options.multiFileUploadRoom = {
                    paramName: "file",
                    maxFiles: 5,
                    maxFilesize: 5,
                    acceptedFiles: "image/*",
                    addRemoveLinks: true,
                    renameFile: function(file) {
                        const d = new Date();
                        return "anh_phong_id_" + id + d.getTime() + file.name;
                    },
                    removedfile: function(file) {
                        var name = file.upload.filename;
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'PUT',
                            url: `{{ route('delete_image', ':path') }}`.replace(":path",
                                'multi_room'),
                            data: {
                                filename: name
                            },
                            success: function(data) {

                                let index = Path_multi_image.indexOf(data.success);
                                if (index !== -1) {
                                    Path_multi_image.splice(index, 1);
                                }

                                console.log(Path_multi_image);
                            },
                            error: function(e) {
                                console.log(e);
                            }
                        });
                        var fileRef;
                        return (fileRef = file.previewElement) != null ?
                            fileRef.parentNode.removeChild(file.previewElement) : void 0;
                    },
                    success: function(file, response) {
                        Path_multi_image.push(response.success)

                        console.log(Path_multi_image);
                    },
                    error: function(file, response) {
                        console.log(response);
                        return false;
                    },
                    init: function() {
                        this.on("addedfile", function() {
                            if (this.files[5] != null) {
                                this.removeFile(this.files[0]);
                            }
                        });
                    }

                };
            }
            return {
                init: function() {
                    DropzoneDemos();

                }
            };
        }();
        DropzoneExample.init();
    </script>
    <!-- property wizard js -->
    <script src="{{ asset('assets/js/property-wizard.js') }}"></script>
    {{-- Xóa ảnh cũ --}}
    <script>
        var Path_main_image = '{{ $room->main_img }}';
        var Path_main_image_old = '{{ $room->main_img }}'
        var Path_multi_image = []
        var Path_multi_image_old = JSON.parse(<?= json_encode($room->list_img) ?>);
        var list = document.querySelectorAll('.delete_image_button');
        delete_old_image();

        function delete_old_image() {
            list.forEach(function(e) {
                e.onclick = function() {
                    name_img = e.getAttribute("name_img");
                    console.log(name_img);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'PUT',
                        url: `{{ route('delete_image_update', ':path') }}`.replace(":path",
                            'multi_room'),
                        data: {
                            filename: name_img,
                            id: id
                        },
                        success: function(data) {

                            let index = Path_multi_image_old.indexOf(data.success);
                            if (index !== -1) {
                                Path_multi_image_old.splice(index, 1);

                            }
                            updateListImg();
                            list = document.querySelectorAll('.delete_image_button');
                            delete_old_image();

                        },
                        error: function(e) {
                            console.log(e);
                        }
                    });
                }
            })
        }

        function updateListImg() {
            let divlist = document.getElementById('list_img');
            let html = "";
            if (Path_multi_image_old.length > 0) {
                Path_multi_image_old.forEach(function(e) {
                    html = ` ${html}   <div class="item_list_img" > <img src="{{ url('/') }}/images/multi_room/${e}"
                                                    class="item_img" alt="">
                                                <span class="delete_image_button" name_img="${e}">X</span> </div>`
                })
            }
            divlist.innerHTML = html;
        }
    </script>
    {{-- Lưu thông tin --}}
    <script>
        var district;
        var district_code = {{ $room->getWard->getDistrict->code }}
        var ward_id = {{ $room->ward_id }}
        $.ajax({
            type: "post",
            dataType: "json",
            data: {
                district_code: district_code
            },
            url: `{{ route('get_wards') }}`,
            success: function(data) {
                let html = " ";
                $.each(data.ward_list, function(index, value) {
                    if (value.code == ward_id) {
                        html =
                            `${html} <option value="${value.code}" selected>${value.name}</option>`
                    } else {
                        html =
                            `${html} <option value="${value.code}">${value.name}</option>`
                    }

                })

                $("#wards").html(html);
            }
        })


        $("#districts").find(".district").click(function(item) {
            district = $(this).html();
            district_code = $(this).attr("code");

            Microsoft.Maps.loadModule('Microsoft.Maps.Search', function() {
                var searchManager = new Microsoft.Maps.Search.SearchManager(map);
                var requestOptions = {
                    where: district + ', Việt Nam',
                    count: 1,
                    callback: function(searchResponse) {
                        var location = searchResponse.results[0].location;
                        map.setView({
                            center: location
                        });
                    }
                };
                searchManager.geocode(requestOptions);
            });
            $.ajax({
                type: "post",
                dataType: "json",
                data: {
                    district_code: district_code
                },
                url: `{{ route('get_wards') }}`,
                success: function(data) {
                    let html = " ";
                    $.each(data.ward_list, function(index, value) {
                        if (value.code == ward_id) {
                            html =
                                `${html} <option value="${value.code}" selected>${value.name}</option>`
                        } else {
                            html =
                                `${html} <option value="${value.code}">${value.name}</option>`
                        }
                    })

                    $("#wards").html(html);
                }
            })
        })
        $("#wards").change(function() {
            let wards = $(this).html();
            Microsoft.Maps.loadModule('Microsoft.Maps.Search', function() {
                var searchManager = new Microsoft.Maps.Search.SearchManager(map);
                var requestOptions = {
                    where: wards + ',' + district + ', Thai Nguyen' + ', Vietnam',
                    count: 1,
                    callback: function(searchResponse) {
                        console.log();
                        var location = searchResponse.results[0].location;
                        map.setView({
                            center: location
                        });
                    }
                };
                searchManager.geocode(requestOptions);
            });
        });
        var id = '{{ $room->id }}';
        $('#complete_1').on('click', function(ev) {
            var description = CKEDITOR.instances['description'].getData();
            var data = {
                id: id,
                user_id: {{ $user = auth()->user()->id }},
                name: $('#Name_room').val(),
                category: $('#category_room').html(),
                quantity: $('#number_room').val(),
                area: $('#area').val(),
                price: $('#price').val(),
                unit: $('#unit_room').html(),
                electric: $('#electric').val(),
                water: $('#water').val(),
                description: description
            }
            $.ajax({
                type: "post",
                dataType: "json",
                data: data,
                url: `{{ route('create_room_step_1') }}`,
                success: function(data) {
                    if (id == null && data.data.id != null) {
                        id = data.data.id

                    }
                    console.log(data);
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

                    } else {
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
                url: "{{ route('create_room_step_2', ':id') }}".replace(':id', id),
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
        // Lưu media 
        $('#complete_3').on('click', function(ev) {
            let add_ons = [];
            var add_on_list = document.querySelectorAll('.add_ons');
            $.each(add_on_list, function(key, value) {
                if (value.checked) {
                    add_ons.push(value.value);
                }
            })
            let data = {
                id: id,
                main_img: Path_main_image,
                list_img: Path_multi_image.concat(Path_multi_image_old),
                add_ons: add_ons,
                video_link: $('#video_link').val()

            }
            $.ajax({
                type: "PUT",
                dataType: "json",
                data: data,
                url: "{{ route('create_room_step_3', ':id') }}".replace(':id', id),
                success: function(data) {

                    console.log('data');
                    let route = "{{ route('demo_room', ':id') }}".replace(":id", id)
                    $('#demo_room').attr('href', route);
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
@endsection
