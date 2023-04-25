<div class="aside aside-left  aside-fixed  d-flex flex-column flex-row-auto" id="kt_aside">

    <div class="brand flex-column-auto " id="kt_brand">
        <!--begin::Logo-->
        <a href="index.html" class="brand-logo">
            Cash2Pay
            {{--            <img alt="Logo" class="w-65px" src="assets/media/logos/logo-letter-13.png"/>--}}
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
            <!--begin::Menu Nav-->
            <ul class="menu-nav ">
                <li class="menu-item " aria-haspopup="true">
                    <a href="{{route('merchant.dashboard')}}" class="menu-link ">
                        <i class="menu-icon flaticon-price-tag"></i>
                        <span class="menu-text">Payments</span>
                    </a>
                </li>
                <li class="menu-item " aria-haspopup="true">
                    <a href="{{route('merchant.cash_out')}}" class="menu-link ">
                        <i class="menu-icon flaticon2-telegram-logo"></i>
                        <span class="menu-text">Cash Out</span>
                    </a>
                </li>
                <li class="menu-item " aria-haspopup="true">
                    <a href="{{route('merchant.contact_support.index')}}" class="menu-link ">
                        <i class="menu-icon flaticon-businesswoman"></i>
                        <span class="menu-text">Contact Support</span>
                    </a>
                </li>


            </ul>
            <!--end::Menu Nav-->
        </div>
        <div class="sidbarBottom">

            <div class="container">
                <div class="row">
                    <div class="col-sm-2 ">
                        <i class="menu-icon flaticon-user"></i>
                    </div>
                    <div class="col-sm-8 " style="margin-left: 10px;">
                        <p style=" font-size: 19px; font-weight: 400; ">
                            @if(Auth::guard('merchant')->check())
                                {{ auth()->guard('merchant')->user()->full_name }}
                            @endif
                        </p>
                        <p style="font-size: 15px; color: rgb(36, 36, 36); ">Merchant</p>
                        {{--                        <p style="font-size: 14px; color: rgb(82, 82, 82); ">wallet .................... 2500$</p>--}}
                    </div>
                    <div class=" col-sm-1 ">
                        <a href="{{route('merchant.logouts')}}"> <i class="menu-icon flaticon-logout"></i></a>
                    </div>
                </div>

            </div>
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->

</div>
