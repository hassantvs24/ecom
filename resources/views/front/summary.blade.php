@extends('layouts.front.master')

@section('title')
    Order Summary
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
            $title = 'Checkout Confirm';
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
            <div class="text-center">
                <h1>Thank you for your order! :)</h1>
                <p>Thank you. Your order has been received.</p>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div style="background-color: #F0F0F0; border-bottom: 1px solid #cccccc;  margin-top: 15px; padding: 15px;">
                        <p style="margin: 0px; color: grey; font-size: small;">ORDER NUMBER:</p>
                        <p><b>{{$orders->orderID}}</b></p>
                    </div>
                    <div style="background-color: #F0F0F0; border-bottom: 1px solid #cccccc; padding: 15px;">
                        <p style="margin: 0px; color: grey; font-size: small;">DATE:</p>
                        <p><b>{{date('M, d Y', strtotime($orders->created_at))}}</b></p>
                    </div>

                    <div style="background-color: #F0F0F0; border-bottom: 1px solid #cccccc; padding: 15px;">
                        <p style="margin: 0px; color: grey; font-size: small;">SHIPPING COST:</p>
                        <p><b>{{$orders->shipCost}}</b></p>
                    </div>

                    <div style="background-color: #F0F0F0; border-bottom: 1px solid #cccccc; padding: 15px;">
                        <p style="margin: 0px; color: grey; font-size: small;">TOTAL:</p>
                        @php
                            $items = $orders->items()->select('price', 'qty')->get();
                            $qty = 0;
                            $amount = 0;
                            foreach ($items as $rows){
                                $qty += $rows->qty;
                                $amount += $rows->qty * $rows->price;
                            }

                        @endphp
                        <p><b>{{money($amount + $orders->shipCost)}}</b></p>
                    </div>

                    <div style="background-color: #F0F0F0; padding: 15px;">
                        <p style="margin: 0px; color: grey; font-size: small;">PAYMENT METHOD:</p>
                        <p><b>Direct bank transfer</b></p>
                    </div>

                    <div style="padding: 15px;">
                        <a href="{{route('site-shop')}}" class="btn btn-success btn-lg btn-block text-white">Continue to Shopping</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">



    </script>
@endsection

