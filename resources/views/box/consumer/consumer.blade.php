@section('box')

    <!-- Basic modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-eye"></i> View Point Transaction</h5>
                </div>
                <form action="{{route('customer-points')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id">
                <div class="modal-body show_content" style="max-height: 500px; overflow-x: hidden; overflow-y: auto;">

                    <div class="input-group mb-5">
                        <span class="input-group-addon">Date Range</span>
                        <input type="text" name="dateRang" class="form-control date_rang_pick" placeholder="Date Range" required>
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

    <!-- Basic modal -->
    <div id="comModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-eye"></i> View Commission History</h5>
                </div>
                <form action="{{route('customer-commission')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id">
                    <div class="modal-body show_content" style="max-height: 500px; overflow-x: hidden; overflow-y: auto;">

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Date Range</span>
                            <input type="text" name="dateRang" class="form-control date_rang_pick" placeholder="Date Range" required>
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

    <!-- Basic modal -->
    <div id="regModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-eye"></i> Add New <span id="consumers"></span></h5>
                </div>
                <form action="{{route('consumer-save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="userLevel">
                    <div class="modal-body show_content" style="max-height: 500px; overflow-x: hidden; overflow-y: auto;">

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Full Name*</span>
                            <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Email*</span>
                            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Password*</span>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Password*</span>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirm" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Contact Number</span>
                            <input type="text" name="contact" class="form-control" placeholder="Contact Number">
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Address</span>
                            <input type="text" name="address" class="form-control" placeholder="Address">
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Post Code</span>
                            <input type="text" name="postCode" class="form-control" placeholder="Post Code">
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">City</span>
                            <input type="text" name="city" class="form-control" placeholder="City">
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">State</span>
                            <input type="text" name="state" class="form-control" placeholder="State">
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Country</span>
                            <input type="text" name="Country" class="form-control" placeholder="Country">
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
                            <span class="input-group-addon">Reference Code</span>
                            <input type="number" name="ref" class="form-control" placeholder="Reference Code" min="1">
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


    <!-- Basic modal -->
    <div id="viewsModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-eye"></i> View Consumer Info</h5>
                </div>
                    <div class="modal-body view_consumer">
                        Loading ..
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                    </div>
            </div>
        </div>
    </div>
    <!-- /basic modal -->

    <!-- Basic modal -->
    <div id="edirefModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-eye"></i> Edit Reference</h5>
                </div>
                <form action="{{route('consumer-ref-edit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id">
                    <div class="modal-body show_content" style="max-height: 500px; overflow-x: hidden; overflow-y: auto;">

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Reference</span>
                            <input type="number" name="ref" class="form-control" placeholder="Reference ID" min="1" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Salesman</span>
                            <input type="number" name="salesman" class="form-control" placeholder="Salesman ID" min="1" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Distributor</span>
                            <input type="number" name="distributor" class="form-control" placeholder="Distributor ID" min="1" required>
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

    <!-- Basic modal -->
    <div id="edipModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-eye"></i> Edit Profile Information</h5>
                </div>
                <form action="{{route('consumer-profile-edit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id">
                    <div class="modal-body show_content" style="max-height: 500px; overflow-x: hidden; overflow-y: auto;">

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Name*</span>
                            <input type="text" name="name" class="form-control" placeholder="Name" min="1" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Contact</span>
                            <input type="text" name="contact" class="form-control" placeholder="Contact">
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Address</span>
                            <input type="text" name="address" class="form-control" placeholder="Address">
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Post Code</span>
                            <input type="text" name="postCode" class="form-control" placeholder="Post Code">
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">City</span>
                            <input type="text" name="city" class="form-control" placeholder="City">
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">State</span>
                            <input type="text" name="state" class="form-control" placeholder="State">
                        </div>


                        <div class="input-group mb-5">
                            <span class="input-group-addon">Country</span>
                            <input type="text" name="Country" class="form-control" placeholder="Country">
                        </div>



                        <div class="input-group mb-5">
                            <span class="input-group-addon">Location</span>
                            <select  name="locationID" class="form-control">
                                @foreach($locations as $row)
                                    <option value="{{$row->locationID}}">{{$row->name}}</option>
                                @endforeach
                            </select>
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




@endsection
