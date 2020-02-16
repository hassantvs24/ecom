<div class="sidebar sidebar-main sidebar-fixed">
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->

                    <li class="{{ (Request::routeIs('dashboard')) ? 'active' : '' }} {{is_show('dashboard')}}"><a href="{{ route('dashboard') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>

                    <li class="navigation-divider"></li>
                    @if( is_show('orders-report') == 'show_view' || is_show('cancel') == 'show_view' || is_show('orders') == 'show_view' || is_show('paid') == 'show_view' || is_show('process') == 'show_view' || is_show('shipped') == 'show_view' || is_show('complete') == 'show_view')
                    <li class="{{ (request()->is('admin/order*')) ? 'active' : '' }}"><a href=""><i class="icon-bag"></i> <span>Order</span></a>
                        <ul>
                            <li class="{{ (Request::routeIs('orders')) ? 'active' : '' }} {{is_show('orders')}}"><a href="{{ route('orders') }}"><i class="icon-diamond3"></i> Initial Order</a></li>
                            <li class="{{ (Request::routeIs('paid')) ? 'active' : '' }} {{is_show('paid')}}"><a href="{{ route('paid') }}"><i class="icon-diamond3"></i> Paid Order</a></li>
                            <li class="{{ (Request::routeIs('process')) ? 'active' : '' }} {{is_show('process')}}"><a href="{{ route('process') }}"><i class="icon-diamond3"></i> Order Processing</a></li>
                            <li class="{{ (Request::routeIs('shipped')) ? 'active' : '' }} {{is_show('shipped')}}"><a href="{{ route('shipped') }}"><i class="icon-diamond3"></i> Order Shipped</a></li>
                            <li class="{{ (Request::routeIs('complete')) ? 'active' : '' }} {{is_show('complete')}}"><a href="{{ route('complete') }}"><i class="icon-diamond3"></i> Order Complete</a></li>
                            <li class="{{ (Request::routeIs('cancel')) ? 'active' : '' }} {{is_show('cancel')}}"><a href="{{ route('cancel') }}"><i class="icon-diamond3"></i> Order Cancel</a></li>
                            <li class="{{ (Request::routeIs('orders-report')) ? 'active' : '' }} {{is_show('orders-report')}}"><a href="{{ route('orders-report') }}"><i class="icon-diamond3"></i> Order Report</a></li>
                        </ul>
                    </li>
                    @endif

                    @if( is_show('product') == 'show_view' || is_show('promotional') == 'show_view')
                    <li class="{{ (request()->is('admin/product*')) ? 'active' : '' }}"><a href=""><i class="icon-cube"></i> <span>Products</span></a>
                        <ul>
                            <li class="{{ (Request::routeIs('product')) ? 'active' : '' }} {{is_show('product')}}"><a href="{{ route('product') }}"><i class="icon-diamond3"></i> All Products</a></li>
                            <li class="{{ (Request::routeIs('promotional')) ? 'active' : '' }} {{is_show('promotional')}}"><a href="{{ route('promotional') }}"><i class="icon-diamond3"></i> Promotional Products</a></li>
                        </ul>
                    </li>
                    @endif

                    @if( is_show('rate') == 'show_view' || is_show('carrier') == 'show_view' || is_show('location') == 'show_view')
                    <li class=""><a href=""><i class="icon-ship"></i> <span>Shipping</span></a>
                        <ul>
                            <li class="{{ (Request::routeIs('rate')) ? 'active' : '' }} {{is_show('rate')}}"><a href="{{route('rate')}}"><i class="icon-diamond3"></i> Shipping Cost</a></li>
                            <li class="{{ (Request::routeIs('carrier')) ? 'active' : '' }} {{is_show('carrier')}}"><a href="{{route('carrier')}}"><i class="icon-diamond3"></i> Carrier</a></li>
                            <li class="{{ (Request::routeIs('location')) ? 'active' : '' }} {{is_show('location')}}"><a href="{{route('location')}}"><i class="icon-diamond3"></i> Location</a></li>
                        </ul>
                    </li>
                    @endif

                    <li class="{{ (Request::routeIs('adchat')) ? 'active' : '' }} {{is_show('adchat')}}"><a href="{{ route('adchat') }}"><i class="icon-bubbles9"></i> <span>Live Chat  </span></a></li>

                    <li class="{{ (Request::routeIs('redemption')) ? 'active' : '' }} {{is_show('redemption')}}"><a href="{{ route('redemption') }}"><i class="icon-gift"></i> <span>Redemption  </span></a></li>
                    <li class="{{ (Request::routeIs('advertise')) ? 'active' : '' }} {{is_show('advertise')}}"><a href="{{ route('advertise') }}"><i class="icon-image2"></i> <span>Advertisement </span></a></li>

                    @if( is_show('salesman') == 'show_view' || is_show('distributor') == 'show_view' || is_show('customer') == 'show_view')
                    <li class="{{ (request()->is('admin/consumer*')) ? 'active' : '' }}"><a href="#"><i class="icon-users2"></i> <span>Consumer</span></a>
                        <ul>
                            <li class="{{ (Request::routeIs('salesman')) ? 'active' : '' }} {{is_show('salesman')}}"><a href="{{ route('salesman') }}"><i class="icon-diamond3"></i> Salesman</a></li>
                            <li class="{{ (Request::routeIs('distributor')) ? 'active' : '' }} {{is_show('distributor')}}"><a href="{{ route('distributor') }}"><i class="icon-diamond3"></i> Distributor</a></li>
                            <li class="{{ (Request::routeIs('customer')) ? 'active' : '' }} {{is_show('customer')}}"><a href="{{ route('customer') }}"><i class="icon-diamond3"></i> Customer</a></li>
                        </ul>
                    </li>
                    @endif
                    <li class="{{ (request()->is('admin/page*')) ? 'active' : '' }}"><a href="#"><i class="icon-shutter"></i> <span>Webpage</span></a>
                        <ul>
                            <li class="{{ (Request::routeIs('webpage')) ? 'active' : '' }}"><a href="{{ route('webpage') }}"><i class="icon-diamond3"></i> Page Content</a></li>
                            <li class="{{ (Request::routeIs('banner')) ? 'active' : '' }}"><a href="{{ route('banner') }}"><i class="icon-diamond3"></i> Page Banner</a></li>
                        </ul>
                    </li>
                    @if( is_show('user') == 'show_view' || is_show('role') == 'show_view')
                    <li class="navigation-divider"></li>
                    <li class="{{ (request()->is('admin/user*')) ? 'active' : '' }}"><a href="#"><i class="icon-user"></i> <span>Users</span></a>
                        <ul>
                            <li class="{{ (Request::routeIs('user')) ? 'active' : '' }} {{is_show('user')}}"><a href="{{ route('user') }}"><i class="icon-diamond3"></i> All Users</a></li>
                            <li class="{{ (Request::routeIs('role')) ? 'active' : '' }} {{is_show('role')}}"><a href="{{ route('role') }}"><i class="icon-diamond3"></i> User Role</a></li>
                        </ul>
                    </li>
                    @endif
                    <li class="navigation-divider"></li>



                </ul>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>
