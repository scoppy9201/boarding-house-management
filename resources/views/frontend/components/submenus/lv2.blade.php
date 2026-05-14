<ul class="nav-sub-childmenu level1">
    @foreach ($childs as $menu)
        <li><a href="{{ url($menu->location) }}">{{ $menu->name }}</a>
    @endforeach
</ul>
