<?php

namespace App\Http\Controllers\Order;

use App\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProcessingOrderController extends Controller
{
    public function index(){
        $table = Orders::where('status', 'Processing')->orderBy('orderID', 'DESC')->get();
        return view('orders.order_process')->with(['table' => $table]);
    }

    public function shippedOrder(Request $request){
        $table = Orders::find($request->orderID);
        $table->status = $request->status;
        $table->trackNumber = $request->trackNumber;
        $table->save();

        return redirect()->back()->with(config('naz.edit'));
    }
}
