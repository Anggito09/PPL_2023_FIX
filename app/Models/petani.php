<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class petani extends Model
{
    use HasFactory;
    protected $fillable = ["name", "phone", "farmerdesc", "landdesc", "fund", "user_id"];
}
