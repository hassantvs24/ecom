@extends('layouts.front.master')

@section('title')
    Login / Register
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
                <div class="col-md-3 p-b-30"></div>

                <div class="col-md-6 p-b-30">
                    <form action="{{route('profile-update')}}" method="post" class="leave-comment" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$table->id}}">
                        <h4 class="m-text26 p-b-25 p-t-15">
                            Update Profile
                        </h4>
                        <p class="p-b-15">Please update/edit your information</p>
                        @if ($errors->has('name'))
                            <strong>{{ $errors->first('name') }}</strong>
                        @endif
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Full Name*" value="{{$table->name}}" required>
                        </div>

                        @if ($errors->has('email'))
                            <strong>{{ $errors->first('email') }}</strong>
                        @endif
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Email Address*" value="{{$table->email}}" required>

                        </div>

                        @if ($errors->has('password'))
                            <strong>{{ $errors->first('password') }}</strong>
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
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="contact" placeholder="Contact Number" value="{{$table->contact}}">
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="state" placeholder="State" value="{{$table->state}}">
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="city" placeholder="City" value="{{$table->city}}">
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="postCode" placeholder="Post Code" value="{{$table->postCode}}">
                        </div>

                        <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="address" placeholder="Address">{{$table->address}}</textarea>


                        <div class="w-size25">
                            <!-- Button -->
                            <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                                Update
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

