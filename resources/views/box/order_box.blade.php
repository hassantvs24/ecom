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
                </div>
            </div>
        </div>
    </div>
    <!-- /basic modal -->



@endsection
