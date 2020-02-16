<?php

namespace App\Http\Controllers\Consumer;

use App\Locations;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesmanController extends Controller
{
    public function index(){
        $table = User::where('isAdmin', 'No')->where('userLevel', 'Salesman')->get();
        $locations = Locations::orderBy('name', 'ASC')->get();
        return view('consumer.salesman')->with(['table' => $table, 'locations' => $locations]);
    }
}
