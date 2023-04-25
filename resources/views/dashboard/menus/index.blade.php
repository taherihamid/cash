
@extends('layouts.dashboard.layout')

@section('js')
    <script type="text/javascript" src="{{url('dashboard/js/Sortable.min.js')}}"></script>
@stop

@section('title', trans('ui.text.setting'))
@section('content')

    <div class="line">
        <div class="alert alert-info">
            <span> @yield('title') {{ trans('ui.text.menus') }}</span>
        </div>

        <div class="row">
            <form action="{{route('admin.menu.main_menu_store')}}" method="post" enctype="multipart/form-data">

                <input type="hidden" name="slug" value="menu">

                <div class="col-lg-12">
                    @csrf

                    <div class="col-lg-3">
                        <div class="col-lg-12 pr-0">
                            <label class="form-label" for="name"> عنوان منو  </label>
                            <input type="text" class="form form-control" name="name"
                                   placeholder="{{ trans('ui.admin.setting.new_menu_title') }}" required>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="col-lg-12 pr-0">
                            <label class="form-label" for="english_name"> عنوان انگلیسی  </label>
                            <input type="text" class="form form-control" name="english_name"
                                   placeholder="{{ trans('ui.admin.setting.new_menu_title_english') }}" required>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="col-lg-12 pr-0">
                            <label class="form-label" for="slug"> slug   </label>
                            <input type="text" class="form form-control" name="slug"
                                   placeholder="{{ trans('ui.admin.setting.slug') }}" required>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-1">
                        <div class="col-lg-12  pull-right">
                            <button class="col-lg-12  special-green-button">{{ trans('ui.text.submit') }}</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="col-lg-12">
                <div class="table-responsive line">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="thead text-center"></th>
                            <th class="thead text-center">{{ trans('ui.admin.setting.title') }}</th>
                            <th class="thead text-center">{{ trans('ui.admin.setting.title_english') }}</th>
                            <th class="thead text-center">{{ trans('ui.admin.setting.slug') }}</th>
                            <th class="thead text-center ">{{ trans('ui.admin.setting.sub_menu') }}</th>
                            <th class="thead text-center">{{ trans('ui.text.edit') }}</th>
                            <th class="thead text-center">{{ trans('ui.text.delete') }}</th>

                        </tr>
                        </thead>
                        <tbody id="sortable-container" data-target="{{ url('dashboard/setting/sort') }}">
                        @foreach($menues as $key =>$value)
                            <tr class="@if($loop->odd) table-odd-or-even @endif table-active-hover ">

                                <th class="border-radius-0-6-6-0 border-top-none text-center">{{ toPersianNum($key+1) }}</th>
                                <td class="text-center">
                                                <span class="f-w-800 tooltip-{{$value->id}}"
                                                      data-tooltip-content="#tooltip_content-{{$value->id}}"> {{ $value->name }} </span>
                                    <div class="tooltip_templates">

                                    </div>
                                </td>
                                <td class="text-center"> {{ $value->english_name }}</td>
                                <td class="text-center"> {{ $value->slug }}</td>
                                {{--//show list items--}}

                                <td class="text-center"><a href="{{route('admin.menu.subMenu', ['id'=>$value->id])}}"
                                                           area-hidden="true">
                                        <i class="icon-action fa fa-list m-l-25"></i>
                                    </a></td>

                                {{--//edit main menu--}}

                                <td class="text-center"><a href="{{route('admin.menu.editMenu', ['id'=>$value->id])}}"
                                                           area-hidden="true">
                                        <i class="icon-action fa fa-edit m-l-25"></i>
                                    </a></td>
                                {{--//drop main menu--}}
                                <td class="text-center">
                                    <a class="border-none bg-transparent"
                                       href="{{route('admin.menu.dropMainMenu', ['id'=>$value->id])}}">
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

        <div class="text-center">
            {{--        {{ $values->links() }}--}}
        </div>

@endsection
