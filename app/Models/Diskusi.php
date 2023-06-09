<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskusi extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "topic",
        "visible"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function diskusiKomens(){
        return $this->hasOne(DiskusiKomen::class);
    }
}
