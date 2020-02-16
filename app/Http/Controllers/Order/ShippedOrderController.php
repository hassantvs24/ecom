<?php

namespace App\Http\Controllers\Order;

use App\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShippedOrderController extends Controller
{
    public function index(){
        $table = Orders::where('status', 'Shipped')->orderBy('orderID', 'DESC')->get();
        return view('orders.order_shipped')->with(['table' => $table]);
    }
}
