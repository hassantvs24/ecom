@extends('layouts.master')
@section('title')
    Live Chat
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p>
                <a href="{{route('adchat')}}" class="btn btn-danger btn-labeled" title="Back to Chat List"><b><i class="icon-arrow-left15"></i></b> Back</a>

            </p>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{route('adchat-end',['id' => $id])}}" class="btn btn-warning btn-labeled" title="Back to Chat List with end this conversation"><b><i class="icon-arrow-left15"></i></b> Back With End</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Live Chat with {{$customer}}</h6>
                </div>

                <div class="panel-body" style="position: relative;">

                    <div class="cat_boxes_con">
                        <div class="row">
                            <div class="col-md-12" id="scrll" style="height: 500px; overflow-y: auto; overflow-x: hidden;">
                                <ul class="chat" id="showHistory">

                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="cat_boxes" style="position: absolute;">
                        <div class="row">
                            <div class="col-md-12">
                                <form id="chatForm" action="{{route('chat-messaging')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                                    {{csrf_field()}}
                                    <input type="hidden" name="chatID" value="{{$id}}">
                                    <input type="hidden" name="name" value="{{$adminName}}">
                                    <div class="input-group">
                                        <input id="btn-input" type="text" name="message" class="form-control" placeholder="Write your message here..." autofocus autocomplete="off">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-send fa-1x" aria-hidden="true"></i> Send</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('style')
<link href="{{asset('public/chat.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('script')


    <script type="text/javascript">

        $(function () {
            chat_history();

            $('#chatForm').on('submit', function (e) {
                e.preventDefault();
                if($('#btn-input').val() != ''){
                    $.ajax({
                        type: $(this).attr('method'),
                        url: $(this).attr('action'),
                        data: $(this).serialize(),
                        //dataType: "json",
                        success: function(result) {

                            if (result == 1){

                                chat_history();
                                $('#chatForm [name=message]').val('');
                            }else if(result == 2){

                                alert('This conversation is already end.');
                            }


                        },
                        error: function() {
                            alert('error handling here');
                        }
                    });
                }

            });


            setInterval(function() {
                chat_history();
            }, 10000);

        });

        function chat_history() {
            $.get( "{{route('adchat-history',['id' => $id])}}", function( result ) {
                $( "#showHistory" ).html( result );
                $('#scrll').scrollTop($(document).height());

            });
        }

    </script>

@endsection
