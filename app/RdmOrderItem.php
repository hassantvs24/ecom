<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RdmOrderItem extends Model
{
    protected $table = 'order_rdmp_item';
    protected $primaryKey = 'orderRdmItemID';
    protected $fillable = [
        'orderID', 'productID', 'sku', 'point', 'qty', 'img'
    ];
}
