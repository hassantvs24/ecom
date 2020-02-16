<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RedemptionList extends Model
{
    protected $table = 'redemption_item';
    protected $primaryKey = 'redemptionItemID';
    protected $fillable = [
        'productID', 'redemptionID', 'point'
    ];

    public function product(){
        return $this->belongsTo('App\Product', 'productID');
    }

    public function redemption(){
        return $this->belongsTo('App\Redemption', 'redemptionID');
    }

}
