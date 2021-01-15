<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panel extends Model
{
    // use HasFactory;
    protected $fillable = ['email', 'titleid'];
    protected $dates = ['created_at'];
}
