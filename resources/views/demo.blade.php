<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head>
    <base href="../../../">
    <meta charset="utf-8"/>
    <title>Cash2Pay Demo </title>
    <meta name="description" content="Invoice example"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/><!--end::Fonts-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet" crossorigin="anonymous">
    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico"/>

    <link href='https://fonts.googleapis.com/css?family=Libre Barcode 39' rel='stylesheet'>
</head>
<!--end::Head-->

<!--begin::Body-->
<body id="kt_body"
      class="print-content-only header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed page-loading">
@include('sweet::alert')
<!--begin::Main-->
<!--begin::Header Mobile-->
<div id="kt_header_mobile" class="header-mobile align-items-center  header-mobile-fixed ">
    <!--begin::Logo-->
    <a href="index.html">
        Cash2Pay
    </a>
    <!--end::Logo-->

    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
        <!--begin::Aside Mobile Toggle-->
        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
            <span></span>
        </button>
        <!--end::Aside Mobile Toggle-->

        <!--begin::Header Menu Mobile Toggle-->
        <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
            <span></span>
        </button>
        <!--end::Header Menu Mobile Toggle-->

        <!--begin::Topbar Mobile Toggle-->
        <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
			<span class="svg-icon svg-icon-xl"><!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
              fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
              fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span></button>
        <!--end::Topbar Mobile Toggle-->
    </div>
    <!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        <div class="aside aside-left  aside-fixed  d-flex flex-column flex-row-auto" id="kt_aside">
            <!--begin::Brand-->
            <div class="brand flex-column-auto " id="kt_brand">
                <!--begin::Logo-->
                <a href="index.html" class="brand-logo">
                    Cash2Pay
                </a>
                <!--end::Logo-->
            </div>
            <!--end::Brand-->

            <!--begin::Aside Menu-->
            <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

                <!--begin::Menu Container-->
                <div
                        id="kt_aside_menu"
                        class="aside-menu my-4  aside-menu-dropdown "
                        data-menu-vertical="1"
                        data-menu-dropdown="1" data-menu-scroll="0" data-menu-dropdown-timeout="500">

                </div>
                <!--end::Menu Container-->
            </div>
            <!--end::Aside Menu-->
        </div>
        <!--end::Aside-->

        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header  header-fixed ">
                <!--begin::Container-->
                <div class=" container-fluid  d-flex align-items-stretch justify-content-between">


                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->

            <!--begin::Content-->
            <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Subheader-->
                <div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
                    <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center flex-wrap mr-1">


                        </div>
                        <!--end::Info-->


                    </div>
                </div>
                <!--end::Subheader-->

                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <!----------------------------------------------------------------------------------------------------------------------------------------------------->
                    <div class=" container " style="background-color: white">
                        <div class="container">
                            <div class="row justify-content-md-center">
                                <div class="col-8">

                                    <div class="col">
                                        <div style="background-color: #EEF0F8; border-radius: 10px; margin-top:30px; padding: 20px">

                                            <div style="color: orangered; font-size: 16px">
                                                <i class="bi bi-exclamation-circle" style="color: orangered"></i>
                                                Please save this receipt with on of the following options. Our nearest Cash
                                                Pay partner will assist you in finalizing the purchase.
                                            </div>

                                            <div class="form-check" style="margin-top: 15px; font-size: 14px">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    By using our site you agree to the following <a href="">Terms & Conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col" style="margin-top:40px; margin-bottom: 50px">
                                        <div class="row">

                                            <div class="col-6" style="padding:30px">
                                                <div class="col">
                                                    <div class="row">

                                                        <div class="col" style="color: #8B91A0">description</div>
                                                        <strong class="col" style="text-align: right">MackBook Air 2021</strong>
                                                        <hr style="border-width:0; margin: 10px">

                                                    </div>
                                                    <div class="row">

                                                        <div class="col" style="color: #8B91A0">Amount to pay</div>
                                                        <strong class="col" style="color:orangered; text-align: right">1000 $</strong>
                                                        <hr style="border-width:0; margin: 10px">

                                                    </div>
                                                    <div class="row">

                                                        <div class="col" style="color: #8B91A0">Included Tax</div>
                                                        <strong class="col" style="text-align: right">20 $</strong>
                                                        <hr style="border-width:0; margin: 10px">

                                                    </div>
                                                    <div class="row">

                                                        <div class="col" style="color: #8B91A0">Order Date</div>
                                                        <strong class="col" style="text-align: right">24.11.2021</strong>
                                                        <hr style="border-width:0; margin: 10px">

                                                    </div>
                                                    <div class="row">

                                                        <div class="col" style="color: #8B91A0">Order Status</div>
                                                        <strong class="col" style="text-align: right">Pending Cash Payment</strong>
                                                        <hr style="border-width:0; margin: 10px">

                                                    </div>
                                                    <div class="row">

                                                        <div class="col" style="color: #8B91A0">Valid Until</div>
                                                        <strong class="col" style="text-align: right">25.11.2021</strong>
                                                        <hr style="border-width:0; margin: 10px">

                                                    </div>

                                                    <div class="row">
                                                                                <?php
                                                                                    $invoice_number = rand(10000000,99999999)
                                                                                ?>
                                                        <div class="col" style="color: #8B91A0">Invoice No.</div>
                                                        <strong class="col" style="text-align: right">{{$invoice_number}}</strong>
                                                        <hr style="border-width:0; margin: 10px">

                                                    </div>

                                                    <div class="row" align="center" style="margin-top: 30px">

                                                        <h1 style="font-family: 'Libre Barcode 39'; font-size: 30px;">35210024-112021-256734</h1>
                                                        <p>35210024-112021-256734</p>

                                                    </div>


                                                </div>
                                            </div>

