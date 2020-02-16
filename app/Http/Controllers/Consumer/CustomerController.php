<?php

namespace App\Http\Controllers\Consumer;

use App\Commission;
use App\Locations;
use App\Points;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index(){
        $table = User::where('isAdmin', 'No')->where('userLevel', 'Customer')->get();
        $locations = Locations::orderBy('name', 'ASC')->get();
        return view('consumer.customer')->with(['table' => $table, 'locations' => $locations]);
    }

    public function view_customer($id){
        $table = User::find($id);
        return view('box.consumer.light_box')->with(['table' => $table]);
    }


    public function points(Request $request){
        $user = User::find($request->id);
        $date_rang = date_time_range($request->dateRang);
        $table = Points::whereBetween('created_at', [$date_rang[0], $date_rang[1]])->where('userID', $request->id)->get();
        return view('print.consumer')->with(['table' => $table, 'user' => $user, 'date_rang' =>  $request->dateRang]);
    }

    public function commission(Request $request){
        $user = User::find($request->id);
        $date_rang = date_time_range($request->dateRang);
        $table = Commission::whereBetween('created_at', [$date_rang[0], $date_rang[1]])->where('userID', $request->id)->get();
        return view('print.commission')->with(['table' => $table, 'user' => $user, 'date_rang' =>  $request->dateRang]);
    }


    public function save(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:4',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['message' => 'Oh! From Validation error!! Please try again.',  'alert-type' => 'error']);

        }
        DB::beginTransaction();
        try {

            $points = config('site.new_register');
            $is_referer = false;

            $salesmanID = config('site.default_salesman_id');
            $distributorID = config('site.default_distributor_id');

            if($request->ref != ''){
                $referer = User::find($request->ref);

                if($referer->count() > 0){
                    $is_referer = true;

                    $salesmanID = ($referer->salesman == '' ? config('site.default_salesman_id') : $referer->salesman);
                    $distributorID = ($referer->distributor == '' ? config('site.default_distributor_id') : $referer->distributor);

                    $old_point = $referer->points;
                    $referer->points = $old_point + config('site.referer_point');
                    $referer->save();

                    $point1 = new Points();
                    $point1->pointIN = config('site.referer_point');
                    $point1->trType = 'IN';
                    $point1->sector = config('naz.referral_sector');
                    $point1->description = config('naz.referral_description');
                    $point1->userID = $request->ref;
                    $point1->save();

                    $pointID1 = $point1->pointID;
                }

            }


            $table = new User();
            $table->name = $request->name;
            $table->email = $request->email;
            $table->password = bcrypt($request->password);
            $table->isAdmin = 'No';
            $table->userLevel = $request->userLevel;
            $table->contact = $request->contact;
            $table->address = $request->address;
            $table->state = $request->state;
            $table->city = $request->city;
            $table->postCode = $request->postCode;
            $table->country = $request->country;
            $table->locationID = $request->locationID;

            if($is_referer){

                if($request->userLevel == 'Customer'){
                    $table->salesman = $salesmanID;
                    $table->distributor = $distributorID;
                }

                $points = config('site.new_register_by_ref');
                $table->ref = $request->ref;
            }

            $table->points = $points;
            $table->save();
            $idUser = $table->id;


            if ($is_referer) {
                $point1x = Points::find($pointID1);
                $point1x->ref = $idUser;
            }


            $point = new Points();
            $point->pointIN = $points;
            $point->trType = 'IN';
            $point->sector = config('naz.registration_sector');
            $point->description = config('naz.registration_description');
            $point->userID = $idUser;
            if($is_referer){
                $point->ref = $request->ref;
            }
            $point->save();


            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
        return redirect()->back()->with(config('naz.save'));
    }


    public function edit_ref(Request $request){
        $table = User::find($request->id);
        $table->salesman = $request->salesman;
        $table->distributor = $request->distributor;
        $table->ref = $request->ref;
        $table->save();
        return redirect()->back()->with(config('naz.edit'));
    }


    public function edit_profile(Request $request){
        $table = User::find($request->id);
        $table->name = $request->name;
        $table->contact = $request->contact;
        $table->address = $request->address;
        $table->state = $request->state;
        $table->city = $request->city;
        $table->postCode = $request->postCode;
        $table->country = $request->country;
        $table->locationID = $request->locationID;
        $table->save();
        return redirect()->back()->with(config('naz.edit'));
    }


}
