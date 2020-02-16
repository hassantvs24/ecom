@extends('layouts.master')
@extends('box.shipping.rate')
@section('title')
    Shipping Cost Registration
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> New Shipping Cost Registration</button></p>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Shipping Shipping Cost Registrar</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Carrier</th>
                            <th>Locations</th>
                            <th>Min-Price</th>
                            <th>Add-Price</th>
                            <th>Min-Weight</th>
                            <th>Add-Weight</th>
                            <th>Time</th>
                            <th class="text-right white_sp">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->shippingID}}</td>
                                <td>{{$row->carrier['name'] ?? ''}}</td>
                                <td>{{$row->location['name'] ?? ''}}</td>
                                <td>{{$row->rate}}</td>
                                <td>{{$row->rate_add}}</td>
                                <td>{{$row->weight}}</td>
                                <td>{{$row->weight_add}}</td>
                                <td>{{$row->shipping_time}}</td>
                                <td class="text-right">
                                    <button class="btn btn-xs btn-success no-padding mr-5 ediBtn" data-times="{{$row->shipping_time}}" data-carrier="{{$row->carrierID}}" data-location="{{$row->locationID}}" data-rate="{{$row->rate}}" data-rateadd="{{$row->rate_add}}" data-weight="{{$row->weight}}" data-weightadd="{{$row->weight_add}}" data-id="{{$row->shippingID}}" data-toggle="modal" data-target="#ediModal" title="Edit"><i class="icon-pencil5"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{action('Shipping\RateRegistrarController@del', ['id' => $row->shippingID])}}" onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
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
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var carrierID = $(this).data('carrier');
                var locationID = $(this).data('location');
                var rate = $(this).data('rate');
                var rate_add = $(this).data('rateadd');
                var weight = $(this).data('weight');
                var weight_add = $(this).data('weightadd');
                var shipping_time = $(this).data('times');

                $('#ediModal [name=id]').val(id);
                $('#ediModal [name=carrierID]').val(carrierID);
                $('#ediModal [name=locationID]').val(locationID);
                $('#ediModal [name=rate]').val(rate);
                $('#ediModal [name=rate_add]').val(rate_add);
                $('#ediModal [name=weight]').val(weight);
                $('#ediModal [name=weight_add]').val(weight_add);
                $('#ediModal [name=shipping_time]').val(shipping_time);
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