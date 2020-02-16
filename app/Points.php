<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    protected $table = 'points';
    protected $primaryKey = 'pointID';
    protected $fillable = [
        'pointIN', 'pointOUT', 'trType', 'sector', 'ref', 'description', 'userID'
    ];
}
