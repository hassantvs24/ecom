@extends('layouts.master')
@extends('box.consumer.consumer')
@section('title')
    Salesman
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled reg" data-level="Salesman" data-toggle="modal" data-target="#regModal"><b><i class="icon-file-plus"></i></b> Add New Salesman</button></p>
        </div>
        <div class="col-md-6"></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Salesman List</h6>
                </div>

                <div class="panel-body">

                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Ref-code</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Address</th>
                            <!--<th>Commission</th>-->
                            <th class="text-right white_sp">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{pub_date($row->created_at)}}</td>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->contact}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->address}}, {{$row->state}}, {{$row->city}}, {{$row->postCode}}, {{$row->country}}</td>
                                <!--<td>{{$row->points}}</td>-->
                                <td class="text-right white_sp">
                                    <button class="btn btn-xs btn-success no-padding mr-5 edipBtn" data-country="{{$row->country}}"  data-location="{{$row->locationID}}" data-country="{{$row->country}}" data-name="{{$row->name}}" data-contact="{{$row->contact}}" data-post="{{$row->postCode}}" data-city="{{$row->city}}" data-state="{{$row->state}}" data-address="{{$row->address}}" data-id="{{$row->id}}"  data-toggle="modal" data-target="#edipModal" title="Edit Profile Information"><i class="icon-pencil5"></i></button>
                                    <button class="btn btn-xs btn-info no-padding mr-5 comBtn" data-toggle="modal" data-id="{{$row->id}}" data-target="#comModal" title="Commission Table"><i class="icon-notebook"></i></button>
                                    <!--<button class="btn btn-xs btn-success no-padding mr-5 ediBtn" data-toggle="modal" data-id="{{$row->id}}" data-target="#myModal" title="Point Table"><i class="icon-book"></i></button>-->
                                    <button class="btn btn-xs btn-success no-padding viewBtn" data-url="{{route('consumer-view', ['id' => $row->id])}}" data-toggle="modal" data-target="#viewsModal" title="View Consumer"><i class="icon-eye"></i></button>
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
                var id =$(this).data('id');

                $('#myModal [name=id]').val(id);
            });

            $('.comBtn').click(function () {
                var id =$(this).data('id');

                $('#comModal [name=id]').val(id);
            });

            $('.reg').click(function () {
                var userLevel =$(this).data('level');

                $('#regModal [name=userLevel]').val(userLevel);
                $('#consumers').html(userLevel);
            });

            $('.viewBtn').click(function () {
                var url =$(this).data('url');

                $.get( url, function( result ) {
                    $( ".view_consumer" ).html( result );
                });

            });

            $('.edipBtn').click(function () {
                var id =$(this).data('id');
                var name =$(this).data('name');
                var contact =$(this).data('contact');
                var postCode =$(this).data('post');
                var state =$(this).data('state');
                var city =$(this).data('city');
                var address =$(this).data('address');
                var country =$(this).data('country');
                var locationID = $(this).data('location');

                $('#edipModal [name=id]').val(id);
                $('#edipModal [name=name]').val(name);
                $('#edipModal [name=contact]').val(contact);
                $('#edipModal [name=postCode]').val(postCode);
                $('#edipModal [name=state]').val(state);
                $('#edipModal [name=city]').val(city);
                $('#edipModal [name=address]').val(address);
                $('#edipModal [name=country]').val(country);
                $('#ediModal [name=locationID]').val(locationID);

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

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                columnDefs: [
                    { orderable: false, "targets": [6] }//For Column Order
                ]
            });

        });

    </script>

@endsection
