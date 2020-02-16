<?php

namespace App\Http\Controllers\Front;

use App\OrderItem;
use App\Orders;
use App\Pages;
use App\Product;
use App\RdmOrderItem;
use App\Shipping;
use App\TempOrder;
use App\TempRdmOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function index(){
        $sessionID = Cookie::get('uniq_key');
        $table = TempOrder::where('sessionID', $sessionID)->orderBy('tempOrderID', 'ASC')->get();
        $table_rdm = TempRdmOrder::where('sessionID', $sessionID)->orderBy('tempRdmOrderID', 'ASC')->get();

        $bank = Pages::where('name', 'cart')->first();
        return view('front.cart')->with(['table' => $table, 'table_rdm' => $table_rdm, 'bank' => $bank]);
    }


    public function add_cart(Request $request){
        $sessionID = Cookie::get('uniq_key');


        $check = TempOrder::where('sessionID', $sessionID)->where('productID', $request->id)->first();


        if($check == null){

            if($request->has('qty')){
                $qty = $request->qty;
            }else{
                $qty = 1;
            }

            $table = new TempOrder();
            $table->sessionID = $sessionID;
            $table->productID = $request->id;
            $table->qty = $qty;
            $table->save();
        }else{

            if($request->has('qty')){
                $qty = $request->qty;
            }else{
                $qty = $check->qty + 1;
            }

            if($qty > 0){
                $table = TempOrder::find($check->tempOrderID);
                $table->qty = $qty;
                $table->save();
            }else{
                $table = TempOrder::find($check->tempOrderID);
                $table->delete();
            }

        }

        return 1;
    }

    public function add_bulk(Request $request){

        $qtys = $request->qty;

        foreach ($qtys as $key => $qty){
            if($qty > 0){
                $table = TempOrder::find($key);
                $table->qty = $qty;
                $table->save();
            }else{
                $table = TempOrder::find($key);
                $table->delete();
            }

        }

        return redirect()->back()->with(config('naz.save'));
    }


    public function del_cart($id){
        $table = TempOrder::destroy($id);
        //$table->delete();
        return redirect()->back()->with(config('naz.del'));
    }


    public function show_cart(){
        $sessionID = Cookie::get('uniq_key');

        $table = TempOrder::where('sessionID', $sessionID)->orderBy('tempOrderID', 'ASC')->get();

        $table_rdm = TempRdmOrder::where('sessionID', $sessionID)->orderBy('tempRdmOrderID', 'ASC')->get();

        $data = [];
        $total_amount = 0;
        $total_qty = 0;
        foreach ($table as $row){
            $rowData['name'] = ucwords($row->product['name']);
            $rowData['qty'] = $row->qty;
            $rowData['price'] = money($row->product['price']);
            $rowData['img'] = asset('public/product/sx_'.$row->product['img']);
            $rowData['url'] = route('details-product', [$row->productID]);
            $rowData['del'] = route('del-cart', [$row->tempOrderID]);
            $rowData['amount'] = ($row->product['price'] * $row->qty);
            $rowData['amount_m'] = money($row->product['price'] * $row->qty);
            $total_amount += ($row->product['price'] * $row->qty);
            $total_qty += $row->qty;

            $data[] = $rowData;
        }

        $data_rdm = [];
        $total_points = 0;
        $total_rdm_qty = 0;
        foreach ($table_rdm as $rows){
            $rowData1['name'] = ucwords($rows->product['name']);
            $rowData1['qty'] = $rows->qty;
            $rowData1['point'] = $rows->points;
            $rowData1['img'] = asset('public/product/sx_'.$rows->product['img']);
            $rowData1['url'] = route('details-product', [$rows->productID]);
            $rowData1['del'] = route('del-redeem-cart', [$rows->tempRdmOrderID]);
            $rowData1['points'] = ($rows->points * $rows->qty);
            $total_points += ($rows->points * $rows->qty);
            $total_rdm_qty += $rows->qty;

            $data_rdm[] = $rowData1;
        }

        return response()->json(['items' => $data, 'items_rdm' => $data_rdm, 'points' => $total_points, 'amounts' => money($total_amount), 'total_qty' => ($total_qty + $total_rdm_qty)]);

    }


    public function before_checkout(){
        if(isset(Auth::user()->id)){
            if(Auth::user()->isAdmin == 'No'){
                $sessionID = Cookie::get('uniq_key');
                $check = TempOrder::where('sessionID', $sessionID)->get();

                $check_rdm = TempRdmOrder::where('sessionID', $sessionID)->get();

                $counts_all = ($check->count() + $check_rdm->count());

                if($check_rdm->count() > 0){
                    $points = TempRdmOrder::select(DB::raw('sum(qty*points) AS t_point'))
                        ->where('sessionID', $sessionID)->first();

                    if($points->t_point > Auth::user()->points){
                        return redirect()->route('cart')->with(['message' => 'Please remove redemption product. Because you have to need more points to make this order.']);
                    }
                }

                if($counts_all > 0) {
                    $table = Pages::where('name', 'checkout')->first();
                    $shipping = Shipping::where('locationID', Auth::user()->locationID)->get();
                    //dd($shipping);
                    $temp_order = TempOrder::where('sessionID', $sessionID)->get();
                    $temp_rdm_order = TempRdmOrder::where('sessionID', $sessionID)->get();
                    return view('front.proceed')->with(['table' => $table, 'shipping' => $shipping, 'order' => $temp_order, 'rdm_order' => $temp_rdm_order]);
                }else{
                    return redirect()->route('site-shop')->with(['message' => 'Please Select Product First']);
                }

            }else{
                session(['login' => 'cart']);
                return redirect()->route('login-register');
            }
        }else{
            session(['login' => 'cart']);
            return redirect()->route('login-register');
        }
    }


    public function checkout(Request $request){
        //dd($request->all());
        $sessionID = Cookie::get('uniq_key');
        $temp_order = TempOrder::where('sessionID', $sessionID)->get();
        $temp_rdm_order = TempRdmOrder::where('sessionID', $sessionID)->get();
        $couts_order = $temp_order->count();//($temp_rdm_order->count() + $temp_order->count());
        if($couts_order > 0) {
            DB::beginTransaction();
            try {

                $owight = 0;
                $rwight = 0;
                foreach ($temp_order as $tmpo){
                    $owight += ($tmpo->product['weight']*$tmpo->qty);
                }

                foreach ($temp_rdm_order as $tmpr){
                    $rwight += ($tmpr->product['weight']*$tmpr->qty);
                }

                $total_wight = $owight + $rwight;

                $shipping  = Shipping::find($request->shippingID);
                $minimam_rate = ($total_wight - $shipping->weight) / $shipping->weight_add;
                $adi_rate = $minimam_rate * $shipping->rate_add;
                $total_cost = $adi_rate + $shipping->rate;


                $table = new Orders();
                $table->orderNumber = strtotime(date('Y-m-d H:i:s'));

                if ($request->hasFile('paySlip')) {
                    $slip = $request->file('paySlip');
                    $extension = $slip->getClientOriginalExtension();
                    $fileName = md5(date('d-m-Y H:i:s')) . '.' . $extension;

                    Storage::disk('slip')->put($fileName, File::get($slip));
                    $table->payslip = $fileName;
                }
                $table->userID = Auth::user()->id;
                $table->status = 'Pending';
                $table->notes = $request->notes;
                $table->notes = $request->notes;
                $table->shippingID = $request->shippingID;
                $table->shipCost = $total_cost;
                $table->save();
                $orderID = $table->orderID;


                foreach ($temp_order as $row) {
                    $product = Product::find($row->productID);

                    $items = new OrderItem();
                    $items->orderID = $orderID;
                    $items->productID = $row->productID;
                    $items->sku = $product->sku;
                    $items->name = $product->name;
                    $items->price = $product->price;
                    $items->img = $product->img;
                    $items->qty = $row->qty;
                    $items->save();
                }

                foreach ($temp_rdm_order as $row) {
                    $products = Product::find($row->productID);

                    $items = new RdmOrderItem();
                    $items->orderID = $orderID;
                    $items->productID = $row->productID;
                    $items->sku = $products->sku;
                    $items->name = $products->name;
                    $items->point = $row->points;
                    $items->img = $products->img;
                    $items->qty = $row->qty;
                    $items->save();
                }


                TempOrder::where('sessionID', $sessionID)->delete();

                TempRdmOrder::where('sessionID', $sessionID)->delete();

                $values = md5(date('Y-m-d h:i:s') . rand(1, 10000));
                Cookie::queue('uniq_key', $values, config('naz.cookie_time'));

                DB::commit();
            } catch (\Throwable $e) {
                DB::rollback();
                throw $e;
            }

            return redirect()->route('summary',['id' => $orderID]);
           // return redirect()->route('site')->with(['message' => 'Purchase successfully completed. Waiting for verify']);
        }else{
            return redirect()->route('site-shop')->with(['message' => 'Please Select Product First']);
        }

    }


    public function summary($id){
        $table = Pages::where('name', 'checkout')->first();
        $orders = Orders::find($id);
        if(Auth::check()){
            if(Auth::user()->id == $orders->userID){
                return view('front.summary')->with(['table' => $table, 'orders' => $orders]);
            }else{
                return redirect()->route('access');
            }
        }else{
            return redirect()->route('login-register');
        }



    }


}
