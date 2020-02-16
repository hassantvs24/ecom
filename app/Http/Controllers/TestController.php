<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function index(){
        Mail::to('wall.mate@gmail.com')->send(new DemoMail());
        return 'Test';
    }
}
