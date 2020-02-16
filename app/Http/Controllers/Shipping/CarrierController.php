<?php

namespace App\Http\Controllers\Shipping;

use App\Carrier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarrierController extends Controller
{
    public function index(){
        $table = Carrier::orderBy('carrierID', 'DESC')->get();
        return view('shipping.carrier')->with(['table' => $table]);
    }

    public function save(Request $request){
        $table = new Carrier();
        $table->name = $request->name;
        $table->save();
        return redirect()->back()->with(config('naz.save'));
    }

    public function edit(Request $request){
        $table = Carrier::find($request->id);
        $table->name = $request->name;
        $table->save();
        return redirect()->back()->with(config('naz.edit'));
    }

    public function del($id){
        $table = Carrier::find($id);
        $table->delete();
        return redirect()->back()->with(config('naz.del'));
    }
}
