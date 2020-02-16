<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Live Chat</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('public/front/images/icons/favicon.png')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

    <link href="{{asset('public/chat.css')}}" rel="stylesheet" type="text/css">

</head>
<body>


<div class="container">

    <div class="cat_boxes_up">
        <div class="row">
            <div class="col-4">
                <button class="btn btn-danger btn-sm" data-url="{{route('chat-end', ['id' => $table->chatID])}}" type="button" id="endChat" title="End Chat"><span aria-hidden="true">×</span></button>
            </div>
            <div class="col-8">
                <h5 class="no-margin text-right" id="show_admin_name">Connecting ...</h5>
            </div>
        </div>
    </div>

    <div class="cat_boxes_con">
        <div class="row">
            <div class="col-md-12">
                <ul class="chat" id="showHistory">

                </ul>

            </div>
        </div>
    </div>
    <div class="cat_boxes">
        <div class="row">
            <div class="col-md-12">
                <form id="chatForm" action="{{route('chat-customer')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                    {{csrf_field()}}
                    <input type="hidden" name="chatID" value="{{$table->chatID}}">
                    <input type="hidden" name="name" value="{{$table->name}}">
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




<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('public/front/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->

<script type="text/javascript" src="{{asset('public/front/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

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
                        }else if(result == 2) {
                            close();
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

        $('#endChat').click(function () {
            var url = $(this).data('url');
            $.get( url, function( result ) {
                if(result == 1)
                    close();
            });
        });

    });

    function chat_history() {
        $.get( "{{route('chat-history',['id' =>$table->chatID])}}", function( result ) {
            $( "#showHistory" ).html( result );
            $(document).scrollTop($(document).height());

        });

        $.get( "{{route('chat-adname',['id' =>$table->chatID])}}", function( result ) {
            $( "#show_admin_name" ).html( result );
        });
    }

</script>

</body>
</html>
