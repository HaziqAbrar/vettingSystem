<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class test extends Controller
{
    public function index(){
        $role = (Auth::user()->getAttribute('role'));
        // dd ($role);
        if ($role=='lecturer')
        {
            return view ('dashboard');
        }
        if ($role=='student')
        {
            return view ('dashboard1');
        }
    }
  
   
}
