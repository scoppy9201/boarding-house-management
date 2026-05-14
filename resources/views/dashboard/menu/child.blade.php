<ul>
    @foreach($childs as $child)
       <li>
           {{ $child->name }}
           <a href="{{route('menus.delete', $child->id)}}">X</a>
       @if(count($child->childs))
                @include('dashboard.menu.child',['childs' => $child->childs])
            @endif
       </li>
    @endforeach
    </ul>