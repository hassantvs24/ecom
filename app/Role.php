<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'roleID';
    protected $fillable = [
        'name'
    ];

    public function permission(){
        return $this->hasMany('App\Permission', 'roleID');
    }
}
