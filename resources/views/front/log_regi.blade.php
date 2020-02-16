@extends('layouts.front.master')

@section('title')
    Login / Register
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
            $title = 'Login / Register';
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

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif

                    <form action="{{route('user-login')}}" method="post" class="leave-comment" enctype="multipart/form-data">
                        {{csrf_field()}}

                        @if (Session::has('login'))
                            <input type="hidden" name="message" value="{{ Session::get('login') }}">
                        @endif

                        <input type="hidden" name="isAdmin" value="No">

                        <h4 class="m-text26 p-b-25 p-t-15">
                            Login
                        </h4>
                        <p class="p-b-15">If you have an account? Please login first.</p>
                        @if ($errors->has('incorrect'))
                            <span class="text-danger">
                                    <strong>{{ $errors->first('incorrect') }}</strong>
                                </span>
                        @endif
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Email Address*" required>
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password" placeholder="Login password*" required>

                        </div>

                        <div class="text-right"><a href="{{ route('password.request') }}">Forgot password?</a></div>

                        <div class="w-size25">
                            <!-- Button -->
                            <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                                Login
                            </button>

                        </div>
                    </form>
                </div>

                <div class="col-md-6 p-b-30">
                    <form action="{{route('user-save')}}" method="post" class="leave-comment" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @if (Session::has('login'))
                            <input type="hidden" name="message" value="{{ Session::get('login') }}">
                        @endif
                        <h4 class="m-text26 p-b-25 p-t-15">
                            Register
                        </h4>
                        <p class="p-b-15">If you don't have an account? Please register here.</p>
                        @if ($errors->has('name'))
                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                        @endif
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Full Name*" value="{{ old('name') }}" required>
                        </div>

                        @if ($errors->has('email'))
                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                        @endif
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Email Address*" value="{{ old('email') }}" required>

                        </div>

                        @if ($errors->has('password'))
                            <strong class="text-danger">{{ $errors->first('password') }}</strong>
                        @endif
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password" placeholder="Password*" required>
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password_confirmation" placeholder="Password Confirm*" required>
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <select class="sizefull s-text7 p-l-22 p-r-22" name="locationID" required>
                                <option value="" disabled="" selected>Select Location</option>
                                @foreach($locations as $row)
                                    <option value="{{$row->locationID}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="bo4 of-hidden size15 m-b-20">

                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="contact" placeholder="Contact Number" value="{{ old('contact') }}">
                        </div>

                        <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="address" placeholder="Address">{{ old('address') }}</textarea>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="postCode" placeholder="Post Code" value="{{ old('postCode') }}">
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="city" placeholder="City" value="{{ old('city') }}">
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="state" placeholder="State" value="{{ old('state') }}">
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="country" placeholder="Country" value="{{ old('country') }}">
                        </div>


                        @if (Session::has('ref'))
                            <div class="bo4 of-hidden size15 m-b-20">
                                <input class="sizefull s-text7 p-l-22 p-r-22" title="Reference Code" type="text" name="ref" placeholder="Reference Code" value="{{ Session::get('ref') }}" readonly>
                            </div>
                        @endif

                        <div class="w-size25">
                            <!-- Button -->
                            <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                                Register
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


    </script>
@endsection

