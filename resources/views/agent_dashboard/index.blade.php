@extends('layouts.agent.layout')
@section('title', 'Agent Portal')
@section('css')

    <style>

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
		        				<span class="svg-icon svg-icon-xl svg-icon-primary"><!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
                d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                fill="#000000" opacity="0.3"/>
        <path
                d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span> <span class="pulse-ring"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin: Search Form-->
{{--                            <form class="kt-form kt-form--fit mb-15">--}}

{{--                                <div class="row mb-8">--}}
{{--                                    <div class="col-lg-3  mb-lg-0 mb-6">--}}
{{--                                        <label>Ship Date:</label>--}}
{{--                                        <div class="input-daterange input-group" id="kt_datepicker">--}}
{{--                                            <input type="text" class="form-control datatable-input" name="start" placeholder="From" data-col-index="5"/>--}}
{{--                                            <div class="input-group-append">--}}
{{--                                                <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>--}}
{{--                                            </div>--}}
{{--                                            <input type="text" class="form-control datatable-input" name="end" placeholder="To" data-col-index="5"/>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-3  mb-lg-0 mb-6">--}}
{{--                                        <label>Status:</label>--}}
{{--                                        <select class="form-control datatable-input" data-col-index="6">--}}
{{--                                            <option value="">Select</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-3  mb-lg-0 mb-6">--}}
{{--                                        <label>Type:</label>--}}
{{--                                        <select class="form-control datatable-input" data-col-index="7">--}}
{{--                                            <option value="">Select</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="row mt-8">--}}
{{--                                    <div class="col-lg-12">--}}
{{--                                        <button class="btn btn-primary btn-primary--icon" id="kt_search">--}}
{{--						<span>--}}
{{--							<i class="la la-search"></i>--}}
{{--							<span>Search</span>--}}
{{--						</span>--}}
{{--                                        </button>--}}
{{--                                        &nbsp;&nbsp;--}}
{{--                                        <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">--}}
{{--						<span>--}}
{{--							<i class="la la-close"></i>--}}
{{--							<span>Reset</span>--}}
{{--						</span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
                            <!--begin: Datatable-->

                            <!--begin: Datatable-->
                            <table class="table table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                                <thead>
                                <tr>

                                    <th>Merchant</th>
                                    <th>Paid</th>
                                    <th>Description</th>
                                    <th>Invoice No</th>
                                    <th>Commission</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->merchants->full_name ?? 'No Data' }}</td>
                                    <td>{{$invoice->order_date}}</td>
                                    <td>{{$invoice->description}}</td>
                                    <td>{{$invoice->invoice_no}}</td>
                                    <td> {{ $invoice->agent_commission ?? 'No Data' }} $</td>
                                    <td>{{$invoice->amount_to_pay}}</td>
                                    <td nowrap><span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo13\dist/../src/media/svg/icons\General\Other2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
