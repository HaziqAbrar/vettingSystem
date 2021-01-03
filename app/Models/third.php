<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class third extends Model
{
    protected $table = 'thirds';
    protected $fillable =['title','email','status'];
}