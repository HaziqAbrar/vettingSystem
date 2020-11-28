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
        if ($role=='supervisor')
        {
            return view ('supervisor.supervisorIndex');
        }
        if ($role=='coordinator')
        {
            return view ('coordinator.coordinatorIndex');
        }
        if ($role=='panel')
        {
            return view ('panel.panelIndex');
        }
        if ($role=='student')
        {
            return view ('student\dashboard');
        }
    }


}
