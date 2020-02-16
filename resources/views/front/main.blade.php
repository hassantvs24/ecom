@extends('layouts.front.master')

@section('title')
    Home
@endsection

@section('content')

    <!-- Slide1 -->
    <section class="slide1">
        <div class="wrap-slick1">
            <div class="slick1">
                @foreach($slide as $row)
                <div class="item-slick1 item1-slick1" style="background-image: url({{asset('public/product/'.$row->img)}}); background-size: 100% 100%;">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="fadeInUp">
                            {{strtoupper($row->name)}}
                        </h2>

                        <span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="fadeInDown">
							{{ucwords($row->description)}}
						</span>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                            <!-- Button -->
                            <a href="{{route('site-shop')}}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Banner -->
    <div class="banner bgwhite p-t-40 p-b-40">
        <div class="container">
            <div class="row">
                @foreach($category as $row)
                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="{{asset('public/product/'.$row->imgs)}}" alt="{{ucwords($row->category)}}">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="{{route('site-shop')}}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                {{$row->category}}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <!-- Our product -->
    <section class="bgwhite p-t-45 p-b-58">
        <div class="container">
            <div class="sec-title p-b-22">
                <h3 class="m-text5 t-center">
                    Our Products
                </h3>
            </div>

                <!-- Tab01 -->
                <!-- Nav tabs -->
                <!--<div class="tab01">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#best-seller" role="tab">Best Seller</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#featured" role="tab">Featured</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#sale" role="tab">Sale</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#top-rate" role="tab">Top Rate</a>
                    </li>
                </ul>-->

                <!-- Tab panes -->
                <div class="tab-content p-t-35">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="best-seller" role="tabpanel">
                        <div class="row">

                            @foreach($product as $row)
                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                        <img src="{{asset('public/product/md_'.$row->img)}}" alt="{{ucwords($row->name)}}">

                                        <div class="block2-overlay trans-0-4">
                                            <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                                <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                            </a>
                                            <div class="block2-btn-addcart w-size1 trans-0-4">
                                                <!-- Button -->
                                                <button data-product="{{ucwords($row->name)}}" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="block2-txt p-t-20">
                                        <a href="{{route('details-product', [$row->productID])}}" data-id="{{$row->productID}}" class="block2-name dis-block s-text3 p-b-5">
                                            {{ucwords($row->name)}}
                                        </a>
                                        @if($row->price > $row->pre_price)

                                            <span class="block2-price m-text6 p-r-5">
											{{money($row->price)}}
										    </span>
                                        @else
                                            <span class="block2-oldprice m-text7 p-r-5">
                                                {{money($row->pre_price)}}
                                            </span>
                                            <span class="block2-newprice m-text8 p-r-5">
                                                {{money($row->price)}}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Shipping -->
    <section class="shipping bgwhite p-t-62 p-b-46">
        <!--<div class="flex-w p-l-15 p-r-15">
            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Free Delivery Worldwide
                </h4>

                <a href="#" class="s-text11 t-center">
                    Click here for more info
                </a>
            </div>

            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
                <h4 class="m-text12 t-center">
                    30 Days Return
                </h4>

                <span class="s-text11 t-center">
					Simply return it within 30 days for an exchange.
				</span>
            </div>

            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Store Opening
                </h4>

                <span class="s-text11 t-center">
					Shop open from Monday to Sunday
				</span>
            </div>
        </div>-->
    </section>

@endsection

@section('script')
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('public/front/vendor/parallax100/parallax100.js')}}"></script>
    <script type="text/javascript">
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
@endsection
