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

                    <!--begin::Login Sign in form-->
                    <div class="login-signin">
                        @if(count($errors) > 0)
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="mb-20">
                            <h3>Login</h3>

                        </div>
                        <div class="form-container">
                            <form class="form" id="kt_login_signin_form1" method="post" action="{{ route('agent.logins') }}">
                                @csrf
                                <div class="form-group mb-5">
                                    <label for="email" class="col-md-12 col-form-label text-md-left">{{ "Personal ID" }}</label>
                                    <input class="form-control h-auto form-control-solid py-4 px-8" id="personal_id" type="text" placeholder="Personal ID" name="personal_id" autocomplete="off" />
                                </div>
                                <div class="form-group mb-5">
                                    <label for="password" class="col-md-12 col-form-label text-md-left">{{ "Password" }}</label>
                                    <input class="form-control h-auto form-control-solid py-4 px-8" id="password" type="password" placeholder="Password" name="password" />
                                </div>
                                <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="checkbox-inline">
                                        <label class="checkbox m-0">
                                            <input type="checkbox" name="remember" />
                                            <span></span>
                                            Remember me
                                        </label>
                                    </div>

                                </div>
                                <input id="kt_login_signin_submit" type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4 login-btn" value="Login">
                                <a href="javascript:;" id="kt_login_forgot" class="text-hover-primary">Forget Password ?</a>
                            </form>

                        </div>

                    </div>
                    <!--end::Login Sign in form-->


                    <!--begin::Login forgot password form-->
                    <div class="login-forgot">
                        <div class="mb-20">
                            <h3>Forgot Password ?</h3>

                        </div>
                        <div class="form-container">
                            <form class="form" id="kt_login_forgot_form" method="post" action="{{ route('agent.password.email') }}">
                                @csrf
                                <div class="form-group mb-10">
                                    <label for="fullName" class="col-md-12 col-form-label text-md-left">{{ "Email Address" }}</label>
                                    <input class="form-control form-control-solid h-auto py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off"/>
                                </div>
                                <div class="form-group d-flex flex-wrap flex-center mt-10">
                                    <button id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2 login-btn">Recive New Password</button>
                                    <div id="kt_login_forgot_cancel">Back to Login</div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!--end::Login forgot password form-->
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
