
@foreach($table as $row)

    @if($row->fromType == 'Customer')

        <li class="right clearfix" style="background-color: rgba(138, 109, 59, 0.1)">
            <span class="chat-img pull-right avater_admin">{{substr(ucfirst($row->name),0,2)}}</span>
            <div class="chat-body clearfix">
                <div class="header">
                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span> {{$row->created_at->diffForHumans()}}</small>
                    <strong class="pull-right primary-font">{{ucwords($row->name)}}</strong>
                </div>
                <p>
                    {{$row->message}}
                </p>
            </div>
        </li>

    @else

        <li class="left clearfix" style="background-color: rgba(11, 118, 204, 0.1)">
            <span class="chat-img pull-left avater_customer">{{substr(ucfirst($row->name),0,2)}}</span>
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">{{ucwords($row->name)}}</strong> <small class="pull-right text-muted">
                        <span class="glyphicon glyphicon-time"></span> {{$row->created_at->diffForHumans()}}</small>
                </div>
                <p>
                    {{$row->message}}
                </p>
            </div>
        </li>

    @endif

@endforeach

