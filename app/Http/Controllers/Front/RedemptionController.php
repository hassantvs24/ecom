<?php

namespace App\Http\Controllers\Front;

use App\Pages;
use App\Redemption;
use App\RedemptionList;
use App\TempRdmOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class RedemptionController extends Controller
{
    public function index(){
        $current = date('Y-m-d');
        $reddem =Redemption::where('status', 'Active')->whereDate('starts', '<=', $current)->whereDate('ends', '>=', $current)->orderBy('name')->get();
        $table = Pages::where('name', 'redemption')->first();
        return view('front.redemption')->with(['reddem' => $reddem, 'table' => $table]);
    }

    public function product_list($id){

        $table = RedemptionList::where('redemptionID', $id)->get();
        return view('front.redemption_list')->with(['table' => $table]);
    }


    public function add_cart(Request $request){
        $sessionID = Cookie::get('uniq_key');


        $check = TempRdmOrder::where('sessionID', $sessionID)->where('productID', $request->id)->where('redemptionID', $request->rdm)->first();


        if($check == null){

            if($request->has('qty')){
                $qty = $request->qty;
            }else{
                $qty = 1;
            }

            $table = new TempRdmOrder();
            $table->sessionID = $sessionID;
            $table->productID = $request->id;
            $table->redemptionID = $request->rdm;
            $table->points = $request->points;
            $table->qty = $qty;
            $table->save();
        }else{

            if($request->has('qty')){
                $qty = $request->qty;
            }else{
                $qty = $check->qty + 1;
            }

            if($qty > 0){
                $table = TempRdmOrder::find($check->tempRdmOrderID);
                $table->qty = $qty;
                $table->save();
            }else{
                $table = TempRdmOrder::find($check->tempRdmOrderID);
                $table->delete();
            }

        }

        return 1;
    }

    public function add_bulk(Request $request){
      //  dd($request->all());

        $qtys = $request->qty;

        foreach ($qtys as $key => $qty){
            if($qty > 0){
                $table = TempRdmOrder::find($key);
                $table->qty = $qty;
                $table->save();
            }else{
                $table = TempRdmOrder::find($key);
                $table->delete();
            }

        }

        return redirect()->back()->with(config('naz.save'));
    }

    public function del_cart($id){
        $table = TempRdmOrder::find($id);
        $table->delete();
        return redirect()->back()->with(config('naz.del'));
    }

}
