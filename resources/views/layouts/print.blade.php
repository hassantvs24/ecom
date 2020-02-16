<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | E-commerce</title>

    <!-- Global stylesheets -->
    <link href="{{asset('public/fonts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/assets/css/core.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <link href="{{asset('public/custom.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/print.css')}}" rel="stylesheet" type="text/css" media="print">
    @yield('style')
</head>

<body>

<div class="container">

    <div class="content">
        @yield('content')

        <div class="row">
            <div class="col-xs-12 text-center text-size-mini text-italic text-muted">
                Design and developed by <strong>Infinity Flame Soft</strong>; contact: +8801675870047
            </div>
        </div>
    </div>

</div>
<!-- Core JS files -->
@yield('script_up')
<script type="text/javascript" src="{{asset('public/assets/js/plugins/loaders/pace.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/plugins/ui/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/core/libraries/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/core/libraries/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/plugins/loaders/blockui.min.js')}}"></script>
<!-- /core JS files -->

<script type="text/javascript" src="{{asset('public/js/jquery.hotkeys.js')}}"></script>

<script type="text/javascript" src="{{asset('public/custom.js')}}"></script>


@yield('script')

</body>
</html>

<!--
Copyright © Infinity Flame Soft
Author: Nazmul Hossain
Company: Infinity Flame Soft
Contact: +8801675870047
Email: wall.mate@gmail.com
-->
