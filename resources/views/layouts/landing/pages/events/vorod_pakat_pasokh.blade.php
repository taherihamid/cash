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
                            <div class="form">
                                <fieldset>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h3 style="margin-bottom: 25px;">پاسخ استعلام ارزیابی کیفی مناقصه گر</h3>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div style="direction: ltr">
                                                    <button type="button" class="btn btn-primary">افزودن فایل جدید</button>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">

                                            <table class="table table-bordered table-striped" style="text-align: center;margin-top:25px">
                                                <thead
                                                    style="color: white;background: linear-gradient(to right, #39b49a 0%, #1d86df 100%)">
                                                    <th>ردیف</th>
                                                    <th>عنوان فایل</th>
                                                    <th>فرمت</th>
                                                    <th>حجم</th>
                                                    <th>شرح فایل</th>
                                                    <th>تاریخ ایجاد</th>
                                                    <th>عملیات</th>


                                                </thead>
                                                <tbody>
                                                    <tr>

                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>



                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div style="margin-right: 20px">
                                            <p> توضیحات مربوط به فرمت ها و حجم فایل ها قابل پیوست در اینجا یادداشت می گردد</p>
                                        </div>
                                        <div style="text-align: center">
                                            <button type="button" class="btn btn-primary">بازگشت</button>
                                        </div>
                                    </div>


    </section>
@endsection
