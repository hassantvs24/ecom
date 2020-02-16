<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $table = 'location';
    protected $primaryKey = 'locationID';
    protected $fillable = [
        'name'
    ];
}
