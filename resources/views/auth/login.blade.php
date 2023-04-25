@extends('layouts.dashboard.auth.layout')
@section('css')
    <style>

        .btn1 {
            border: none;
            outline: none;
            padding: 15px 29px;
            background-color: transparent;
            border-radius: 50px;
            font-size: 12px;
            color: #fff;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .btn1:hover {
            transform: translateY(5px);
        }

        .btn1--contact {
            background-color: #17375b;
        }

        .btn1--contact:hover {
            background-color: #4475e2;
        }

        .btn1--resume {
            border: 2px solid #4475e2;
            margin-left: 10px;

        }

        .btn1--resume:hover {
            background-color: #4475e2;
            color: #fff;
        }

    </style>
@stop
@section('content')

    <div class="container main-login">

        <div class="col-xs-12 col-md-4" >
            <h1 class="text-center" style="color: #fff;">{{ trans('ui.text.user_login') }}</h1>

            @if($errors->any())
                <br>
                @foreach($errors->all() as $error)
                    <div class="alert alert-error">
                        <button class="close" data-dismiss="alert"></button>
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            @endif

            <br>
            {!! Form::open(['url' => route('user.getMelliCode'), 'role' => 'form', 'class' => 'login-form validate', 'id' => 'login-form', 'name' => 'login-form']) !!}
            <div class="row">
                <div class="form-group col-xs-12">
                    <label class="form-label" for="melli_code" style="color: #fff;">{{ trans('ui.text.national_code') }}</label>
                    {!! Form::text('melli_code', null, ['class' => 'form-control', 'placeholder' => '', 'required', 'autofocus', 'id' => 'melli_code']) !!}
                </div>
            </div>

            <div class="plans">
                <div class="title">لطفا نوع شخص برای ثبت نام را انتخاب نمایید </div>
                <label class="plan basic-plan" for="basic">
                    <input checked type="radio" name="person_type" value="legal" id="basic" />
                    <div class="plan-content">
                        <div class="plan-details">
                            <span>شخص حقوقی</span>
                        </div>
                    </div>
                </label>
                <label class="plan complete-plan" for="complete">
                    <input type="radio" id="complete" value="true" name="person_type" />
                    <div class="plan-content">
                        <div class="plan-details">
                            <span>شخص حقیقی </span>
                        </div>
                    </div>
                </label>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <button class="btn1 btn1--contact" type="submit">ارسال  </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
{{--    <div class="container main-login" style="">--}}

{{--        <div class="col-xs-12 col-md-4" >--}}
{{--            <h1 class="text-center" style="color: #fff;">{{ trans('ui.text.user_login') }}</h1>--}}

{{--            @if($errors->any())--}}
{{--                <br>--}}
{{--                @foreach($errors->all() as $error)--}}
{{--                    <div class="alert alert-error">--}}
{{--                        <button class="close" data-dismiss="alert"></button>--}}
{{--                        <span>{{ $error }}</span>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            @endif--}}

{{--            <br>--}}

{{--            {!! Form::open(['url' => route('user.login'), 'role' => 'form', 'class' => 'login-form validate', 'id' => 'login-form', 'name' => 'login-form']) !!}--}}
{{--            <div class="row">--}}
{{--                <div class="form-group col-xs-12" >--}}
{{--                    <label class="form-label" for="email" style="color: #f9f2f4">{{ trans('ui.text.email') }}</label>--}}
{{--                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'username@domain.com', 'required', 'autofocus', 'id' => 'email']) !!}--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row">--}}
{{--                <div class="form-group col-xs-12">--}}
{{--                    <label class="form-label" for="password" style="color: #f9f2f4">{{ trans('ui.text.password') }}</label> <span--}}
{{--                        class="help"></span>--}}
{{--                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'password', 'required', 'id' => 'password']) !!}--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row">--}}
{{--                <div class="form-group col-xs-6">--}}
{{--                    <div class="checkbox checkbox check-success">--}}
{{--                        {{ Form::checkbox('remember', 1, true, ['id' => 'publish-flag']) }}--}}

{{--                        <label for="checkbox1">{!! trans('ui.text.remember-me') !!}</label>&nbsp;&nbsp;--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--            <div class="row">--}}
{{--                <div class="col-xs-4">--}}
{{--                    <a href="{{route('user.pre_register')}}" class="btn btn1 btn1--contact_support" >پیش ثبت نام </a>--}}

{{--                </div>--}}
{{--                <div class="col-xs-4">--}}
{{--                    <a href="{{route('user.register')}}" class="btn btn1 btn1--resume" > ورود با تلفن همراه </a>--}}

{{--                </div>--}}

{{--                <div class="col-xs-2">--}}
{{--                    <button class="btn1 btn1--resume" type="submit">ورود</button>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            {!! Form::close() !!}--}}
{{--        </div>--}}
{{--        </div>--}}



@endsection
