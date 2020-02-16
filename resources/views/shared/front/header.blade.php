<!-- Header -->
<header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">
        <div class="topbar">
            <!--<div class="topbar-social">
                <a href="#" class="topbar-social-item fa fa-facebook"></a>
                <a href="#" class="topbar-social-item fa fa-instagram"></a>
                <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
            </div>

            <span class="topbar-child1">
					Free shipping for standard order over $100
				</span>

            <div class="topbar-child2">
					<span class="topbar-email">
						fashe@example.com
					</span>

                <div class="topbar-language rs1-select2">
                    <select class="selection-1" name="time">
                        <option>USD</option>
                        <option>EUR</option>
                    </select>
                </div>
            </div>-->
        </div>

        <div class="wrap_header">
            <!-- Logo -->
            <a href="{{route('site')}}" class="logo">
                <img src="{{asset('public/front/images/icons/logo.png')}}" alt="IMG-LOGO">
            </a>

            <!-- Menu -->
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li class="{{ (Request::routeIs('site')) ? 'sale-noti' : '' }}">
                            <a href="{{route('site')}}">Home</a>
                        </li>

                        <li class="{{ (Request::routeIs('site-shop')) ? 'sale-noti' : '' }}">
                            <a href="{{route('site-shop')}}">Shop</a>
                        </li>

                        <li class="{{ (Request::routeIs('site-redeem')) ? 'sale-noti' : '' }}">
                            <a href="{{route('site-redeem')}}">Redemption</a>
                        </li>

                        <li class="{{ (Request::routeIs('site-promotion')) ? 'sale-noti' : '' }}">
                            <a href="{{route('site-promotion')}}">Promotion</a>
                        </li>

                        <li class="{{ (Request::routeIs('cart')) ? 'sale-noti' : '' }}">
                            <a href="{{route('cart')}}">Cart List</a>
                        </li>

                        <li class="{{ (Request::routeIs('about')) ? 'sale-noti' : '' }}">
                            <a href="{{route('about')}}">About</a>
                        </li>

                        <li class="{{ (Request::routeIs('contact')) ? 'sale-noti' : '' }}">
                            <a href="{{route('contact')}}">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">
                @if(Auth::check())

                    <p title="{{Auth::user()->name}}" class="header-wrapicon1 dis-block js-show-header-dropdown2">
                    <img src="{{asset('public/front/images/icons/icon-header-01x.png')}}" class="header-icon1" alt="{{Auth::user()->name}}">
                    </p>

                    <div class="header-cart header-dropdown2">


                        <div class="m-b-15 text-center"  data-url="{{route('login-ref',['id' =>Auth::user()->id])}}">
                            <p>{{Auth::user()->name}}</p>
                            <img class="img-thumbnail img-responsive" src="data:image/png;base64,{{DNS2D::getBarcodePNG(route('login-ref',['id' =>Auth::user()->id]), 'QRCODE', 7,7)}}" alt="barcode" title="Share your barcode for getting reference point."  />
                        </div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="{{route('profile')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    View Profile
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Logout
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </a>
                            </div>
                        </div>
                    </div>

                    @else
                    <a href="{{ route('login-register') }}" title="Login" class="header-wrapicon1 dis-block">
                        <img src="{{asset('public/front/images/icons/icon-header-01.png')}}" class="header-icon1" alt="ICON">
                    </a>

                @endif


                <span class="linedivide1"></span>

                <div class="header-wrapicon2">
                    <img src="{{asset('public/front/images/icons/icon-header-02.png')}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti">5</span>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            <!--Cart list -->
                        </ul>


                        <div class="header-cart-total">
                            Total Points: <span class="text-danger" id="car_point"></span> | Total: <span>00.00</span>
                        </div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="{{route('cart')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    View Cart
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="{{route('proceed')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Check Out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
        <!-- Logo moblie -->
        <a href="{{route('site')}}" class="logo-mobile">
            <img src="{{asset('public/front/images/icons/logo.png')}}" alt="IMG-LOGO">
        </a>

        <!-- Button show menu -->
        <div class="btn-show-menu">
            <!-- Header Icon mobile -->
            <div class="header-icons-mobile">

                @if(Auth::check())

                    <p title="{{Auth::user()->name}}" class="header-wrapicon1 dis-block js-show-header-dropdown2">
                        <img src="{{asset('public/front/images/icons/icon-header-01x.png')}}" class="header-icon1" alt="{{Auth::user()->name}}">
                    </p>

                    <div class="header-cart header-dropdown2" style="top: 80px; left: 15px;">


                        <div class="m-b-15 text-center"  data-url="{{route('login-ref',['id' =>Auth::user()->id])}}">
                            <p>{{Auth::user()->name}}</p>
                            <img class="img-thumbnail img-responsive" src="data:image/png;base64,{{DNS2D::getBarcodePNG(route('login-ref',['id' =>Auth::user()->id]), 'QRCODE', 7,7)}}" alt="barcode" title="Share your barcode for getting reference point."  />
                        </div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="{{route('profile')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    View Profile
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Logout
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </a>
                            </div>
                        </div>
                    </div>

                @else
                    <a href="{{ route('login-register') }}" class="header-wrapicon1 dis-block">
                        <img src="{{asset('public/front/images/icons/icon-header-01.png')}}" class="header-icon1" alt="ICON">
                    </a>

                @endif





                <span class="linedivide2"></span>

                    <div class="header-wrapicon2">
                        <img src="{{asset('public/front/images/icons/icon-header-02.png')}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
                        <span class="header-icons-noti">5</span>

                        <!-- Header cart noti -->
                        <div class="header-cart header-dropdown">
                            <ul class="header-cart-wrapitem">
                                <!--Cart list -->
                            </ul>


                            <div class="header-cart-total">
                                Total Points: <span class="text-danger" id="car_point"></span> | Total: <span>00.00</span>
                            </div>

                            <div class="header-cart-buttons">
                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="{{route('cart')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        View Cart
                                    </a>
                                </div>

                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="{{route('proceed')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        Check Out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>

            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu" >
        <nav class="side-menu">
            <ul class="main-menu">

                <li class="item-menu-mobile {{ (Request::routeIs('site')) ? 'sale-noti' : '' }}">
                    <a href="{{route('site')}}">Home</a>
                </li>

                <li class="item-menu-mobile {{ (Request::routeIs('site-shop')) ? 'sale-noti' : '' }}">
                    <a href="{{route('site-shop')}}">Shop</a>
                </li>

                <li class="item-menu-mobile {{ (Request::routeIs('site-redeem')) ? 'sale-noti' : '' }}">
                    <a href="{{route('site-redeem')}}">Redemption</a>
                </li>

                <li class="item-menu-mobile {{ (Request::routeIs('site-promotion')) ? 'sale-noti' : '' }}">
                    <a href="{{route('site-promotion')}}">Promotion</a>
                </li>

                <li class="item-menu-mobile {{ (Request::routeIs('cart')) ? 'sale-noti' : '' }}">
                    <a href="{{route('cart')}}">Cart List</a>
                </li>

                <li class="item-menu-mobile {{ (Request::routeIs('about')) ? 'sale-noti' : '' }}">
                    <a href="{{route('about')}}">About</a>
                </li>

                <li class="item-menu-mobile {{ (Request::routeIs('contact')) ? 'sale-noti' : '' }}">
                    <a href="{{route('contact')}}">Contact</a>
                </li>

            </ul>
        </nav>
    </div>
</header>
