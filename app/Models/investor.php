<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class investor extends Model
{
    use HasFactory;
    protected $fillable = ["user_id", "name", "address", "petani_id", "fund"];
}
