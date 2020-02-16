@extends('layouts.master')
@extends('box.advertisement.advertise')
@section('title')
    Advertisement
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> Add New Advertisement</button></p>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Advertisement List</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Note</th>
                            <th>Start - End</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{pub_date($row->created_at)}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{Str::limit($row->description, 50)}}</td>
                                <td>{{pub_date($row->starts)}} - {{pub_date($row->ends)}}</td>
                                <td>{{$row->status}}</td>
                                <td class="text-right white_sp">
                                    <a class="btn btn-xs {{($row->status == 'Active' ? 'btn-danger':'btn-primary')}} no-padding mr-5" href="{{route('advertise-active', ['id' => $row->advertiseID])}}" onclick="return confirm('Are you sure to change status?')" title="Change Status"><i class="icon-switch"></i></a>
                                    <button class="btn btn-xs btn-success no-padding mr-5 ediBtn"
                                            data-name="{{$row->name}}"
                                            data-id="{{$row->advertiseID}}"
                                            data-description="{{$row->description}}"
                                            data-dates="{{pub_date($row->starts)}} - {{pub_date($row->ends)}}"
                                            data-img="{{asset('public/product/'.$row->img)}}"

                                            data-toggle="modal" data-target="#ediModal" title="Edit"><i class="icon-pencil5"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{route('advertise-del', ['id' => $row->advertiseID])}}" onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
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

    <script type="text/javascript" src="{{asset('public/assets/js/plugins/pickers/daterangepicker.js')}}"></script>

    <script type="text/javascript">

        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var description = $(this).data('description');
                var name = $(this).data('name');
                var dates = $(this).data('dates');
                var img = $(this).data('img');


                $('#ediModal [name=id]').val(id);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=description]').val(description);
                $('#ediModal [name=dateRang]').val(dates);

                $('#img1').attr('src', img);

            });

        });

        $(function () {
            $('.date_rang_pick').daterangepicker({
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        });

        $(function () {

            $("#imga").change(function () {
                imgPrev(this , '#img');
            });

            $("#imgs").change(function () {
                imgPrev(this , '#img1');
            });

        });

        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                columnDefs: [
                    { orderable: false, "targets": [5] }//For Column Order
                ]
            });

        });

    </script>

@endsection
