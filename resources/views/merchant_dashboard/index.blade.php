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
                                Payments </h5>
                            <!--end::Page Title-->


                        </div>
                        <!--end::Page Heading-->
                    </div>
                    <div class="totalBalance">
                        <small>Total Balance</small>
                        <h5>{{auth()->guard('merchant')->user()->total_balance}} $</h5>
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
                        <div class="card-header">
                            <div class="card-title">


                            </div>
                            <div class="card-toolbar">
                                <div class="topbar-item">
                                    <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2"
                                         id="kt_quick_user_toggle">
                                        <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-body">
                            <merchant-index :invoices="{{ $invoices }}"></merchant-index>
                            <!--begin: Search Form-->

                            <!--end: Datatable-->
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
<script>

</script>
