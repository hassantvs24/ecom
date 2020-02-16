<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_item';
    protected $primaryKey = 'orderItemID';
    protected $fillable = [
        'orderID', 'productID', 'sku', 'price', 'qty', 'img'
    ];

    public function product(){
        return $this->belongsTo('App\Product', 'productID');
    }


}
