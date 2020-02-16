<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    protected $table = 'promotion';
    protected $primaryKey = 'promotionID';
    protected $fillable = [
        'name', 'description', 'img', 'productID', 'starts', 'ends', 'status'
    ];

    public function product(){
        return $this->belongsTo('App\Product', 'productID');
    }

}
