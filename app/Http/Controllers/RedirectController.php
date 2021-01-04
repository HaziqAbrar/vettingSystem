<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
          $email = (Auth::user()->getAttribute('email'));
          $titleinfos = titleinfo::all();
          $mytitle = titleinfo::all()->where('email',$email);
            return view ('supervisor.supervisorIndex',compact('mytitle'));
        }
        elseif ($role=='coordinator')
        {
          $titleinfos = titleinfo::all();
          $user = user::all();
          return view('coordinator.coordinatorIndex', compact('titleinfos'), compact('user'));
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
