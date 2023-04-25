@foreach($childs as $child)
    <li><a class="dropdown-item {{ count($child->childs) ? 'dropdown-toggle' :'' }}" href="#" style="border:1px solid #ccc;">{{ $child->title }}</a>
        @if(count($child->childs))
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="#" style="position: absolute;">
                        @include('menu.menusub',['childs' => $child->childs])
                    </a>
                </li>
            </ul>
        @endif
    </li>
@endforeach
