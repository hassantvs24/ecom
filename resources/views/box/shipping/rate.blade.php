@section('box')

    <!-- Basic modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-plus2"></i> Registrar Shipping Cost</h5>
                </div>
                <form action="{{route('rate-save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Carrier</span>
                            <select  name="carrierID" class="form-control">
                                @foreach($carrier as $row)
                                    <option value="{{$row->carrierID}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Location</span>
                            <select  name="locationID" class="form-control">
                                @foreach($locations as $row)
                                    <option value="{{$row->locationID}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Minimum Weight</span>
                            <input type="number" value="0" min="0" step="any" name="weight" class="form-control" placeholder="Minimum Weight" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Additional Weight</span>
                            <input type="number" value="0" min="0" step="any" name="weight_add" class="form-control" placeholder="Additional Weight" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Minimum Rate</span>
                            <input type="number" value="0" min="0" step="any" name="rate" class="form-control" placeholder="Minimum Rate" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Additional Rate</span>
                            <input type="number" value="0" min="0" step="any" name="rate_add" class="form-control" placeholder="Additional Rate" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Shipping Time (Day)</span>
                            <input type="number" value="0" min="0" name="shipping_time" class="form-control" placeholder="Shipping Time" required>
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


    <!-- Edit modal -->
    <div id="ediModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-pencil3"></i> Update Shipping Cost</h5>
                </div>
                <form action="{{route('rate-edit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id">
                    <div class="modal-body">

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Carrier</span>
                            <select  name="carrierID" class="form-control">
                                @foreach($carrier as $row)
                                    <option value="{{$row->carrierID}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Location</span>
                            <select  name="locationID" class="form-control">
                                @foreach($locations as $row)
                                    <option value="{{$row->locationID}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Minimum Weight</span>
                            <input type="number" value="0" min="0" step="any" name="weight" class="form-control" placeholder="Minimum Weight" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Additional Weight</span>
                            <input type="number" value="0" min="0" step="any" name="weight_add" class="form-control" placeholder="Additional Weight" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Minimum Rate</span>
                            <input type="number" value="0" min="0" step="any" name="rate" class="form-control" placeholder="Minimum Rate" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Additional Rate</span>
                            <input type="number" value="0" min="0" step="any" name="rate_add" class="form-control" placeholder="Additional Rate" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Shipping Time (Day)</span>
                            <input type="number" value="0" min="0" name="shipping_time" class="form-control" placeholder="Shipping Time" required>
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
    <!-- /Edit modal -->



@endsection
