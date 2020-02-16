<?php

namespace App\Http\Controllers\Consumer;

use App\Locations;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistributorController extends Controller
{
    public function index(){
        $table = User::where('isAdmin', 'No')->where('userLevel', 'Distributor')->get();
        $locations = Locations::orderBy('name', 'ASC')->get();
        return view('consumer.distributor')->with(['table' => $table, 'locations' => $locations]);
    }
}
