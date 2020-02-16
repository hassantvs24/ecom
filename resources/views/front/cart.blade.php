@extends('layouts.front.master')

@section('title')
    Cart
@endsection

@section('content')

    <!-- Title Page -->
    @php


        if($bank != null){
            $exists = Storage::disk('slip')->exists($bank->img);
            $title = $bank->title;
            $subTitle = $bank->subTitle;
            if($exists){
                $img = asset('public/slip/'.$bank->img);
            }else{
                $img = asset('public/front/images/heading-pages-02.jpg');
            }
        }else{
            $img = asset('public/front/images/heading-pages-02.jpg');
            $title = 'Cart';
            $subTitle = '';
        }

    @endphp
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{$img}});">
        <h2 class="l-text2 t-center">{{$title}}</h2>
        <p class="m-text13 t-center">{{$subTitle}}</p>
    </section>

    <!-- Cart -->
    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
            <!-- Cart item -->
            <form action="{{route('add-cart-bulk')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                {{csrf_field()}}
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th class="column-1"></th>
                                <th class="column-2">Product</th>
                                <th class="column-3">Price</th>
                                <th class="column-4 p-l-70">Quantity</th>
                                <th class="column-5">Total</th>
                            </tr>

                            @php
                                $total = 0;
                            @endphp

                            @foreach($table as $row)

                                <tr class="table-row">
                                    <td class="column-1">
                                        <a href="{{route('del-cart', ['id' => $row->tempOrderID])}}">
                                            <div class="cart-img-product b-rad-4 o-f-hidden">
                                                <img src="{{asset('public/product/sx_'.$row->product['img'])}}" alt="{{ucwords($row->product['name'])}}">
                                            </div>
                                        </a>
                                    </td>
                                    <td class="column-2">{{ucwords($row->product['name'])}}</td>
                                    <td class="column-3">{{money($row->product['price'])}}</td>
                                    <td class="column-4">
                                        <div class="flex-w bo5 of-hidden w-size17">
                                            <button type="button" class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                            </button>

                                            <input class="size8 m-text18 t-center num-product" type="number" name="qty[{{$row->tempOrderID}}]" value="{{$row->qty}}" autocomplete="off">

                                            <button type="button" class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="column-5">{{money($row->product['price'] * $row->qty)}}</td>
                                </tr>
                                @php
                                    $total += ($row->product['price'] * $row->qty);
                                @endphp
                            @endforeach

                        </table>
                    </div>
                </div>

                <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                    <div class="flex-w flex-m w-full-sm">
                        <!--<div class="size11 bo4 m-r-10">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
                        </div>

                        <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">

                            <button type="button" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                Apply coupon
                            </button>
                        </div> -->
                    </div>

                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <!-- Button -->
                        <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                            Update Cart
                        </button>
                    </div>
                </div>
            </form>

            <form action="{{route('bulk-redeem')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                {{csrf_field()}}
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head bg-danger">
                                <th class="column-1"></th>
                                <th class="column-2 text-white">Redemption Product</th>
                                <th class="column-3 text-white">Points</th>
                                <th class="column-4 text-white p-l-70">Quantity</th>
                                <th class="column-5 text-white">Total</th>
                            </tr>

                            @php
                                $total_rdm = 0;
                            @endphp

                            @foreach($table_rdm as $row)

                                <tr class="table-row">
                                    <td class="column-1">
                                        <a href="{{route('del-redeem-cart', ['id' => $row->tempRdmOrderID])}}">
                                            <div class="cart-img-product b-rad-4 o-f-hidden">
                                                <img src="{{asset('public/product/sx_'.$row->product['img'])}}" alt="{{ucwords($row->product['name'])}}">
                                            </div>
                                        </a>
                                    </td>
                                    <td class="column-2">{{ucwords($row->product['name'])}}</td>
                                    <td class="column-3">{{$row->points}}</td>
                                    <td class="column-4">
                                        <div class="flex-w bo5 of-hidden w-size17">
                                            <button type="button" class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                            </button>

                                            <input class="size8 m-text18 t-center num-product" type="number" name="qty[{{$row->tempRdmOrderID}}]" value="{{$row->qty}}" autocomplete="off">

                                            <button type="button" class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="column-5">{{($row->points * $row->qty)}}</td>
                                </tr>
                                @php
                                    $total_rdm += ($row->points * $row->qty);
                                @endphp
                            @endforeach

                        </table>
                    </div>
                </div>

                <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                    <div class="flex-w flex-m w-full-sm">
                        <!--<div class="size11 bo4 m-r-10">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
                        </div>

                        <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">

                            <button type="button" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                Apply coupon
                            </button>
                        </div> -->
                    </div>

                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <!-- Button -->
                        <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 bg-danger">
                            Update Cart
                        </button>
                    </div>
                </div>
            </form>


            <!-- Total -->
            <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                <h5 class="m-text20 p-b-24">
                    Cart Totals
                </h5>

                <!--  -->
                <!--<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

                    <span class="m-text21 w-size20 w-full-sm">
						{{money($total)}}
					</span>
                </div>-->

                <!--  -->
               <!-- <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Shipping:
					</span>

                    <div class="w-size20 w-full-sm">
                        <p class="s-text8 p-b-23">
                            There are no shipping methods available. Please double check your address, or contact us if you need any help.
                        </p>

                        <span class="s-text19">
							Calculate Shipping
						</span>

                        <div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
                            <select class="selection-2" name="country">
                                <option>Select a country...</option>
                                <option>US</option>
                                <option>UK</option>
                                <option>Japan</option>
                            </select>
                        </div>

                        <div class="size13 bo4 m-b-12">
                            <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="state" placeholder="State /  country">
                        </div>

                        <div class="size13 bo4 m-b-22">
                            <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="postcode" placeholder="Postcode / Zip">
                        </div>

                        <div class="size14 trans-0-4 m-b-10">

                            <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                Update Totals
                            </button>
                        </div>
                    </div>
                </div>-->

                <!--  -->
                <div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

                    <span class="m-text21 w-size20 w-full-sm">
						{{money($total)}}
					</span>
                </div>

                <div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm text-danger">
						Total Points:
					</span>

                    <span class="m-text21 w-size20 w-full-sm  text-danger">
						{{$total_rdm}}
					</span>
                </div>

                <div class="flex-w flex-sb-m p-t-26 p-b-30">
                    <p class="text-primary m-b-15">Your Point: {{Auth::user()->points ?? 0}}</p>
                    <div style="width: 100%;">
                        {!! $bank->content ?? '' !!}
                    </div>


                    <p class="text-danger border border-danger text-center m-t-15" style="padding: 5px;">Please make sure your redemption order must be your point limit.</p>


                </div>

                <div class="size15 trans-0-4">
                    <!-- Button -->
                    <a href="{{route('proceed')}}" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">


    </script>
@endsection

