<div class="page-main-header row">
    <div id="sidebar-toggle" class="toggle-sidebar col-auto">
        <i data-feather="chevrons-left"></i>
    </div>
    <div class="nav-right col p-0">
        <ul class="header-menu">

            <li>

            </li>
            <li>
                <a href="#!" onclick="javascript:toggleFullScreen()">
                    <i data-feather="maximize"></i>
                </a>
            </li>

            <li class="onhover-dropdown {{ count($notification) > 0 ? 'notification-box' : '' }}">
                <a href="javascript:void(0)">
                    <i data-feather="bell"></i>
                    <span class="label label-shadow label-pill notification-badge">{{ count($notification) }}</span>
                </a>
                <div class="notification-dropdown onhover-show-div">
                    <div class="dropdown-title">
                        <h6>Thông báo</h6>

                    </div>
                    <ul>
                        @if (count($notification) > 0)
                            @foreach ($notification as $item)
                                <li style="margin-left: 0px">
                                    <div class="media">
                                        <div class="media-body">
                                            <a href="{{ route('notification.show', $item->id) }}">
                                                <h5>{{ $item->title }}</h5>
                                            </a>
                                            <span>{{ $item->updated_at->diffForHumans($current) }}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <li style="margin-left: 0px">
                                <div class="media">
                                    <div class="text-center">
                                        <p>Chưa có thông báo mới</p>
                                    </div>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </li>

            <li class="profile-avatar onhover-dropdown">
                <div>
                    <img src="{{ asset('images/user_avatar/' . Auth::user()->profile_photo_path) }}" class="img-fluid"
                        alt="" style="width: 40px; height: 40px; border-radius: 100%">
                </div>
                <ul class="profile-dropdown onhover-show-div">
                    <li><a href="{{ route('profile.index') }}"><span>Tài khoản </span><i data-feather="user"></i></a>
                    </li>
                    <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span>Đăng
                                xuất</span><i data-feather="log-in"></i></a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </li>
        </ul>
    </div>
</div>
