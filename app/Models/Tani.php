<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tani extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "phone",
        "descpetani",
        "desclahan",
        "fund",
        "user_id"
    ];

    public function investasi(){
        return $this->hasMany(Investasi::class, "tani_id");
    }
}
