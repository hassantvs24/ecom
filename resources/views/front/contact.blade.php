@extends('layouts.front.master')

@section('title')
    Contact
@endsection

@section('content')
    <!-- Title Page -->
    @php


        if($table != null){
            $exists = Storage::disk('slip')->exists($table->img);
            $title = $table->title;
            $subTitle = $table->subTitle;
            if($exists){
                $img = asset('public/slip/'.$table->img);
            }else{
                $img = asset('public/front/images/heading-pages-02.jpg');
            }
        }else{
            $img = asset('public/front/images/heading-pages-02.jpg');
            $title = 'Contact With Us';
            $subTitle = '';
        }

    @endphp
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{$img}});">
        <h2 class="l-text2 t-center">{{$title}}</h2>
        <p class="m-text13 t-center">{{$subTitle}}</p>
    </section>

    <!-- content page -->
    <section class="bgwhite p-t-66 p-b-60">
        <div class="container">
            {!! $table->content ?? ''!!}
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">



    </script>
@endsection

