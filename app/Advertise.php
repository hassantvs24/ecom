<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    protected $table = 'advertise';
    protected $primaryKey = 'advertiseID';
    protected $fillable = [
        'name', 'description', 'img', 'starts', 'ends', 'status'
    ];
}
