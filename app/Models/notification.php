<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    protected $table = 'notifications';
    protected $fillable =['sender','receivers','title','platform','notice'];
}