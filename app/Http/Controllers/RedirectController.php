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

>>>>>>> 4ed73c689bf136dee79fbce895c2ab56c4ad61b1
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
