<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class TitlesController extends Controller
{
    public function index(){
        $role = (Auth::user()->getAttribute('role'));
        // dd ($role);
      
        
            return view ('student/ptitle');
        
      
    }
}
