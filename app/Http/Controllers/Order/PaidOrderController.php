<?php

namespace App\Http\Controllers\Order;

use App\Commission;
use App\Orders;
use App\Points;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PaidOrderController extends Controller
{
    public function index(){
        $table = Orders::where('status', 'Paid')->orderBy('orderID', 'DESC')->get();
        return view('orders.orders_paid')->with(['table' => $table]);
    }


    public function mark_action(Request $request){
        DB::beginTransaction();
        try {

            $orderID = $request->orderID;
            $status = $request->status;

            if($request->acType == 'process'){

            foreach ($orderID as $id){

            $table = Orders::find($id);
            $userID = $table->userID;
            $items = $table->items()->get();
            $rdm_items = $table->rdm_items()->get();
            $table->status = ucwords($status);
            if($request->trackNumber != ''){
                $table->trackNumber = $request->trackNumber;
            }
            $table->save();

            if ($status == 'Complete'){

                $total_amount = 0;
                if($items->count() > 0) {

                    $orderUser = $table->customer()->first();

                    $salesmanID = $orderUser->salesman;
                    $distributorID = $orderUser->distributor;


                    foreach ($items as $row) {
                        $total_amount += ($row->qty * $row->price);
                        $amounts = ($row->qty * $row->price);

                        if($amounts > 0){
                            $commission_sale = new Commission();
                            $commission_sale->amount = (($amounts * config('site.salesman_commission')) / 100);
                            $commission_sale->orderID = $id;
                            $commission_sale->percents = config('site.salesman_commission');
                            $commission_sale->productID = $row->productID;
                            $commission_sale->sku = $row->product['sku'];
                            $commission_sale->name = $row->product['name'];
                            $commission_sale->category = $row->product['category'];
                            $commission_sale->price = $row->product['price'];
                            $commission_sale->img = $row->product['img'];
                            $commission_sale->userID = $salesmanID;
                            $commission_sale->save();


                            $commission_sale = new Commission();
                            $commission_sale->amount = (($amounts * config('site.distributor_commission')) / 100);
                            $commission_sale->orderID = $id;
                            $commission_sale->percents = config('site.distributor_commission');
                            $commission_sale->productID = $row->productID;
                            $commission_sale->sku = $row->product['sku'];
                            $commission_sale->name = $row->product['name'];
                            $commission_sale->category = $row->product['category'];
                            $commission_sale->price = $row->product['price'];
                            $commission_sale->img = $row->product['img'];
                            $commission_sale->userID = $distributorID;
                            $commission_sale->save();
                        }

                    }


                }
                $collect_point = ($total_amount / config('site.sales_point_value'));


                $point_total = 0;
                if($rdm_items->count() > 0){
                    foreach ($rdm_items as $row){
                        $point_total +=  ($row->qty * $row->point);
                    }
                }

                $user = User::find($userID);
                $old_point = $user->points;

                $user->points = $old_point + $collect_point - $point_total;
                $user->save();

                if($collect_point > 0) {
                    $point_table = new Points();
                    $point_table->pointIN = $collect_point;
                    $point_table->trType = 'IN';
                    $point_table->sector = config('naz.sales_sector');
                    $point_table->description = config('naz.sales_description');
                    $point_table->ref = $id;
                    $point_table->userID = $userID;
                    $point_table->save();
                }

                if($point_total > 0){
                    $point_table1 = new Points();
                    $point_table1->pointOUT = $point_total;
                    $point_table1->trType = 'OUT';
                    $point_table1->sector = config('naz.rdm_sector');
                    $point_table1->description = config('naz.rdm_description');
                    $point_table1->ref = $id;
                    $point_table1->userID = $userID;
                    $point_table1->save();
                }

            }

            }

            }else{
                foreach ($orderID as $id) {
                    $table = Orders::find($id);
                    $table->status = 'Cancelled';
                    $table->save();
                }
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
        return redirect()->back()->with(config('naz.edit'));
    }

}
