@extends('layouts.front.master')

@section('title')
    Promotion
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
            $title = 'Promotion';
            $subTitle = '';
        }

    @endphp
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{$img}});">
        <h2 class="l-text2 t-center">{{$title}}</h2>
        <p class="m-text13 t-center">{{$subTitle}}</p>
    </section>

    <!-- content page -->
    <section class="bgwhite p-t-55 p-b-65">
        <div class="container">
            <div class="row">
                @foreach($promotion as $row)

                    <div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
                        <div class="hov-img-zoom pos-relative">
                            <img class="img-responsive" src="{{asset('public/product/'.$row->img)}}" alt="{{ucwords($row->name)}}">

                            <div class="ab-t-l sizefull flex-col-c-m p-l-15 p-r-15">
							<span class="m-text9 p-t-45 fs-10-sm">
								{{ucfirst($row->description)}}
							</span>

                                <h5 class="l-text1 fs-20-sm">{{ucwords($row->name)}}</h5>

                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">


    </script>
@endsection

