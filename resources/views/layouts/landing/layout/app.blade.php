<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/png" href="image/icon/header/red-logo.png"/>
    <title>Cash2Pay</title>


     @yield('css')
{{--    @include('landing.layout.styles')--}}

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ URL::asset('assets/plugins/global/plugins.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/css/style.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles-->
    <script src="{{ url('js/sweetalert.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('style/pages/home.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/sweetalert.css') }}" media="screen" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        var BASE_URL = '{{ url("/") }}';
    </script>


</head>
<body class="hold-transition skin-blue sidebar-mini">
@include('sweet::alert')
<div class="wrapper">
{{--@include('landing.layout.navMobile')--}}
@include('layouts.landing.layout.header')
{{--@include('sweet::alert')--}}

<!-- Content Wrapper -->
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>

{{--@include('landing.layout.footer')--}}
{{--@include('landing.layout.modal')--}}

<script src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/adds.js') }}"></script>
<script src="{{ url('js/pages/home.js') }}"></script>
<script src="{{ url('js/plugin/persianber.min.js') }}"></script>
<script src="{{ url('js/plugin/jquery.touchSwipe.js') }}"></script>
<script src="{{ url('js/plugin/flickity-docs.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/global/plugins.bundle.js?v=7.0.6') }}"></script>
<script src="{{ URL::asset('assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6') }}"></script>
<script src="{{ URL::asset('assets/js/scripts.bundle.js?v=7.0.6') }}"></script>
@yield('scripts')
</body>
</html>



