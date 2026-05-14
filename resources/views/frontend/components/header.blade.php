<!-- header start -->

<header class="header-4 fixed-header">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="menu">
                    <div class="brand-logo">
                        <a href="{{ route('trang_chu') }}">
                            <img src="{{ asset('assets/images/logo/13.png') }}" style="max-height:100px" alt=""
                                class="img-fluid for-light">

                        </a>
                    </div>
                    <nav>
                        <div class="main-navbar">
                            <div id="mainnav">
                                <div class="toggle-nav">
                                    <i class="fa fa-bars sidebar-bar"></i>
                                </div>
                                <ul class="nav-menu">
                                    <li class="back-btn">
                                        <div class="mobile-back text-end">
                                            <span>Quay lại</span>
                                            <i aria-hidden="true" class="fa fa-angle-right ps-2"></i>
                                        </div>
                                    </li>
                                    @foreach ($menus as $menu)
                                        @if (count($menu->Childs) == 0)
                                            <li class="">
                                                <a href="{{ url($menu->location) }}"
                                                    class="nav-link menu-title">{{ $menu->name }}</a>
                                            </li>
                                        @else
                                            <li class="dropdown">
                                                <a href="#" class="nav-link menu-title">{{ $menu->name }}</a>
                                                @include('frontend.components.submenus.lv1', [
                                                    'childs' => $menu->childs,
                                                ])
                                            </li>
                                        @endif
                                    @endforeach
                                    <li class="mobile-log-out ">
                                        <a href="{{ route('logout') }}" class="nav-link menu-title"
                                            onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"></i>Đăng
                                            xuất</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <ul class="header-right">
                        <li class="right-menu color-1">
                            <ul class="header-right">
                                <li class="right-menu color-1">
                                    <ul class="nav-menu">
                                        <li>
                                            <form class="search-box" action="{{ route('filter_room') }}" method="GET">
                                                @csrf
                                                <i class="fas fa-search search-icon"></i>
                                                <span class="font-roboto">Tìm </span>
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Tìm kiếm">
                                                </div>
                                            </form>
                                        </li>
                                        @if (Auth::user() != null)


                                            @if (Auth::check() && Auth::user()->role == 2)
                                                <li>
                                                    <a href="{{ route('room_create') }}">Đăng Phòng</a>
                                                </li>
                                            @endif
                                            <li class="dropdown cart">
                                                <a href="javascript:void(0)">
                                                    <i data-feather="bell"></i>
                                                    <span>{{ count($notification) }}</span>
                                                </a>

                                                <ul class="nav-submenu">
                                                    <li>
                                                        <h5>Thông báo</h5>
                                                    </li>
                                                    @foreach ($notification as $item)
                                                        <li style="margin-left: 0px">
                                                            <div class="media">
                                                                <div class="media-body">
                                                                    <a
                                                                        href="{{ route('notification.show', $item->id) }}">
                                                                        <h5>{{ $item->title }}</h5>
                                                                    </a>
                                                                    <span>{{ $item->updated_at->diffForHumans($current) }}</span>
                                                                </div>
                                                            </div>

                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="{{ route('user.index') }}"><i data-feather="user"></i></a>
                                            </li>
                                            <li class="desktop-log-out">
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><i
                                                        data-feather="log-out"></i></a>
                                            </li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        @endif

                                        @if (Auth::user() == null)
                                            <li>
                                                <a href="{{ route('login') }}"><strong>Đăng nhập</strong></a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</header>
<!--  header end -->
