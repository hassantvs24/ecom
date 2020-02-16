<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempRdmOrder extends Model
{
    protected $table = 'temp_od_rdm';
    protected $primaryKey = 'tempRdmOrderID';
    protected $fillable = [
        'sessionID', 'productID', 'qty', 'points', 'redemptionID'
    ];

    public function product(){
        return $this->belongsTo('App\Product', 'productID');
    }

    public function redemption(){
        return $this->belongsTo('App\Redemption', 'redemptionID');
    }
}
