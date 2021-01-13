<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class meet extends Model
{
    protected $table = 'meetings';
    protected $fillable =['supervisor','student','title_code','platform','comment','link','time'];
}
