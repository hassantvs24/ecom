@extends('layouts.master')
@extends('box.product.product')
@section('title')
    Product List
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> Add New Product</button></p>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Product List</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Note</th>
                            <th>Description</th>
                            <th>S/D Commission</th>
                            <th>Price</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->sku}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->category}}</td>
                                <td>{{Str::limit($row->notes, 30)}}</td>
                                <td>{{Str::limit($row->description, 50)}}</td>
                                <td title="Salesmen Commission / Distributor Commission">{{$row->s_commission}}% / {{$row->d_commission}}%</td>
                                <td>{{$row->price}}</td>
                                <td class="text-right white_sp">
                                    <button class="btn btn-xs btn-success no-padding mr-5 ediBtn"
                                            data-name="{{$row->name}}"
                                            data-id="{{$row->productID}}"
                                            data-sku="{{$row->sku}}"
                                            data-category="{{$row->category}}"
                                            data-notes="{{$row->notes}}"
                                            data-description="{{$row->description}}"
                                            data-additional="{{$row->additional}}"
                                            data-review="{{$row->review}}"
                                            data-rating="{{$row->rating}}"
                                            data-scommission="{{$row->s_commission}}"
                                            data-dcommission="{{$row->d_commission}}"
                                            data-price="{{$row->price}}"
                                            data-preprice="{{$row->pre_price}}"
                                            data-weight="{{$row->weight}}"
                                            data-img="{{asset('public/product/sm_'.$row->img)}}"
                                            data-imgone="{{asset('public/product/sm_'.$row->img_one)}}"
                                            data-imgtwo="{{asset('public/product/sm_'.$row->img_two)}}"
                                            data-imgtree="{{asset('public/product/sm_'.$row->img_tree)}}"

                                            data-urlo="{{route('product-swap', ['id' => $row->productID, 'col' => 'img_one'])}}"
                                            data-urlt="{{route('product-swap', ['id' => $row->productID, 'col' => 'img_two'])}}"
                                            data-urlth="{{route('product-swap', ['id' => $row->productID, 'col' => 'img_tree'])}}"

                                            data-toggle="modal" data-target="#ediModal" title="Edit"><i class="icon-pencil5"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{route('product-del', ['id' => $row->productID])}}" onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
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
                var sku = $(this).data('sku');
                var category = $(this).data('category');
                var name = $(this).data('name');
                var notes = $(this).data('notes');
                var description = $(this).data('description');
                var additional = $(this).data('additional');
                var review = $(this).data('review');
                var rating = $(this).data('rating');
                var s_commission = $(this).data('scommission');
                var d_commission = $(this).data('dcommission');
                var price = $(this).data('price');
                var pre_price = $(this).data('preprice');
                var weight = $(this).data('weight');

                var img = $(this).data('img');
                var img_one = $(this).data('imgone');
                var img_two = $(this).data('imgtwo');
                var img_tree = $(this).data('imgtree');

                var urlo = $(this).data('urlo');
                var urlt = $(this).data('urlt');
                var urlth = $(this).data('urlth');

                $('#ediModal [name=id]').val(id);
                $('#ediModal [name=sku]').val(sku);
                $('#ediModal [name=category]').val(category);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=notes]').val(notes);
                $('#ediModal [name=description]').val(description);
                $('#ediModal [name=additional]').val(additional);

                $('#ediModal [name=review]').val(review);
                $('#ediModal [name=rating]').val(rating);
                $('#ediModal [name=s_commission]').val(s_commission);
                $('#ediModal [name=d_commission]').val(d_commission);
                $('#ediModal [name=price]').val(price);
                $('#ediModal [name=pre_price]').val(pre_price);
                $('#ediModal [name=weight]').val(weight);

                $('#img1').attr('src', img);
                $('#img_one1').attr('src', img_one);
                $('#img_two1').attr('src', img_two);
                $('#img_tree1').attr('src', img_tree);

                $('#img_1').attr('href', urlo);
                $('#img_2').attr('href', urlt);
                $('#img_3').attr('href', urlth);

            });

        });

        $(function () {

            $("#imga").change(function () {
                imgPrev(this , '#img');
            });

            $("#img_onea").change(function () {
                imgPrev(this , '#img_one');
            });

            $("#img_twoa").change(function () {
                imgPrev(this , '#img_two');
            });

            $("#img_treea").change(function () {
                imgPrev(this , '#img_tree');
            });


            $("#imgs").change(function () {
                imgPrev(this , '#img1');
            });

            $("#img_ones").change(function () {
                imgPrev(this , '#img_one1');
            });

            $("#img_twos").change(function () {
                imgPrev(this , '#img_two1');
            });

            $("#img_trees").change(function () {
                imgPrev(this , '#img_tree1');
            });


        });

        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                columnDefs: [
                    { orderable: false, "targets": [7] }//For Column Order
                ]
            });

        });


    </script>

@endsection
