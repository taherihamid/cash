@extends('layouts.dashboard.layout')

@section('js')
    <script type="text/javascript" src="{{url('dashboard/js/Sortable.min.js')}}"></script>
@stop

@section('title', trans('ui.text.setting'))
@section('content')

    <div class="line">
        <div class="alert alert-info">
            <span> @yield('title') {{ trans('ui.text.settings') }}</span>
        </div>


@endsection
