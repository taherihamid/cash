@extends('layouts.pdf')


@section('content')

    <style>
       .f-b{
           font-weight: bold;
       }
       .body-text{
           text-align: justify;
           padding: 20px 20px 10px 5px;

       }
       tbody{padding-right: 0;} td {padding: 5px;}body {background: #fff;font-size: 12pt;color: #303030;}.title-strong {height: 50px;background: #CED7DB;border-bottom: 2px solid #E6402E }.main-table {padding-bottom: 5px;padding-top: 3px;border: 1px solid #999;border-radius: 8px }.second-table{width: 100% !important;border: 1px solid #999 !important;}.color-black {color: #000;}b {color: #000;}
    </style>

    <div class="detail-view center-text container">

        <table class="center m-t-65 " border="0" width="100%">
            <tr>
                @include('layouts.pdf-header', ['date'=> date('Y/m/d'), 'description'=>$card_purchased->card->scheme->title.' ثبت نام و انتخاب رشته دوره'])

            </tr>
        </table>
        <div  style="border: 1px solid #999999; border-radius: 8px">
            <table style="!important; border: 0; padding: 0; margin: 0;" class="line main-table  center p-b-10" width="100%">
                <thead>
                <tr style=" width: 100% ">
                    <td class="title-strong" width="33%" style="padding: 0px 10px;">

                        <b class="color-black" >{{ 'کارشناسی ارشد' }}</b>
                    </td>
                    <td class="title-strong"  width="33%" colspan="6"></td>
                    <td colspan="2" width="33%" class="text-left title-strong color-black" style="padding: 0px 15px;" >
                        <b>{{trans('ui.text.buy_date')}} {{ toPersianNum(jdate(date('Y-m-d'))->format('Y/m/d')) }}</b>
                    </td>

            </tr>
            <tr class="m-b-10">
                <td colspan="9">
                    <span class="body-text">
                        کارت اعتباری ثبت‌نام و انتخاب رشته در دوره<b> {{$card_purchased->card->scheme->title}} </b>  نظام
                        آموزشی <b> {{$card_purchased->eductionSystem->name}} </b> مجموعه آزمایشی <b> {{$card_purchased->TeachingInstitution->name}} </b>
                        </span>
                    <br><br><br>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <table class="second-table">
                        <tr>
                            <td colspan="6" class="" align="right">
                                <span style="float: right" class="pull-left color-black f-8">{{ trans('ui.text.username') }}:</span>
                            </td>
                            <td align="left">
                                <span style="float: left" class="text-left pull-right">{{$card_purchased->username}}</span>
                            </td>
                        </tr>
                    </table>
                </td>

                <td></td>

                <td colspan="4">
                    <table class="second-table">
                        <tr>
                            <td colspan="6" class="" align="right">
                                <span class="pull-left color-black f-8">{{ trans('ui.text.password')}}:</span>
                            </td>
                            <td align="left">
                                <span class="pull-right">{{$card_purchased->password}}</span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="8"></td>
            </tr>
        </table>

    </div>


@endsection
