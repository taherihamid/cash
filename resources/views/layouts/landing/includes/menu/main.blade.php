<?php
//$list = menu('منوی اصلی','_json');
//
//$item_data_decode = array_reverse(json_decode($list, true), true);
////dump($item_data_decode);
//?>


<ul>
    {{--    @foreach($item_data_decode as $item)--}}
    {{--            <li>--}}
    {{--                <a class="labels" @if($item['route']) href="{{route($item['route'], ['slug' =>$item['parameters']['slug']] )}}" @endif>{{ $item['title'] }}  @if($item['children']) <i class="fa fa-caret-down"></i>@endif</a>--}}

    {{--            @if($item['children'])--}}
    {{--            <ul id="dropDown">--}}
    {{--                @foreach($item['children'] as $sub_item)--}}

    {{--                    <li class="pro">--}}
    {{--                        <a class="labels"--}}
    {{--                           @if($sub_item['route']) href="{{route($sub_item['route'], ['slug' =>$sub_item['parameters']['slug']] )}}" @else--}}
    {{--                                href="{{$sub_item['url']}}"--}}
    {{--                           @endif--}}

    {{--                        >--}}
    {{--                            {{$sub_item['title']}}--}}
    {{--                            @if( $sub_item['children']) <i class="fas fa-angle-left"></i>@endif--}}
    {{--                        </a>--}}

    {{--                       @if($sub_item['children'] )--}}
    {{--                        <ul id="dropDown">--}}
    {{--                            @foreach($sub_item['children'] as $child)--}}
    {{--                                <a--}}
    {{--                                   @if($child['route']) href="{{route($child['route'], ['slug' =>$child['parameters']['slug']] )}}" @else--}}
    {{--                                   href="{{$child['url']}}"--}}
    {{--                                        @endif--}}

    {{--                                ><li> {{$child['title']}}</li> </a>--}}
    {{--                            @endforeach--}}
    {{--                        </ul>--}}
    {{--                        @endif--}}

    {{--                    </li>--}}
    {{--                @endforeach--}}

    {{--            </ul>--}}
    {{--            @endif--}}
    {{--            </li>--}}
    {{--    @endforeach--}}

{{--    @foreach($menus as $menu)--}}
{{--        <li>--}}

{{--            <a @if($menu->route_name) href="{{route(''.$menu->route_name.'')}}" @endif class="labels">--}}
{{--                @if(count($menu->childs) > 0) <i class="fa fa-caret-down"></i>@endif--}}
{{--                {{ $menu->title }}--}}
{{--            </a>--}}
{{--            --}}{{--            <pre>{{var_dump($menu['childs'])}}</pre>--}}

{{--            @if(count($menu['childs']))--}}
{{--                <ul id="dropDown">--}}
{{--                    @include('landing.includes.menu.menu_sub',['childs' => $menu['childs']->sortBy('order')])--}}
{{--                </ul>--}}
{{--            @endif--}}
{{--        </li>--}}
{{--    @endforeach--}}
    <li class="home"><a class="labels" href="/"><i class="fa fa-home"></i> صفحه اصلی</a></li>


</ul>

