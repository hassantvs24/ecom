@extends('layouts.master')
@extends('box.user.user')
@section('title')
    User List
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> Add New User</button></p>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Product List</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->role['name'] ?? ''}}</td>
                                <td class="text-right white_sp">
                                    <button class="btn btn-xs btn-success no-padding mr-5 ediBtn" data-role="{{$row->roleID}}" data-email="{{$row->email}}" data-name="{{$row->name}}" data-id="{{$row->id}}" data-toggle="modal" data-target="#ediModal" title="Edit"><i class="icon-pencil5"></i></button>
                                    @if($row->id != 1)
                                        <a class="btn btn-xs btn-danger no-padding" href="{{route('users-del', ['id' => $row->id])}}" onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')

    <script type="text/javascript">
        $(document).ready(function(){
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var email = $(this).data('email');
                var name = $(this).data('name');
                var role = $(this).data('role');

                $('#ediModal [name=id]').val(id);
                $('#ediModal [name=email]').val(email);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=roleID]').val(role);
            });

        });


        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                columnDefs: [
                    { orderable: false, "targets": [3] }//For Column Order
                ]
            });

        });

    </script>

@endsection





































