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
                            <h3>مشخصات فراخوان</h3>
                            <div class="form">
                                <fieldset>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">شماره فراخوان</label>
                                                        <input type="text" id="datePicker" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">عنوان فراخوان</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">دستگاه اجرایی مناقصه گر</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                                                        <label for="name">شرح کلی حوزه فعالیت</label>
                                                        <textarea name="" id="" class="form-control" cols="30" rows="4"
                                                            style="resize: none"></textarea>

                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                        <div class="col-lg-10 col-md-10">
                                                            <label for="name">تاریخ بازگشایی پاکت ها</label>
                                                            <div>
                                                                <input type="text" class="form-control col-md-10"
                                                                    id="exampleInput1" />
                                                                <span class="fa fa-calendar fa-2x col-md-2 text-primary"
                                                                    data-mddatetimepicker="true"
                                                                    data-targetselector="#exampleInput1"
                                                                    data-trigger="click"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-md-2" style="padding-right: 0">
                                                            <label for="name">ساعت</label>
                                                            <div>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>






                                        <div class="row">
                                            <h3 style="margin-bottom: 25px;">مشخصات پیشنهاد</h3>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                                style="margin-bottom: 25px;">
                                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                    <label for="name">شرح کلی حوزه فعالیت</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                    <div class="col-lg-10 col-md-10">
                                                        <label for="name">تاریخ بازگشایی پاکت ها</label>
                                                        <div>
                                                            <input type="text" class="form-control col-md-10"
                                                                id="exampleInput2" />
                                                            <span class="fa fa-calendar fa-2x col-md-2 text-primary"
                                                                data-mddatetimepicker="true"
                                                                data-targetselector="#exampleInput2"
                                                                data-trigger="click"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2" style="padding-right: 0">
                                                        <label for="name">ساعت</label>
                                                        <div>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                    <div class="col-lg-10 col-md-10">
                                                        <label for="name">تاریخ بازگشایی پاکت ها</label>
                                                        <div>
                                                            <input type="text" class="form-control col-md-10"
                                                                id="exampleInput3" />
                                                            <span class="fa fa-calendar fa-2x col-md-2 text-primary"
                                                                data-mddatetimepicker="true"
                                                                data-targetselector="#exampleInput3"
                                                                data-trigger="click"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2" style="padding-right: 0">
                                                        <label for="name">ساعت</label>
                                                        <div>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                    <div class="col-lg-10 col-md-10">
                                                        <label for="name">تاریخ بازگشایی پاکت ها</label>
                                                        <div>
                                                            <input type="text" class="form-control col-md-10"
                                                                id="exampleInput4" />
                                                            <span class="fa fa-calendar fa-2x col-md-2 text-primary"
                                                                data-mddatetimepicker="true"
                                                                data-targetselector="#exampleInput4"
                                                                data-trigger="click"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2" style="padding-right: 0">
                                                        <label for="name">ساعت</label>
                                                        <div>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <h3 style="margin-bottom: 25px">ارسال پاکت های پیشنهاد</h3>
                                                <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                    <table class="table table-bordered table-striped"
                                                        style="text-align: center">
                                                        <thead
                                                            style="color: white;background: linear-gradient(to right, #39b49a 0%, #1d86df 100%)">
                                                            <th>ردیف</th>
                                                            <th>عنوان پاکت</th>
                                                            <th>شرح</th>
                                                            <th>بارگزاری</th>
                                                            <th>وضعیت پاکت</th>
                                                            <th>حداکثر حجم</th>

                                                        </thead>
                                                        <tbody>
                                                            <tr>
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
                                            </div>
                                            <div class="row">
                                                <p style="margin-bottom: 25px;margin-right:20px">کاربر گرامی پس از بارگزاری
                                                    هر سه پاکت الف، ب و ج و پاسخ استعلام ارزیابی کیفی، کلیک دکمه تایید و
                                                    ارسال پاکتهای پیشنهاد جهت تکمیل فرانید ارسال پیشنهاد الزامی است</p>
                                                <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12" style="text-align: center">
                                                    <button type="button" class="btn btn-primary">تایید و ارسال پاکتهای پیشنهاد</button>
                                                    <button type="button" class="btn btn-primary">بازگشت</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>       <!-- end section -->
    </section>
@endsection
