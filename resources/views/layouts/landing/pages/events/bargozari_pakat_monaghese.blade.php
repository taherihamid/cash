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
                            <h3>بارگزاری پاکت الف - اطلاعات تضمین شرکت در مناقصه</h3>
                            <div class="form">
                                <fieldset>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">مبلغ تضمین مناقصه</label>
                                                        <input type="text" class="form-control" placeholder="ریال">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">سرجمع مبالغ ضمانت نامه های ثبت</label>
                                                        <input type="text" class="form-control" placeholder="ریال">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>




                                        <div class="row">
                                            <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12"
                                                style="text-align: left;margin-bottom:25px">

                                                <button type="button" class="btn btn-primary">افزودن سطر جدید</button>
                                            </div>
                                            <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                <table class="table table-bordered table-striped"
                                                    style="text-align: center">
                                                    <thead
                                                        style="color: white;background: linear-gradient(to right, #39b49a 0%, #1d86df 100%)">
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th>ضمانت نامه بانکی / غیر بانکی</th>

                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>ردیف</td>
                                                            <td>شماره سهام</td>
                                                            <td>تاریخ صدور</td>
                                                            <td>مبلغ به ریال</td>
                                                            <td>نوع ضمانت نامه</td>
                                                            <td>بانک عامل / موسسه صادرکننده</td>
                                                            <td>موضوع</td>
                                                            <td>ضمانت نامه از طرف</td>
                                                            <td>ضمانت نامه</td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12"
                                                style="text-align: left;margin-bottom:25px">

                                                <button type="button" class="btn btn-primary">افزودن سطر جدید</button>
                                            </div>
                                            <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                <table class="table table-bordered table-striped"
                                                    style="text-align: center">
                                                    <thead
                                                        style="color: white;background: linear-gradient(to right, #39b49a 0%, #1d86df 100%)">
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th>ثبت فیش بانکی</th>

                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>ردیف</td>
                                                            <td>شماره سهام</td>
                                                            <td>تاریخ صدور</td>
                                                            <td>مبلغ به ریال</td>
                                                            <td>نوع ضمانت نامه</td>
                                                            <td>بانک عامل / موسسه صادرکننده</td>
                                                            <td>موضوع</td>
                                                            <td>ضمانت نامه از طرف</td>
                                                            <td>ضمانت نامه</td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12"
                                                style="text-align: left;margin-bottom:25px">

                                                <button type="button" class="btn btn-primary">افزودن سطر جدید</button>
                                            </div>
                                            <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                <table class="table table-bordered table-striped"
                                                    style="text-align: center">
                                                    <thead
                                                        style="color: white;background: linear-gradient(to right, #39b49a 0%, #1d86df 100%)">
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th>ثبت اوزاق مشارکت</th>

                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>ردیف</td>
                                                            <td>شماره سهام</td>
                                                            <td>تاریخ صدور</td>
                                                            <td>مبلغ به ریال</td>
                                                            <td>نوع ضمانت نامه</td>
                                                            <td>بانک عامل / موسسه صادرکننده</td>
                                                            <td>موضوع</td>
                                                            <td>ضمانت نامه از طرف</td>
                                                            <td>ضمانت نامه</td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12"
                                                style="text-align: left;margin-bottom:25px">

                                                <button type="button" class="btn btn-primary">افزودن سطر جدید</button>
                                            </div>
                                            <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                <table class="table table-bordered table-striped"
                                                    style="text-align: center">
                                                    <thead
                                                        style="color: white;background: linear-gradient(to right, #39b49a 0%, #1d86df 100%)">
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th>ثبت وثیقه ملکی</th>

                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>ردیف</td>
                                                            <td>شماره سهام</td>
                                                            <td>تاریخ صدور</td>
                                                            <td>مبلغ به ریال</td>
                                                            <td>نوع ضمانت نامه</td>
                                                            <td>بانک عامل / موسسه صادرکننده</td>
                                                            <td>موضوع</td>
                                                            <td>ضمانت نامه از طرف</td>
                                                            <td>ضمانت نامه</td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div> <!-- end section -->
    </section>
@endsection
