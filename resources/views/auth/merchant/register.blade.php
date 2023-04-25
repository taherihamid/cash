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
        .h-auto-a {
            height: 40px;
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


                    <!--end::Login Sign in form-->

                    <!--begin::Login Sign up form-->
                    <div class="login-signupo">
                        @if(count($errors) > 0)
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="agent-title-margin">
                            <h3>Become an Merchant</h3>

                        </div>
                            <form class="form" id="kt_login_signup_formr" method="post" action={{ route('merchant.registers') }}>
                                @csrf
                                <div class="form-container">
                                    <div class="form-group mb-1">
                                        <label for="full_name" class="col-md-12 text-md-left">{{ "Full Name" }} *</label>
                                        <input class="form-control h-auto-a form-control-solid py-4 px-8" type="text" placeholder="Full Name" value="{{ old("full_name") }}" name="full_name" required />
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="phone" class="col-md-12 text-md-left">{{ "Phone Number" }} *</label>
                                        <input class="form-control h-auto-a form-control-solid py-4 px-8" type="number" placeholder="Phone Number" value="{{ old("phone") }}" name="phone" autocomplete="off" required />
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="email" class="col-md-12 text-md-left">{{ "Email Address" }} *</label>
                                        <input class="form-control h-auto-a form-control-solid py-4 px-8" type="email" placeholder="Email Address" value="{{ old("email") }}" name="email" required/>
                                    </div>

                                    <div class="form-group mb-1">
                                        <label for="business" class="col-md-12  text-md-left">{{ "Business" }} *</label>
                                        <input class="form-control h-auto-a form-control-solid py-4 px-8" type="text" placeholder="Business Detail" value="{{ old("business") }}" name="business" required/>
                                    </div>
                                    <div class="form-group mb-1">
                                        <label for="business_detail" class="col-md-12 text-md-left">{{ "Business Detail" }} *</label>
                                        <input class="form-control h-auto-a form-control-solid py-4 px-8" type="text" placeholder="Business Detail" value="{{ old("business_detail") }}" name="business_detail" required/>
                                    </div>

                                </div>

                                <div class="form-group d-flex flex-wrap flex-center mt-2">
                                    <button id="kt_login_signup_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2" style="border-radius: 30px">Confirm</button>
                                    <button id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2" style="border-radius: 30px">Cancel</button>
                                </div>
                            </form>
                    </div>
                    <!--end::Login Sign up form-->

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
