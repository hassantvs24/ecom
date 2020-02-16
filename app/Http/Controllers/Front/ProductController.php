<?php

namespace App\Http\Controllers\Front;

use App\Pages;
use App\Product;
use App\TempOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $category =Product::select('category')->orderBy('category','ASC')->where('category', '<>', null)->groupBy('category')->get();
        $table = Pages::where('name', 'shop')->first();
        return view('front.sales')->with(['category' => $category, 'table' => $table]);
    }


    public function product_list(Request $request){

        if($request->sorting == 'atoz'){
            $culomns = 'name';
            $sync = 'ASC';
        }elseif ($request->sorting == 'rating'){
            $culomns = 'rating';
            $sync = 'DESC';
        }elseif ($request->sorting == 'price_asc'){
            $culomns = 'price';
            $sync = 'ASC';
        }else{
            $culomns = 'price';
            $sync = 'DESC';
        }


        $pretable =Product::orderBy($culomns, $sync);

        if ($request->has('category')) {
            if($request->category != 'all'){
                $pretable->where('category',$request->category);
            }
        }

        if ($request->has('price_start') && $request->has('price_end')) {
            if($request->price_start != '' && $request->price_end != ''){
                $pretable->whereBetween('price', [$request->price_start, $request->price_end]);
            }

        }

        if ($request->has('search')) {
            if(strlen($request->search) > 2){
                $pretable->where('name', 'like', '%'.$request->search.'%');
            }

        }


        $table = $pretable->get();


        return view('front.product_list')->with(['table' => $table]);
    }



    public function product_details($id){
        $sessionID = Cookie::get('uniq_key');
        $temp = TempOrder::select('qty')->where('sessionID', $sessionID)->where('productID', $id)->first();
        if($temp == null){
            $qty = 1;
        }else{
            $qty = $temp->qty;
        }

        $table =Product::find($id);
        $product =Product::where('category', $table->category)->whereNotIn('productID',[$id])->get()->take(20);//related

        return view('front.product_details')->with(['table' => $table, 'product' => $product, 'qty' => $qty]);
    }




}
