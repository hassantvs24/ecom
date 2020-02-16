<?php

namespace App\Http\Controllers\Dashboard;

use App\Chat;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $customer = User::where('userLevel', 'Customer')->count();
        $chat = Chat::where('status', 'Pending')->count();
        $order_pending = Chat::where('status', 'Pending')->count();
        $order_paid = Chat::where('status', 'Paid')->count();
        $order_process = Chat::where('status', 'Processing')->count();
        $order_shipped = Chat::where('status', 'Shipped')->count();
        $order_complete = Chat::where('status', 'Complete')->count();
        $product = Product::orderBy('name', 'ASC')->count();

        return view('deshboard.deshboard')->with([
            'customer' => $customer,
            'chat' => $chat,
            'order_pending' => $order_pending,
            'order_process' => $order_process,
            'order_shipped' => $order_shipped,
            'order_complete' => $order_complete,
            'order_paid' => $order_paid,
            'product' => $product
        ]);
    }
}
