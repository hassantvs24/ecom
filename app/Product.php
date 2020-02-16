<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'productID';
    protected $fillable = [
        'sku', 'name', 'category', 'notes', 'description', 'additional', 'review', 'rating', 's_commission', 'd_commission',
        'price', 'pre_price', 'weight', 'img', 'img_one', 'img_two', 'img_tree'
    ];

    public function promotion(){
        return $this->hasMany('App\Promotions', 'productID');
    }

}
