<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <base href="../../../">
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title> {{ trans('ui.text.dashboard_title') }} | @yield('title')</title>
    <meta name="description" content="Initialized with local json data"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->


    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles-->
     @yield('css', '')
    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->
    <style>
        .sidbarBottom {
            background-color: #7f888d;
            border-radius: 15px;
            margin-top: -1%;
            color: white;
            padding: 10px;
            line-height: 10px;
            margin-left: 5%;
        }
    </style>
{{--    <link rel="shortcut icon" href="assets/media/logos/favicon.ico"/>--}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<!--end::Head-->

<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed page-loading">

@include('sweet::alert')
<!--begin::Header Mobile-->
<div id="kt_header_mobile" class="header-mobile align-items-center  header-mobile-fixed ">
    <!--begin::Logo-->
    <a href="index.html">
{{--        <img alt="Logo" class="w-45px" src="assets/media/logos/logo-letter-13.png"/>--}}
    </a>
    <!--end::Logo-->

    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
        <!--begin::Aside Mobile Toggle-->
        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
            <span></span>
        </button>
        <!--end::Aside Mobile Toggle-->

        <!--begin::Header Menu Mobile Toggle-->
        <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
            <span></span>
        </button>
        <!--end::Header Menu Mobile Toggle-->

        <!--begin::Topbar Mobile Toggle-->
        <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
			<span class="svg-icon svg-icon-xl"><!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
            fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span></button>
        <!--end::Topbar Mobile Toggle-->
    </div>
    <!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
    @include('layouts.agent.sidebar')

    <!--end::Aside-->

        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper_agent">
            <!--begin::Header-->
            <div id="kt_header" class="header  header-fixed ">
                <!--begin::Container-->
                <div class=" container-fluid  d-flex align-items-stretch justify-content-between">
                    <!--begin::Header Menu Wrapper-->
                    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                        <!--begin::Header Menu-->
                        <div id="kt_header_menu" class="header-menu header-menu-mobile  header-menu-layout-default ">

                        </div>
                        <!--end::Header Menu-->
                    </div>
                    <!--end::Header Menu Wrapper-->

                    @include('layouts.agent.topbar')
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
        @yield('content')


            <!--begin::Footer-->
            <div class="footer py-4 d-flex flex-lg-column " id="kt_footer">
                <!--begin::Container-->
{{--                <div--}}
{{--                    class=" container-fluid  d-flex flex-column flex-md-row align-items-center justify-content-between">--}}
{{--                    <!--begin::Copyright-->--}}
{{--                    <div class="text-dark order-2 order-md-1">--}}


{{--                    </div>--}}
{{--                    <!--end::Copyright-->--}}

{{--                    <!--begin::Nav-->--}}

{{--                    <!--end::Nav-->--}}
{{--                </div>--}}
                <!--end::Container-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->
@yield('modal')

<!-- begin::User Panel-->
<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
        <span class="label label-dark label-inline mr-2 scan-button" style="width: 250px; border-radius: 20px;height: 35px;font-size: 13px"> Scan or Enter Reference Code</span>


    </div>
    <span>
            Please scan or enter the reference code to see
payment details
        </span>
    <hr>
    <div class="btn-group btn-toggle">
        <button class="btn btn-default" data-toggle="collapse" data-target="#collapsible_scan"
                style="width: 150px; border-radius: 20px;">Scan Code</button>
        <button class="btn btn-primary active" data-toggle="collapse" data-target="#collapsible_code"
                style="width: 150px; border-radius: 20px;">Enter Code</button>
    </div>

    <div class="col-12">
        <form action="{{route('agents.get_invoice_detail')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col" style="margin-top: 30px">
                    <div class="form" style="width: 100%">
                        <label for="invoice_no" class="col-md-12 text-md-left">Invoice No</label>
                        <input type="text" class="form-control form-input" placeholder="Invoice No" name="invoice_no">
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 10px">
                    <button class="btn btn-primary" style="border-radius: 20px;width: 90%;margin-left: 5%;" type="submit">Accept</button>
            </div>
        </form>
    </div>
    <!--end::Header-->

</div>
<!-- end::User Panel-->


<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
	<span class="svg-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg--><svg
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
            viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
        <path
            d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
            fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span></div>
<!--end::Scrolltop-->
<script type="text/javascript" src="{{ url('dashboard/js/plugins/jquery/jquery-1.11.3.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
<script type="text/javascript" src="{{ url('js/sweetalert2.min.js') }}"></script>
<script>
    $('.btn-toggle').click(function() {
        $(this).find('.btn').toggleClass('active');

            $(this).find('.btn').toggleClass('btn-primary');

        $(this).find('.btn').toggleClass('btn-default');
    });

    var HOST_URL = {!! json_encode(url('/')) !!};

</script>
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
<!--end::Global Config-->
<script src="{{ mix('/js/app.js') }}"></script>
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="assets/plugins/global/plugins.bundle.js?v=7.0.6"></script>
<script src="assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
<script src="assets/js/scripts.bundle.js?v=7.0.6"></script>
<!--end::Global Theme Bundle-->


<!--begin::Page Scripts(used by this page)-->
<!--begin::Page Vendors(used by this page)-->
<script src="assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.6"></script>
<!--end::Page Vendors-->

<!--begin::Page Scripts(used by this page)-->
<script src="assets/js/pages/crud/datatables/data-sources/html.js?v=7.0.6"></script>
@yield('js')
<!--end::Page Scripts-->
<!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>
