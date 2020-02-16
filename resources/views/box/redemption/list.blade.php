@section('box')

    <!-- Basic modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> Add Product on Redemption List</h5>
                </div>

                <form action="{{route('redemption-list-save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="redemptionID" value="{{$redemption->redemptionID}}">
                    <div class="modal-body">

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Product*</span>
                            <select name="productID" class="form-control select2" required>
                                @foreach($product as $row)
                                    <option value="{{$row->productID}}">{{$row->sku}} : {{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Set Point*</span>
                            <input type="number" name="point" class="form-control" placeholder="Set Point" step="any" min="0" value="0" required>
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
                    <h5 class="modal-title"><i class="icon-pencil7"></i> Edit Product on Redemption List</h5>
                </div>

                <form action="{{route('redemption-list-edit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id">
                    <input type="hidden" name="redemptionID" value="{{$redemption->redemptionID}}">
                    <div class="modal-body">

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Product*</span>
                            <select name="productID" class="form-control select2" required>
                                @foreach($product as $row)
                                    <option value="{{$row->productID}}">{{$row->sku}} : {{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Set Point*</span>
                            <input type="number" name="point" class="form-control" placeholder="Set Point" step="any" min="0" value="0" required>
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
