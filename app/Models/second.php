<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class second extends Model
{
    protected $table = 'seconds';
    protected $fillable =['title','email','status','lecturer','agree'];
}