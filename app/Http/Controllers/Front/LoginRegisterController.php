<?php

namespace App\Http\Controllers\Front;

use App\Locations;
use App\Mail\VerifyMail;
use App\OrderItem;
use App\Orders;
use App\Pages;
use App\Points;
use App\User;
use App\VerifyUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginRegisterController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect()->route('site');
        }
        $table = Pages::where('name', 'login')->first();
        $locations = Locations::orderBy('name', 'ASC')->get();
        return view('front.log_regi')->with(['table' => $table, 'locations' => $locations]);
    }

    public function save(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:4',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        }
            DB::beginTransaction();
            try {

                $userLevel = 'Customer';

            $points = config('site.new_register');
            $is_referer = false;

                $salesmanID = config('site.default_salesman_id');
                $distributorID = config('site.default_distributor_id');

                if($request->has('ref')){
                    $referer = User::find($request->ref);

                    if($referer->count() > 0){

                        if($referer->userLevel == 'Salesman'){
                            $userLevel = 'Distributor';
                        }else{
                            $userLevel = 'Customer';
                        }

                        $is_referer = true;

                        if($referer->userLevel == 'Distributor'){
                            $salesmanID = $referer->ref;
                            $distributorID = $request->ref;
                        }elseif($referer->userLevel == 'Salesman'){
                            $salesmanID = '';
                            $distributorID = '';
                        }else{
                            $salesmanID = ($referer->salesman == '' ? config('site.default_salesman_id') : $referer->salesman);
                            $distributorID = ($referer->distributor == '' ? config('site.default_distributor_id') : $referer->distributor);
                        }



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
            $table->userLevel = $userLevel;
            $table->contact = $request->contact;
            $table->address = $request->address;
            $table->state = $request->state;
            $table->city = $request->city;
            $table->postCode = $request->postCode;
            $table->country = $request->country;
            $table->locationID = $request->locationID;

            $table->salesman = $salesmanID;
            $table->distributor = $distributorID;

            if($is_referer){
                $points = config('site.new_register_by_ref');
                $table->ref = $request->ref;
            }

            $table->points = $points;
            $table->save();

            $userID = $table->id;

                $verifyUser = VerifyUser::create([
                    'user_id' => $userID,
                    'token' => Str::random(40)
                ]);


                if ($is_referer) {
                    $point1x = Points::find($pointID1);
                    $point1x->ref = $userID;
                }


                $point = new Points();
                $point->pointIN = $points;
                $point->trType = 'IN';
                $point->sector = config('naz.registration_sector');
                $point->description = config('naz.registration_description');
                $point->userID = $userID;
                if($is_referer){
                    $point->ref = $request->ref;
                }
                $point->save();


                DB::commit();
            } catch (\Throwable $e) {
                DB::rollback();
                throw $e;
            }



        if(Session::has('ref')){
            Session::forget('ref');
        }

        Mail::to($table->email)->send(new VerifyMail($table));

        return redirect()->route('login-register')->with('status', 'We sent you an activation code. Check your email and click on the link to verify.');

       // Auth::loginUsingId($userID, TRUE);

       /* if($request->message == 'cart'){
                Session::forget('message');
                return redirect()->route('proceed');
            }else{
                return redirect()->route('site');
            }*/
    }

    public function login(Request $request){

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'isAdmin' => $request->isAdmin])) {
            if (!Auth::user()->verified) {
                auth()->logout();
                return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
            }

            if(Session::has('ref')){
                Session::forget('ref');
            }

            if($request->message == 'cart'){
                Session::forget('message');
                return redirect()->route('proceed');
            }else{
                return redirect()->route('site');
            }
        }else{
            return redirect()->back()->withErrors([
                'incorrect' => 'Incorrect email or password',
            ]);
        }

    }

    public function referral_code($id){
        session(['ref' => $id]);
        return redirect()->route('login-register');
    }


    public function profile(){
        if (Auth::check()) {
            $table = User::find(Auth::user()->id);
            $pages = Pages::where('name', 'profile')->first();
            return view('front.profile')->with(['table' => $table, 'pages' => $pages]);
        }else{
            return redirect()->route('login-register');
        }
    }


    public function show_profile_update(){
        $table = User::find(Auth::user()->id);
        $pages = Pages::where('name', 'profile')->first();
        $locations = Locations::orderBy('name', 'ASC')->get();
        return view('front.update_profile')->with(['table' => $table, 'pages' => $pages, 'locations' => $locations]);
    }

    public function update_profile(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:4',
            'email' => 'required|string|email|max:191',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        }
        $table = User::find($request->id);
        $table->name = $request->name;
        $table->email = $request->email;
        $table->password = bcrypt($request->password);
        $table->contact = $request->contact;
        $table->address = $request->address;
        $table->state = $request->state;
        $table->city = $request->city;
        $table->postCode = $request->postCode;
        $table->locationID = $request->locationID;
        $table->save();

        return redirect()->route('profile')->with(config('naz.edit'));
    }


    public function show_summary_distributor(Request $request){
        $date_rang = date_time_range($request->dateRang);
        $distributors = User::where('userLevel', 'Distributor')->where('ref',Auth::user()->id)->pluck('id');

      //  $customer = User::whereIn('distributor',$distributor)->pluck('id');

        $i = 1;
        $table = [];


        foreach ($distributors as $distributor){
            $distributor_info = User::find($distributor);

            $customers = User::where('distributor',$distributor)->pluck('id');

            $orders = Orders::whereBetween('created_at', [$date_rang[0], $date_rang[1]])->whereIn('userID', $customers)->get();

            $total_amount = 0;
            foreach ($orders as $row){
                $items = $row->items()->get();
                $price_val = 0;
                foreach ($items as $rows){
                    $price_val += $rows->price * $rows->qty;
                }

                $total_amount += $price_val;

            }

            $table[] = ['no' => $i, 'name' => $distributor_info->name, 'sales' => $total_amount, 'commission' => (($total_amount * config('site.salesman_commission')) / 100)];

            $i++;
        }

       // dd($table);



        return view('print.distributor_summary')->with(['date_rang' => $request->dateRang, 'table' => $table]);
    }


    public function show_summary_customer(Request $request){
        $date_rang = date_time_range($request->dateRang);
        $customers = User::where('distributor', Auth::user()->id)->pluck('id');
        $i = 1;
        $table = [];
        foreach ($customers as $customer){
            $customer_info = User::find($customer);

            $orders = Orders::whereBetween('created_at', [$date_rang[0], $date_rang[1]])->where('userID', $customer)->get();

            $total_amount = 0;
            foreach ($orders as $row){
                $items = $row->items()->get();
                $price_val = 0;
                foreach ($items as $rows){
                    $price_val += $rows->price * $rows->qty;
                }

                $total_amount += $price_val;

            }

            $table[] = ['no' => $i, 'name' => $customer_info->name, 'sales' => $total_amount, 'commission' => (($total_amount * config('site.distributor_commission')) / 100)];

            $i++;
        }

        return view('print.customer_summary')->with(['date_rang' => $request->dateRang, 'table' => $table]);
    }

}
