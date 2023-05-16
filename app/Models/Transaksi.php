<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "paket_id",
        "status",
        "created_at"
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function paket(){
        return $this->belongsTo(Paket::class);
    }
}
