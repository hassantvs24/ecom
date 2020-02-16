@section('box')

    <!-- Basic modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> Add New Product</h5>
                </div>

                <form action="{{route('advertise-save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="modal-body">

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Start-End Date*</span>
                            <input type="text" name="dateRang" class="form-control date_rang_pick" placeholder="Start-End Date" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Title*</span>
                            <input type="text" name="name" class="form-control" placeholder="Title" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Notes*</span>
                            <input type="text" name="description" class="form-control" placeholder="Notes">
                        </div>

                        <p class="text-danger">Image size: H 570 & W 1920</p>
                        <div class="input-group mb-5">
                            <span class="input-group-addon">Slide Image</span>
                            <input type="file" id="imga" name="img" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                        </div>


                        <div class="row mt-10">
                            <div class="col-xs-12 text-center">
                                <img src="" id="img" class="img-responsive img-thumbnail" alt="Main Image">
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-pencil7"></i> Edit Product</h5>
                </div>

                <form action="{{route('advertise-edit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id">

                    <div class="modal-body">

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Start-End Date*</span>
                            <input type="text" name="dateRang" class="form-control date_rang_pick" placeholder="Start-End Date" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Title*</span>
                            <input type="text" name="name" class="form-control" placeholder="Title" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Notes*</span>
                            <input type="text" name="description" class="form-control" placeholder="Notes">
                        </div>

                        <p class="text-danger">Image size: H 570 & W 1920</p>
                        <div class="input-group mb-5">
                            <span class="input-group-addon">Slide Image</span>
                            <input type="file" id="imgs" name="img" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                        </div>


                        <div class="row mt-10">
                            <div class="col-xs-12 text-center">
                                <img src="" id="img1" class="img-responsive img-thumbnail" alt="Main Image">
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


@endsection
