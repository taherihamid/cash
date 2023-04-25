@extends('layouts.landing.layout.app')
@section('css')
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="assets/css/pages/login/classic/login-6.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <!--end::Page Custom Styles-->
@stop
@section('content')

    <!-- Landing Section -->

    <!--    --><?php //require("layout/modal.php"); ?>
@endsection
@section('scripts')
    <script src="{{ URL::asset('js/calendar.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('js/jquery.Bootstrap-PersianDateTimePicker.js') }}" type="text/javascript"></script>
    <script type="text/javascript">

        $('.modal-thumb').on('click', function () {
            var title = $(this).data('modal-title'),
                src = $(this).data('modal-src');
            console.log(title);
            $('#modal h4').text(title);
            $('#modal img').attr('src', src);
            $('#modal').modal('show');
        });
        $('.btn--resume').click(function () {
            $('#search_advanced').toggle();
        });
    </script>

@stop
