<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = [
        "chat_session_id",
        "message",
        "user_id"
    ];

    public function chat_session(){
        return $this->belongsTo(ChatSession::class);
    }
}
