<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permission';
    protected $primaryKey = 'permissionID';
    protected $fillable = [
        'roleID', 'name', 'values'
    ];

}
