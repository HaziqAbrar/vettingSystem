<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class first extends Model
{
    protected $table = 'firsts';
    protected $fillable =['title','email','status','lecturer','agree'];
}