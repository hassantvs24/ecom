
<section class="bgwhite p-t-45 p-b-58">
    <div class="container">
        <div class="col-md-12 text-center">
            <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#chatModal"><i class="fa fa-commenting"></i> Chat with live person?</button>

            <!-- Modal -->
            <div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Chat start with live person</h4>
                        </div>
                        <form id="modalChatForm" action="{{route('chat-start')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                            {{csrf_field()}}
                            @if(Auth::check())
                            <input type="hidden" name="id" value="{{Auth::user()->id}}">
                            @endif
                            <div class="modal-body">
                                <div class="bo4 of-hidden size15 m-b-20">
                                    <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Your Name" required>
                                </div>
                                <div class="bo4 of-hidden size15 m-b-20">
                                    <input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Your Email" required>
                                </div>
                                <div class="bo4 of-hidden size15 m-b-20">
                                    <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="message" placeholder="Your Question?" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Start Chat</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Footer -->
<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
    <div class="flex-w p-b-90">
        <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 p-b-30">
            <!--GET IN TOUCH-->
            </h4>

            <div>
                <p class="s-text7 w-size27">
                    <!--Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879-->
                </p>

                <!--<div class="flex-m p-t-30">
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
                </div>-->
            </div>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                Links
            </h4>

            <ul>
                <li class="p-b-9">
                    <a href="{{route('site')}}" class="s-text7">
                        Home
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="{{route('site-redeem')}}" class="s-text7">
                        Redemption
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="{{route('cart')}}" class="s-text7">
                        Cart List
                    </a>
                </li>

            </ul>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                Links
            </h4>

            <ul>
                <li class="p-b-9">
                    <a href="{{route('site-shop')}}" class="s-text7">
                        Shop
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="{{route('about')}}" class="s-text7">
                        About Us
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="{{route('contact')}}" class="s-text7">
                        Contact Us
                    </a>
                </li>

            </ul>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                Help
            </h4>

            <ul>
                <li class="p-b-9">
                    <a href="{{route('login-register')}}" class="s-text7">
                        Login
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="{{route('login-register')}}" class="s-text7">
                        Register
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="{{route('profile')}}" class="s-text7">
                        Profile
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="{{route('contact')}}" class="s-text7">
                        Contact Us
                    </a>
                </li>
            </ul>
        </div>

        <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 p-b-30">
                <!--Newsletter-->
            </h4>

            <!-- <form>
                 <div class="effect1 w-size9">
                     <input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
                     <span class="effect1-line"></span>
                 </div>

                 <div class="w-size2 p-t-20">
                     Button -->
            <!--<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                Subscribe
            </button>
        </div>

    </form>-->
        </div>
    </div>

    <div class="t-center p-l-15 p-r-15">
        <!--<a href="#">
            <img class="h-size2" src="{{asset('public/front/images/icons/paypal.png')}}" alt="IMG-PAYPAL">
        </a>

        <a href="#">
            <img class="h-size2" src="{{asset('public/front/images/icons/visa.png')}}" alt="IMG-VISA">
        </a>

        <a href="#">
            <img class="h-size2" src="{{asset('public/front/images/icons/mastercard.png')}}" alt="IMG-MASTERCARD">
        </a>

        <a href="#">
            <img class="h-size2" src="{{asset('public/front/images/icons/express.png')}}" alt="IMG-EXPRESS">
        </a>

        <a href="#">
            <img class="h-size2" src="{{asset('public/front/images/icons/discover.png')}}" alt="IMG-DISCOVER">
        </a>

        <div class="t-center s-text8 p-t-20">
            Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="http://infinityflamesoft.com" target="_blank">Infinity Flame</a>
        </div>-->
    </div>
</footer>

<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
</div>
