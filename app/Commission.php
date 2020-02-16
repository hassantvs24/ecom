<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $table = 'commission';
    protected $primaryKey = 'commissionID';
    protected $fillable = [
        'percents', 'amount', 'orderID', 'productID', 'sku', 'name', 'category',  'price', 'img', 'userID'
    ];


    public function product(){
        return $this->belongsTo('App\Product', 'productID');
    }

}
