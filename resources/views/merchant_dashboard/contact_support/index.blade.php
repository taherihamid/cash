@extends('layouts.merchant.layout')
@section('title', 'Merchant Portal')
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
                            <h5 class="text-dark font-weight-bold my-1 mr-5">
                                Contact Support</h5>
                            <!--end::Page Title-->

                        </div>
                        <!--end::Page Heading-->
                    </div>

                </div>
            </div>
            <!--end::Subheader-->

            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class=" container ">
                    <!--begin::Card-->
                    <div class="card-body">
                        <div>
                            <div class=" container " style="background-color: white">
                                <div class="container">
                                    <div class="row justify-content-md-center">
                                        <div class="col-12">

                                            <div class="col" style="margin-top:40px; margin-bottom: 50px">
                                                <div class="row">
                                                    <div class="col-8" style="padding:10px">

                                                        <hr style="border-width:0; margin: 10px">

                                                        <form role="form" method="POST"
                                                              action="{{route('merchant.contact_support.store')}}">
                                                            @csrf
                                                            <input type="hidden" name="merchant_id" value="{{$merchant->id}}">
                                                            <div class="row">

                                                                <label for="requested_amount">What can we do for
                                                                    you?</label>
                                                                <div class="form mb-5" style="width: 100%">
                                                                        <textarea

                                                                                name="body"
                                                                                class="form-control form-input"
                                                                                placeholder="Your Request"
                                                                        >

                                                                        </textarea>
                                                                </div>

                                                                <button type="submit"
                                                                        class="btn btn-outline-primary"
                                                                        style="width: 50%; border-radius: 20px;">
                                                                    Send Email
                                                                </button>
                                                            </div>
                                                        </form>


                                                    </div>
                                                    <div class="col-4">

                                                        <div class="col">
                                                            <div class="col" align="center" style="margin-top: 50px ;">
                                                                <span>
                                                                    Contact our support via WhatsApp
                                                                </span>
                                                            </div>
                                                            <div class="col" align="center" style="margin-top: 5% ;">
                                                                <a href=""> <i
                                                                            style="font-size: 50px;color: lightgreen;"
                                                                            class="menu-icon flaticon-whatsapp"></i></a>
                                                            </div>
                                                            <div class="col" align="center" style="margin-top: 5% ;">

                                                                <button
                                                                        class="btn btn-outline-primary"
                                                                        style="width: 80%; border-radius: 20px;">
                                                                    Call
                                                                </button>
                                                            </div>

                                                            <div class="col" align="center" style="margin-top: 5% ;">
                                                                <button
                                                                        class="btn btn-outline-primary"
                                                                        style="width:80%; border-radius: 20px;">
                                                                    Message
                                                                </button>
                                                            </div>
                                                        </div>


                                                    </div>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!----------------------------------------------------------------------------------------------------------------------------------------------------->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->
        </div>


        <!-- Modal-->
        <!--end::Content-->
        </div>
    </section>

@endsection

@section('js')


@endsection
