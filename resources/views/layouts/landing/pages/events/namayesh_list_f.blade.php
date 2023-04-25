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
                                                        <label for="name">تاریخ ارسال به صفحه اعلان عمومی از</label>
                                                        <div>
                                                            <input type="text" class="form-control col-md-10"
                                                                id="exampleInput1" />
                                                            <span class="fa fa-calendar fa-2x col-md-2 text-primary"
                                                                data-mddatetimepicker="true"
                                                                data-targetselector="#exampleInput1"
                                                                data-trigger="click"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                        <label for="name">تا</label>
                                                        <div>
                                                            <input type="text" class="form-control col-md-10"
                                                                id="exampleInput2" />
                                                            <span class="fa fa-calendar fa-2x col-md-2 text-primary"
                                                                data-mddatetimepicker="true"
                                                                data-targetselector="#exampleInput2"
                                                                data-trigger="click"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                        <label for="name">استان محل اجرا</label>
                                                        <select name="" id="" class="form-control">
                                                            <option value="">استان</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                        <label for="name">شهر محل اجرا</label>
                                                        <select name="" id="" class="form-control">
                                                            <option value="">شهر</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12"
                                                style="margin-top: 30px;text-align:center">
                                                <button type="button" class="btn btn-primary">جستجو</button>
                                                <button type="button" class="btn btn-primary">پاک کردن نتایج جستجو</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">

                                                <table class="table table-bordered table-striped"
                                                    style="text-align: center">
                                                    <thead
                                                        style="color: white;background: linear-gradient(to right, #39b49a 0%, #1d86df 100%)">
                                                        <th>ردیف</th>
                                                        <th>شماره فراخوان</th>
                                                        <th>عنوان فراخوان</th>
                                                        <th>نوع فراخوان</th>
                                                        <th>استان</th>
                                                        <th>شهر</th>
                                                        <th>دستگاه اجرایی مناقصه گزار</th>
                                                        <th>شرح کلی حوزه فعالیت</th>
                                                        <th>زمان ارسال به صفحه اعلان عمومی</th>
                                                        <th>مهلت دریافت اسناد</th>
                                                        <th>زمان اخرین اصلاحات فراخوان</th>
                                                        <th>مهلت ارسال پاسخ فراخوان استعلام</th>
                                                        <th>مهلت ارسال پاکت های پیشنهاد</th>
                                                        <th>مشاهده تصویر اگهی</th>
                                                        <th>اضافه به فراخوان های من</th>
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
                                                            <td>1</td>
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
                                        </div>




                                        <!-- end section -->
    </section>
@endsection
