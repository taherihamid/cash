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
                                Partnership Requests </h5>
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
                                    <!--begin: Search Form-->

                                    <!--begin: Datatable-->

                                    <!--begin: Datatable-->
                                    <table class="table table-hover table-checkable" id="kt_datatable"
                                           style="margin-top: 13px !important">
                                        <thead>
                                        <tr>


                                            <th>Name</th>
                                            <th>PhoneNumber</th>

                                            <th>Partnership Type</th>

                                            <th>Status</th>

                                        </tr>
                                        </thead>

                                        <tbody>
                                        <template v-for="client in clients">

                                            <tr v-on:click="changeClientStatus(client.id,client.partnership_type)"
                                                style="cursor: pointer">


                                                <td style="text-align: left">@{{client.full_name}}</td>
                                                <td style="text-align: left">@{{client.phone}}</td>
                                                <td style="text-align: left">
                                                    <template v-if="client.partnership_type == 1">Merchant</template>
                                                    <template v-if="client.partnership_type == 0">Agent</template>
                                                </td>
                                                <td style="text-align: left">
                                                    <template v-if="client.status == 0">
                                                        <span class="label label-gray label-inline mr-2 scan-button"
                                                              style="border-radius: 20px;height: 35px;font-size: 13px">New
                                                        </span>
                                                    </template>
                                                    <template v-if="client.status == 3">
                                                        <span class="label label-gray label-inline mr-2 scan-button"
                                                              style="border-radius: 20px;height: 35px;font-size: 13px">Rejected
                                                        </span>
                                                    </template>
                                                    <template v-if="client.status == 1">
                                                        <span class="label label-gray label-inline mr-2 scan-button"
                                                              style="border-radius: 20px;height: 35px;font-size: 13px">Approved
                                                        </span>
                                                    </template>
                                                    <template v-if="client.status == 2">
                                                        <span class="label label-gray label-inline mr-2 scan-button"
                                                              style="border-radius: 20px;height: 35px;font-size: 13px">Processing
                                                        </span>
                                                    </template>

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
                                <div>
                                    <!--begin: Search Form-->
                                    <agent-template v-if="agent_client"
                                                    :client="client"
                                                    :status_categories="status_categories"
                                                    @update="updateClient"
                                                    @change_status="change_status"
                                                    @show_agent_info_modal="showModalAgentInfo"
                                    />


                                    <!--begin: Datatable-->
                                </div>
                                <div>
                                    <!--begin: Search Form-->
                                    <merchant-template v-if="merchant_client"
                                                       :client="client"
                                                       :status_categories="status_categories"
                                                       :selected_status="selected_status"
                                                       @update="updateClient"
                                                       @change_status="change_status"
                                                       @show_merchant_info_modal="showModalMerchantIBAN"
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
        <div>
            <merchant-info-modal v-if="merchant_info_modal"
                                 :client="client" @update_merchant_info="updateMerchantInfo"

            />
        </div>
        <div>
            <merchant-accepted-info-modal v-if="merchant_accepted_info_modal"
                                          :client="client" @sent_merchant_email="sentMerchantEmail"

            />
        </div>
        <div>
            <agent-info-modal v-if="agent_info_modal"
                                 :client="client" @update_agent_info="updateAgentInfo"

            />
        </div>
        <div>
            <agent-accepted-info-modal v-if="agent_accepted_info_modal"
                                          :client="client" @sent_agent_email="sentAgentEmail"

            />
        </div>

    </section>

@endsection
@section('js')

    <script>

    </script>
@endsection
