<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatHistory extends Model
{
    protected $table = 'chat_history';
    protected $primaryKey = 'chatHistoryID';
    protected $fillable = [
        'chatID', 'message', 'name', 'fromType'
    ];

    public function chat(){
        return $this->belongsTo('App\Chat', 'chatID');
    }
}
