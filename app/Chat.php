<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chat';
    protected $primaryKey = 'chatID';
    protected $fillable = [
        'userID', 'name', 'email', 'adminID', 'adminName', 'status'
    ];

    public function history(){
        return $this->hasMany('App\ChatHistory', 'chatID');
    }
}
