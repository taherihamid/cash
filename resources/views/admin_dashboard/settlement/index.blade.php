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
    </style>
@stop
@section('content')
    <section id="settlement">
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
                                Settlement Requests </h5>
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
                    <div class="row">
                        <div class="col-8">
                            <div class="card card-custom">

                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-12">

                                            <div class="btn-group btn-toggle">
                                                <button class="btn btn-lg btn-primary" v-on:click="showAgentTemplate">Agents</button>
                                                <button class="btn btn-lg btn-default active" v-on:click="showMerchantTemplate">Merchants</button>

                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    <!--begin: Search Form-->

                                    <!--begin: Datatable-->

                                    <!--begin: Datatable-->

                                    <div>
                                        <!--begin: Search Form-->
                                        <agent-settlement-template v-if="agent_template"
                                                                   :s_reqs="{{$sett_requests}}"
                                                                   @agent-show-sett-info="showAgentSettInfo"
                                        />
                                    </div>


                                    <div>
                                        <merchant-settlement-template v-if="merchant_template"
                                                                   :merchants="merchants"
                                                                   @merchant-show-sett-info="showMerchantSettInfo"
                                        />
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card card-custom">

                                <div>
                                    <!--begin: Search Form-->
                                    <agent-settlement-info v-if=" agent_template_info"
                                                           :top_request="agent"
                                                           @update-agent-cash-request="updateAgentCashRequest"
                                    />


                                    <!--begin: Datatable-->
                                </div>
                                <div>
                                    <merchant-settlement-info v-if="merchant_template_info"
                                                           :top_request="merchant"
                                                           @update-merchant-cash-request="updateMerchantCashRequest"
                                    />
                                </div>

                            </div>
                        </div>
                    </div>

                    <!--begin::Card-->
                    <!--end::Card-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->
        </div>
        <!--end::Content-->


    </section>

@stop
@section('js')

    <script>
        $('.btn-toggle').click(function () {
            $(this).find('.btn').toggleClass('active');

            if ($(this).find('.btn-primary').length > 0) {
                $(this).find('.btn').toggleClass('btn-primary');
            }
            if ($(this).find('.btn-danger').length > 0) {
                $(this).find('.btn').toggleClass('btn-danger');
            }
            if ($(this).find('.btn-success').length > 0) {
                $(this).find('.btn').toggleClass('btn-success');
            }
            if ($(this).find('.btn-info').length > 0) {
                $(this).find('.btn').toggleClass('btn-info');
            }

            $(this).find('.btn').toggleClass('btn-default');

        });


    </script>
@stop
