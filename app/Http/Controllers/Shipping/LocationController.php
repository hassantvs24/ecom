<?php

namespace App\Http\Controllers\Shipping;

use App\Locations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function index(){
        $table = Locations::orderBy('locationID', 'DESC')->get();
        return view('shipping.locations')->with(['table' => $table]);
    }

    public function save(Request $request){
        $table = new Locations();
        $table->name = $request->name;
        $table->save();
        return redirect()->back()->with(config('naz.save'));
    }

    public function edit(Request $request){
        $table = Locations::find($request->id);
        $table->name = $request->name;
        $table->save();
        return redirect()->back()->with(config('naz.edit'));
    }

    public function del($id){
        $table = Locations::find($id);
        $table->delete();
        return redirect()->back()->with(config('naz.del'));
    }
}
