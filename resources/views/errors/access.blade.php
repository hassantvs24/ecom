@extends('layouts.basic');

@section('title')

    Access Denied

@endsection

@section('back-url')
    <div class="col-xs-12 text-center"><a class="btn btn-info btn-lg heading-btn" href="{{route('site')}}"><i class="icon-home4 position-left"></i> Go to website</a></div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="no-margin text-black text-center m-20 text-danger" style="font-size: 60px;">Access Denied</h1>
            <h1 class="no-margin text-black text-center m-20 text-indigo" style="font-size: 40px;">Please contact with admin.</h1>
        </div>
    </div>

@endsection
