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
                            <div class="col-md-8">

                                <form action="{{ route('admin.menu.store')}}" method="post">
                                    @csrf
                                    {{ method_field('POST') }}
                                    <input type="hidden" name="menu_id" value="{{$menu_id}}">

                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="title">عنوان</label>
                                                <input type="text" name="title" class="form form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="url">URL</label>
                                                <input type="text" name="url" class="form form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="route_name">ROUTE </label>
                                                <input type="text" name="route_name" class="form form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                                <label class="form-label" for="parameters">پارامتر ها(json)  </label>
                                                <input type="text" name="parameters" class="form form-control">
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="order">اولویت </label>
                                                <input type="text" name="order" class="form form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="parent_id">عضو والد</label>
                                                <select class="form form-control" name="parent_id">
                                                    <option selected disabled>عضو والد را انتخاب نمایید..</option>
                                                    <option value="0">ریشه منو </option>
                                                    @foreach($allMenus as $key => $value)
                                                        <option value="{{ $key }}">{{ $value}}</option>
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
                            <div class="col-md-4">
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
                        <hr>
                        <div class="col-lg-12">
                            <div class="table-responsive line">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="thead text-center"></th>
                                        <th class="thead text-center">{{ trans('ui.admin.setting.title') }}</th>
                                        <th class="thead text-center">{{ trans('ui.admin.setting.parent_name') }}</th>
                                        <th class="thead text-center">{{ trans('ui.admin.setting.order') }}</th>

                                        <th class="thead text-center">{{ trans('ui.text.edit') }}</th>
                                        <th class="thead text-center">{{ trans('ui.text.delete') }}</th>

                                    </tr>
                                    </thead>
                                    <tbody id="sortable-container" data-target="{{ url('dashboard/setting/sort') }}">
                                    @foreach($allMenusFullItems as $key =>$value)
                                        <tr class="@if($loop->odd) table-odd-or-even @endif table-active-hover ">

                                            <th class="border-radius-0-6-6-0 border-top-none text-center">{{ toPersianNum($key+1) }}</th>
                                            <td class="text-center">
                                                <span class="f-w-800 tooltip-{{$value->id}}"
                                                      data-tooltip-content="#tooltip_content-{{$value->id}}"> {{ $value->title }} </span>

                                            </td>

                                            <td class="text-center">
                                                {{  \App\MenuItems::where('id',$value->parent_id)->first() ?
                                                 \App\MenuItems::where('id',$value->parent_id)->first()->title
                                                 : 0 }}
                                            </td>
                                            <th class="border-radius-0-6-6-0 border-top-none text-center">{{ $value->order }}</th>
                                              {{--{{dd($menu_id)}}--}}
                                            <td class="text-center"><a href="{{route('admin.menu.editSubMenu', ['menu_id'=>$menu_id,'sub_menu_id'=>$value->id])}}"
                                                                       area-hidden="true">
                                                    <i class="icon-action fa fa-edit m-l-25"></i>
                                                </a></td>
                                            <td class="text-center">
                                                <a class="border-none bg-transparent"
                                                   href="{{route('admin.setting.dropSubMenuItem', ['id'=>$value->id])}}">
                                                    <i class="color-red icon-action m-l-10 fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
