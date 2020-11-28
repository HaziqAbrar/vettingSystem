<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class titleinfo extends Model
{
    
    protected $fillable = ['name','comment','status','email','title','description'];
}
