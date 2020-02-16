@extends('layouts.print')

@section('title')
    {{$user->name}} Point Table
@endsection

@section('content')

    <div class="bg-white border-radius p-5">
        <div class="row hidden-print">
            <div class="col-xs-6 mt-10"><h6 class="m-5"><i class="icon-printer"></i> {{$user->name}} Point Table</h6></div>
            <div class="col-xs-6 mt-10 text-right">
                <button type="button" class="btn btn-danger btn-xs heading-btn" onclick="history.go(-1)"><i class="icon-arrow-left16 position-left"></i> Go Back</button>
                <button type="button" class="btn btn-success btn-xs heading-btn" onclick="window.print()"><i class="icon-printer position-left"></i> Print</button>
            </div>
            <div class="col-xs-12"><hr class="mt-10 mb-10" /></div>
        </div>


        <div class="row">
            <div class="col-xs-12"><h5 class="text-center no-margin">Point Table For {{$user->name}}</h5></div>
        </div>
        <div class="row">
            <div class="col-xs-8"><b class="no-margin">Date: </b>{{$date_rang}}</div>
            <div class="col-xs-8"><b class="no-margin">Current Point: </b>{{$user->points}}</div>
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
                        <th class="p-5 pt-0 pb-0 ">Description</th>
                        <th class="p-5 pt-0 pb-0">Reference</th>
                        <th class="p-5 pt-0 pb-0 text-right">Point IN</th>
                        <th class="p-5 pt-0 pb-0 text-right">Point OUT</th>
                        <th class="p-5 pt-0 pb-0 text-right">Point</th>
                    </tr>
                    </thead>
                    <tbody class="text-size-mini">
                    @php
                        $i = 0;
                        $balance = 0;
                        $in = 0;
                        $out = 0;
                    @endphp
                    @foreach($table as $row)
                        @php
                            $balance += ($row->pointIN - $row->pointOUT);
                            $in += $row->pointIN;
                            $out += $row->pointOUT;
                        @endphp
                        <tr>
                            <td class="p-5 pt-0 pb-0 ">{{pub_date($row->created_at)}}</td>
                            <th class="p-5 pt-0 pb-0 ">{{$row->description}}</th>
                            <th class="p-5 pt-0 pb-0 ">{{$row->ref}}</th>
                            <td class="p-5 pt-0 pb-0 text-right">{{$row->pointIN}}</td>
                            <td class="p-5 pt-0 pb-0 text-right">{{$row->pointOUT}}</td>
                            <td class="p-5 pt-0 pb-0 text-right">{{$balance}}</td>
                        </tr>

                        @php
                            $i++;
                        @endphp

                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="p-5 pt-0 pb-0 text-right" colspan="3">Total ({{$i}})</th>
                        <th class="p-5 pt-0 pb-0 text-right">{{$in}}</th>
                        <th class="p-5 pt-0 pb-0 text-right">{{$out}}</th>
                        <th class="p-5 pt-0 pb-0 text-right">{{$balance}}</th>
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
