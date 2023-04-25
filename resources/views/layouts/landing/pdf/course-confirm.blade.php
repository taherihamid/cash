@extends('layouts.pdf')

@section('content')

    <style>

        table{
            border-collapse: separate;
            border-spacing: 0 15px;
        }
        body{
            line-height: 3;
        }
        td {
            width: 33%;
            margin: 20px !important;
        }

        tr{
            margin-top: 10px !important;
        }
        body {
            background: #FFF !important;
        }

        .user-image {
            padding-top: 2px;
            height: 3cm;
            width: 2cm;
        }

    </style>

    <div class="detail-view">

        <table class="line m-t-65" border="0" width="100%">
            <tr>
                @include('layouts.pdf-header', ['date'=> date('Y-m-d'), 'description'=>'ثبت نام و انتخاب رشته دوره کارشناسی پیوسته (صرفا بر اساس سوابق تحصیلی)'])
            </tr>
        </table>
    </div>

    <div class="line detail-view m-t-25">
        <div class="alert alert-info default-height">
            <span>{{ trans('ui.text.personal_info') }}</span>
        </div>
        <table class="" style="width: 100%">
            <tbody>
            <tr class="">
                <td style="">
                    <div class="col-lg-4 mybox" data-html="1">{{ trans('ui.text.name') }}: <span class="pdf-content">{{$user[1]}}</span></div>

                </td>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="2">{{ trans('ui.text.lname') }}: <span class="pdf-content">{{$user[2]}}</span></div>

                </td>
                <td class="text-center" rowspan="4">
                    <img class="img-rounded user-image" data-html="40" src="{{$user[40]}}">
                </td>
            </tr>

            <tr>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="3">{{ trans('ui.text.father_name') }}: <span class="pdf-content">{{$user[3]}}</span></div>
                </td>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="10">{{ trans('ui.text.birth-date') }}: <span class="pdf-content">{{$user[10]}}</span></div>
                </td>
            </tr>
            <tr>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="5">{{ trans('ui.text.id_certificate') }}: <span class="pdf-content">{{$user[5]}}</span></div>
                </td>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="6">{{ trans('ui.text.series_id_certificate') }}: <span class="pdf-content">{{$user[6]}}</span></div>
                </td>
            </tr>
            <tr>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="9">{{ trans('ui.text.national_code') }}: <span class="pdf-content">{{$user[9]}}</span></div>
                </td>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="4">{{ trans('ui.text.sex') }}: <span class="pdf-content">{{$user[4]}}</span></div>
                </td>
            </tr>
            <tr>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="11">{{ trans('ui.text.religion') }}: <span class="pdf-content">{{$user[11]}}</span></div>
                </td>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="13">{{ trans('ui.text.nationality') }}: <span class="pdf-content">{{$user[13]}}</span></div>
                </td>
                <td style="">
                    <div class="col-lg-4 mybox">-</div>
                </td>
            </tr>
            <tr>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="14">{{ trans('ui.text.tel') }}: <span class="pdf-content">{{$user[14]}}</span></div>
                </td>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="15">{{ trans('ui.text.tel_prefix') }}: <span class="pdf-content">{{$user[15]}}</span></div>
                </td>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="16">{{ trans('ui.text.mobile-number') }}: <span class="pdf-content">{{$user[16]}}</span></div>
                </td>
            </tr>
            <tr>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="19">{{ trans('ui.text.province_birth_date') }}: <span class="pdf-content">{{$user[19]}}</span></div>
                </td>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="18">{{ trans('ui.text.province_living') }}: <span class="pdf-content">{{$user[18]}}</span></div>
                </td>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="20">{{ trans('ui.text.postal-code') }}: <span class="pdf-content">{{$user[20]}}</span></div>
                </td>
            </tr>
            <tr>
                <td style="" colspan="3">
                    <div class="full mybox" data-html="22">{{ trans('ui.text.living_address') }}: <span class="pdf-content">{{$user[22]}}</span></div>
                </td>
            </tr>
            <tr>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="17">{{ trans('ui.text.email-address') }}: <span class="pdf-content">{{$user[17]}}</span></div>
                </td>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="22">{{ trans('ui.text.military_state') }}: <span class="pdf-content">{{$user[22]}}</span></div>

                </td>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="23">{{ trans('ui.text.physical_condition') }}: <span class="pdf-content">{{$user[23]}}</span></div>

                </td>
            </tr>
            <tr>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="24">{{ trans('ui.text.quota') }}: <span class="pdf-content">{{$user[24]}}</span></div>

                </td>
                <td style="">
                    <div class="col-lg-4 mybox">{{ trans('ui.text.tracking_code') }}: <span class="pdf-content">{{$tracking_code}}</span></div>

                </td>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="25">{{ trans('ui.text.duration_in_war') }}: <span class="pdf-content">{{$user[25]}}</span></div>

                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <br>

    <div class="line detail-view">
        <div class="alert alert-info default-height">
            <span>{{ trans('ui.text.study_information') }}</span>
        </div>

        <table class="" style="width: 100%">
            <tbody>
            <tr>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="28">{{ trans('ui.text.graduated') }}: <span class="pdf-content">{{$user[28]}}</span></div>
                </td>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="29">{{ trans('ui.text.diploma_title') }}: <span class="pdf-content">{{$user[29]}}</span></div>
                </td>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="30">{{ trans('ui.text.diploma_province') }}: <span class="pdf-content">{{$user[30]}}</span></div>
                </td>
            </tr>
            <tr>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="32">{{ trans('ui.text.student_code') }}: <span class="pdf-content">{{$user[32]}}</span></div>
                </td>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="31">{{ trans('ui.text.academic_status') }}: <span class="pdf-content">{{$user[31]}}</span></div>

                </td>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="34">{{ trans('ui.text.pre_university_grade') }}: <span class="pdf-content">{{$user[34]}}</span></div>

                </td>
            </tr>
            <tr>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="33">{{ trans('ui.text.diploma_date') }}: <span class="pdf-content">{{$user[33]}}</span></div>

                </td>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="36">{{ trans('ui.text.total_diploma_grade') }}: <span class="pdf-content">{{$user[36]}}</span></div>

                </td>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="35">{{ trans('ui.text.written_diploma_grade') }}: <span class="pdf-content">{{$user[35]}}</span></div>

                </td>
            </tr>
            <tr>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="39">{{ trans('ui.text.associate_date') }}: <span class="pdf-content">{{$user[39]}}</span></div>

                </td>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="37">{{ trans('ui.text.associate_grade') }}: <span class="pdf-content">{{$user[37]}}</span></div>

                </td>
                <td style="">
                    <div class="col-lg-4 mybox" data-html="38">{{ trans('ui.text.associate_province') }}: <span class="pdf-content">{{$user[38]}}</span></div>

                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <br>

    <div class="line detail-view m-t-50" >

        <div class="alert alert-info default-height">
            <span>{{ trans('ui.text.selected_majors') }}</span>
        </div>


        <table class="text-center" style="width: 100%;border: 1px solid black">

            <tbody>
            <tr class="text-center" style="width: 100%">
                {{--<td style="width: 25%" class="col-lg-3 p-0 "> <div class="m-t-5 col-lg-3 mybox-full"> {{ trans('ui.text.major_code') }} </div> </td>
                <td style="width: 25%" class="col-lg-3 p-0"> <div class="m-t-5 col-lg-3 mybox-full"> {{ trans('ui.text.major_name') }} </div> </td>
                <td style="width: 25%" class="col-lg-3 p-0"> <div class="m-t-5 col-lg-3 mybox-full"> {{ trans('ui.text.location_code') }} </div> </td>
                <td style="width: 25%" class="col-lg-3 p-0"> <div class="m-t-5 col-lg-3 mybox-full"> {{ trans('ui.text.location_name') }} </div> </td>--}}
                <td style="width: 25%" class="col-lg-3 p-0 ">  {{ trans('ui.text.major_code') }}  </td>
                <td style="width: 25%" class="col-lg-3 p-0">  {{ trans('ui.text.major_name') }} </td>
                <td style="width: 25%" class="col-lg-3 p-0">  {{ trans('ui.text.location_code') }}  </td>
                <td style="width: 25%" class="col-lg-3 p-0">  {{ trans('ui.text.location_name') }}  </td>
            </tr>

            @if(!empty($majors))
                @foreach($majors as $key => $major)
                    {{-- <tr class="text-center" style="width: 100%">
                         <td style="width: 25%" class="col-lg-3 p-0"> <div class="m-t-5 col-lg-3 mybox-full"> {{$major->major_code}}</div> </td>
                         <td style="width: 25%" class="col-lg-3 p-0"> <div class="m-t-5 col-lg-3 mybox-full"> {{$major->major_name}}</div> </td>
                         <td style="width: 25%" class="col-lg-3 p-0"> <div class="m-t-5 col-lg-3 mybox-full"> {{$major->location_code}}</div> </td>
                         <td style="width: 25%" class="col-lg-3 p-0"> <div class="m-t-5 col-lg-3 mybox-full"> {{$major->location_name}}</div> </td>
                     </tr>--}}

                    <tr class="text-center" style="width: 100%">
                        <td style="width: 25%" class="col-lg-3 p-0">  {{$major->major->major_code}}</td>
                        <td style="width: 25%" class="col-lg-3 p-0">  {{$major->major->major_name}} </td>
                        <td style="width: 25%" class="col-lg-3 p-0">  {{$major->major->location_code}} </td>
                        <td style="width: 25%" class="col-lg-3 p-0">  {{$major->major->location_name}} </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection;

