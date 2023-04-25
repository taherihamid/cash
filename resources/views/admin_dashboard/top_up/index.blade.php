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
    <section id="partner_request">
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
                                Top Up Requests </h5>
                            <!--end::Page Title-->


                        </div>
                        <!--end::Page Heading-->

                    </div>
                    <!--end::Info-->

                    {{--                        <span class="label label-dark label-inline mr-2 scan-button" style="border-radius: 20px;height: 35px;font-size: 13px"> + Add Merchant</span>--}}


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
                                    <!--begin: Search Form-->

                                    <!--begin: Datatable-->

                                    <!--begin: Datatable-->
                                    <table class="table table-hover table-checkable" id="kt_datatable"
                                           style="margin-top: 13px !important">
                                        <thead>
                                        <tr>


                                            <th>Agents</th>
                                            <th>Credit Limit</th>

                                            <th>Tracking Number</th>

                                            <th>Request</th>
                                            <th>Actions</th>

                                        </tr>
                                        </thead>

                                        <tbody>
                                        <template v-for="req in topRequests">

                                            <tr v-on:click="changeTopRequestStatus(req.id)"
                                                style="cursor: pointer">


                                                <td style="text-align: center">@{{req.agent.full_name}}</td>
                                                <td style="text-align: center">@{{req.agent.credit_limit}}</td>
                                                <td style="text-align: center">@{{req.tracking_number}}</td>
                                                <td style="text-align: center">@{{req.requested_amount}}</td>
                                                <td style="text-align: center"><i
                                                            class="menu-icon flaticon2-menu-1"></i>
                                                    </td>


                                            </tr>
                                        </template>
                                    </table>
                                    <!--end: Datatable-->
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card card-custom">

                                <div>
                                    <!--begin: Search Form-->
                                    <top-request-template v-if="agent_top_request"
                                                    :top_request="topRequest"
                                                    @update-top-request="updateTopRequest"
                                    />


                                    <!--begin: Datatable-->
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

@endsection
@section('js')

    <script>

    </script>
@endsection
