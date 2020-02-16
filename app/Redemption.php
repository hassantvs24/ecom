<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redemption extends Model
{
    protected $table = 'redemption';
    protected $primaryKey = 'redemptionID';
    protected $fillable = [
        'name', 'description', 'img', 'starts', 'ends', 'status'
    ];

    public function list(){
        return $this->hasMany('App\RedemptionList', 'redemptionID');
    }

}
