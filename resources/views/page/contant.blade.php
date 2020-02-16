@extends('layouts.master')
@section('title')
    Page Content
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Update About Page</h6>
                </div>

                <div class="panel-body">

                    <form action="{{route('page-about')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="row mb-15">
                            <div class="col-md-6 text-right"></div>
                            <div class="col-md-6 text-right"><button class="btn btn-success" type="submit">Update About Page</button></div>
                        </div>
                    <textarea name="contant" class="summernote"></textarea>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Update Contact Page</h6>
                </div>

                <div class="panel-body">

                    <form action="{{route('page-contact')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="row mb-15">
                            <div class="col-md-6 text-right"></div>
                            <div class="col-md-6 text-right"><button class="btn btn-success" type="submit">Update Contact Page</button></div>
                        </div>
                        <textarea name="contant" class="summernote2"></textarea>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Update Bank Details</h6>
                </div>

                <div class="panel-body">

                    <form action="{{route('page-bank')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="row mb-15">
                            <div class="col-md-6 text-right"></div>
                            <div class="col-md-6 text-right"><button class="btn btn-success" type="submit">Update Bank Details</button></div>
                        </div>
                        <textarea name="contant" class="summernote3"></textarea>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/editors/summernote/summernote.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

    <script type="text/javascript">

        $(function() {
            //About
            $('.summernote').summernote();

            var content = {!! json_encode($about->content ?? '') !!};

            $('.summernote').summernote('code', content);
            //About


            //Contact
            $('.summernote2').summernote();

            var content2 = {!! json_encode($contact->content ?? '') !!};

            $('.summernote2').summernote('code', content2);
            //Contact


            //bank
            $('.summernote3').summernote();

            var content3 = {!! json_encode($checkout->content ?? '') !!};

            $('.summernote3').summernote('code', content3);
            //bank
        });


    </script>

@endsection
