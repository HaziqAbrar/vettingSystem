<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = ['name','department','year','cgpa','skills','email','avatar','level','about','matrix'];

}
