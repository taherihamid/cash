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
                            <!--begin: Search Form-->
{{--                            <label><strong>Filter</strong></label>--}}
{{--                            <form class="kt-form kt-form--fit mb-15">--}}
{{--                                <div class="row mb-8">--}}
{{--                                    <div class="col-lg-1  mb-lg-0 mb-6">--}}
{{--                                        <label>Status</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-3  mb-lg-0 mb-6">--}}

{{--                                        <select class="form-control datatable-input" data-col-index="6">--}}
{{--                                            <option value="">Done</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-3  mb-lg-0 mb-6">--}}
{{--                                        <button type="submit" class="btn btn-outline-primary" style="width: 200px; border-radius: 20px;">Filter</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
                            <!--begin: Datatable-->

                            <!--begin: Datatable-->
                            <table class="table table-hover table-checkable" id="kt_datatable"
                                   style="margin-top: 13px !important">
                                <thead>
                                <tr>

                                    <th>Merchant</th>
                                    <th>Agent</th>
                                    <th>Paid</th>
                                    <th>Description</th>
                                    <th>Agent Commission</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($invoices as $invoice)
                                    <tr>
                                        <td>{{ $invoice->merchants->full_name ?? 'No Title' }}</td>
                                        <td>{{ $invoice->agents->full_name ?? 'No Title' }}</td>
                                        <td>{{$invoice->order_date}}</td>
                                        <td>{{$invoice->description}}</td>
                                        <td>25 $ (10%)</td>

                                        <td> <span class="label
                                            @if($invoice->order_status == \App\Invoice::Amount_Received)
                                                    label-success
                                            @else
                                                    label-light-dark
                                           @endif label-inline mr-2 scan-button" style="border-radius: 20px">
                                                @if($invoice->order_status == \App\Invoice::Amount_Received)
                                                    Done
                                                @else
                                                   Pending
                                                @endif</span></td>
                                        <td>{{$invoice->amount_to_pay}}</td>
                                        <td nowrap><span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo13\dist/../src/media/svg/icons\General\Other2.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <circle fill="#000000" cx="5" cy="12" r="2"/>
        <circle fill="#000000" cx="12" cy="12" r="2"/>
        <circle fill="#000000" cx="19" cy="12" r="2"/>
    </g>
</svg><!--end::Svg Icon--></span></td>
                                    </tr>
                                @endforeach
                            </table>
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
