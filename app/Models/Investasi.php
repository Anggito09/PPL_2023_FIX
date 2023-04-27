<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investasi extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "phone",
        "fund",
        "tani_id",
        "user_id",
        "file"
    ];

    public function tani(){
        return $this->belongsTo(Tani::class, "tani_id");
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
