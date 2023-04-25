@extends('layouts.landing.layout.app')
@section('title', trans('ui.title.define_card'))
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('product_assets/style.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('product_assets/css/custom.css') }}" media="screen" />
    <link rel="stylesheet" href="{{ URL::asset('product_assets/css/colors.css') }}">
    <style>
        th {
            text-align: center;
        }

        .row {
            margin-top: 15px;
        }

        .appointment-form {
            box-shadow: none;
        }

        .card_shadow {
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.10), 0 1px 1px rgba(0, 0, 0, 0.0);
        }

        .card {
            background: #fff;
            border-radius: 2px;
            display: inline-block;
            height: 40px;
            margin: 1rem;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@stop

@section('content')

    <section>
            <div id="service" class="services wow fadeIn">
            <div class="container">
                <div class="row custom-row">

                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                        <div class="appointment-form">
                            <h3> مشاهده اطلاعات فراخوان (عنوان فراخوان)</h3>
                            <div class="form">
                                <fieldset>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row" style="margin-top: 30px">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name" style="color: #1d86df;">فراخوان (عنوان فراخوان) جدید</label>
                                                        <input disabled type="radio" name="name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row" style="margin-top: 30px">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name" style="color: #1d86df;">فراخوان (عنوان فراخوان) تجدید شده</label>
                                                        <input disabled type="radio" name="name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name" style="color: #1d86df;">شماره فراخوان
                                                            قبلی</label>
                                                        <div class="card card_shadow"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                        <div class="appointment-form">
                            <h3> مشاهده فراخوان (عنوان فراخوان)</h3>
                            <div class="form">
                                <fieldset>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name" style="color: #1d86df;">شماره مناقصه</label>

                                                        <div class="card card_shadow">{{ $tender->TenderCallingDocumentID}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name" style="color: #1d86df;">نوع برگزاری</label>
                                                        <div class="card card_shadow">{{ $tender->tenderType}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name" style="color: #1d86df;">موضوع</label>
                                                        <div class="card card_shadow">{{ $tender->subject}}</div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name" style="color: #1d86df;">کلید واژه</label>
                                                        <div class="card card_shadow">{{ $tender->tag}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name" style="color: #1d86df;">طبقه بندی موضوعی</label>
                                                        <div class="card card_shadow">{{$tender->WorkflowContractExecutionTypeIDRef}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name" style="color: #1d86df;">استان محل اجرا</label>
                                                        <div class="card card_shadow">{{ $tender->TenderStateIDRef}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name" style="color: #1d86df;">شهر محل اجرا</label>
                                                        <div class="card card_shadow">{{ $tender->TenderCityIDRef}} </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name" style="color: #1d86df;"> مشخصات فنی </label>
                                                        <div class="card card_shadow">{{ $tender->techSpec}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name" style="color: #1d86df;">حداقل نمره قابل قبول فنی</label>
                                                        <div class="card card_shadow">{{ $tender->minTechAccScore}}</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name" style="color: #1d86df;">حوزه های فعالیت</label>
                                                        <table class="table table-bordered table-striped"
                                                               style="text-align: center">
                                                            <thead
                                                                style="color: white;background: linear-gradient(to right, #39b49a 0%, #1d86df 100%)">
                                                            <th>ردیف</th>
                                                            <th>طبقه بندی عمومی</th>
                                                            <th>حوزه فعالیت</th>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>2</td>
                                                                    <td>3</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name" style="color: #1d86df;">حجم و میزان درخواست</label>
                                                        <div class="card card_shadow">{{$tender->reqVolume}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="appointment-form">
                            <h3> اطلاعات مناقصه گزار</h3>
                            <div class="form">
                                <fieldset>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label for="name" style="color: #1d86df;"> مناقصه گزار</label>
                                                        <div class="card card_shadow">{{\App\Person::where('PersonID',$tender->companyIDRef)->first()->PersonTitle}} </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12col-xs-12">
                                                        <label for="name" style="color: #1d86df;">مسئول ایجاد مناقصه</label>
                                                        <div class="card card_shadow">{{$tender->userIDRef}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label for="name" style="color: #1d86df;">دبیر کمسیون</label>
                                                        <div class="card card_shadow">{{$tender->comSecretaryIDRef}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label for="name" style="color: #1d86df;">تماس :</label>
                                                        <div class="card card_shadow">{{\App\Person::where('PersonID',$tender->companyIDRef)->first()->companyPhone}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-2 col-sm-6 col-xs-12">
                                                        <label for="name" style="color: #1d86df;">آدرس</label>
                                                        <div class="card card_shadow">
                                                            {{\App\Person::where('PersonID',$tender->companyIDRef)->first()->companyAddress}} -
                                                            <span> کد پستی :</span>{{\App\Person::where('PersonID',$tender->companyIDRef)->first()->postalCode}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="appointment-form">
                            <h3> اطلاعات مالی</h3>
                            <div class="form">
                                <fieldset>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <label for="name" style="color: #1d86df;">نحوه برآورد مالی و قیمت پیشنهادی</label>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row" style="margin-top: 0px">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="arz">ارزی / ریالی</label>
                                                        <input type="radio" name="arz">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row" style="margin-top: 0px">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="arz">ارزی و ریالی</label>
                                                        <input type="radio" name="arz">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name" style="color: #1d86df;">برآورد مالی</label>
                                                        <div class="card card_shadow"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name" style="color: #1d86df;">هزینه خرید اسناد</label>
                                                        <div class="card card_shadow">{{$tender->buyCost}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name" style="color: #1d86df;">اطلاعات حساب جهت واریز هزینه</label>
                                                        <div class="card card_shadow"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                                <label for="name" style="color: #1d86df;">نوع تضمین:</label>
                                                <div class="card card_shadow">{{$tender->warrantyTypeIDRef}}</div>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                                <label for="" style="color: #1d86df;">مبلغ تضمین</label>
                                                <div class="card card_shadow">{{$tender->warrantyReqCost}}</div>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                                <label for="name" style="color: #1d86df;">واحد پول</label>
                                                <div class="card card_shadow">ریال</div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label for="name" style="color: #1d86df;">توضیحات</label>
                                                <div class="card card_shadow">{{$tender->warrantyDescription}}</div>
                                            </div>
                                        </div>


                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="appointment-form">
                            <h3> اطلاعات ارزیابی کیفی</h3>
                            <div class="form" style="margin-bottom: 30px">
                                <fieldset>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <label for="name" style="color: #1d86df;">مهلت دریافت اسناد</label>
                                                <div class="card card_shadow"><i
                                                        class="fa fa-calendar fa-2x col-md-2 text-primary"></i>
                                                    {{ toPersianNum(jdate($tender->receiptDeadline, 'date')->format('Y-m-d')) }}
                                                </div>

                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <label for="name" style="color: #1d86df;">مهلت ارسال پاکت ها</label>
                                                <div class="card card_shadow"><i
                                                        class="fa fa-calendar fa-2x col-md-2 text-primary"></i>
                                                    {{ toPersianNum(jdate($tender->packetDeliveryDeadline, 'date')->format('Y-m-d')) }}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <label for="name" style="color: #1d86df;">زمان بازگشایی پاکت ها</label>

                                                    <div class="card card_shadow"><i
                                                            class="fa fa-calendar fa-2x col-md-2 text-primary"></i>
                                                        {{ toPersianNum(jdate($tender->packetOpeningTime, 'date')->format('Y-m-d')) }}
                                                    </div>


                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end section -->
    </section>
@endsection
