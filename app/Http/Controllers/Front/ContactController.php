<?php

namespace App\Http\Controllers\Front;

use App\Pages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(){
        $table = Pages::where('name', 'contact')->first();

        return view('front.contact')->with(['table' => $table]);
    }
}
