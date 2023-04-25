@extends('layouts.dashboard.layout')

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
            <form action="{{route('admin.setting.updateMenu')}}" method="post" enctype="multipart/form-data">

                <input type="hidden" name="slug" value="menu">
                <input type="hidden" name="menu_id" value="{{$menu->id}}">

                <div class="col-lg-12">
                    @csrf

                    <div class="col-lg-4">
                        <div class="col-lg-12 pr-0">
                            <input type="text" class="form form-control" name="name"
                                   placeholder="{{ trans('ui.admin.setting.new_menu_title') }}" value="{{$menu->name}}" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="col-lg-12 pr-0">
                            <input type="text" class="form form-control" name="english_name"
                                   placeholder="{{ trans('ui.admin.setting.new_menu_title_english') }}"  value="{{$menu->english_name}}" required>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-1">
                        <div class="col-lg-12  pull-right">
                            <button class="col-lg-12  special-green-button">{{ trans('ui.text.edit') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="text-center">
            {{--        {{ $values->links() }}--}}
        </div>

@endsection
