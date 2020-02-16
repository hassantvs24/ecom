@section('box')

    <!-- Basic modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-eye"></i> View Order</h5>
                </div>
                <div class="modal-body show_content" style="max-height: 500px; overflow-x: hidden; overflow-y: auto;">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                    <a href="" class="btn btn-info status"><i class="icon-checkmark4"></i> Confirm for next?</a>
                </div>

            </div>
        </div>
    </div>
    <!-- /basic modal -->



    <!-- Basic modal -->
    <div id="shippedModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-eye"></i> View Order</h5>
                </div>
                <div class="modal-body show_content" style="max-height: 500px; overflow-x: hidden; overflow-y: auto;">


                </div>
                <form action="{{route('track-update')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="orderID">
                    <input type="hidden" name="status">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <div class="input-group mb-5">
                                    <span class="input-group-addon">Track Number</span>
                                    <input type="text" name="trackNumber" class="form-control" placeholder="Track Number" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Confirm for next?</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /basic modal -->

    <!-- Basic modal -->
    <div id="viewModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-eye"></i> View Order</h5>
                </div>
                <div class="modal-body show_content" style="max-height: 500px; overflow-x: hidden; overflow-y: auto;">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- /basic modal -->



@endsection
