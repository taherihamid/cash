@extends('layouts.landing.layout.app')
@section('title', trans('ui.title.define_card'))
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.Bootstrap-PersianDateTimePicker.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('product_assets/style.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('product_assets/css/custom.css') }}" media="screen" />
    <link rel="stylesheet" href="{{ URL::asset('product_assets/css/colors.css') }}">
    <style>
        .popover-title {
            font-family: kara;
        }

        .table.table-striped {
            font-family: kara;
        }

        th {
            text-align: center;
        }

        .row {
            margin-top: 15px;
        }

        .appointment-form {
            box-shadow: none;
        }

    </style>
@stop
@section('scripts')
    <script src="{{ URL::asset('js/calendar.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('js/jquery.Bootstrap-PersianDateTimePicker.js') }}" type="text/javascript"></script>

@endsection
@section('content')

    <section>
        <div id="service" class="services wow fadeIn">
            <div class="container">
                <div class="row custom-row">
                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                        <div class="appointment-form">
                            <h3>دانلود اسناد فراخوان ارزیابی</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 block-center"
                                    style="text-align: center;margin-top:30px">
                                    <label for="name">
                                        <p>گزارش شناخت</p>
                                        <p>تعداد فایل : 1 فایل</p>
                                        <p>حجم فایل : 400 کیلو بایت</p>
                                        <a href="#" class="fa fa-download fa-3x"></a>
                                    </label>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 block-center"
                                    style="text-align: center;margin-top:30px">
                                    <label for="name">
                                        <p>گزارش شناخت</p>
                                        <p>تعداد فایل : 1 فایل</p>
                                        <p>حجم فایل : 400 کیلو بایت</p>
                                        <a href="#" class="fa fa-download fa-3x"></a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                        <div class="appointment-form">
                            <h3 style="margin-bottom: 30px">رسید دانلود اسناد</h3>
                            <p >
                                اسناد فراخوان ارزیابی به شماره () و عنوان () با شماره رسید () توسط شرکت پیمانکار دریافت گردید
                            </p>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12" style="margin-top: 30px;text-align:center">
                                    <button type="button" class="btn btn-primary">چاپ</button>
                                    <button type="button" class="btn btn-primary">بازگشت</button>
                                </div>
                            </div>
                        </div>
                    </div>




                    <!-- end section -->
    </section>
@endsection
