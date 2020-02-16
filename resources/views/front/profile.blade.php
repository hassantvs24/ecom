@extends('layouts.front.master')

@section('title')
    {{$table->name}} Profile
@endsection

@section('content')
    <!-- Title Page -->
    @php

        if($pages != null){
            $exists = Storage::disk('slip')->exists($pages->img);
            $title = $pages->title;
            $subTitle = $pages->subTitle;
            if($exists){
                $img = asset('public/slip/'.$pages->img);
            }else{
                $img = asset('public/front/images/heading-pages-02.jpg');
            }
        }else{
            $img = asset('public/front/images/heading-pages-02.jpg');
            $title = 'Profile';
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
                <div class="col-md-6 p-b-30">

                    <h4 class="m-b-15">{{$table->name}}</h4>

                    <div class="m-b-15">
                        <img class="img-thumbnail img-responsive" src="data:image/png;base64,{{DNS2D::getBarcodePNG(route('login-ref',['id' =>Auth::user()->id]), 'QRCODE', 7,7)}}" alt="barcode" title="Share your barcode for getting reference point."  />
                        <p class="text-size-small">Share your barcode for getting reference point.</p>
                    </div>

                    <p><b>Point: </b>{{$table->points}}</p>
                    <p><b>Referral: </b>{{$table->ref == null ? 'No Referral': $table->ref}}</p>

                    <h5 class="m-t-15 text-primary">Personal Info</h5>
                    <p><b>Contact: </b>{{$table->contact}}</p>
                    <p><b>Email: </b>{{$table->email}}</p>
                    <p><b>Address: </b>{{$table->address}}, {{$table->state}}, {{$table->city}}, {{$table->postCode}}</p>
                    <p><b>Location: </b>{{$table->location['name'] ?? ''}}</p><br>

                    @if(Auth::user()->userLevel == 'Distributor')
                    <form action="{{route('summery-customer')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22 date_rang_pick" type="text" name="dateRang" placeholder="Date Range" required>
                        </div>
                        <div class="m-t-15">
                            <button type="submit" class="btn btn-primary">Show Log</button>
                        </div>
                    </form>
                    @elseif(Auth::user()->userLevel == 'Salesman')
                        <form action="{{route('summery-distributor')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="bo4 of-hidden size15 m-b-20">
                                <input class="sizefull s-text7 p-l-22 p-r-22 date_rang_pick" type="text" name="dateRang" placeholder="Date Range" required>
                            </div>
                            <div class="m-t-15">
                                <button type="submit" class="btn btn-primary">Show Log</button>
                            </div>
                        </form>
                        @else

                    @endif

                    <div class="m-t-15">
                        <a href="{{route('profile-up-show')}}" class="btn btn-info">Update your profile</a>
                    </div>
                </div>

                <div class="col-md-6 p-b-30">
                    <p>Your latest order history</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Order No</th>
                                <th>Status</th>
                                <th>Qty</th>
                                <th>Amount / Points</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $order = $table->orders()->orderBy('orderID', 'DESC')->paginate(15);
                        @endphp
                            @foreach($order as $row)
                                @php
                                    $items = $row->items()->get();
                                    $qty = 0;
                                    $amount = 0;
                                    foreach ($items as $rows){
                                        $qty += $rows->qty;
                                        $amount += $rows->qty * $rows->price;
                                    }

                                    $rdm_items = $row->rdm_items()->get();
                                    $qtyr = 0;
                                    $amountr = 0;
                                    foreach ($rdm_items as $rowsr){
                                        $qtyr += $rowsr->qty;
                                        $amountr += $rowsr->qty * $rowsr->point;
                                    }

                                @endphp
                            <tr>
                                <td>{{pub_date($row->created_at)}}</td>
                                <td>{{invoice_n($row->orderID)}}</td>
                                <td>{{$row->status}}</td>
                                <td>{{$qty + $qtyr}}</td>
                                <td>{{money($amount)}} / {{$amountr}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $order->links() }}
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script type="text/javascript">

        $(function () {
            $('.date_rang_pick').daterangepicker({
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        });

    </script>
@endsection

