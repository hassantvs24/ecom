@extends('layouts.front.master')

@section('title')
    Redemption
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
            $title = 'Redemption';
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
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                    <div class="leftbar p-r-20 p-r-0-sm">
                        <!--  -->
                        <h4 class="m-text14 p-b-7">
                            Redemption List
                        </h4>

                        <ul class="p-b-54 lisc">
                            @foreach($reddem as $row)
                                <li class="p-t-4 active1">
                                    <a href="#" data-url="{{route('item-redeem', ['id' => $row->redemptionID])}}" data-redeem="{{$row->name}}" data-img="{{asset('public/product/'.$row->img)}}" data-discription="{{$row->description}}" class="s-text13 redeems">
                                        {{ucwords($row->name)}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>

                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                    <!--  -->
                    <div class="flex-sb-m flex-w p-b-35">

                        <div class="row">
                            <div class="col-md-6">
                                <img class="img-thumbnail img-responsive redeem_img" src="">
                            </div>
                            <div class="col-md-6">
                                <h4 class="rdm_title"></h4>
                                <p class="discriptions"></p>
                            </div>
                        </div>


                    </div>

                    <div class="row m-b-15">
                        <div class="col-md-12 m-t-15">
                            <h5 class="text-primary">Your Point: <span id="remainPoint">{{Auth::user()->points ?? 0}}</span></h5>
                        </div>
                    </div>

                    <!-- Product -->
                    <div class="row show_product">
                        <p id="wait" class="text-center text-muted">Loading ...</p>
                    </div>

                    <!-- Pagination -->
                    <!--<div class="pagination flex-m flex-w p-t-26">
                        <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
                        <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
                    </div>-->
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">

        $(function () {


            $('.redeems').click(function (e) {
                e.preventDefault();
                var img = $(this).data('img');
                var name = $(this).data('redeem');
                var discription = $(this).data('discription');
                var url = $(this).data('url');

                $('.redeem_img').attr('src',img);
                $('.rdm_title').html(name);
                $('.discriptions').html(discription);

                show_product(url);
            });

            $('.lisc li:first-child').find('a').trigger('click');
        });

        function show_product(url) {
            $.get( url, function( result ) {
                $( ".show_product" ).html( result );

                $('.block2-btn-addcart').each(function(){
                    var nameProduct = $(this).find('button').data('product');
                    var id = $(this).find('button').data('id');
                    var rdm = $(this).find('button').data('rdm');
                    var points = $(this).find('button').data('points');
                    $(this).on('click', function(){
                        add_rdm_cart(id,rdm, points);
                        swal(nameProduct, "is added to cart !", "success");
                    });
                });

            });
        }

        function add_rdm_cart(id, rdm, points) {
            $.get( "{{route('cart-redeem')}}", {'id':id, 'rdm':rdm, 'points':points}, function(result) {
                if(result == 1){
                    show_cart()
                }
            });
        }


    </script>
@endsection

