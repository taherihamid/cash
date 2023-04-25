@extends('layouts.dashboard.layout')
@section('title', trans('ui.text.dashboard'))

@section('content')
    <div id="container" class="dashboard-container"></div>
    <div class="row margin-10">
{{--        {{dd($card_purchased)}}--}}
{{--            @foreach($card_purchased as $card_purchases)--}}
{{--                <div class="col-lg-4">--}}
{{--                    <div class="box">--}}
{{--                        <div class="card-title">--}}
{{--                            {{ trans('ui.text.statistics_registered') }}--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            {{ ($card_purchases->title) }} - {{$card_purchases->with_card}}--}}
{{--                        </div>--}}
{{--                        <div class="card-statistics pull-right"> {{ random_int(2000,  6000) }}</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
    </div>
@endsection

@section('js')
    <script src="{{ url('dashboard/js/chart-js/moment.js') }}"></script>
    <script src="{{ url('dashboard/js/chart-js/chartjs.js') }}"></script>
    <script src="{{ url('dashboard/js/chart-js/utils.js') }}"></script>

    <script src="{{ url('dashboard/js/chart-js/highcharts.js') }}"></script>
    <script src="{{url('dashboard/js/chart-js/series-label.js')}}"></script>
    <script src="{{url('dashboard/js/chart-js/exporting.js')}}"></script>
    <script src="{{url('dashboard/js/chart-js/conf-chart.js')}}"></script>

@endsection
