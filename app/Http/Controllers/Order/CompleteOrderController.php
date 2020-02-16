<?php

namespace App\Http\Controllers\Order;

use App\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompleteOrderController extends Controller
{
    public function index(){
        $table = Orders::where('status', 'Complete')->orderBy('orderID', 'DESC')->get();
        return view('orders.order_complete')->with(['table' => $table]);
    }


    public function cancel_list(){
        $table = Orders::where('status', 'Cancelled')->orderBy('orderID', 'DESC')->get();
        return view('orders.order_cancel')->with(['table' => $table]);
    }


    public function order_report(){
        return view('orders.order_report');
    }

    public function export_report(Request $request){
        //dd($request->all());
        $date_rang = date_time_range($request->dateRang);
        $table = Orders::whereBetween('created_at', [$date_rang[0], $date_rang[1]])->whereIn('status', $request->status)->get();
        $data = [];
        $fileName = 'reports_';
        if($request->reports == 'General'){
            $fileName = 'order_listing_';
            $columnNames = ['ORDER NO', 'TRACKING NO', 'DATE', 'STATUS', 'CUSTOMER', 'ADDRESS', 'CONTACT NO', 'EMAIL', 'TOTAL QUANTITY', 'TOTAL VALUE', 'TOTAL QUANTITY REDEMPTION', 'REDEMPTION POINT'];

            foreach ($table as $row){

                $items = $row->items()->select('price', 'qty')->get();
                $qty = 0;
                $amount = 0;
                foreach ($items as $rows){
                    $qty += $rows->qty;
                    $amount += $rows->qty * $rows->price;
                }

                $rdm_items = $row->rdm_items()->get();
                $qtyr = 0;
                $amountr = 0;
                foreach ($rdm_items as $rowsr){
                    $qtyr += $rowsr->qty;
                    $amountr += $rowsr->qty * $rowsr->point;
                }

                $rowData['orderNo'] = $row->orderID;
                $rowData['trackNumber'] = $row->trackNumber;
                $rowData['date'] = pub_date($row->created_at);
                $rowData['status'] = $row->status;
                $rowData['customer'] = $row->customer['name'];
                $rowData['address'] = $row->customer['address'].', '.$row->customer['state'].', '.$row->customer['city'].', '.$row->customer['postCode'].', '.$row->customer['country'];
                $rowData['contact'] = $row->customer['contact'];
                $rowData['email'] = $row->customer['email'];
                $rowData['qty'] = $qty;
                $rowData['value'] = $amount;
                $rowData['rdmQty'] = $qtyr;
                $rowData['totalPoint'] = $amountr;

                $data[] = $rowData;
            }





        }elseif ($request->reports == 'Details'){
            $fileName = 'order_details_listing_';
            $columnNames = ['ORDER NO', 'TRACKING NO', 'DATE', 'STATUS', 'CUSTOMER', 'ADDRESS', 'CONTACT NO', 'EMAIL', 'SKU', 'PRODUCT', 'QUANTITY', 'UINT PRICE', 'TOTAL'];

            foreach ($table as $row){
                $items = $row->items()->get();

                $idata = [];
                foreach ($items as $rows){
                    $rowData['orderNo'] = $row->orderID;
                    $rowData['trackNumber'] = $row->trackNumber;
                    $rowData['date'] = pub_date($row->created_at);
                    $rowData['status'] = $row->status;
                    $rowData['customer'] = $row->customer['name'];
                    $rowData['address'] = $row->customer['address'].', '.$row->customer['state'].', '.$row->customer['city'].', '.$row->customer['postCode'].', '.$row->customer['country'];
                    $rowData['contact'] = $row->customer['contact'];
                    $rowData['email'] = $row->customer['email'];
                    $rowData['sku'] = $rows->sku;
                    $rowData['product'] = $rows->name;
                    $rowData['qty'] = $rows->qty;
                    $rowData['price'] = $rows->price;
                    $rowData['total'] = $rows->qty * $rows->price;

                        $idata[] = $rowData;
                }

                $data[] = $idata;

                $collection = collect($data);
                $data = $collection->collapse();
            }

        }else{
            $fileName = 'redemption_details_listing_';
            $columnNames = ['ORDER NO', 'TRACKING NO', 'DATE', 'STATUS', 'CUSTOMER', 'ADDRESS', 'CONTACT NO', 'EMAIL', 'SKU', 'PRODUCT', 'QUANTITY'];

            foreach ($table as $row){
                $items = $row->rdm_items()->get();

                $idata = [];
                foreach ($items as $rows){
                    $rowData['orderNo'] = $row->orderID;
                    $rowData['trackNumber'] = $row->trackNumber;
                    $rowData['date'] = pub_date($row->created_at);
                    $rowData['status'] = $row->status;
                    $rowData['customer'] = $row->customer['name'];
                    $rowData['address'] = $row->customer['address'].', '.$row->customer['state'].', '.$row->customer['city'].', '.$row->customer['postCode'].', '.$row->customer['country'];
                    $rowData['contact'] = $row->customer['contact'];
                    $rowData['email'] = $row->customer['email'];
                    $rowData['sku'] = $rows->sku;
                    $rowData['product'] = $rows->name;
                    $rowData['qty'] = $rows->qty;
                    //$rowData['point'] = $rows->point;
                    //$rowData['total'] = $rows->qty * $rows->point;

                    $idata[] = $rowData;
                }

                $data[] = $idata;
            }

            $collection = collect($data);
            $data = $collection->collapse();

        }

        return getCsv($columnNames, $data, $fileName.date('d_m_Y').'.csv');

    }




}
