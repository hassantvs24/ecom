@section('box')

    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> Add New User</h5>
                </div>

                <form action="{{route('users-save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">User Name</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="name" placeholder="User Name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">User Email</label></div>
                            <div class="col-12 col-md-9">
                                <input type="email" id="email-input" name="email" placeholder="User Email" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="role-input" class=" form-control-label">User Role</label></div>
                            <div class="col-12 col-md-9">
                                <select id="role-input" class="form-control" name="roleID">
                                    @foreach($role as $row)
                                        <option value="{{$row->roleID}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="pass-input" class=" form-control-label">User Password</label></div>
                            <div class="col-12 col-md-9">
                                <input type="password" id="pass-input" name="password" placeholder="User Password" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="repass-input" class=" form-control-label">User Re-Password</label></div>
                            <div class="col-12 col-md-9">
                                <input type="password" id="repass-input" name="password_confirmation" placeholder="User Re-Password" class="form-control" required>
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


    <div id="ediModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> Edit User</h5>
                </div>
                <form action="{{route('users-edit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">User Name</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="name" placeholder="User Name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">User Email</label></div>
                            <div class="col-12 col-md-9">
                                <input type="email" id="email-input" name="email" placeholder="User Email" class="form-control" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="role-input" class=" form-control-label">User Role</label></div>
                            <div class="col-12 col-md-9">
                                <select id="role-input" class="form-control" name="roleID">
                                    @foreach($role as $row)
                                        <option value="{{$row->roleID}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="pass-input" class=" form-control-label">User Password (OLD/NEW)</label></div>
                            <div class="col-12 col-md-9">
                                <input type="password" id="pass-input" name="password" placeholder="User Password" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="repass-input" class=" form-control-label">User Re-Password</label></div>
                            <div class="col-12 col-md-9">
                                <input type="password" id="repass-input" name="password_confirmation" placeholder="User Re-Password" class="form-control" required>
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



@endsection
