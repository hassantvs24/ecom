@extends('layouts.master')
@extends('box.orders.show_order')
@section('title')
    Paid Order
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Paid Orders</h6>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-primary markAll">Mark All</button>
                        </div>
                        <div class="col-md-6 text-right">
                            <button class="btn btn-success nextProcess">Send All to next process</button>
                            <button class="btn btn-danger orderCancel">Cancel All</button>
                        </div>
                    </div>
                    <form id="actionForm" action="{{route('orders-mark')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                        {{csrf_field()}}
                        <input type="hidden" name="acType" class="acType">
                        <input type="hidden" name="status" value="Processing">
                        <input type="hidden" name="trackNumber" class="trNumber">
                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>S/N</th>
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
                                <td><input class="mark" type="checkbox" name="orderID[]" value="{{$row->orderID}}"></td>
                                <td>{{$row->orderID}}</td>
                                <td>{{pub_date($row->created_at)}}</td>
                                <td>{{$row->customer['name'] ?? ''}}</td>
                                <td>{{$row->customer['contact'] ?? ''}}</td>
                                <td>{{$row->customer['email'] ?? ''}}</td>
                                <td>{{$row->notes}}</td>
                                <td>{{$qty}}</td>
                                <td>{{money($amount + $row->shipCost)}} / {{$amountr}}</td>
                                <td class="text-right white_sp">
                                    <button type="button" class="btn btn-xs btn-info no-padding mr-5 view_btn" data-status="{{route('order-status', ['id' => $row->orderID, 'status' => 'processing'])}}" data-url="{{route('order-show', ['id' => $row->orderID])}}" data-toggle="modal" data-target="#myModal" title="View Order"><i class="icon-eye"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{route('order-cancel', ['id' => $row->orderID])}}" onclick="return confirm('Are you sure to cancel this order?')" title="Cancel"><i class="icon-bin"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')


    <script type="text/javascript">

        $(function () {

            $('.markAll').click(function () {
                $('.mark').prop("checked",  !$('.mark').prop("checked"));
            });

            $('.nextProcess').click(function () {
                $('.acType').val('process');
                var checkedNum = $('.mark:checked').length;
                if(checkedNum > 0){
                    if(confirm('Are you sure to order send to next process?'))
                        $('#actionForm').submit();
                }


            });

            $('.orderCancel').click(function () {
                $('.acType').val('cancel');
                var checkedNum = $('.mark:checked').length;
                if(checkedNum > 0){
                    if(confirm('Are you sure to cancel order?'))
                        $('#actionForm').submit();
                }
            });

        });


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
                    { orderable: false, "targets": [0,9] }//For Column Order
                ]
            });

        });
    </script>

@endsection
