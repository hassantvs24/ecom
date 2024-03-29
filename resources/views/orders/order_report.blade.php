@extends('layouts.master')

@section('title')
    Order Reports
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">Order Reports</h6>
                </div>
                <form action="{{route('export-report')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="panel-body">


                        <div class="input-group mb-15">
                            <span class="input-group-addon">Report Type</span>
                            <select name="reports" class="form-control">
                                <option value="General">Order Listing</option>
                                <option value="Details">Order Details Listing</option>
                                <option value="Redemption">Redemption Details Listing</option>
                            </select>
                        </div>

                        <div class="input-group mb-15">
                            <span class="input-group-addon">Select Date Range</span>
                            <input class="form-control date_rang_pick" name="dateRang" placeholder="Pick Date" type="text">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <ul style="padding: 0px;">

                                        <li style="list-style: none;">
                                            <label class="checkbox-inline">
                                                <input name="status[]" value="Pending" type="checkbox">
                                                Pending Order
                                            </label>
                                        </li>

                                    <li style="list-style: none;">
                                        <label class="checkbox-inline">
                                            <input name="status[]" value="Paid" type="checkbox" checked>
                                            Paid Order
                                        </label>
                                    </li>

                                    <li style="list-style: none;">
                                        <label class="checkbox-inline">
                                            <input name="status[]" value="Processing" type="checkbox">
                                            Processing Order
                                        </label>
                                    </li>

                                    <li style="list-style: none;">
                                        <label class="checkbox-inline">
                                            <input name="status[]" value="Hide" type="checkbox">
                                            Hide Order
                                        </label>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-md-6">

                                <ul style="padding: 0px;">

                                    <li style="list-style: none;">
                                        <label class="checkbox-inline">
                                            <input name="status[]" value="Shipped" type="checkbox">
                                            Shipped Order
                                        </label>
                                    </li>

                                    <li style="list-style: none;">
                                        <label class="checkbox-inline">
                                            <input name="status[]" value="Complete" type="checkbox">
                                            Complete Order
                                        </label>
                                    </li>

                                    <li style="list-style: none;">
                                        <label class="checkbox-inline">
                                            <input name="status[]" value="Cancelled" type="checkbox">
                                            Cancelled Order
                                        </label>
                                    </li>

                                </ul>

                            </div>
                        </div>


                    </div>
                    <div class="panel-footer">
                        <div class="heading-elements">
                            <div class="heading-btn pull-right">
                                <!--<button type="reset" class="btn btn-default"><i class="icon-reset"></i> Reset</button>-->
                                <button type="submit" class="btn btn-info"><i class="icon-stats-bars2"></i> Export to CSV</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('script')

    <script type="text/javascript" src="{{asset('public/assets/js/plugins/pickers/daterangepicker.js')}}"></script>


    <script type="text/javascript">

        $(function () {
            $('.select2').select2();
        });

        $(function () {
            $('.date_rang_pick').daterangepicker({
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        });

        $(function () {
            $('.date_pick').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        });


    </script>

@endsection
