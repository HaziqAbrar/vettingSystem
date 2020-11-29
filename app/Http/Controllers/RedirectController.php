<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Models\titleinfo;



class RedirectController extends Controller
{
    public function index(){
        $role = (Auth::user()->getAttribute('role'));
        // dd ($role);
        $titleinfos = titleinfo::all();
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
            return view ('panel.panelIndex',compact('titleinfos'));
        }
        if ($role=='student')
        {
            return view ('student\dashboard');
        }
    }


}
