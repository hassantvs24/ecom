@extends('layouts.print')

@section('title')
    {{$user->name}} Commission Table
@endsection

@section('content')

    <div class="bg-white border-radius p-5">
        <div class="row hidden-print">
            <div class="col-xs-6 mt-10"><h6 class="m-5"><i class="icon-printer"></i> {{$user->name}} Commission Table</h6></div>
            <div class="col-xs-6 mt-10 text-right">
                <button type="button" class="btn btn-danger btn-xs heading-btn" onclick="history.go(-1)"><i class="icon-arrow-left16 position-left"></i> Go Back</button>
                <button type="button" class="btn btn-success btn-xs heading-btn" onclick="window.print()"><i class="icon-printer position-left"></i> Print</button>
            </div>
            <div class="col-xs-12"><hr class="mt-10 mb-10" /></div>
        </div>

        <div class="row">
            <div class="col-xs-12"><h5 class="text-center no-margin">Commission Table For {{$user->name}}</h5></div>
        </div>
        <div class="row">
            <div class="col-xs-8"><b class="no-margin">Date: </b>{{$date_rang}}</div>
            <div class="col-xs-8"><b class="no-margin">User Level: </b>{{$user->userLevel}}</div>
            <div class="col-xs-4 text-right"><b class="no-margin">Report Date: </b>{{date("d/m/Y") }}</div>
        </div>
        <div class="row">
            <div class="col-xs-12"><hr class="mt-10 mb-10" /></div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-bordered table-striped table-hover table-condensed" id="myTable">
                    <thead>
                    <tr>
                        <th class="p-5 pt-0 pb-0 no-padding-top">Date</th>
                        <th class="p-5 pt-0 pb-0 ">Order ID</th>
                        <th class="p-5 pt-0 pb-0">SKU</th>
                        <th class="p-5 pt-0 pb-0">Product</th>
                        <th class="p-5 pt-0 pb-0 text-right">%</th>
                        <th class="p-5 pt-0 pb-0 text-right">Price</th>
                        <th class="p-5 pt-0 pb-0 text-right">Commission</th>
                    </tr>
                    </thead>
                    <tbody class="text-size-mini">
                    @php
                        $i = 0;
                        $price = 0;
                        $commission = 0;
                    @endphp
                    @foreach($table as $row)
                        @php
                            $price += $row->price;
                            $commission += $row->amount;
                        @endphp
                        <tr>
                            <td class="p-5 pt-0 pb-0 ">{{pub_date($row->created_at)}}</td>
                            <th class="p-5 pt-0 pb-0 ">{{$row->orderID}}</th>
                            <th class="p-5 pt-0 pb-0 ">{{$row->sku}}</th>
                            <td class="p-5 pt-0 pb-0">{{$row->name}}</td>
                            <td class="p-5 pt-0 pb-0 text-right">{{$row->percents}}%</td>
                            <td class="p-5 pt-0 pb-0 text-right">{{money($row->price)}}</td>
                            <td class="p-5 pt-0 pb-0 text-right">{{money($row->amount)}}</td>
                        </tr>

                        @php
                            $i++;
                        @endphp

                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="p-5 pt-0 pb-0 text-right" colspan="5">Total ({{$i}})</th>
                        <th class="p-5 pt-0 pb-0 text-right">{{money($price)}}</th>
                        <th class="p-5 pt-0 pb-0 text-right">{{money($commission)}}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>



@endsection

@section('script')
    <script type="text/javascript" src="{{asset('public/js/jquery.tablesorter.min.js')}}"></script>

    <script type="text/javascript">
        $(function () {

            $("#myTable").tablesorter();
        })

    </script>
@endsection
