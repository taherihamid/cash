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
                                Agents </h5>
                            <!--end::Page Title-->


                        </div>
                        <!--end::Page Heading-->

                    </div>
                    <!--end::Info-->

                    <a href="{{route('admin.agent.create')}}"><span
                            class="label label-dark label-inline mr-2 scan-button"
                            style="border-radius: 20px;height: 35px;font-size: 13px"> + Add Agent</span>
                    </a>


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
                            <!--begin: Search Form-->
                            <label><strong>Filter</strong></label>
                            <form class="kt-form kt-form--fit mb-15" action="{{route('admin.agent.filter')}}" method="GET">

                                <div class="row mb-8">

                                    <div class="col-lg-5  mb-lg-0 mb-6">
                                        <div class="row">
                                            <label for="business"
                                                   class="col-md-12  text-md-left">{{ "Transactions" }}</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <input class="form-control datatable-input" type="text"
                                                       placeholder="From" value="{{ old('transactions_from') }}"
                                                       name="transactions_from"/>
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control datatable-input" type="text"
                                                       placeholder="To" value="{{ old('transactions_to') }}"
                                                       name="transactions_to"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5  mb-lg-0 mb-6">
                                        <div class="row">
                                            <label for="business"
                                                   class="col-md-12  text-md-left">{{ "Commissions" }}</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <input class="form-control datatable-input" type="text"
                                                       placeholder="From" value="{{ old('commissions_from') }}"
                                                       name="commissions_from"/>
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control datatable-input" type="text"
                                                       placeholder="To" value="{{ old('commissions_to') }}"
                                                       name="commissions_to"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2  mb-lg-0 mb-6">
                                        <div class="row">
                                            <label for="business"
                                                   class="col-md-12  text-md-left">{{ "Status" }}</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <select class="form-control datatable-input" name="status" data-col-index="6">
                                                    <option value="">Active</option>
                                                    <option value="">Block</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="row mb-8">

                                    <div class="col-lg-5  mb-lg-0 mb-6">
                                        <div class="row">
                                            <label for="business"
                                                   class="col-md-12  text-md-left">{{ "Cash Outed" }}</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <input class="form-control datatable-input" type="text"
                                                       placeholder="From" value="{{ old('cash_out_from') }}"
                                                       name="cash_out_from"/>
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control datatable-input" type="text"
                                                       placeholder="To" value="{{ old('cash_out_to') }}"
                                                       name="cash_out_to"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5  mb-lg-0 mb-6">
                                        <div class="row">
                                            <label for="business"
                                                   class="col-md-12  text-md-left">{{ "Amount" }}</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <input class="form-control datatable-input" type="text"
                                                       placeholder="From" value="{{ old('amount_from') }}"
                                                       name="amount_from"/>
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control datatable-input" type="text"
                                                       placeholder="To" value="{{ old('amount_to') }}"
                                                       name="amount_to"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2  mb-lg-0 mb-6" style="margin-top: 2%;padding: 0">


                                        <button type="submit" class="btn btn-outline-primary"
                                                style="width: 200px; border-radius: 20px;">Filter
                                        </button>
                                    </div>

                                </div>


                            </form>
                            <!--begin: Datatable-->

                            <!--begin: Datatable-->
                            <table class="table table-hover table-checkable" id="kt_datatable"
                                   style="margin-top: 13px !important">
                                <thead>
                                <tr>


                                    <th class="text-center">Agent</th>
                                    <th class="text-center">Transactions</th>
                                    <th class="text-center">Commissions</th>
                                    <th class="text-center">Cash Out</th>
                                    <th class="text-center">Credit Limit</th>
                                    <th class="text-center">Agent Status</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($agents as $agent)
                                    <tr>
                                        <td class="text-center">{{ $agent->full_name ?? 'No Data' }}</td>
                                        <td class="text-center">{{ $agent->transaction ?? 'No Data' }}</td>
                                        <td class="text-center">{{ $agent->comm ?? 'No Data' }}$</td>


                                        <td class="text-center">{{ $agent->cash_out ?? 'No Data' }} $</td>
                                        <td class="text-center">{{ $agent->credit_limit ?? 'No Data' }} $</td>

                                        <td class="text-center"> <span class="label
                                            @if($agent->activity_status == \App\Agent::ACTIVITY_ACTIVE)
                                                label-success
@else
                                                label-light-dark
@endif label-inline mr-2 scan-button" style="border-radius: 20px">
                                                @if($agent->activity_status == \App\Agent::ACTIVITY_BLOCK)
                                                    Block
                                                @else
                                                    Active
                                                @endif</span></td>
                                        <td class="text-center">{{ $agent->am  ?? 'No Title' }}$</td>
                                        <td class="text-center" nowrap><span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo13\dist/../src/media/svg/icons\General\Other2.svg--><svg
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
