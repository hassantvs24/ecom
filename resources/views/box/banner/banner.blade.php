@section('box')

    <!-- Basic modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-eye"></i> Update Page banner</h5>
                </div>
                <form action="{{route('banner-save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="input-group mb-5">
                            <span class="input-group-addon">Select Page</span>
                            <select name="name" class="form-control">
                                <option value="about">About</option>
                                <option value="cart">Cart List</option>
                                <option value="checkout">Checkout</option>
                                <option value="contact">Contact</option>
                                <option value="login">Login/Register</option>
                                <option value="profile">Profile</option>
                                <option value="promotion">Promotion</option>
                                <option value="redemption">Redemption</option>
                                <option value="shop">Shop</option>
                            </select>
                        </div>
                        <div class="input-group mb-5">
                            <span class="input-group-addon">Page Title</span>
                            <input type="text" name="title" class="form-control" placeholder="Page Title" required>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Page Sub-Title</span>
                            <input type="text" name="subTitle" class="form-control" placeholder="Page Sub-Title">
                        </div>

                        <p class="text-danger">Image size: H 239 & W 1920</p>
                        <div class="input-group mb-5">
                            <span class="input-group-addon">Banner Image</span>
                            <input type="file" name="img" class="form-control" accept="image/x-png,image/gif,image/jpeg" required>
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
