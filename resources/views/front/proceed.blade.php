@extends('layouts.front.master')

@section('title')
    Checkout Confirm
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
            <div class="row">
                <div class="col-md-offset-3 col-md-6 p-b-30">
                    {!! $table->content ?? '' !!}
                    <br />
                    <p class="p-b-15">Upload your payslip image for checkout. We Will confirm soon..</p>
                    <form action="{{route('checkout')}}" method="post" class="leave-comment" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <strong>Upload your payment slip: </strong>
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="file" name="paySlip" placeholder="Upload Payment Slip" accept="image/x-png,image/gif,image/jpeg" required>

                        </div>
                        <div class="bo4 of-hidden m-b-20">
                            <textarea class="sizefull s-text7 p-l-22 p-r-22" name="notes" placeholder="Write a short Note"></textarea>
                        </div>

                        <h5>Order Summery</h5>
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Product</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="show_cart_table">

                                </tbody>
                            </table>
                        </div>

                        <h5><u>Add Shipping Method</u></h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>Carrier</th>
                                    <th>Shipping Time (day)</th>
                                    <th class="text-right">Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $owight = 0;
                                $oprice = 0;
                                $rwight = 0;
                                foreach ($order as $tmpo){
                                    $owight += ($tmpo->product['weight']*$tmpo->qty);
                                    $oprice += ($tmpo->product['price']*$tmpo->qty);
                                }

                                foreach ($rdm_order as $tmpr){
                                        $rwight += ($tmpr->product['weight']*$tmpr->qty);
                                    }

                                $total_wight = $owight + $rwight;
                                $i = 0;


                            @endphp
                                @foreach($shipping as $row)

                                    @php
                                        $minimam_rate = ($total_wight - $row->weight) / $row->weight_add;
                                        $adi_rate = $minimam_rate * $row->rate_add;
                                        $total_cost = $adi_rate + $row->rate;
                                    @endphp

                                    <tr>
                                        <td><input type="radio" class="costs"  name="shippingID" data-price="{{$oprice}}" data-cost="{{money_c($total_cost)}}" value="{{$row->shippingID}}" {{($i==0?'checked':'')}}></td>
                                        <td>{{$row->carrier['name'] ?? ''}}</td>
                                        <td>{{$row->shipping_time}}</td>
                                        <td class="text-right">{{money_c($total_cost)}}</td>
                                    </tr>
                                   @php
                                        $i++;
                                   @endphp
                                @endforeach
                            </tbody>

                        </table>



                        <h4 class="mb-3 text-right">Total: <span id="total_cost"></span></h4>

                        <div class="w-size25 text-right" style="width: 100%;">
                            <!-- Button -->
                            <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                                Checkout
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            var pricex = $(".costs:checked").data('price');
            var costx = $(".costs:checked").data('cost');
            var show_costx = (Number(pricex)+Number(costx));

            $('#total_cost').html(show_costx.toFixed(2));

            $(".costs").click(function(){

                var price = $(this).data('price');
                var cost = $(this).data('cost');

                var show_cost = (Number(price)+Number(cost));

                $('#total_cost').html(show_cost.toFixed(2));

            });
        });


        $(function () {
            $.get( "{{route('show-cart')}}", function(result) {
                var cart_lists = '';
                $.each(result.items, function( i, row ) {
                    cart_lists += '<tr>' +
                            '<td><div class="header-cart-item-img">\n' +
                        '     <img src="'+row.img+'" alt="'+row.name+'">\n' +
                        '     </div></td>' +
                            '<td>'+row.name+'<br><small>'+row.qty+' x '+row.price+'</small></td>' +
                            '<td class="text-right">'+row.amount_m+'</td>' +
                        '</tr>';

                });

                $.each(result.items_rdm, function( j, rows ) {

                    cart_lists += '<tr class="text-danger">' +
                        '<td><div class="header-cart-item-img">\n' +
                        '     <img src="'+rows.img+'" alt="'+rows.name+'">\n' +
                        '     </div></td>' +
                        '<td>'+rows.name+'<br><small>'+rows.qty+' x '+rows.point+'</small></td>' +
                        '<td class="text-right">'+rows.points+' <sup>pt</sup></td>' +
                        '</tr>';

                    /*cart_lists += '<li class="header-cart-item">\n' +
                        '                                <a href="'+rows.del+'"><div class="header-cart-item-img">\n' +
                        '                                    <img src="'+rows.img+'" alt="'+rows.name+'">\n' +
                        '                                </div></a>\n' +
                        '\n' +
                        '                                <div class="header-cart-item-txt">\n' +
                        '                                    <a href="'+rows.url+'" class="header-cart-item-name">\n' +
                        '                                        '+rows.name+'\n' +
                        '                                    </a>\n' +
                        '\n' +
                        '                                    <span class="header-cart-item-info text-danger">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t'+rows.qty+' x '+rows.point+'\n' +
                        '\t\t\t\t\t\t\t\t\t\t</span>\n' +
                        '                                </div>\n' +
                        '                            </li>';*/
                });

                $('.show_cart_table').html(cart_lists);
            });
        });

    </script>
@endsection

