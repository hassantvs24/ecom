<?php

namespace App\Http\Controllers\Shipping;

use App\Carrier;
use App\Locations;
use App\Shipping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RateRegistrarController extends Controller
{
    public function index(){
        $locations = Locations::orderBy('name', 'ASC')->get();
        $carrier = Carrier::orderBy('name', 'ASC')->get();
        $table = Shipping::orderBy('shippingID', 'DESC')->get();
        return view('shipping.rate')->with(['table'=> $table,'carrier' => $carrier, 'locations' => $locations]);
    }

    public function save(Request $request){

       // dd($request->all());
        $table = new Shipping();
        $table->carrierID = $request->carrierID;
        $table->locationID = $request->locationID;
        $table->weight = $request->weight;
        $table->weight_add = $request->weight_add;
        $table->rate = $request->rate;
        $table->rate_add = $request->rate_add;
        $table->shipping_time = $request->shipping_time;
        $table->save();
        return redirect()->back()->with(config('naz.save'));
    }

    public function edit(Request $request){
        $table = Shipping::find($request->id);
        $table->carrierID = $request->carrierID;
        $table->locationID = $request->locationID;
        $table->weight = $request->weight;
        $table->weight_add = $request->weight_add;
        $table->rate = $request->rate;
        $table->rate_add = $request->rate_add;
        $table->shipping_time = $request->shipping_time;
        $table->save();
        return redirect()->back()->with(config('naz.edit'));
    }

    public function del($id){
        $table = Shipping::find($id);
        $table->delete();
        return redirect()->back()->with(config('naz.del'));
    }
}
