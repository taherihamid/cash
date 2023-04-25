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
                            <h3>ارسال پاسخ استعلام</h3>
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
                                                        <label for="name">نوع فراخوان</label>
                                                        <select name="" id="" class="form-control">
                                                            <option value="">همه موارد</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                        <label for="name">دستگاه اجرای مناقصه گزار</label>
                                                        <div>
                                                            <input type="text" class="form-control col-md-12" />

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                        <label for="name">مهلت ارسال پاسخ استعلام</label>
                                                        <div>
                                                            <input type="text" class="form-control col-md-10"
                                                                id="exampleInput2" />
                                                            <span class="fa fa-calendar fa-2x col-md-2 text-primary"
                                                                data-mddatetimepicker="true"
                                                                data-targetselector="#exampleInput2"
                                                                data-trigger="click"></span>
                                                        </div>
                                                    </div>
                                                    <label for="name">ساعت</label>
                                                    <div>
                                                        <input type="text"
                                                            class="form-control col-lg-1 col-md-1 col-sm-1 col-xs-12" />
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12"
                                                style="margin-top: 30px;text-align:center">
                                                <button type="button" class="btn btn-primary">مشاهده اسناد استعلام ارزیابی
                                                    کیفی</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h3 style="margin-bottom: 15px">مشخصات پاسخ استعلام</h3>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="name">مهلت ارسال پاسخ استعلام</label>
                                                    <div>
                                                        <input type="text" class="form-control col-md-10"
                                                            id="exampleInput3" />
                                                        <span class="fa fa-calendar fa-2x col-md-2 text-primary"
                                                            data-mddatetimepicker="true"
                                                            data-targetselector="#exampleInput3"
                                                            data-trigger="click"></span>
                                                    </div>
                                                </div>
                                                <label for="name">ساعت</label>
                                                <div>
                                                    <input type="text"
                                                        class="form-control col-lg-1 col-md-1 col-sm-1 col-xs-12" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="name">شماره پاسخ استعلام</label>
                                                    <div>
                                                        <input type="text" class="form-control col-md-10" />

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <h3>بارگزرای پاسخ استعلام</h3>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 block-center"
                                                style="text-align: center;margin-top:30px">
                                                <label for="name">
                                                    <p>بارگزاری پاسخ استعلام</p>
                                                    <a href="#" class="fa fa-download fa-3x"></a>
                                                </label>
                                                <div style="margin-top: 25px">
                                                    <button type="button" class="btn btn-primary">تایید و ارسال</button>
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
        </div>
        <!-- end section -->
    </section>
@endsection
