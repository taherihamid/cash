@extends('layouts.landing.layout.app')
@section('title', trans('ui.title.define_card'))
@section('css')
<<<<<<< HEAD
<<<<<<< HEAD
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('product_assets/style.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('product_assets/css/custom.css') }}" media="screen" />
=======
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('product_assets/style.css') }}" media="screen"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('product_assets/css/custom.css') }}" media="screen"/>
>>>>>>> master
=======
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('product_assets/style.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('product_assets/css/custom.css') }}" media="screen" />
>>>>>>> origin
    <link rel="stylesheet" href="{{ URL::asset('product_assets/css/colors.css') }}">
@stop
@section('content')

    <section>
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin
        {{-- <div id="home" class="parallax first-section wow fadeIn" data-stellar-background-ratio="0.4" --}}
        {{-- style="background-image:url('prod guct_assets/images/slider-bg.png');"> --}}

        {{-- <!-- end container --> --}}
        {{-- </div> --}}
        <!-- end section -->
<<<<<<< HEAD
=======
    {{--        <div id="home" class="parallax first-section wow fadeIn" data-stellar-background-ratio="0.4"--}}
    {{--             style="background-image:url('prod guct_assets/images/slider-bg.png');">--}}

    {{--            <!-- end container -->--}}
    {{--        </div>--}}
    <!-- end section -->
>>>>>>> master
=======
>>>>>>> origin

        <div id="service" class="services wow fadeIn">
            <div class="container" style="direction: rtl">
                <div class="row custom-row">

                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                        <div class="appointment-form">
                            <h3> مشاهده اطلاعات فراخوان (عنوان فراخوان)</h3>
                            <div class="form">
                                <fieldset>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<<<<<<< HEAD
<<<<<<< HEAD
                                        <div class="row">
=======
                                        <div class="row flex-row">
>>>>>>> master
=======
                                        <div class="row">
>>>>>>> origin
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row flex-row">
                                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">شماره فراخوان قبلی</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-4 col-sm-6 col-xs-12">
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin
                                                        <div class="grey-div">
                                                            <p style="margin-right: 10px">شماره
                                                                فراخوان قبلی</p>
                                                        </div>
<<<<<<< HEAD
=======
                                                        <div class="grey-div"><p style="margin-right: 10px">شماره
                                                                فراخوان قبلی</p></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row flex-row">
                                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name"> <span class="nice-blue">{{trans('ui.text.full_time')}}</span></label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-4 col-sm-6 col-xs-12">
                                                        <p style="margin-right: 10px"><i class="fas fa-check-square"></i></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row flex-row">
                                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name"> <span class="nice-blue"></span></label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-4 col-sm-6 col-xs-12">
                                                        <p style="margin-right: 10px"><i class="fas fa-check-square"></i></p>
>>>>>>> master
=======
>>>>>>> origin
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4  options">
<<<<<<< HEAD
<<<<<<< HEAD
                                                <div class="col-lg-3 nice-blue m-t-5 p-0">
                                                    {{ trans('ui.text.education_system') }}</div>
=======
                                                <div
                                                    class="col-lg-3 nice-blue m-t-5 p-0">{{trans('ui.text.education_system')}}</div>
>>>>>>> master
=======
                                                <div class="col-lg-3 nice-blue m-t-5 p-0">
                                                    {{ trans('ui.text.education_system') }}</div>
>>>>>>> origin

                                                <div class="col-lg-9 line">
                                                    <div class="col-lg-6">
                                                        <label class="radiobox">
                                                            <input type="radio" value="fullTime" checked=""
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin
                                                                name="education_systems">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="nice-blue">{{ trans('ui.text.full_time') }}</span>
<<<<<<< HEAD
=======
                                                                   name="education_systems">
                                                            <span class="checkmark"></span>
                                                        </label>

>>>>>>> master
=======
>>>>>>> origin
                                                    </div>

                                                    <span class="vr"></span>

                                                    <div class="col-lg-6">
                                                        <label class="radiobox">
                                                            <input type="radio" checked value="partTime"
                                                                name="education_systems">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="nice-blue">
                                                            {{ trans('ui.text.part_time') }}</span>
<<<<<<< HEAD
=======
                                                                   name="education_systems">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="nice-blue"> {{trans('ui.text.part_time')}}</span>
>>>>>>> master
=======
>>>>>>> origin
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="appointment-form">
                            <h3> مشخصات فراخوان </h3>
                            <div class="form">
                                <fieldset>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row flex-row">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row flex-row">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">شماره فراخوان</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-4 col-sm-6 col-xs-12">
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <div class="grey-div">
                                                            <p>شماره فراخوان قبلی </p>
                                                        </div>
=======
                                                        <div class="grey-div"><p>شماره فراخوان قبلی </p></div>
>>>>>>> master
=======
                                                        <div class="grey-div">
                                                            <p>شماره فراخوان قبلی </p>
                                                        </div>
>>>>>>> origin

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row flex-row">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">کلید واژه : </label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-4 col-sm-6 col-xs-12">
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin
                                                        <div class="grey-div">
                                                            <p style="margin-right: 10px">کلید
                                                                واژه </p>
                                                        </div>
                                                        {{-- <input type="text" id="name" placeholder="کلید واژه " class="form form-control" disabled/> --}}
<<<<<<< HEAD
=======
                                                        <div class="grey-div"><p style="margin-right: 10px">کلید
                                                                واژه </p></div>
                                                        {{--                                                    <input type="text" id="name" placeholder="کلید واژه " class="form form-control" disabled/>--}}
>>>>>>> master
=======
>>>>>>> origin
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row flex-row">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin
                                                        style="text-align: end">
                                                        <label for="name">عنوان فراخوان : </label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-4 col-sm-6 col-xs-12">
                                                        <div class="grey-div">
                                                            <p style="margin-right: 10px">عنوان
                                                                فراخوان</p>
                                                        </div>
<<<<<<< HEAD
=======
                                                         style="text-align: end">
                                                        <label for="name">عنوان فراخوان : </label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-4 col-sm-6 col-xs-12">
                                                        <div class="grey-div"><p style="margin-right: 10px">عنوان
                                                                فراخوان</p></div>
>>>>>>> master
=======
>>>>>>> origin

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end section -->
    </section>
@endsection
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> master
=======
>>>>>>> origin
