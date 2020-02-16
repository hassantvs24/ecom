@extends('layouts.master')
@extends('box.banner.banner')

@section('meta')
    <!--Catch Remover -->
    <meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0" />
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
@endsection

<!--Catch Remover -->
@section('title')
    Page Banner
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> Update Page banner</button></p>
        </div>
        <div class="col-md-6"></div>
    </div>

    @foreach($table as $row)
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">{{ucwords($row->name)}}</h6>
                </div>

                <div class="panel-body">
                    @php

                    $exists = Storage::disk('slip')->exists($row->img);
                    if($exists){
                        $img = asset('public/slip/'.$row->img);
                    }else{
                        $img = asset('public/front/images/heading-pages-02.jpg');
                    }
                    @endphp
                    <section style=" width: auto; position: relative;">
                        <div style="position: absolute; left: 0px; top: 0px; right: 0px;">
                        <h1 class="text-center text-white text-bold m-0" style="font-size: 65px;">
                            {{ucwords($row->title ?? '')}}
                        </h1>
                        <p class="text-center text-white m-0">{{ucwords($row->subTitle ?? '')}}</p>
                        </div>

                        <img class="img-responsive" src="{{$img}}" alt="Banner">

                    </section>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@section('script')


    <script type="text/javascript">




    </script>

@endsection
