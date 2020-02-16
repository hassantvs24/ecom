@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Top custom border</h6>
                </div>

                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-3">
                            <div class="panel bg-teal-400">
                                <div class="panel-body">
                                    <h3 class="no-margin"><i class="icon-wave2"></i> {{$customer}}</h3>
                                    <p>Members</p>
                                </div>

                                <div class="container-fluid">

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="panel bg-warning-400">
                                <div class="panel-body">
                                    <h3 class="no-margin"><i class="icon-wave2"></i> {{$chat}}</h3>
                                    <p>Chat Request</p>
                                </div>

                                <div class="container-fluid">

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="panel bg-primary-400">
                                <div class="panel-body">
                                    <h3 class="no-margin"><i class="icon-wave2"></i> {{$order_pending}}</h3>
                                    <p>Order Pending</p>
                                </div>

                                <div class="container-fluid">

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="panel bg-danger-400">
                                <div class="panel-body">
                                    <h3 class="no-margin"><i class="icon-wave2"></i> {{$order_paid}}</h3>
                                    <p>Paid Order</p>
                                </div>

                                <div class="container-fluid">

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="panel bg-blue-400">
                                <div class="panel-body">
                                    <h3 class="no-margin"><i class="icon-wave2"></i> {{$order_process}}</h3>
                                    <p>Order On Processing</p>
                                </div>

                                <div class="container-fluid">

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="panel bg-green-400">
                                <div class="panel-body">
                                    <h3 class="no-margin"><i class="icon-wave2"></i> {{$order_shipped}}</h3>
                                    <p>Order Shipped</p>
                                </div>

                                <div class="container-fluid">

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="panel bg-teal-400">
                                <div class="panel-body">
                                    <h3 class="no-margin"><i class="icon-wave2"></i> {{$order_complete}}</h3>
                                    <p>Complete Order</p>
                                </div>

                                <div class="container-fluid">

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="panel bg-purple-400">
                                <div class="panel-body">
                                    <h3 class="no-margin"><i class="icon-wave2"></i> {{$product}}</h3>
                                    <p>Total Product</p>
                                </div>

                                <div class="container-fluid">

                                </div>
                            </div>
                        </div>

                        <!--
                        <div class="panel bg-teal-400">
                            <div class="panel-body">
                                <div class="heading-elements">
                                    <span class="heading-text badge bg-teal-800">+53,6%</span>
                                </div>

                                <h3 class="no-margin">3,450</h3>
                                Members online
                                <div class="text-muted text-size-small">489 avg</div>
                            </div>

                            <div class="container-fluid">
                                <div id="members-online"><svg width="318.66668701171875" height="50"><g width="318.66668701171875"><rect class="d3-random-bars" width="9.179698802806712" x="3.934156629774305" style="fill: rgba(255, 255, 255, 0.5);" height="45" y="5"></rect><rect class="d3-random-bars" width="9.179698802806712" x="17.048012062355323" style="fill: rgba(255, 255, 255, 0.5);" height="37.5" y="12.5"></rect><rect class="d3-random-bars" width="9.179698802806712" x="30.161867494936338" style="fill: rgba(255, 255, 255, 0.5);" height="25" y="25"></rect><rect class="d3-random-bars" width="9.179698802806712" x="43.27572292751736" style="fill: rgba(255, 255, 255, 0.5);" height="37.5" y="12.5"></rect><rect class="d3-random-bars" width="9.179698802806712" x="56.389578360098376" style="fill: rgba(255, 255, 255, 0.5);" height="37.5" y="12.5"></rect><rect class="d3-random-bars" width="9.179698802806712" x="69.50343379267939" style="fill: rgba(255, 255, 255, 0.5);" height="47.5" y="2.5"></rect><rect class="d3-random-bars" width="9.179698802806712" x="82.61728922526041" style="fill: rgba(255, 255, 255, 0.5);" height="32.5" y="17.5"></rect><rect class="d3-random-bars" width="9.179698802806712" x="95.73114465784143" style="fill: rgba(255, 255, 255, 0.5);" height="30" y="20"></rect><rect class="d3-random-bars" width="9.179698802806712" x="108.84500009042245" style="fill: rgba(255, 255, 255, 0.5);" height="40" y="10"></rect><rect class="d3-random-bars" width="9.179698802806712" x="121.95885552300346" style="fill: rgba(255, 255, 255, 0.5);" height="40" y="10"></rect><rect class="d3-random-bars" width="9.179698802806712" x="135.07271095558445" style="fill: rgba(255, 255, 255, 0.5);" height="35" y="15"></rect><rect class="d3-random-bars" width="9.179698802806712" x="148.1865663881655" style="fill: rgba(255, 255, 255, 0.5);" height="42.5" y="7.5"></rect><rect class="d3-random-bars" width="9.179698802806712" x="161.3004218207465" style="fill: rgba(255, 255, 255, 0.5);" height="30" y="20"></rect><rect class="d3-random-bars" width="9.179698802806712" x="174.41427725332753" style="fill: rgba(255, 255, 255, 0.5);" height="30" y="20"></rect><rect class="d3-random-bars" width="9.179698802806712" x="187.52813268590853" style="fill: rgba(255, 255, 255, 0.5);" height="25" y="25"></rect><rect class="d3-random-bars" width="9.179698802806712" x="200.64198811848956" style="fill: rgba(255, 255, 255, 0.5);" height="40" y="10"></rect><rect class="d3-random-bars" width="9.179698802806712" x="213.75584355107057" style="fill: rgba(255, 255, 255, 0.5);" height="45" y="5"></rect><rect class="d3-random-bars" width="9.179698802806712" x="226.86969898365157" style="fill: rgba(255, 255, 255, 0.5);" height="45" y="5"></rect><rect class="d3-random-bars" width="9.179698802806712" x="239.9835544162326" style="fill: rgba(255, 255, 255, 0.5);" height="35" y="15"></rect><rect class="d3-random-bars" width="9.179698802806712" x="253.0974098488136" style="fill: rgba(255, 255, 255, 0.5);" height="27.500000000000004" y="22.499999999999996"></rect><rect class="d3-random-bars" width="9.179698802806712" x="266.2112652813946" style="fill: rgba(255, 255, 255, 0.5);" height="30" y="20"></rect><rect class="d3-random-bars" width="9.179698802806712" x="279.32512071397565" style="fill: rgba(255, 255, 255, 0.5);" height="50" y="0"></rect><rect class="d3-random-bars" width="9.179698802806712" x="292.4389761465567" style="fill: rgba(255, 255, 255, 0.5);" height="42.5" y="7.5"></rect><rect class="d3-random-bars" width="9.179698802806712" x="305.5528315791377" style="fill: rgba(255, 255, 255, 0.5);" height="37.5" y="12.5"></rect></g></svg></div>
                            </div>
                        </div>
                        -->


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')


    <script type="text/javascript">




    </script>

@endsection
