<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield ('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('public/front/images/icons/favicon.png')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/fonts/themify/themify-icons.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/fonts/elegant-font/html-css/style.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/vendor/slick/slick.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/vendor/lightbox2/css/lightbox.min.css')}}">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/vendor/noui/nouislider.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/front/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/responsive.css')}}">
    <!--===============================================================================================-->
    @yield ('style')
</head>
<body class="animsition">

@include('shared.front.header')

@yield ('content')

@include('shared.front.footer')


@yield ('box')

<!-- Container Selection -->
<div id="dropDownSelect1"></div>
<div id="dropDownSelect2"></div>

<script type="text/javascript" src="{{asset('public/assets/js/plugins/ui/moment/moment.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('public/front/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('public/front/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('public/front/vendor/bootstrap/js/popper.js')}}"></script>
<script type="text/javascript" src="{{asset('public/front/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('public/front/vendor/select2/select2.min.js')}}"></script>
<script type="text/javascript">
    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });

    $(".selection-2").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect2')
    });
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('public/front/vendor/slick/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/front/js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('public/front/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('public/front/vendor/lightbox2/js/lightbox.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('public/front/vendor/sweetalert/sweetalert.min.js')}}"></script>
<script type="text/javascript">
    $('.block2-btn-addcart').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        var id = $(this).parent().parent().parent().find('.block2-name').data('id');
        $(this).on('click', function(){
            add_cart(id);
            swal(nameProduct, "is added to cart !", "success");
        });
    });

    $('.block2-btn-addwishlist').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");
        });
    });

</script>
<script type="text/javascript">
    $(function () {
        show_cart();
    });

</script>

@if (Cookie::get('uniq_key') == null)
    <!--Uniq ID Generator-->
    <script type="text/javascript">
        $(function () {
            $.get( "{{route('uniq-id')}}", function() {});
        });

    </script>
    <!--Uniq ID Generator-->
@endif


@yield ('script')
<script src="{{asset('public/front/js/main.js')}}"></script>

@yield ('script2')

<script type="text/javascript">

    function add_cart(id) {
        $.get( "{{route('add-cart')}}", {'id':id}, function(result) {
            if(result == 1){
                show_cart()
            }
        });
    }

    function show_cart() {
        $.get( "{{route('show-cart')}}", function(result) {

            var cart_list = '';

            $.each(result.items, function( i, row ) {
                //alert( index + ": " + value );
                cart_list += '<li class="header-cart-item">\n' +
                '                                <a href="'+row.del+'"><div class="header-cart-item-img">\n' +
                '                                    <img src="'+row.img+'" alt="'+row.name+'">\n' +
                '                                </div></a>\n' +
                '\n' +
                '                                <div class="header-cart-item-txt">\n' +
                '                                    <a href="'+row.url+'" class="header-cart-item-name">\n' +
                '                                        '+row.name+'\n' +
                '                                    </a>\n' +
                '\n' +
                '                                    <span class="header-cart-item-info">\n' +
                '\t\t\t\t\t\t\t\t\t\t\t'+row.qty+' x '+row.price+'\n' +
                '\t\t\t\t\t\t\t\t\t\t</span>\n' +
                '                                </div>\n' +
                '                            </li>';
            });

            $.each(result.items_rdm, function( j, rows ) {
                //alert( index + ": " + value );
                cart_list += '<li class="header-cart-item">\n' +
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
                    '                            </li>';
            });

            $('.header-cart-wrapitem').html(cart_list);
            $('.header-icons-noti').html(result.total_qty);
            $('.header-cart-total').find('span').html(result.amounts);
            $('.header-cart-total').find('#car_point').html(result.points);
        });
    }

    $(function () {
        $('#modalChatForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                success: function(result) {
                    $('#chatModal').modal('hide');
                    window.open("{{route('chat')}}?id="+result.id, "myWindow", "width=500,height=600");
                },
                error: function() {
                    alert('error handling here');
                }
            });

        });
       // replaceMissingImages();
    });



    /*function replaceMissingImages(){
        for (var i=0; i<document.images.length; i++){
            img = new Image();
            img.src = document.images[i].src;
            if (img.height == 0)
                document.images[i].src = "{{asset('public/no_img.png')}}";
        }
    }*/

</script>

</body>
</html>
