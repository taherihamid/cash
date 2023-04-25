@extends('layouts.admin.layout')
@section('title', 'Admin Portal')
@section('css')

    <style>
        .totalBalance {
            text-align: center;
            border: 1px solid rgb(173, 173, 173);
            border-radius: 15px;
            padding: 10px 35px;
            margin-bottom: 3%;
            margin-right: 50%;
        }
        .form-container {
            width: 50%;
            background-color: #EEF0F8;
            padding: 2%;
            border-radius: 8px;
        }

    </style>
@stop
@section('content')
    <section>
        <!--begin::Content-->
        <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Subheader-->
            <div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
                <div
                        class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                    <!--begin::Info-->
                    <div class="d-flex align-items-center flex-wrap mr-1">

                        <!--begin::Page Heading-->
                        <div class="d-flex align-items-baseline flex-wrap mr-5">
                            <!--begin::Page Title-->
                            <a href="{{route('admin.agent.index')}}" class="menu-link "><i
                                    class="menu-icon flaticon2-left-arrow-1"></i></a>
                            <h5 class="text-dark font-weight-bold my-1 mr-5 ml-2">
                               Add Agent </h5>
                            <!--end::Page Title-->


                        </div>
                        <!--end::Page Heading-->

                    </div>
                    <!--end::Info-->




                </div>
            </div>
            <!--end::Subheader-->

            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class=" container ">
                    <!--begin::Notice-->

                    <!--end::Notice-->

                    <!--begin::Card-->
                    <div class="card card-custom">

                        <div class="card-body">
                            <!--begin::Login Sign up form-->
                            <div class="login-signupo">
                                @if(count($errors) > 0)
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                                <form class="form" id="kt_login_signup_formr" method="post" action={{ route('admin.agent.store') }}>
                                    @csrf
                                    <div class="form-container">
                                        <div class="row">
                                            <div class="col-md-6 mb-1">
                                                <label for="fullName" class="col-md-12 text-md-left">{{ "Full Name" }} *</label>
                                                <input class="form-control h-auto-a form-control-solid py-4 px-8" type="text" placeholder="Full Name" value="{{ old('full_name') }}" name="full_name" required />
                                            </div>
                                            <div class="col-md-6 mb-1">
                                                <label for="phone" class="col-md-12 text-md-left">{{ "Phone Number" }} *</label>
                                                <input class="form-control h-auto-a form-control-solid py-4 px-8" type="number" placeholder="Phone Number" value="{{ old('phone') }}" name="phone" autocomplete="off" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-1">
                                                <label for="email" class="col-md-12 text-md-left">{{ "Email Address" }} *</label>
                                                <input class="form-control h-auto-a form-control-solid py-4 px-8" type="email" placeholder="Email Address" value="{{ old('email') }}" name="email" required/>
                                            </div>

                                            <div class="col-md-6 mb-1">
                                                <label for="business" class="col-md-12  text-md-left">{{ "Business" }} *</label>
                                                <input class="form-control h-auto-a form-control-solid py-4 px-8" type="text" placeholder="Business" value="{{ old('business') }}" name="business" required/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-1">
                                                <label for="business_detail" class="col-md-12 text-md-left">{{ "Business Detail" }} *</label>
                                                <input class="form-control h-auto-a form-control-solid py-4 px-8" type="text" placeholder="Business Detail" value="{{ old('business_detail') }}" name="business_detail" required/>
                                            </div>
                                            <div class="col-md-6 mb-1">
                                                <label for="credit_limit" class="col-md-12  text-md-left">{{ "IBAN" }} *</label>
                                                <input class="form-control h-auto-a form-control-solid py-4 px-8" type="text" placeholder="IBAN" value="{{ old('IBAN') }}" name="IBAN" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-1">
                                                <label for="credit_limit" class="col-md-12  text-md-left">{{ "Credit Limit" }} *</label>
                                                <input class="form-control h-auto-a form-control-solid py-4 px-8" type="number" placeholder="Credit Limit" value="{{ old('credit_limit') }}" name="credit_limit" required />
                                            </div>
                                            <div class="col-md-6 mb-1">
                                                <label for="password" class="col-md-12 text-md-left">{{ "Commission" }} *</label>
                                                <input class="form-control h-auto-a form-control-solid py-4 px-8" type="text" placeholder="Commission" value="{{ old('commission') }}" name="commission" required />
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-4" style="margin-left: -17%;margin-top: 5%;">
                                                <select class="form-control" name="commission_type" required>
                                                    <option value="{{\App\Agent::AMOUNT_TYPE}}">$</option>
                                                    <option value="{{\App\Agent::PERCENT_TYPE}}">%</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row" style="width: 50%;">
                                        <div class="col-md-4 mb-1">
                                            <button id="kt_login_signup_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2" style="border-radius: 30px;width: 100%">  Confirm</button>
                                        </div>
                                        <div class="col-md-4 mb-1">
                                            <button id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2" style="border-radius: 30px;width: 100%">Cancel</button>

                                        </div>
                                    </div>
{{--                                    <div class="form-group d-flex flex-wrap flex-center mt-2">--}}
{{--                                      --}}
{{--                                    </div>--}}
                                </form>
                            </div>
                            <!--end::Login Sign up form-->

                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->
        </div>

        <!--end::Content-->
    </section>

@endsection

@section('js')


@endsection
