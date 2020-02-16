<table style="width: 100%;">
    <tr>
        <td>
            <h3>Company Name</h3>
        </td>
    </tr>
</table>
<hr>
<table style="width: 100%;">
    <tr>
        <td>
            <p style="margin: 0px;"><b>Name: </b> {{$table->customer['name']}}</p>
            <p style="margin: 0px;"><b>Contact: </b> {{$table->customer['contact']}}</p>
            <p style="margin: 0px;"><b>Email: </b> {{$table->customer['email']}}</p>
            <p style="margin: 0px;"><b>Address: </b> {{$table->customer['address']}}, {{$table->customer['state']}}, {{$table->customer['city']}} , {{$table->customer['postCode']}}, {{$table->customer['country']}}</p>
        </td>
        <td>
            <p style="margin: 0px;"><b>Order No: </b> {{invoice_n($table->orderID)}}</p>
            <p style="margin: 0px;"><b>Order Date: </b> {{pub_date($table->created_at)}}</p>
            <p style="margin: 0px;"><b>Order Status: </b> {{$table->status}}</p>
        </td>
    </tr>
</table>
<hr>

<table style="width: 100%;">
    <thead>
        <tr style="border-bottom: 2px solid #EEEEEE;">
            <th>#</th>
            <th>Product</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @php
            $total = 0;
            $items = $table->items()->get();
        @endphp
        @foreach($items as $row)
            @php
                $current = date('Y-m-d');
                $promotion = $row->product->promotion()->where('status', 'Active')->whereDate('starts', '<=', $current)->whereDate('ends', '>=', $current)->orderBy('created_at', 'DESC')->get();
            @endphp
        <tr style="border-bottom: 1px solid #EEEEEE;">
            <td><img src="{{asset('public/product/sx_'.$row->img)}}" alt="{{$row->name}}"></td>
            <td>
                {{$row->name}}
                <ul>
                @foreach($promotion as $rows)
                    <li class="text-primary">{{$rows->name}}</li>
                @endforeach
                </ul>

            </td>
            <td>{{money($row->price)}}</td>
            <td>{{$row->qty}}</td>
            <td>{{money($row->price * $row->qty)}}</td>
        </tr>
        @php
            $total += ($row->price * $row->qty);
        @endphp
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4">Total: </th>
            <th>{{money($total)}}</th>
        </tr>
    </tfoot>
</table>
<hr>
<p style="font-weight: bold;">Redemption Product List</p>
<table style="width: 100%;">
    <thead>
    <tr style="border-bottom: 2px solid #EEEEEE;">
        <th>#</th>
        <th>Product</th>
        <th>Points</th>
        <th>Qty</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @php
        $total_rdm = 0;
        $items_rdm = $table->rdm_items()->get();
    @endphp
    @foreach($items_rdm as $row)
        <tr style="border-bottom: 1px solid #EEEEEE;">
            <td><img src="{{asset('public/product/sx_'.$row->img)}}" alt="{{$row->name}}"></td>
            <td>{{$row->name}}</td>
            <td>{{$row->point}}</td>
            <td>{{$row->qty}}</td>
            <td>{{$row->point * $row->qty}}</td>
        </tr>
        @php
            $total_rdm += ($row->point * $row->qty);
        @endphp
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th colspan="4">Total: </th>
        <th>{{$total_rdm}}</th>
    </tr>
    </tfoot>
</table>
<hr>
<div>
    <h5><u>Shipping Information:</u></h5>
    <table class="table">
        <thead>
            <tr>
                <th>Carrier</th>
                <th>Location</th>
                <th>Shipping Cost</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$table->shipping->carrier['name'] ?? ''}}</td>
                <td>{{$table->shipping->location['name'] ?? ''}}</td>
                <td>{{money($table->shipCost)}}</td>
            </tr>
        </tbody>
    </table>
</div>
<div>
    <h5><u>Payslip:</u></h5>
    <p><a href="{{asset('public/slip/'.$table->payslip)}}" target="_blank"><img class="img-responsive img-thumbnail" src="{{asset('public/slip/'.$table->payslip)}}" alt="{{$row->orderID}}"></a></p>
    <p><b>Note:</b> {{$table->notes}}</p>
    @if($table->trackNumber != null)
    <p class="text-danger"><b>Track No:</b> {{$table->trackNumber}}</p>
    @endif
</div>
<hr>
