@extends('layouts.basic');

@section('title')

    Violence detected | Contact Page

@endsection

@section('back-url')
    <div class="col-xs-12 text-center"><a class="btn btn-info btn-lg heading-btn" href="{{action('MainController@index')}}"><i class="icon-home4 position-left"></i> Go to home</a></div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="no-margin text-black text-center m-20 text-danger" style="font-size: 60px;">Violence detected</h1>
            <h1 class="no-margin text-black text-center m-20 text-indigo" style="font-size: 40px;">Please contact with software provider. <br> Helpline: +8801675870047 <br> Email: wall.mate@gmail.com</h1>
        </div>
    </div>

@endsection