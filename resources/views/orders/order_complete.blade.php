@extends('layouts.master')
@extends('box.orders.show_order')
@section('title')
    Shipped Order
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Orders in Shipped</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>

                            <th>S/N</th>
                            <th>TrackNo</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Notes</th>
                            <th>Qty</th>
                            <th>Amount / Points</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($table as $row)
                            @php
                                $items = $row->items()->select('price', 'qty')->get();
                                $qty = 0;
                                $amount = 0;
                                foreach ($items as $rows){
                                    $qty += $rows->qty;
                                    $amount += $rows->qty * $rows->price;
                                }

                                $rdm_items = $row->rdm_items()->get();
                                $qtyr = 0;
                                $amountr = 0;
                                foreach ($rdm_items as $rowsr){
                                    $qtyr += $rowsr->qty;
                                    $amountr += $rowsr->qty * $rowsr->point;
                                }


                            @endphp
                            <tr>
                                <td>{{$row->orderID}}</td>
                                <td>{{$row->trackNumber}}</td>
                                <td>{{pub_date($row->created_at)}}</td>
                                <td>{{$row->customer['name'] ?? ''}}</td>
                                <td>{{$row->customer['contact'] ?? ''}}</td>
                                <td>{{$row->customer['email'] ?? ''}}</td>
                                <td>{{$row->notes}}</td>
                                <td>{{$qty}}</td>
                                <td>{{money($amount + $row->shipCost)}} / {{$amountr}}</td>
                                <td class="text-right white_sp">
                                    <button type="button" class="btn btn-xs btn-info no-padding mr-5 view_btn" data-status="{{route('order-status', ['id' => $row->orderID, 'status' => 'Complete'])}}" data-url="{{route('order-show', ['id' => $row->orderID])}}" data-toggle="modal" data-target="#viewModal" title="View Order"><i class="icon-eye"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{route('order-status', ['id' => $row->orderID, 'status' => 'Hide'])}}" onclick="return confirm('Are you sure to hide this order?')" title="Hide"><i class="icon-eye-blocked"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')


    <script type="text/javascript">


        $(function () {

            $('.view_btn').click(function () {
                var url = $(this).data('url');
                var status = $(this).data('status');

                $.get( url, function( result ) {
                    $( ".show_content" ).html( result );
                    $( "#myModal .status" ).attr('href', status);

                });
            });

        });
        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                columnDefs: [
                    { orderable: false, "targets": [8] }//For Column Order
                ]
            });

        });
    </script>

@endsection
