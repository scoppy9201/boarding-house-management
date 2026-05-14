<ul class="nav-submenu menu-content">
    @foreach ($childs as $menu)
        @if (count($menu->Childs) == 0)
        <li><a href="{{ url($menu->location) }}">{{ $menu->name }}</a>
            @else
            <li>
                <a href="#" class="submenu-title">{{ $menu->name }}</a>
                @include('frontend.components.submenus.lv2', ['childs' => $menu->childs])
            </li>
        @endif
    @endforeach
</ul>
