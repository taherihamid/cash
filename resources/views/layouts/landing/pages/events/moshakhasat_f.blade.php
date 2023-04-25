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
        .row{
            margin-top: 15px;
        }
        .appointment-form{
            box-shadow: none;
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
                                                        <label for="name">فراخوان (عنوان فراخوان) جدید</label>
                                                        <input type="radio" name="name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row" style="margin-top: 30px">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">فراخوان (عنوان فراخوان) تجدید شده</label>
                                                        <input type="radio" name="name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">شماره فراخوان قبلی</label>
                                                        <input type="text" class="form-control">
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
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">شماره فراخوان قبلی</label>
                                                        <span>:{{ $tenders->tenderCallingDocuments[0]->revisionNumber }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">کلید واژه</label>
                                                        <span>:{{ $tenders->tenderCallingDocuments[0]->tag }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">عنوان فراخوان</label>
                                                        <span>:{{ $tenders->subject }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">شرح فراخوان</label>
                                                        <textarea name="" id="" class="form-control" cols="30" rows="11" style="resize: none"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">طبقه بندی موضوعی</label>
                                                        <span>:{{ $tenders->WorkflowContractExecutionTypeIDRef }}</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">حداقل امتیاز قابل قبول ارزیابی کیفی</label>
                                                        <span>:{{ $tenders->tenderCallingDocuments[0]->minTechAccScore }}</span>
                                                    </div>
                                                </div>
                                                <div class="row" >
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">حوزه های فعالیت</label>
                                                        <table class="table table-bordered table-striped" style="text-align: center">
                                                            <thead style="color: white;background: linear-gradient(to right, #39b49a 0%, #1d86df 100%)">
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
                                                        <label for="name">شرح کلی حوزه فعالیت</label>
                                                        <span>: {{ $tenders->reqVolume . ' - ' . $tenders->techSpec }}</span>
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
                                                        <label for="name">نام دستگاه اجرایی مناقصه گزار</label>
                                                        <span>:{{ $tenders->company->shortTitle }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12col-xs-12">
                                                        <label for="name">مسئول ثبت فراخوان</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label for="name">مرجع پاسخگویی</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label for="name">کد پستی</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">استان</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">شهر</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-2 col-sm-6 col-xs-12">
                                                        <label for="name">آدرس</label>
                                                        <input type="text" class="form-control">
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
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">هزینه خرید استعلام ارزیابی کیفی</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                                                        <label for="name">اطلاعات حساب جهت واریز هزینه خرید اسناد</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
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
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                                                        <label for="name">زمان اولین انتشار آگهی</label>
                                                        <div>
                                                            <input class="col-md-10" type="date" class="form-control">
                                                            <i class="fa fa-calendar fa-2x col-md-2 text-primary"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                                        <label for="name">ساعت</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                                                        <label for="name">مهلت دریافت اسناد</label>
                                                        <div>
                                                            <input class="col-md-10" type="date" class="form-control">
                                                            <i class="fa fa-calendar fa-2x col-md-2 text-primary"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                                        <label for="name">ساعت</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                                                        <label for="name">مهلت ارسال پاسخ استعلام</label>
                                                        <div>
                                                            <input class="col-md-10" type="date" class="form-control">
                                                            <i class="fa fa-calendar fa-2x col-md-2 text-primary"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                                        <label for="name">ساعت</label>
                                                        <input type="text" class="form-control">
                                                    </div>
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
