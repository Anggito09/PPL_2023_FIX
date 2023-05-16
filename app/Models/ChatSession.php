<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatSession extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "to"
    ];
    public function recipient(){
        return $this->belongsTo(User::class, "to");
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function chats(){
        return $this->hasMany(Chat::class);
    }
}
