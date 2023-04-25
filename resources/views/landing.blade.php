@extends('layouts.landing.layout.app')
@section('css')

@stop
@section('content')

    <!-- Landing Section -->
    <section class="landing" id="welcome-section">
        <div class="container">
            <div class="text">
                <h1 style="color: #fd6d00">welcome to Cash2Pay</h1>
                <span>Cash2Pay service is cool.!</span>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <div class="btns-group">
                    <a href="#projects" class="btn btn-primary" style="background-color: #f2911b;border-color: #f2911b;">let's explorer</a>
                    <a href="{{route('demo')}}" class="btn btn-info">Demo Cash2Pay</a>
                </div>
            </div>
            <div class="image">
                <img src="{{ URL::asset('assets/media/logos/Cash2Paymain.png') }}">
            </div>
        </div>
    </section>
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
