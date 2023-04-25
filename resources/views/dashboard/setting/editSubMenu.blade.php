@extends('layouts.dashboard.layout')
@section('css')
    <style>
        .tree, .tree ul {
            margin:0;
            padding:0;
            list-style:none;
            direction: ltr;
        }
        .tree ul {
            margin-left:1em;
            position:relative
        }
        .tree ul ul {
            margin-left:.5em
        }
        .tree ul:before {
            content:"";
            display:block;
            width:0;
            position:absolute;
            top:0;
            bottom:0;
            left:0;
            border-left:1px solid
        }
        .tree li {
            margin:0;
            padding:0 1em;
            line-height:2em;
            color:#369;
            font-weight:700;
            position:relative
        }
        .tree ul li:before {
            content:"";
            display:block;
            width:10px;
            height:0;
            border-top:1px solid;
            margin-top:-1px;
            position:absolute;
            top:1em;
            left:0
        }
        .tree ul li:last-child:before {
            background:#fff;
            height:auto;
            top:1em;
            bottom:0
        }
        .indicator {
            margin-right:5px;
        }
        .tree li a {
            text-decoration: none;
            color:#369;
        }
        .tree li button, .tree li button:active, .tree li button:focus {
            text-decoration: none;
            color:#369;
            border:none;
            background:transparent;
            margin:0px 0px 0px 0px;
            padding:0px 0px 0px 0px;
            outline: 0;
        }
    </style>
@stop
@section('js')
    <script type="text/javascript" src="{{url('dashboard/js/Sortable.min.js')}}"></script>
@stop

@section('title', trans('ui.text.setting'))
@section('content')

    <div class="line">
        <div class="alert alert-info">
            <span> @yield('title') {{ trans('ui.text.menusEdit') }}</span>
        </div>
        <div class="row">
            <div class="col-md-12 offset-md-1 mt-4">
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">

                                <form action="{{ route('admin.menu.update')}}" method="post">
                                    @csrf
                                    {{ method_field('POST') }}
                                    <input type="hidden" name="sub_menu_id" value="{{$sub_menu_id}}">

                                    <div class="row">
                                        <div class="col-md-4 mr-1">
                                            <div class="form-group">
                                                <label class="form-label" for="title">عنوان</label>
                                                <input type="text" name="title" class="form form-control" value="{{\App\MenuItems::find($sub_menu_id)->title}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mr-1">
                                            <div class="form-group">
                                                <label class="form-label" for="url">URL</label>
                                                <input type="text" name="url" class="form form-control" value="{{\App\MenuItems::find($sub_menu_id)->url}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 mr-1">
                                            <div class="form-group">
                                                <label class="form-label" for="route_name">ROUTE</label>
                                                <input type="text" name="route_name" class="form form-control" value="{{\App\MenuItems::find($sub_menu_id)->route_name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mr-1">
                                            <div class="form-group">
                                                <label class="form-label" for="parameters">پارامتر ها (JSON)</label>
                                                <input type="text" name="parameters" class="form form-control" value="{{\App\MenuItems::find($sub_menu_id)->parameters}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mr-1">
                                            <div class="form-group">
                                                <label class="form-label" for="order">اولویت</label>
                                                <input type="text" name="order" class="form form-control" value="{{\App\MenuItems::find($sub_menu_id)->order}}">
                                            </div>
                                        </div>

                                        <div class="col-md-3 mr-1">
                                            <div class="form-group">
                                                <label class="form-label" for="parent_id">عضو والد</label>
                                                <select class="form form-control" name="parent_id">
                                                    <option selected disabled>عضو والد را انتخاب نمایید..</option>
                                                    <option value="0" {{ \App\MenuItems::find($sub_menu_id)->parent_id  == 0 ? "selected" : "" }}> ریشه منو </option>
                                                    @foreach($allMenus as $key => $value)
                                                        <option {{ \App\MenuItems::find($sub_menu_id)->parent_id  == $key ? "selected" : "" }} value="{{ $key }}">{{ $value}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-success">ذخیره</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3" style="margin-right: -3%">

                                <ul class="tree">
                                    @foreach($menus as $menu)
                                        <li>
                                            {{ $menu->title }}
                                            @if(count($menu->childs))
                                                @include('dashboard.setting.manageChild',['childs' => $menu->childs])
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
