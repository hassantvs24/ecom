@foreach($table as $row)
    <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
        <!-- Block2 -->
        <div class="block2">
            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                <img src="{{asset('public/product/md_'.$row->img)}}" alt="{{ucwords($row->name)}}">

                <div class="block2-overlay trans-0-4">
                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                    </a>

                    <div class="block2-btn-addcart w-size1 trans-0-4">
                        <!-- Button -->
                        <button data-product="{{ucwords($row->name)}}" data-id="{{$row->productID}}" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <div class="block2-txt p-t-20">
                <a href="{{route('details-product', [$row->productID])}}" class="block2-name dis-block s-text3 p-b-5">
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
