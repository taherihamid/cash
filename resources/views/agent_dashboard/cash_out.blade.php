@extends('layouts.agent.layout')
@section('title', 'Agent Portal')
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
                                Cash Out </h5>
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
                                <agent-cash-out-form  :requested_amount="requested_amount" :agent="{{$agent}}"
                                                        @agent_cash_info="AgentCashInfo"

                                />
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>
            <div>
                <agent-cash-out-info
                        v-if="agent_cash_out_modal"
                        :requested_amount="requested_amount"
                        :agent="{{$agent}}"
                        @agent_cash_info_sent="AgentCashInfoSent"
                        @close_modal="closeModal"

                />
            </div>

            <!-- Modal-->
            <!--end::Content-->

    </section>

@endsection

@section('js')


@endsection
