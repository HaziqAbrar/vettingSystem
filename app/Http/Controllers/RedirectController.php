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
            return view ('supervisor.supervisorIndex',compact('titleinfos'));
        }
        elseif ($role=='coordinator')
        {
<<<<<<< HEAD
            return view ('coordinator.coordinatorIndex', compact('titleinfos'));
=======
            return view ('coordinator.coordinatorIndex',compact('titleinfos'));
>>>>>>> e68f618c1d5db621a66a88729500bd59864548e3
        }
        elseif ($role=='panel')
        {
            return view ('panel.panelIndex',compact('titleinfos'));
        }
        elseif ($role=='student')
        {
            return view ('student\dashboard');
        }
    }


}
