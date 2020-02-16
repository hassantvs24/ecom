<?php

namespace App\Http\Controllers\Front;

use App\Pages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index(){
        $table = Pages::where('name', 'about')->first();
        return view('front.about')->with(['table' => $table]);
    }
}
