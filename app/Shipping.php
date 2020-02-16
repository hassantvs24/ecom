<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'shipping';
    protected $primaryKey = 'shippingID';
    protected $fillable = [
        'carrierID', 'locationID', 'weight', 'weight_add', 'rate', 'rate_add', 'shipping_time'
    ];


    public function carrier(){
        return $this->belongsTo('App\Carrier', 'carrierID');
    }

    public function location(){
        return $this->belongsTo('App\Locations', 'locationID');
    }

}
