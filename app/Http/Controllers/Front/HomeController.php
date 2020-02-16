<?php

namespace App\Http\Controllers\Front;

use App\Advertise;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $current = date('Y-m-d');
        $slide = Advertise::where('status', 'Active')->whereDate('starts', '<=', $current)->whereDate('ends', '>=', $current)->orderBy('created_at', 'DESC')->get();
        $category =Product::select(DB::raw('MIN(img) as imgs, category'))->orderBy('category','ASC')->where('category', '<>', null)->groupBy('category')->get();
        $product =Product::orderBy('created_at', 'DESC')/*->orderBy('rating', 'DESC')*/->take(8)->get();
       // dd($category);
        return view('front.main')->with(['slide' => $slide, 'category' => $category, 'product' => $product]);
    }


    public function create_session(){
        $values = md5(date('Y-m-d h:i:s').rand(1,10000));
        Cookie::queue('uniq_key', $values, config('naz.cookie_time'));
    }

}
