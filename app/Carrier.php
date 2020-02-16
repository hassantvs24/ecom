<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    protected $table = 'carrier';
    protected $primaryKey = 'carrierID';
    protected $fillable = [
        'name'
    ];
}
