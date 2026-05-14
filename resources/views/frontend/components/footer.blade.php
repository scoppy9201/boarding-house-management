 <!-- footer start -->
 <footer>
    <div class="sub-footer footer-light">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="copy-right">
                        <p class="mb-0" >Copyright © {{ Carbon\Carbon::now()->year }} <a href="">Sweet Home</a>. <span style="font-weight: 300">All rights reserved.</span></p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 text-end">
                    <ul class="sub-footer-link">
                        <li><a href="{{ route('trang_chu') }}">Trang chủ</a></li>
                        <li><a href="{{ route('about') }}">Giới thiệu</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->