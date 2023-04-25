@extends('layouts.landing.layout.app')
@section('css')
    <!--begin::Page Custom Styles(used by this page)-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ URL::asset('assets/css/pages/login/classic/login-4.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
    <!--end::Page Custom Styles-->
    <style>
        .form-container {
            background-color: darkgray;
            padding: 14px;
            border-radius: 8px;
        }
        .agent-title-margin {
            margin-bottom: 1rem !important;
            margin-top: -5rem !important;
        }
        .login-btn {
            width: 95% !important;
            border-radius: 30px !important;
        }
    </style>
    <!--end::Page Custom Styles-->
@stop
@section('content')

    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-3.jpg');">
                <div class="login-form text-center p-7 position-relative overflow-hidden">
                    <!--begin::Login Header-->
                    <div class="d-flex flex-center mb-15">
                        <a href="#">
                            <img src="assets/media/logos/logo-letter-13.png" class="max-h-75px" alt=""/>
                        </a>
                    </div>
                    <!--end::Login Header-->
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
                    <!--begin::Login Sign in form-->
                    <div class="login-signin">
                        <div class="mb-20">
                            <h3>Admin Login</h3>

                        </div>
                        {!! Form::open(['url' => route('admin.login.submit'), 'role' => 'form', 'class' => 'login-form validate', 'id' => 'login-form', 'name' => 'login-form']) !!}

                         <div class="form-container">

                                <div class="form-group mb-5">
                                    <label for="fullName" class="col-md-12 col-form-label text-md-left">{{ "Email Address" }}</label>
                                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'username@domain.com', 'required', 'autofocus', 'id' => 'email']) !!}                                </div>
                                <div class="form-group mb-5">
                                    <label for="fullName" class="col-md-12 col-form-label text-md-left">{{ "Password" }}</label>
                                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'password', 'required', 'id' => 'password']) !!}
                                </div>
                                <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="checkbox-inline">
                                        <label class="checkbox m-0">
                                            {{ Form::checkbox('remember', 1, true, ['id' => 'publish-flag']) }}
                                            <span></span>
                                            Remember me
                                        </label>
                                    </div>

                                </div>
                                <button type="submit" id="login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4 login-btn">Login</button>
                                {!! Form::close() !!}


                        </div>

                    </div>
                    <!--end::Login Sign in form-->

                </div>
            </div>
        </div>
        <!--end::Login-->
    </div>


    <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>

    <!--    --><?php //require("layout/modal.php"); ?>
@endsection
@section('scripts')
    <script src="{{ URL::asset('assets/js/pages/custom/login/login-general.js?v=7.0.6') }}"></script>
@stop
@section('content')
    <div class="container">
        <div class="col-xs-12 col-md-3"></div>
        <div class="col-xs-12 col-md-6">
            <h1 class="text-center">{{ trans('ui.text.login') }}</h1>



            {!! Form::open(['url' => route('admin.login.submit'), 'role' => 'form', 'class' => 'login-form validate', 'id' => 'login-form', 'name' => 'login-form']) !!}
            <div class="row">
                <div class="form-group col-xs-12">
                    <label class="form-label" for="email">{{ trans('ui.text.email') }}</label>
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'username@domain.com', 'required', 'autofocus', 'id' => 'email']) !!}
                </div>
            </div>

            <div class="row">
                <div class="form-group col-xs-12">
                    <label class="form-label" for="password">{{ trans('ui.text.password') }}</label> <span class="help"></span>
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'password', 'required', 'id' => 'password']) !!}
                </div>
            </div>

            <div class="row">
                <div class="form-group col-xs-12">
                    <div class="checkbox checkbox check-success">
                        {{ Form::checkbox('remember', 1, true, ['id' => 'publish-flag']) }}

                        <label for="checkbox1">{!! trans('ui.text.remember-me') !!}</label>&nbsp;&nbsp;

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-login btn-cons col-xs-12" type="submit">{{ trans('ui.text.login') }}</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection