@section('box')

    <!-- Basic modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> Create New Promotional Offer</h5>
                </div>

                <form action="{{route('promotional-save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Title*</span>
                            <input type="text" name="name" class="form-control" placeholder="Title" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Product*</span>
                            <select name="productID" class="form-control select2" required>
                                @foreach($product as $row)
                                    <option value="{{$row->productID}}">{{$row->sku}} : {{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="input-group mb-5">
                            <span class="input-group-addon">Description*</span>
                            <textarea type="text" name="description" class="form-control" placeholder="Description"></textarea>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Start End Date*</span>
                            <input type="text" name="dateRang" class="form-control date_rang_pick" placeholder="Start End Date" required>
                        </div>

                        <p class="text-danger">Image size: H 290 & W 500</p>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Promotional Banner</span>
                            <input type="file" id="imga" name="img" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                        </div>

                        <div class="text-center mt-15">
                            <img src="" id="img" class="img-responsive img-thumbnail" alt="Promotional Image">
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-pencil7"></i> Edit Promotional Offer</h5>
                </div>

                <form action="{{route('promotional-edit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id">

                    <div class="modal-body">

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Title*</span>
                            <input type="text" name="name" class="form-control" placeholder="Title" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Product*</span>
                            <select name="productID" class="form-control select2" required>
                                @foreach($product as $row)
                                    <option value="{{$row->productID}}">{{$row->sku}} : {{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="input-group mb-5">
                            <span class="input-group-addon">Description*</span>
                            <textarea type="text" name="description" class="form-control" placeholder="Description"></textarea>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Start End Date*</span>
                            <input type="text" name="dateRang" class="form-control date_rang_pick" placeholder="Start End Date" required>
                        </div>
                        <p class="text-danger">Image size: H 290 & W 500</p>
                        <div class="input-group mb-5">
                            <span class="input-group-addon">Promotional Banner</span>
                            <input type="file" id="imga1" name="img" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                        </div>

                        <div class="text-center mt-15">
                            <img src="" id="img1" class="img-responsive img-thumbnail" alt="Promotional Image">
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


@endsection
