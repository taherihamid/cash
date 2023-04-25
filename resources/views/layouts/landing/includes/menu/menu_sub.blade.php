
@foreach($childs as $child)

    <li class="pro">
        <a class="labels" @if($child->route_name) href="{{route(''.$child->route_name.'')}}" @endif >
            @if(count($child->childs))
                <i class="fas fa-angle-left"></i>
            @endif
                {{ $child->title }}
        </a>
        @if(count($child->childs))
            <ul id="dropDown">
                <li class="pro">
                    <a class="labels">
                        @include('layouts.landing.includes.menu.menu_sub',['childs' => $child->childs])
                    </a>
                </li>
            </ul>
        @endif
    </li>
@endforeach
