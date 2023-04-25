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
                <li class="menu-item " aria-haspopup="true"><a href="{{route('admin.dashboard')}}" class="menu-link "><i
                                class="menu-icon flaticon-price-tag"></i><span
                                class="menu-text">Payments</span></a></li>
                <li class="menu-item " aria-haspopup="true"><a href="{{route('admin.agent.index')}}" class="menu-link "><i
                                class="menu-icon flaticon-users"></i><span
                                class="menu-text">Agents</span></a></li>
                <li class="menu-item " aria-haspopup="true"><a href="{{route('admin.merchant.index')}}" class="menu-link "><i
                                class="menu-icon flaticon-business"></i><span
                                class="menu-text">Merchants</span></a></li>


                <li class="menu-item " aria-haspopup="true"><a href="{{route('admin.settlement')}}" class="menu-link "><i
                                class="menu-icon flaticon-paper-plane"></i><span
                                class="menu-text">Settlement Requests</span></a></li>

                <li class="menu-item " aria-haspopup="true"><a href="{{route('admin.top_request')}}" class="menu-link "><i
                                class="menu-icon flaticon2-plus"></i><span
                                class="menu-text">Top-Up Requests</span></a></li>



                <li class="menu-item " aria-haspopup="true"><a href="{{route('admin.partner.index')}}" class="menu-link "><i
                                class="menu-icon flaticon-customer"></i><span
                                class="menu-text">Partnership Requests</span></a></li>
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
                        <p style=" font-size: 19px; font-weight: 400; ">{{ auth()->guard('admin')->user()->name }}</p>
                        <p style="font-size: 15px; color: rgb(36, 36, 36); ">Admin</p>

                    </div>
                    <div class=" col-sm-1 ">
                        <a href="{{route('admin.logout')}}"> <i class="menu-icon flaticon-logout"></i></a>

                    </div>
                </div>

            </div>
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->

</div>
