@extends('layouts.front.master')

@section('title')
    Sales
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
            $title = 'Shop';
            $subTitle = '';
        }

    @endphp
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{$img}});">
        <h2 class="l-text2 t-center">{{$title}}</h2>
        <p class="m-text13 t-center">{{$subTitle}}</p>
    </section>

    <!-- Content page -->
    <section class="bgwhite p-t-55 p-b-65">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                    <div class="leftbar p-r-20 p-r-0-sm">
                        <!--  -->
                        <h4 class="m-text14 p-b-7">
                            Categories
                        </h4>

                        <ul class="p-b-54">
                            <li class="p-t-4">
                                <a href="#" data-cat="all" class="s-text13 active1 cat_filter">
                                    All
                                </a>
                            </li>
                            @foreach($category as $row)
                            <li class="p-t-4">
                                <a href="#" data-cat="{{$row->category}}" class="s-text13 cat_filter">
                                    {{ucwords($row->category)}}
                                </a>
                            </li>
                            @endforeach
                        </ul>

                        <!--  -->
                        <h4 class="m-text14 p-b-32">
                            Filters
                        </h4>

                        <div class="filter-price p-t-22 p-b-50 bo3">
                            <div class="m-text15 p-b-17">
                                Price
                            </div>

                            <div class="wra-filter-bar">
                                <div id="filter-bar"></div>
                            </div>

                            <div class="flex-sb-m flex-w p-t-16">
                                <div class="w-size11">
                                    <!-- Button -->
                                    <button id="filter_price_range" class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
                                        Filter
                                    </button>
                                </div>

                                <div class="s-text3 p-t-10 p-b-10">
                                    Range: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
                                </div>
                            </div>
                        </div>

                        <!--<div class="filter-color p-t-22 p-b-50 bo3">
                            <div class="m-text15 p-b-12">
                                Color
                            </div>

                            <ul class="flex-w">
                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter1" type="checkbox" name="color-filter1">
                                    <label class="color-filter color-filter1" for="color-filter1"></label>
                                </li>

                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color-filter2">
                                    <label class="color-filter color-filter2" for="color-filter2"></label>
                                </li>

                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter3" type="checkbox" name="color-filter3">
                                    <label class="color-filter color-filter3" for="color-filter3"></label>
                                </li>

                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color-filter4">
                                    <label class="color-filter color-filter4" for="color-filter4"></label>
                                </li>

                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter5" type="checkbox" name="color-filter5">
                                    <label class="color-filter color-filter5" for="color-filter5"></label>
                                </li>

                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color-filter6">
                                    <label class="color-filter color-filter6" for="color-filter6"></label>
                                </li>

                                <li class="m-r-10">
                                    <input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color-filter7">
                                    <label class="color-filter color-filter7" for="color-filter7"></label>
                                </li>
                            </ul>
                        </div>-->

                        <div class="search-product pos-relative bo4 of-hidden">
                            <input class="s-text7 size6 p-l-23 p-r-50" type="text" id="search_product" name="search-product" placeholder="Search Products...">

                            <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                                <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                    <!--  -->
                    <div class="flex-sb-m flex-w p-b-35">
                        <div class="flex-w">
                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                <select class="selection-2" id="sorting_asc" name="sorting">
                                    <option value="atoz">Default Sorting</option>
                                    <option value="rating">Popularity</option>
                                    <option value="price_asc">Price: low to high</option>
                                    <option value="price_desc">Price: high to low</option>
                                </select>
                            </div>

                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                <select class="selection-2"  id="price_filter" name="sorting">
                                    <option value="0">Price</option>
                                    <option value="1">$0.00 - $50.00</option>
                                    <option value="2">$50.00 - $100.00</option>
                                    <option value="3">$100.00 - $150.00</option>
                                    <option value="4">$150.00 - $200.00</option>
                                    <option value="5">$200.00+</option>

                                </select>
                            </div>
                        </div>

                        <span class="s-text8 p-t-5 p-b-5">
							Showing 1–12 of 16 results
						</span>
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

    <form  id="filter_form" action="{{route('product-list')}}" method="get" autocomplete="off">
        <input type="hidden" name="category" value="all">
        <input type="hidden" name="search" value="">
        <input type="hidden" name="sorting" value="atoz">
        <input type="hidden" name="price_start" value="">
        <input type="hidden" name="price_end" value="">
    </form>
