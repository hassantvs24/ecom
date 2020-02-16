@extends('layouts.master')
@extends('box.user.role')
@section('title')
    User Role
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> Add New User Role</button></p>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Role List</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>
                            <th>Role Name</th>
                            <th>Permission</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            @php
                            $per = $row->permission()->orderBy('name', 'ASC')->get();
                            $str_per = '';
                            foreach ($per as $rows){
                                $str_per .= $rows->name.'<b>; </b>';
                            }
                            @endphp

                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{!!  rtrim($str_per, '<b>; </b>') !!}</td>
                                <td class="text-right white_sp">
                                @if($row->name != 'Super Admin')
                                    <button class="btn btn-xs btn-info no-padding mr-5 ediPermission" data-url="{{route('role-permission', ['id' => $row->roleID])}}" data-toggle="modal" data-target="#permissionModal" title="Set Permission"><i class="icon-key"></i></button>
                                    <button class="btn btn-xs btn-success no-padding mr-5 ediBtn" data-name="{{$row->name}}" data-id="{{$row->roleID}}" data-toggle="modal" data-target="#ediModal" title="Edit"><i class="icon-pencil5"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{route('role-del', ['id' => $row->roleID])}}" onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
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
                var name = $(this).data('name');

                $('#ediModal [name=id]').val(id);
                $('#ediModal [name=name]').val(name);
            });

        });


        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                columnDefs: [
                    { orderable: false, "targets": [2] }//For Column Order
                ]
            });

        });

        $(function () {
            $('.ediPermission').click(function () {
                var url = $(this).data('url');
                $.get( url, function( result ) {
                    $( ".show_content" ).html( result );
                });
            });
        });

    </script>

@endsection





































