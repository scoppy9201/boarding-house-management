@php
    $currentRoute = \Route::currentRouteName();
@endphp

<style>
    .truncate-text {
      display: block;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
    }
  </style>

<div class="page-sidebar">
    <div class="logo-wrap">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/images/logo/13.png') }}" class="img-fluid  for-light" alt="">

        </a>
        <div class="back-btn d-lg-none d-inline-block">
            <i data-feather="chevrons-left"></i>
        </div>
    </div>
    <div class="main-sidebar">
        <div class="user-profile">
            <div class="d-flex align-items-center">
                <div class="change-pic">
                    <img src="{{ asset('images/user_avatar/' . Auth::user()->profile_photo_path) }}" class="img-fluid" style="width: 55px; height: 55px; border-radius: 100%"
                        alt="">
                </div>
                <div class="media-body w-25">
                    <a href="user-profile.html">
                        <h6>{{ Auth::user()->name }}</h6>
                    </a>
                    <span class="font-roboto text-truncate" id="truncatedText">{{ Auth::user()->email }}</span>
                </div>
            </div>
        </div>
        <div id="mainsidebar">
            <ul class="sidebar-menu custom-scrollbar">
                <li class="sidebar-item">
                    <a href="{{ route('home') }}"
                        class=" only-link {{ $currentRoute == 'home' ? 'active' : '' }}">
                        <i data-feather="airplay"></i>
                        <span>Trang chủ</span>

                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="javascript:void(0)"
                        class="sidebar-link  {{ ($currentRoute == 'loai_phong' || $currentRoute == 'ManagerRoom.index') ? 'active' : '' }}">
                        <i data-feather="home"></i>
                        <span>Quản Lý Phòng Trọ</span>
                    </a>
                    <ul class="nav-submenu menu-content d-block">
                        <li class="sidebar-item">
                            <a href="{{ route('loai_phong') }}">
                                <i data-feather="chevrons-right"></i>
                                Quản Lý Loại Phòng
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ManagerRoom.index') }}">
                                <i data-feather="chevrons-right"></i>
                                Quản lý Phòng
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="javascript:void(0)"
                        class="sidebar-link {{ ($currentRoute == 'categorynew.index' || $currentRoute == 'news.index') ? 'active' : '' }}">
                        <i data-feather="inbox"></i>
                        <span>Quản Lý Tin Tức</span>
                    </a>
                    <ul class="nav-submenu menu-content d-block">
                        <li>
                            <a href="{{ route('categorynew.index') }}">
                                <i data-feather="chevrons-right"></i>
                                Thể loại
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('news.index') }}">
                                <i data-feather="chevrons-right"></i>
                                Quản lý Bài Viết
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('account.index') }}"
                        class="sidebar-link only-link {{ ($currentRoute == 'account.index') ? 'active' : '' }}">
                        <i data-feather="users"></i>
                        <span>Quản Lý Tài Khoản</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="javascript:void(0)"
                        class="sidebar-link {{ ($currentRoute == 'menus.index') ? 'active' : '' }}">
                        <i data-feather="settings"></i>
                        <span>Cài đặt website</span>
                    </a>
                    <ul class="nav-submenu menu-content d-block" >
                        <li>
                            <a href="{{ route('menus.index') }}">
                                <i data-feather="chevrons-right"></i>
                                Menu Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('trang_chu') }}">
                                <i data-feather="chevrons-right"></i>
                                Thông tin website
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
