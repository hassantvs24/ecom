@section('box')

    <!-- Basic modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> Add New Product</h5>
                </div>

                <form action="{{route('product-save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-5">
                                    <span class="input-group-addon">SKU*</span>
                                    <input type="text" name="sku" class="form-control" placeholder="SKU" required>
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Category*</span>
                                    <input type="text" list="category" name="category" class="form-control" placeholder="Product Category (Double Click)" autocomplete="off" required>
                                    <datalist id="category">
                                        @foreach($category as $row)
                                        <option value="{{$row->category}}">
                                        @endforeach
                                    </datalist>
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Name*</span>
                                    <input type="text" name="name" class="form-control" placeholder="Product Name" required>
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Price*</span>
                                    <input type="number" name="price" class="form-control" placeholder="Price" step="any" min="0" value="0" required>
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Pre Price</span>
                                    <input type="number" name="pre_price" class="form-control" placeholder="Pre Price" step="any" min="0" value="0" required>
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Weight</span>
                                    <input type="number" name="weight" class="form-control" placeholder="Weight" step="any" min="0" value="0" required>
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Review</span>
                                    <input type="number" name="review" class="form-control" placeholder="Review" step="any" min="0" value="0" required>
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Rating</span>
                                    <input type="number" name="rating" class="form-control" placeholder="Rating" step="any" min="0" max="5" value="0" required>
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Salesman Commission (%)</span>
                                    <input type="number" name="s_commission" class="form-control" placeholder="Salesman Commission" step="any" min="0" max="100" value="5" required>
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Distributor Commission (%)</span>
                                    <input type="number" name="d_commission" class="form-control" placeholder="Distributor Commission" step="any" min="0" max="100" value="2" required>
                                </div>


                            </div>
                            <div class="col-md-6">

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Notes</span>
                                    <input type="text" name="notes" class="form-control" placeholder="Notes">
                                </div>

                                <div class="input-group mb-10">
                                    <span class="input-group-addon">Description</span>
                                    <textarea type="text" name="description" class="form-control" placeholder="Descriptions"></textarea>
                                </div>

                                <p class="text-danger">Product image size: H 675 & W 505</p>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Product Image</span>
                                    <input type="file" id="imga" name="img" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Product Image 1</span>
                                    <input type="file" id="img_onea" name="img_one" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Product Image 2</span>
                                    <input type="file" id="img_twoa" name="img_two" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Product Image 3</span>
                                    <input type="file" id="img_treea" name="img_tree" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                                </div>

                            </div>
                        </div>

                        <div class="row mt-10">
                            <div class="col-xs-3 text-center">
                                <img src="" id="img" class="img-responsive img-thumbnail" alt="Main Image">
                            </div>
                            <div class="col-xs-3  text-center">
                                <img src="" id="img_one" class="img-responsive img-thumbnail" alt="Image One">
                            </div>
                            <div class="col-xs-3  text-center">
                                <img src="" id="img_two" class="img-responsive img-thumbnail" alt="Image two">
                            </div>
                            <div class="col-xs-3  text-center">
                                <img src="" id="img_tree" class="img-responsive img-thumbnail" alt="Image Three">
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /basic modal -->


    <!-- Basic Edi modal -->
    <div id="ediModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-pencil7"></i> Edit Product</h5>
                </div>

                <form action="{{route('product-edit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id">

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-5">
                                    <span class="input-group-addon">SKU*</span>
                                    <input type="text" name="sku" class="form-control" placeholder="SKU" required>
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Category*</span>
                                    <input type="text" list="category1" name="category" class="form-control" placeholder="Product Category (Double Click)" autocomplete="off" required>
                                    <datalist id="category1">
                                        @foreach($category as $row)
                                            <option value="{{$row->category}}">
                                        @endforeach
                                    </datalist>
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Name*</span>
                                    <input type="text" name="name" class="form-control" placeholder="Product Name" required>
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Price*</span>
                                    <input type="number" name="price" class="form-control" placeholder="Price" step="any" min="0" value="0" required>
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Pre Price</span>
                                    <input type="number" name="pre_price" class="form-control" placeholder="Pre Price" step="any" min="0" value="0" required>
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Weight</span>
                                    <input type="number" name="weight" class="form-control" placeholder="Weight" step="any" min="0" value="0" required>
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Review</span>
                                    <input type="number" name="review" class="form-control" placeholder="Review" step="any" min="0" value="0" required>
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Rating</span>
                                    <input type="number" name="rating" class="form-control" placeholder="Rating" step="any" min="0" max="5" value="0" required>
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Salesman Commission</span>
                                    <input type="number" name="s_commission" class="form-control" placeholder="Salesman Commission" step="any" min="0" max="5" value="5" required>
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Distributor Commission</span>
                                    <input type="number" name="d_commission" class="form-control" placeholder="Distributor Commission" step="any" min="0" max="5" value="2" required>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Notes</span>
                                    <input type="text" name="notes" class="form-control" placeholder="Notes">
                                </div>

                                <div class="input-group mb-10">
                                    <span class="input-group-addon">Description</span>
                                    <textarea type="text" name="description" class="form-control" placeholder="Descriptions"></textarea>
                                </div>
                                <p class="text-danger">Product image size: H 675 & W 505</p>
                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Product Image</span>
                                    <input type="file" id="imgs" name="img" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Product Image 1</span>
                                    <input type="file" id="img_ones" name="img_one" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Product Image 2</span>
                                    <input type="file" id="img_twos" name="img_two" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                                </div>

                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Product Image 3</span>
                                    <input type="file" id="img_trees" name="img_tree" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                                </div>

                            </div>
                        </div>
                        <div class="row mt-10">
                            <div class="col-xs-3 text-center">
                                <img src="" id="img1" class="img-responsive img-thumbnail" alt="Main Image">
                            </div>
                            <div class="col-xs-3 text-center">
                                <a id="img_1" href="#" onclick="return confirm('Are you sure to change this primary image?')"><img src="" id="img_one1" class="img-responsive img-thumbnail" alt="Image One"></a>
                            </div>
                            <div class="col-xs-3 text-center">
                                <a id="img_2" href="#" onclick="return confirm('Are you sure to change this primary image?')"><img src="" id="img_two1" class="img-responsive img-thumbnail" alt="Image two"></a>
                            </div>
                            <div class="col-xs-3 text-center">
                                <a id="img_3" href="#" onclick="return confirm('Are you sure to change this primary image?')"><img src="" id="img_tree1" class="img-responsive img-thumbnail" alt="Image Three"></a>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /basic Edi modal -->


    <!-- Basic modal -->
    <div id="productModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> View Product Details</h5>
                </div>

                    <div class="modal-body">

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                    </div>
            </div>
        </div>
    </div>
    <!-- /basic modal -->

@endsection