@endsection

@section('script')

    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('public/front/vendor/noui/nouislider.min.js')}}"></script>
    <script type="text/javascript">
        /*[ No ui ]
        ===========================================================*/
        var filterBar = document.getElementById('filter-bar');

        noUiSlider.create(filterBar, {
            start: [ 0, 500 ],
            connect: true,
            range: {
                'min': 0,
                'max': 2000
            }
        });

        var skipValues = [
            document.getElementById('value-lower'),
            document.getElementById('value-upper')
        ];

        filterBar.noUiSlider.on('update', function( values, handle ) {
            skipValues[handle].innerHTML = Math.round(values[handle]) ;
        });

        $(function () {
            product_filter();

            $('.cat_filter').click(function () {
                var cat = $(this).data('cat');
                $('#filter_form [name=category]').val(cat);

                product_filter();
            });

            $('#price_filter').change(function () {
                var price = $(this).val();

                if (price == 0) {
                    $('#filter_form [name=price_start]').val('');
                    $('#filter_form [name=price_end]').val('');
                } else if (price == 1) {
                    $('#filter_form [name=price_start]').val(0);
                    $('#filter_form [name=price_end]').val(50);
                } else if (price == 2) {
                    $('#filter_form [name=price_start]').val(50);
                    $('#filter_form [name=price_end]').val(100);
                } else if (price == 3) {
                    $('#filter_form [name=price_start]').val(100);
                    $('#filter_form [name=price_end]').val(150);
                } else if (price == 4) {
                    $('#filter_form [name=price_start]').val(150);
                    $('#filter_form [name=price_end]').val(200);
                } else {
                    $('#filter_form [name=price_start]').val(200);
                    $('#filter_form [name=price_end]').val(50000);
                }

                product_filter();
            });

            $('#sorting_asc').change(function () {
                var sorting = $(this).val();
                $('#filter_form [name=sorting]').val(sorting);
                product_filter();
            });


            $('#filter_price_range').click(function () {
                var lower = Number($('#value-lower').html());
                var upper = Number($('#value-upper').html());

                $('#filter_form [name=price_start]').val(lower);
                $('#filter_form [name=price_end]').val(upper);

                product_filter();
            });


            $('#search_product').on('keydown keyup', function () {
                var param = $(this).val();
                $('#filter_form [name=search]').val(param);
                product_filter();

            });


        });



        function product_filter() {
            $.ajax({
                type: $('#filter_form').attr('method'),
                url: $('#filter_form').attr('action'),
                data: $('#filter_form').serialize(),
                beforeSend: function() { $('#wait').show(); },
                // dataType: "json",
                success: function(result) {
                    $('.show_product').html(result);


                    $('.block2-btn-addcart').each(function(){
                        var nameProduct = $(this).find('button').data('product');
                        var id = $(this).find('button').data('id');
                        $(this).on('click', function(){
                            add_cart(id);
                            swal(nameProduct, "is added to cart !", "success");
                        });
                    });

                    $('.block2-btn-addwishlist').each(function(){
                        var nameProduct = $(this).find('button').data('product');
                        $(this).on('click', function(){
                            swal(nameProduct, "is added to wishlist !", "success");
                        });
                    });
                },
                complete: function() { $('#wait').hide(); },
                error: function() {
                    alert('error handling here');
                }
            });
        }

    </script>
    <!--===============================================================================================-->
@endsection
