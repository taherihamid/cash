@extends('layouts.dashboard.layout')
@section('title', trans('ui.text.events'))
@section('content')
    <div class=" line">
        <div class="alert alert-info">
            <span>@yield('title')  {{trans('ui.text.recent')}}</span>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-3 options">
            <input type="text" class="form form-control" placeholder="{{trans('ui.text.search')}}">
            <br>
            {{--<div class="label label-danger">    رخداد ها بعد از یک ماه به طور خودکار حذف خواهند شد</div>--}}

        </div>
    </div>

    <div class=" line options">

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th class="thead text-center"></th>
                    <th class="thead text-center">{{trans('ui.text.description')}}</th>
                    <th class="thead text-center">{{trans('ui.text.email')}}</th>
                    <th class="thead text-center">{{trans('ui.text.event')}}</th>
                    <th class="thead text-center">{{trans('ui.text.ip')}}</th>
                    <th class="thead text-center">{{trans('ui.text.created-at')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($admin_login_attempts as $admin_login_attempt)
                    <tr class="@if($loop->odd) active @endif">
                        <th class="border-radius-0-6-6-0 border-top-none text-center">{{ toPersianNum(($admin_login_attempts->total()-$loop->index)-(($admin_login_attempts->currentpage()-1) * $admin_login_attempts->perpage())) }}</th>

                        <td class="text-center col-lg-1">
                            <span class="col-lg-12 label label-{{\App\Classes\Response::log_label($admin_login_attempt)['class']}}">
                                {{ \App\Classes\Response::log_label($admin_login_attempt)['text']}}
                            </span>
                        </td>
                        <td class="text-center col-lg-2">{{ $admin_login_attempt->email }}</td>
                        <td class="text-center ">{{ $admin_login_attempt->reason }}</td>
                        <td class="text-center">{{ toPersianNum($admin_login_attempt->ip) }}</td>
                        <td dir="ltr" class="border-radius-0-6-6-0 text-center">
                            {{ toPersianNum(jdate($admin_login_attempt->created_at)->format('Y-m-d H:i:s')) }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center">
        {{ $admin_login_attempts->links() }}
    </div>
@endsection
