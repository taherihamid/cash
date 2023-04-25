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
                            <h3>ثبت ضمانت نامه بانکی / غیر بانکی</h3>
                            <div class="form">
                                <fieldset>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">شماره سهام / ضمانت نامه</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">نوع ضمانت نامه</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">مبلغ ضمانت نامه</label>
                                                        <input type="text" class="form-control" placeholder="ریال">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">بانک عامل / موسسه صادرکننده ضمانت نامه</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">

                                                        <label for="name">تاریخ صدور ضمانت نامه</label>
                                                        <div>
                                                            <input type="text" class="form-control col-md-10"
                                                                id="exampleInput1" />
                                                            <span class="fa fa-calendar fa-2x col-md-2 text-primary"
                                                                data-mddatetimepicker="true"
                                                                data-targetselector="#exampleInput1"
                                                                data-trigger="click"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">

                                                        <label for="name">تاریخ اعتبار</label>
                                                        <div>
                                                            <input type="text" class="form-control col-md-10"
                                                                id="exampleInput2" />
                                                            <span class="fa fa-calendar fa-2x col-md-2 text-primary"
                                                                data-mddatetimepicker="true"
                                                                data-targetselector="#exampleInput2"
                                                                data-trigger="click"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">موضوع ضمانت نامه</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">ضمانت نامه از طرف</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">ضمانت نامه برای</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-12 col-xs-12">
                                                        <label for="name">بابت قرارداد</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <p>توجه</p>
                                                        <p>استعلام ضمانت نامه بانکی صرفا با شماره سهام انجام می گردد.</p>
                                                        <p>
                                                            شماره سهام ضمانت نامه بانکی می بایست عددی 16 رقمی باشد. در غیر
                                                            اینصورت به بانک صادر کننده مراجعه و شماره کامل را دریافت نمائید.
                                                        </p>
                                                        <div style="text-align: center;margin-bottom:25px">
                                                            <button type="button" class="btn btn-primary">ثبت</button>
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
        </div>


        </div> <!-- end section -->
    </section>
@endsection
