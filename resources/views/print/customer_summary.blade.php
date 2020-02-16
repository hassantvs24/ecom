@extends('layouts.print')

@section('title')
    DISTRIBUTOR SUMMARY
@endsection

@section('content')

    <div class="bg-white border-radius p-5">
        <div class="row hidden-print">
            <div class="col-xs-6 mt-10"><h6 class="m-5"><i class="icon-printer"></i> DISTRIBUTOR SUMMARY</h6></div>
            <div class="col-xs-6 mt-10 text-right">
                <button type="button" class="btn btn-danger btn-xs heading-btn" onclick="history.go(-1)"><i class="icon-arrow-left16 position-left"></i> Go Back</button>
                <button type="button" class="btn btn-success btn-xs heading-btn" onclick="window.print()"><i class="icon-printer position-left"></i> Print</button>
            </div>
            <div class="col-xs-12"><hr class="mt-10 mb-10" /></div>
        </div>

        <div class="row">
            <div class="col-xs-12"><h5 class="text-center no-margin">DISTRIBUTOR SUMMARY</h5></div>
        </div>
        <div class="row">
            <div class="col-xs-8"><b class="no-margin">Date: </b>{{$date_rang}}</div>
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
                        <th class="p-5 pt-0 pb-0 no-padding-top">NO</th>
                        <th class="p-5 pt-0 pb-0 ">CUSTOMER</th>
                        <th class="p-5 pt-0 pb-0">SALES</th>
                        <th class="p-5 pt-0 pb-0">COMMISSION</th>
                    </tr>
                    </thead>
                    <tbody class="text-size-mini">
                    @php
                        $sale = 0;
                        $comission = 0;
                    @endphp

                    @foreach($table as $row)
                        <tr>
                            <td class="p-5 pt-0 pb-0">{{$row['no']}}</td>
                            <td class="p-5 pt-0 pb-0">{{$row['name']}}</td>
                            <td class="p-5 pt-0 pb-0">{{$row['sales']}}</td>
                            <td class="p-5 pt-0 pb-0">{{$row['commission']}}</td>
                        </tr>
                        @php
                            $sale += $row['sales'];
                            $comission += $row['commission'];
                        @endphp
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="p-5 pt-0 pb-0 text-right" colspan="2">Total</th>
                        <th class="p-5 pt-0 pb-0">{{$sale}}</th>
                        <th class="p-5 pt-0 pb-0">{{$comission}}</th>
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

