@extends('layouts.master')
@extends('box.redemption.list')
@section('title')
    {{$redemption->name}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <p>
                <a href="{{route('redemption')}}" class="btn btn-danger btn-labeled" title="Back to Redemption"><b><i class="icon-arrow-left15"></i></b> Back</a>
                <button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> Add Redemption Product</button>
            </p>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Product List of {{$redemption->name}}</h6>
                </div>

                <div class="panel-body">

                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>
                            <th>SKU</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Point</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->product['sku'] ?? ''}}</td>
                                <td>{{$row->product['name'] ?? ''}}</td>
                                <td>{{$row->product['category'] ?? ''}}</td>
                                <td>${{$row->product['price'] ?? ''}}</td>
                                <td>{{$row->point}}</td>
                                <td class="text-right white_sp">
                                    <button class="btn btn-xs btn-success no-padding mr-5 ediBtn"
                                            data-point="{{$row->point}}"
                                            data-product="{{$row->productID}}"
                                            data-id="{{$row->redemptionItemID}}"
                                            data-toggle="modal" data-target="#ediModal" title="Edit"><i class="icon-pencil5"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{route('redemption-list-del', ['id' => $row->redemptionItemID])}}" onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
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
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/pickers/daterangepicker.js')}}"></script>

    <script type="text/javascript">



        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var product = $(this).data('product');
                var point = $(this).data('point');


                $('#ediModal [name=id]').val(id);
                $('#ediModal [name=productID]').val(product);
                $('#ediModal [name=point]').val(point);

                $('.select2').select2();

            });

        });

        $(function () {
            $('.select2').select2();
        });



        $(function () {

            $("#imga").change(function () {
                imgPrev(this , '#img');
            });

            $("#imga1").change(function () {
                imgPrev(this , '#img1');
            });

        });

        $(function () {
            $('.date_rang_pick').daterangepicker({
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        });

        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                columnDefs: [
                    { orderable: false, "targets": [6] }//For Column Order
                ]
            });

        });

    </script>

@endsection
