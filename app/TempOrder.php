<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempOrder extends Model
{
    protected $table = 'temp_order';
    protected $primaryKey = 'tempOrderID';
    protected $fillable = [
        'sessionID', 'productID', 'qty'
    ];

    public function product(){
        return $this->belongsTo('App\Product', 'productID');
    }
}
