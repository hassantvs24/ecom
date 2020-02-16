<div class="navbar navbar-default navbar-fixed-top header-highlight">
    <div class="navbar-header">
        <a class="navbar-brand" href="#"><img src="{{asset('public/assets/images/logo_light.png')}}" alt=""></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs" id="sidebarToggle" data-url="{{ action('MainController@saveState') }}"><i class="icon-paragraph-justify3"></i></a></li>

        </ul>


        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{route('site')}}" title="Go to website"><i class="icon-store2"></i></a></li>
            <li><a href="" title="Refresh this page"><i class="icon-spinner4 spinner"></i></a></li>

            <!--Stock Notification-->
            <!--<li title="Stock notification" class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-truck"></i>
                    <span class="visible-xs-inline-block position-right">Stock Notification</span>
                    <span class="badge bg-warning-400" id="stockNotify">0</span>
                </a>

                <div class="dropdown-menu dropdown-content">
                    <div class="row">
                        <div class="col-xs-6 dropdown-content-heading"><span style="padding: 2px 5px;" class="bg-danger">Out of stock: <span id="out_stock_notify">0</span></span></div>
                        <div class="col-xs-6 dropdown-content-heading text-right"> <span style="padding: 2px 5px;"  class="bg-primary">Stock Warning: <span id="notify_warning">0</span></span></div>

                    </div>

                    <ul class="media-list dropdown-content-body width-350" id="stock_notify_li">

                    </ul>

                </div>
            </li>-->
            <!--/Stock Notification-->





            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-user-tie"></i>
                    <span>{{ isset(Auth::user()->name) ? Auth::user()->name : 'User name' }}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-user-plus"></i> {{ isset(Auth::user()->name) ? Auth::user()->name : 'User name' }}</a></li>
                    <li><a href="#"><i class="icon-paperplane"></i> {{ isset(Auth::user()->email) ? Auth::user()->email : 'User email' }}</a></li>
                    @if(Request::is('/'))
                    <li><a href="#"  data-toggle="modal" data-target="#myModal"><i class="icon-store2"></i> Company Profile</a></li>
                    <li><a href="#"  data-toggle="modal" data-target="#codexModal"><i class="icon-regexp"></i> Pin Code</a></li>
                    @endif
                    <li class="divider"></li>
                    <!--<li><a href="#"><i class="icon-fan"></i> Account settings</a></li>-->
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="icon-switch2"></i> Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>

                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
