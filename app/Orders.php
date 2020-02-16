<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
   // use SoftDeletes;

    protected $table = 'orders';
    protected $primaryKey = 'orderID';
    protected $fillable = [
        'orderNumber', 'payslip', 'notes', 'shippingID', 'shipCost', 'userID', 'status', 'trackNumber'
    ];


    public function items(){
        return $this->hasMany('App\OrderItem', 'orderID');
    }

    public function rdm_items(){
        return $this->hasMany('App\RdmOrderItem', 'orderID');
    }

    public function customer(){
        return $this->hasOne('App\User', 'id', 'userID');
    }

    public function shipping(){
        return $this->belongsTo('App\Shipping', 'shippingID');
    }

}
