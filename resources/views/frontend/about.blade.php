@extends('layouts.app')

@section('style')
@endsection

@section('content')
 <!-- breadcrumb start -->
 <section class="breadcrumb-section p-0">
    <img src="../assets/images/inner-background.jpg" class="bg-img img-fluid" alt="">
    <div class="container">
        <div class="breadcrumb-content">
            <div>
                <h2>Trang giới thiệu</h2>
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('trang_chu') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Giới thiệu</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb end -->

<!-- About us section start -->
<section class="about-main ratio_36">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="title-2">
                    <h2>Sweet Home - Tìm phòng đơn giản, thuê phòng giản đơn</h2>
                    <p class="font-roboto">Nơi kết nối đơn giản giữa người thuê và chủ nhà. Tìm kiếm phòng trọ dễ dàng theo giá, vị trí và tiện nghi. Chủ nhà có thể quản lý thông tin và tương tác với khách hàng tiềm năng. Giao diện thân thiện và đặt phòng trực tuyến linh hoạt, là điểm đến tin cậy cho sinh viên, người làm việc và những người tìm kiếm ngôi nhà thoải mái.</p>
                </div>
                <div class="user-about">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7">
                            <div class="about-content">
                                <h3>Tại sao lại có Sweet Home ?</h3>
                                <p class="font-roboto">Sweet Home là một trang web quản lý và tìm kiếm phòng trọ tại các thành phố lớn. Nó được tạo ra để đáp ứng nhu cầu ngày càng tăng về việc tìm kiếm nơi ở thuận tiện và quản lý thông tin phòng trọ. Với giao diện thân thiện và tính năng đặt phòng linh hoạt, Sweet Home nhanh chóng trở thành một điểm đến tin cậy cho cộng đồng sinh viên và người làm việc. Nền tảng này cũng tạo cơ hội cho chủ nhà quản lý thông tin và tương tác với khách hàng tiềm năng một cách thuận lợi. Sweet Home không chỉ là một công cụ tìm kiếm nhà, mà còn là nơi kết nối cộng đồng, tạo ra một môi trường sống chung tích cực dựa trên phản hồi và đánh giá liên tục từ cả người thuê và chủ nhà.</p>
                            </div>
                        </div>
                        <div class="col-xl-7 map-image col-lg-5">
                            <img src="../assets/images/about/map.png" class="img-fluid bg-img" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('modal')
@endsection
@section('js')
@endsection