{{--                                            <div class="col-6" style="padding:30px">--}}
{{--                                                <div class="col">--}}
{{--                                                    <label>Phone Number</label>--}}
{{--                                                    <div class="input-group mb-3">--}}
{{--                                                        <input type="text" class="form-control" placeholder="Place Holder" aria-label="Recipient's username" aria-describedby="button-addon2">--}}
{{--                                                        <button class="btn btn-primary" type="button" id="button-addon1"> Send SMS </button>--}}
{{--                                                    </div>--}}
{{--                                                    <label style="margin-top: 20px">Email Address</label>--}}
{{--                                                    <div class="input-group mb-3">--}}
{{--                                                        <input type="text" class="form-control" placeholder="Place Holder" aria-label="Recipient's username" aria-describedby="button-addon2">--}}
{{--                                                        <button class="btn btn-primary" type="button" id="button-addon2">Send Email</button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col" align="center" style="margin-top: 50px ;">--}}
{{--                                                    <a href="">Save as a picture</a>--}}
{{--                                                </div>--}}
{{--                                                <div class="col" align="center" style="margin-top: 20px ;">--}}
{{--                                                    <a href="">Print</a>--}}
{{--                                                </div>--}}
{{--                                                <div class="col" align="center" style="margin-top: 50px;">--}}
{{--                                                    <div class="form-check form-switch">--}}
{{--                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">--}}
{{--                                                        <label class="form-check-label" for="flexSwitchCheckDefault">Remind me</label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
                                        </div>



                                    </div>

                                    <form action="{{route('set_new_invoice')}}" method="post" enctype="multipart/form-data">

                                        <input type="hidden" name="invoice_no" value="{{$invoice_number}}">
                                        <input type="hidden" name="order_date" value="24.11.2021">
                                        <input type="hidden" name="description" value="MackBook Air 2021">
                                        <input type="hidden" name="amount_to_pay" value="1000">
                                        <input type="hidden" name="valid_until" value="25.11.2021">
                                        <input type="hidden" name="order_status" value="{{\App\Invoice::Pending_Cash_Payment}}">
                                        <input type="hidden" name="included_tax" value="20">
                                        <input type="hidden" name="merchant_id" value="1">


                                        @csrf

                                    <div class="col-xs-1" align="center" style="margin-bottom: 50px">
                                        <button type="submit" class="btn btn-outline-primary" style="width: 200px; border-radius: 20px;">Confirm</button>
                                        <button type="button" class="btn btn-outline-primary" style="width: 200px; border-radius: 20px;">Cancel</button>
                                    </div>
                                    </form>




                                </div>
                                <div class="col-4">
{{--                                    <div class="col">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col" style="margin-top: 30px">--}}
{{--                                                <div class="form" style="width: 100%"> <input type="text" class="form-control form-input" placeholder="Search anything..."> </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col" style="margin: 20px">
                                        <strong >
                                            Nearest agent
                                        </strong>
                                    </div>
                                    <div class="col" >
                                        <div class="row" style="margin-top: 20px">
                                            <div class="col-9">
                                                <strong class="col">X Shop</strong>
                                                <div class="col" style="color: #8B91A0">location and address</div>
                                                <div class="col" style="color: #8B91A0">phone call</div>
                                            </div>
                                            <div class="col-3"><a href=""> > </a> </div>
                                        </div>

                                        <div class="row" style="margin-top: 20px">
                                            <div class="col-9">
                                                <strong class="col">X Shop</strong>
                                                <div class="col" style="color: #8B91A0">location and address</div>
                                                <div class="col" style="color: #8B91A0">phone call</div>
                                            </div>
                                            <div class="col-3"><a href=""> > </a> </div>
                                        </div>

                                        <div class="row" style="margin-top: 20px">
                                            <div class="col-9">
                                                <strong class="col">X Shop</strong>
                                                <div class="col" style="color: #8B91A0">location and address</div>
                                                <div class="col" style="color: #8B91A0">phone call</div>
                                            </div>
                                            <div class="col-3"><a href=""> > </a> </div>
                                        </div>

                                        <div class="row" style="margin-top: 20px">
                                            <div class="col-9">
                                                <strong class="col">X Shop</strong>
                                                <div class="col" style="color: #8B91A0">location and address</div>
                                                <div class="col" style="color: #8B91A0">phone call</div>
                                            </div>
                                            <div class="col-3"><a href=""> > </a> </div>
                                        </div>

                                        <div class="row" style="margin-top: 270px">
                                            <div class="d-grid gap-2">
{{--                                                <button class="btn btn-primary" style="border-radius: 20px;" type="button">Show on map</button>--}}

                                            </div>
                                        </div>




                                    </div>

                                </div>
                            </div>
                        </div>
                        <!----------------------------------------------------------------------------------------------------------------------------------------------------->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->
    <!--begin::Scrolltop-->



</body>
<!--end::Body-->
</html>
