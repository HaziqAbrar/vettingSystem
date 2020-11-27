<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class RedirectController extends Controller
{
    public function index(){
        $role = (Auth::user()->getAttribute('role'));
        // dd ($role);
        if ($role=='lecturer')
        {
            return view ('yai\dashboard');
        }
        if ($role=='coordinator')
        {
            return view ('yai\dashboard');
        }
        if ($role=='panel')
        {
            return view ('yai\dashboard');
        }
        if ($role=='student')
        {
            return view ('ammar\dashboard');
        }
    }


}
