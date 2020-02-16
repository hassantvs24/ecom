<?php

namespace App\Http\Controllers\Front;

use App\Pages;
use App\Promotions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromotionController extends Controller
{
    public function index(){
        $current = date('Y-m-d');
        $promotion =Promotions::where('status', 'Active')->whereDate('starts', '<=', $current)->whereDate('ends', '>=', $current)->orderBy('created_at', 'DESC')->get();
        $table = Pages::where('name', 'promotion')->first();
        return view('front.promotion')->with(['promotion' => $promotion, 'table' => $table]);
    }
}
