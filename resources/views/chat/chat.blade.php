@extends('layouts.master')
@section('title')
    User Chat
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Chat Request List</h6>
                </div>

                <div class="panel-body">

                    <table class="table table-bordered table-condensed table-hover datatable">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Customer ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Question</th>
                            <th>Status</th>
                            <th class="text-right white_sp">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            @php
                            $fist_chat = $row->history()->first();
                            @endphp

                            <tr>
                                <td>{{pub_date($row->created_at)}}</td>
                                <td>{{$row->userID}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{Str::limit($fist_chat->message, 50)}}</td>
                                <td>{{$row->status}}</td>
                                <td class="text-right white_sp">
                                    @if($row->status == 'Pending')
                                        <a class="btn btn-xs btn-info no-padding" href="{{route('adchat-start', ['id' => $row->chatID])}}" title="Start Chat"><i class="icon-bubble-lines3"></i></a>
                                    @elseif($row->status == 'Active')
                                        <a class="btn btn-xs btn-info mr-5 no-padding" href="{{route('adchat-start', ['id' => $row->chatID])}}" title="Start Chat"><i class="icon-bubble-lines3"></i></a>
                                        <a class="btn btn-xs btn-primary no-padding" href="{{route('adchat-end', ['id' => $row->chatID])}}" title="End Chat"><i class="icon-bubbles4"></i></a>
                                    @else
                                        <a class="btn btn-xs btn-success mr-5 no-padding" href="{{route('adchat-start', ['id' => $row->chatID])}}" title="View Chat History"><i class="icon-bubble-lines3"></i></a>
                                        <a class="btn btn-xs btn-danger no-padding" href="{{route('adchat-del', ['id' => $row->chatID])}}" title="Delete Chat History"><i class="icon-bin"></i></a>
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




    </script>

@endsection
