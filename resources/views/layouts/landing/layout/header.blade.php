{{--<header class="main-header">--}}
{{--    <section id="mobile" class="show-xs">--}}
{{--        <a class="show-xs pull-right" href="/"><i class="fa fa-home"></i></a>--}}
{{--        <a class="hidden-xs" href="/"><img src="image/screen/header/logo-construction-small.png" id="logo" /></a>--}}
{{--        <button class="pull-left" ><i class="material-icons ti-menu"></i></button>--}}
{{--        <ul class="pull-left">--}}
{{--            <li><a class="labels" href="login.php"><i class="material-icons ti-user"></i></a></li>--}}
{{--            <li data-toggle="modal" data-target="#searchModal">  </li>--}}
{{--        </ul>--}}
{{--    </section>--}}
{{--    <section id="topbar" class="hidden-xs">--}}
{{--        <div class="widthParallel clearfix centerBox">--}}
{{--            <article class="col-sm-3 pull-right">--}}
{{--                <a href="index.php">--}}
{{--                                       <img src="{{ URL::asset('/image/screen/header/LOGO1.png') }}" id="logo1" />--}}
{{--                                        <img src="image/screen/header/brsa.png" id="logo2" />--}}

{{--                </a>--}}
{{--            </article>--}}
{{--            <article id="nav" class="pull-left option hidden-sm">--}}
{{--                <ul>--}}
{{--                    <li><a class="labels" href="{{route('user.dashboard')}}"><i class="ti-user"></i></a></li>--}}
{{--                    <li data-toggle="modal" data-target="#searchModal">   </li>--}}


{{--                </ul>--}}
{{--            </article>--}}
{{--            <article id="nav" class="pull-left navigate" >--}}
{{--                @include('landing.includes.menu.main')--}}
{{--            </article>--}}

{{--    </section>--}}

{{--</header>--}}
<!-- Start Header -->
<style>
    .btn.dropdown-toggle.btn-light{
        border-radius: 20px;
        width: 80px;
    }
</style>
<nav class="navbar" id="navbar">
    <div class="container">
        <img src="/assets/media/logos/Cash2Pay Logo.png" alt="" width="50" height="50"><a href="#" class="logo" style="color: black">cash2pay</a>
        <div class="nav-links">
            <a href="{{route('agent.register')}}" class="fill">Become an Agent</a>
            <a href="{{route('merchant.register')}}" class="fill">Become a Merchant</a>

            <a href="{{route('agent.login')}}" class="btn btn-primary" style="width: 150px; border-radius: 20px;background-color: #f2911b;border-color: #f2911b;">Agents Login</a>
            <a href="{{route('merchant.login')}}" class="btn btn-primary" style="width: 200px; border-radius: 20px;background-color: #f2911b;border-color: #f2911b;">Merchants Login</a>



            <select  class="selectpicker">
                <div class="lang">
                    <option data-icon="glyphicon glyphicon-eye-open">EN</option>
                    <option data-icon="glyphicon glyphicon-fire" >FR</option>
                </div>

            </select>

            <div class="toggle-menu scale-effect">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="toggle-menu scale-effect">
            <i class="fas fa-bars"></i>
        </div>
    </div>
</nav>

